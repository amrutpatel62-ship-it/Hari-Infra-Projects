<?php
// Include database configuration
require_once 'db_config.php';

$upload_message_gallery = ''; // Message for gallery uploads
$upload_message_compare = ''; // Message for compare uploads
$review_message = '';
$delete_message = ''; // General message for file deletions or review deletions

// --- Function to handle file uploads ---
function handleUpload($file_input_name, $target_sub_dir, &$upload_message_var) {
    $target_dir = $target_sub_dir . "/";

    // Ensure the directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory with write permissions
    }

    $file_name = basename($_FILES[$file_input_name]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $upload_message_var = "<div class='alert alert-warning'>Sorry, file already exists.</div>";
        $uploadOk = 0;
    }

    // Check file size (e.g., 50MB max)
    if ($_FILES[$file_input_name]["size"] > 50 * 1024 * 1024) {
        $upload_message_var = "<div class='alert alert-warning'>Sorry, your file is too large. Max 50MB.</div>";
        $uploadOk = 0;
    }

    // Allow certain file formats - ADD 'webp' here
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'webm', 'ogg', 'mov', 'webp']; // Added 'webp'
    if (!in_array($file_type, $allowed_types)) {
        $upload_message_var = "<div class='alert alert-warning'>Sorry, only JPG, JPEG, PNG, GIF, MP4, WEBM, OGG, MOV, & WEBP files are allowed.</div>"; // Updated message
        $uploadOk = 0;
    }

    // Attempt to upload file
    if ($uploadOk == 0) {
        // Message already set by prior checks
    } else {
        if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
            $upload_message_var = "<div class='alert alert-success'>The file " . htmlspecialchars($file_name) . " has been uploaded.</div>";
        } else {
            $upload_message_var = "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
        }
    }
}

// --- Determine which tab should be active after a POST request ---
$active_tab = 'gallery'; // Default active tab

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['gallery_file'])) {
        handleUpload('gallery_file', 'gallery', $upload_message_gallery);
        $active_tab = 'gallery';
    } elseif (isset($_FILES['compare_file'])) {
        handleUpload('compare_file', 'compare', $upload_message_compare);
        $active_tab = 'compare';
    } elseif (isset($_POST['delete_file'])) {
        $file_to_delete = $_POST['delete_file'];
        // Basic sanitization and security check: ensure file is within expected directories
        if (strpos($file_to_delete, 'gallery/') === 0) {
            if (file_exists($file_to_delete)) {
                if (unlink($file_to_delete)) {
                    $delete_message = "<div class='alert alert-success'>File deleted successfully!</div>";
                } else {
                    $delete_message = "<div class='alert alert-danger'>Error deleting file.</div>";
                }
            } else {
                $delete_message = "<div class='alert alert-warning'>File not found.</div>";
            }
            $active_tab = 'gallery'; // Stay on gallery tab after deleting a gallery file
        } elseif (strpos($file_to_delete, 'compare/') === 0) {
            if (file_exists($file_to_delete)) {
                if (unlink($file_to_delete)) {
                    $delete_message = "<div class='alert alert-success'>File deleted successfully!</div>";
                } else {
                    $delete_message = "<div class='alert alert-danger'>Error deleting file.</div>";
                }
            } else {
                $delete_message = "<div class='alert alert-warning'>File not found.</div>";
            }
            $active_tab = 'compare'; // Stay on compare tab after deleting a compare file
        } else {
            $delete_message = "<div class='alert alert-danger'>Invalid file path.</div>";
            // If invalid, default to gallery or reviews based on context, or keep current
        }
    } elseif (isset($_POST['add_review'])) {
        $reviewer_name = trim($_POST['reviewer_name']);
        $rating = (int)$_POST['rating'];
        $review_text = trim($_POST['review_text']);

        if (empty($reviewer_name) || empty($review_text) || $rating < 1 || $rating > 5) {
            $review_message = "<div class='alert alert-warning'>Please fill in all required fields and ensure rating is between 1 and 5.</div>";
        } else {
            try {
                $sql = "INSERT INTO google_reviews (reviewer_name, rating, review_text) VALUES (:reviewer_name, :rating, :review_text)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':reviewer_name', $reviewer_name, PDO::PARAM_STR);
                $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
                $stmt->bindParam(':review_text', $review_text, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    $review_message = "<div class='alert alert-success'>Review added successfully!</div>";
                } else {
                    $review_message = "<div class='alert alert-danger'>Error adding review. Please try again.</div>";
                }
            } catch (PDOException $e) {
                $review_message = "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
                error_log("Review submission error: " . $e->getMessage());
            }
        }
        $active_tab = 'reviews'; // Switch to reviews tab after adding a review
    } elseif (isset($_POST['delete_review_id'])) {
        $review_id = (int)$_POST['delete_review_id'];
        try {
            $sql = "DELETE FROM google_reviews WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $review_id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $review_message = "<div class='alert alert-success'>Review deleted successfully!</div>";
            } else {
                $review_message = "<div class='alert alert-danger'>Error deleting review.</div>";
            }
        } catch (PDOException $e) {
            $review_message = "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
            error_log("Review deletion error: " . $e->getMessage());
        }
        $active_tab = 'reviews'; // Switch to reviews tab after deleting a review
    }
}

// --- Fetch Existing Reviews ---
$reviews = [];
try {
    $stmt = $pdo->query("SELECT id, reviewer_name, rating, review_text, review_date FROM google_reviews ORDER BY review_date DESC");
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching reviews: " . $e->getMessage());
}

// --- Fetch Existing Gallery Files ---
$gallery_files = [];
$gallery_dir = "gallery/";
if (is_dir($gallery_dir)) {
    $files = scandir($gallery_dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $gallery_files[] = $gallery_dir . $file;
        }
    }
}

// --- Fetch Existing Compare Files ---
$compare_files = [];
$compare_dir = "compare/";
if (is_dir($compare_dir)) {
    $files = scandir($compare_dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $compare_files[] = $compare_dir . $file;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS variables for consistent theming */
        :root {
            --primary: #14b8a6; /* Teal */
            --primary-dark: #0d9488;
            --dark: #111827; /* Dark Gray/Black */
            --light: #f9fafb; /* Off-White */
            --gray: #6b7280;
            --light-gray: #e5e7eb;
        }

        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: var(--light);
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header.scrolled {
            padding: 1rem 5%;
            background-color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo h1 {
            color: var(--dark);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .logo span {
            color: var(--primary);
        }

        .navbar {
            display: flex;
            gap: 2rem;
        }

        .navbar a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
            position: relative;
        }

        .navbar a:hover {
            color: var(--primary);
        }

        .navbar a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -4px;
            left: 0;
            transition: width 0.3s ease;
        }

        .navbar a:hover::after {
            width: 100%;
        }

        .navbar a.active {
            color: var(--primary);
        }

        .navbar a.active::after {
            width: 100%;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            color: var(--dark);
            font-size: 1.5rem;
        }

        /* Hero Section (Admin Specific) */
        .admin-hero {
            height: 40vh; /* Shorter hero for admin page */
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            flex-direction: column; /* Stack content */
            justify-content: center;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px; /* Adjust for fixed header */
            text-align: center;
        }

        .admin-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .admin-hero-content p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Admin Content Sections - now within tabs */
        .admin-section {
            background-color: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-top: 1.5rem; /* Spacing below tabs */
        }

        .admin-section h2 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 2rem;
            border-bottom: 3px solid var(--primary);
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        .admin-section h3 {
            font-size: 1.5rem;
            color: var(--dark);
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }

        /* Form Group (Bootstrap-like) */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--light-gray);
            border-radius: 5px;
            font-size: 1rem;
            color: var(--dark);
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(20, 184, 166, 0.25);
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            padding: 0.8rem 1.8rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Alert Messages (Bootstrap-like) */
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Reviews Display */
        .review-card {
            background-color: #f9fafb;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            position: relative; /* Added for delete button positioning */
        }

        .review-card p {
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .review-card .rating {
            color: gold;
            margin-bottom: 0.5rem;
        }

        .review-card .reviewer-info {
            font-size: 0.9rem;
            color: var(--gray);
            margin-top: 1rem;
            border-top: 1px dashed var(--light-gray);
            padding-top: 0.5rem;
        }
        
        /* Delete button styling for reviews and files */
        .delete-btn {
            background-color: #dc3545; /* Bootstrap danger color */
            color: white;
            border: none;
            padding: 0.3rem 0.6rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: background-color 0.3s ease;
            position: absolute; /* Position the delete button */
            top: 10px;
            right: 10px;
        }

        .delete-btn:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        /* File Card Styles - Adjusted for image/video only display */
        .file-card {
            background-color: #f9fafb;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex; /* Use flexbox for alignment */
            align-items: center; /* Vertically center items */
            justify-content: center; /* Horizontally center content */
            position: relative;
            min-height: 100px; /* Give it a minimum height */
        }

        .file-card img, .file-card video {
            max-width: 100%; /* Make sure image/video doesn't overflow */
            max-height: 100px; /* Keep thumbnails small */
            object-fit: contain; /* Contain within the box, don't crop */
            border-radius: 5px;
            display: block; /* Ensure it's a block element */
            margin: auto; /* Center the media */
        }
        
        /* Removed .file-info, .file-name, .file-path CSS as they are no longer used */

        /* Footer (General styles from index) */
        footer {
            background-color: black;
            color: var(--light);
            padding: 5rem 5% 2rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-col h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 2px;
            background-color: var(--primary);
            bottom: -8px;
            left: 0;
        }

        .footer-col p {
            color: var(--light-gray);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--light-gray);
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .footer-contact i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--light);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 3rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        /* Responsive Styles (General from index) */
        @media (max-width: 1024px) {
            .hero-content h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background-color: white;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 2rem;
                transition: left 0.3s ease;
                z-index: 999;
            }
            
            .navbar.active {
                left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .admin-hero-content h1 {
                font-size: 2.5rem;
            }
        }

        /* Animations (General from index) */
        /* Removed .animate for admin sections as tabs handle visibility */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header id="header">
        <div class="logo">
            <h1><span>HARI</span> Infra Projects</h1>
        </div>
        
        <nav class="navbar" id="navbar">
            <a href="index.php">Home</a>
            <a href="about.html">About Us</a>
            <a href="services.html">Services</a>
            <a href="gallery.php">Our Projects</a>
            <a href="compare.php">Why Choose Us</a>
            <a href="contact.html">Contact Us</a>
            <a href="admin.php" class="active">Admin</a> </nav>
        
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <section class="admin-hero">
        <div class="admin-hero-content">
            <h1>Admin Panel</h1>
            <p>Manage your website's content and Google Reviews.</p>
        </div>
    </section>

    <div class="container mt-5"> <ul class="nav nav-tabs" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo ($active_tab === 'gallery') ? 'active' : ''; ?>" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="<?php echo ($active_tab === 'gallery') ? 'true' : 'false'; ?>">Our Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo ($active_tab === 'compare') ? 'active' : ''; ?>" id="compare-tab" data-bs-toggle="tab" data-bs-target="#compare" type="button" role="tab" aria-controls="compare" aria-selected="<?php echo ($active_tab === 'compare') ? 'true' : 'false'; ?>">Why Choose Us Management</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo ($active_tab === 'reviews') ? 'active' : ''; ?>" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="<?php echo ($active_tab === 'reviews') ? 'true' : 'false'; ?>">Google Reviews</button>
            </li>
        </ul>

        <div class="tab-content" id="adminTabsContent">
            <div class="tab-pane fade <?php echo ($active_tab === 'gallery') ? 'show active' : ''; ?>" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <div class="admin-section media-upload-section">
                    <h2>Upload Images & Videos (Gallery)</h2>
                    <?php echo $upload_message_gallery; // Display upload status messages for gallery ?>
                    <?php if (isset($delete_message) && $active_tab === 'gallery') echo $delete_message; // Display file deletion message if it pertains to this tab ?>
                    <form action="admin.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gallery_file">Select Image or Video for Gallery:</label>
                            <input type="file" class="form-control" id="gallery_file" name="gallery_file" accept="image/*,video/*" required>
                            <small class="form-text text-muted">Max file size: 50MB. Allowed formats: JPG, PNG, GIF, MP4, WEBM, OGG, MOV, WEBP.</small>
                        </div>
                        <button type="submit" class="btn-submit">Upload to Our Projects</button>
                    </form>

                    <h3 class="mt-4">Existing Our Projects Files</h3>
                    <div class="row"> <?php if (!empty($gallery_files)): ?>
                        <?php foreach ($gallery_files as $file): ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-3"> <div class="file-card">
                                    <?php 
                                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                                        // Added 'webp' to image types
                                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])):
                                    ?>
                                        <img src="<?php echo htmlspecialchars($file); ?>" alt="<?php echo htmlspecialchars(basename($file)); ?>">
                                    <?php elseif (in_array($file_extension, ['mp4', 'webm', 'ogg', 'mov'])): ?>
                                        <video src="<?php echo htmlspecialchars($file); ?>" controls width="100%" height="auto"></video>
                                    <?php else: ?>
                                        <i class="fas fa-file-alt" style="font-size: 50px; color: var(--gray);"></i>
                                    <?php endif; ?>
                                    <form action="admin.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                        <input type="hidden" name="delete_file" value="<?php echo htmlspecialchars($file); ?>">
                                        <button type="submit" class="delete-btn"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted mt-3">No files found in Our Projects yet.</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade <?php echo ($active_tab === 'compare') ? 'show active' : ''; ?>" id="compare" role="tabpanel" aria-labelledby="compare-tab">
                <div class="admin-section compare-upload-section">
                    <h2>Upload Images & Videos (Compare)</h2>
                    <?php echo $upload_message_compare; // Display upload status messages for compare ?>
                    <?php if (isset($delete_message) && $active_tab === 'compare') echo $delete_message; // Display file deletion message if it pertains to this tab ?>
                    <form action="admin.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="compare_file">Select Image or Video for Why Choose Us:</label>
                            <input type="file" class="form-control" id="compare_file" name="compare_file" accept="image/*,video/*" required>
                            <small class="form-text text-muted">Max file size: 50MB. Allowed formats: JPG, PNG, GIF, MP4, WEBM, OGG, MOV, WEBP.</small>
                        </div>
                        <button type="submit" class="btn-submit">Upload to Why Choose Us</button>
                    </form>

                    <h3 class="mt-4">Existing Why Choose Us Files</h3>
                    <div class="row"> <?php if (!empty($compare_files)): ?>
                        <?php foreach ($compare_files as $file): ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-3"> <div class="file-card">
                                    <?php 
                                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                                        // Added 'webp' to image types
                                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])):
                                    ?>
                                        <img src="<?php echo htmlspecialchars($file); ?>" alt="<?php echo htmlspecialchars(basename($file)); ?>">
                                    <?php elseif (in_array($file_extension, ['mp4', 'webm', 'ogg', 'mov'])): ?>
                                        <video src="<?php echo htmlspecialchars($file); ?>" controls width="100%" height="auto"></video>
                                    <?php else: ?>
                                        <i class="fas fa-file-alt" style="font-size: 50px; color: var(--gray);"></i>
                                    <?php endif; ?>
                                    <form action="admin.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                        <input type="hidden" name="delete_file" value="<?php echo htmlspecialchars($file); ?>">
                                        <button type="submit" class="delete-btn"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted mt-3">No files found in Why Choose Us yet.</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade <?php echo ($active_tab === 'reviews') ? 'show active' : ''; ?>" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="admin-section google-reviews-section">
                    <h2>Manage Google Reviews</h2>
                    <?php echo $review_message; // Display review status messages ?>
                    <?php if (isset($delete_message) && $active_tab === 'reviews') echo $delete_message; // Display review deletion message if it pertains to this tab ?>

                    <h3>Add New Review</h3>
                    <form action="admin.php" method="POST">
                        <input type="hidden" name="add_review" value="1">
                        <div class="form-group">
                            <label for="reviewer_name">Reviewer Name:</label>
                            <input type="text" class="form-control" id="reviewer_name" name="reviewer_name" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating (1-5 Stars):</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value="">Select Rating</option>
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="review_text">Review Text:</label>
                            <textarea class="form-control" id="review_text" name="review_text" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Submit Review</button>
                    </form>

                    <h3 class="mt-4">Existing Reviews</h3>
                    <?php if (!empty($reviews)): ?>
                        <?php foreach ($reviews as $review): ?>
                            <div class="review-card">
                                <p><strong><?php echo htmlspecialchars($review['reviewer_name']); ?></strong></p>
                                <p class="rating">
                                    <?php 
                                    for ($i = 0; $i < $review['rating']; $i++) {
                                        echo '<i class="fas fa-star"></i>'; // Solid star for rated
                                    }
                                    for ($i = $review['rating']; $i < 5; $i++) {
                                        echo '<i class="far fa-star"></i>'; // Outline star for unrated
                                    }
                                    ?>
                                </p>
                                <p><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                                <p class="reviewer-info">Reviewed on: <?php echo date('F j, Y, g:i a', strtotime($review['review_date'])); ?></p>
                                <form action="admin.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                    <input type="hidden" name="delete_review_id" value="<?php echo $review['id']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">No reviews found yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> <footer>
        <div class="footer-container">
            <div class="footer-col">
                <div class="logo">
                    <h1 style="color: white;"><span>HARI</span> Infra Projects</h1>
                </div>
                <p>Powering a greener tomorrow with reliable, efficient, and affordable solar energy solutions across Gujarat since 2021.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/profile.php?id=100088891761152"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/hari_solar_mehsana/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Our Services</h3>
                <ul class="footer-links">
                    <li><a href="services.html">Residential Solar</a></li>
                    <li><a href="services.html">Commercial Solar</a></li>
                    <li><a href="services.html">Industrial Solar</a></li>
                    <!-- <li><a href="services.html">Solar Maintenance</a></li> -->
                    <li><a href="services.html">Net Metering</a></li>
                    <li><a href="services.html">Government Approvals</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Contact Us</h3>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> 25-A ASHTAVINAYAK INDUSTRIAL PARK, MEHSANA, nr. ISCON CIRCLE, BYPASROAD, Nugar, Gujarat 384002</p>
                    
                    <p><i class="fas fa-phone-alt"></i> 
                        <a href="tel:+916355048708" style="color: inherit; text-decoration: none;">+91 6355048708</a>
                    </p>
                    
                    <p><i class="fas fa-envelope"></i> 
                        <a href="mailto:info@hariindia.in" style="color: inherit; text-decoration: none;">info@hariindia.in</a>
                    </p>
                    
                    <p><i class="fab fa-whatsapp"></i> 
                        <a href="https://wa.me/916355048708" target="_blank" style="color: inherit; text-decoration: none;">+91 6355048708</a>
                    </p>
                </div>
            </div>

        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 Hari Infra Projects. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Header Scroll Effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const navbar = document.getElementById('navbar');

        menuToggle.addEventListener('click', function() {
            navbar.classList.toggle('active');
            menuToggle.innerHTML = navbar.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.navbar a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navbar.classList.remove('active');
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });

        // Active link highlighting for the current page in the navbar
        navLinks.forEach(link => {
            if (link.getAttribute('href') && link.getAttribute('href').includes('admin.php')) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

        // Removed the custom scroll animation for .admin-section as Bootstrap tabs handle visibility.
        // The .animate class is still in CSS but not applied to the tab panes directly.
    </script>
</body>
</html>