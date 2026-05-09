<?php
// Include database configuration
require_once 'db_config.php';

// Fetch Existing Reviews from SQL with limit
$reviews = [];
$show_all = isset($_GET['show_all_reviews']);
$limit = $show_all ? 100 : 6; // Show 6 by default, or 100 if "show all" is clicked

try {
    if ($show_all) {
        $stmt = $pdo->query("SELECT id, name, rating, review, created_at FROM google_reviews ORDER BY created_at DESC");
    } else {
        $stmt = $pdo->query("SELECT id, name, rating, review, created_at FROM google_reviews ORDER BY created_at DESC LIMIT $limit");
    }
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching reviews for index page: " . $e->getMessage());
    $reviews = [];
}

// Get total count for "View All" button
$total_reviews = 0;
try {
    $count_stmt = $pdo->query("SELECT COUNT(*) FROM google_reviews");
    $total_reviews = $count_stmt->fetchColumn();
} catch (PDOException $e) {
    error_log("Error counting reviews: " . $e->getMessage());
}

// Generate a dummy testimonial if no reviews are found (or if fetching failed)
if (empty($reviews)) {
    $reviews[] = [
        'name' => 'Hari Infra Projects Team',
        'rating' => 5,
        'review' => 'We are committed to providing the best solar solutions. Be the first to leave a review!',
        'created_at' => date('Y-m-d H:i:s')
    ];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hari Infra Projects - Solar Energy Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="icon.png" sizes="144x144" type="image/png">
    <link rel="apple-touch-icon" href="icon.png">
    
    <style>
        

        /* Hero Section - Updated to account for header positioning */
        .hero {
            height: 120vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            
        }

        .hero-content {
            max-width: 800px;
            animation: fadeInUp 1s ease;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content h1 span {
            color: var(--primary);
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--light);
            border: 2px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--light);
            border: 2px solid var(--light);
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        /* Stats Section */
        .stats {
            padding: 5rem 5%;
            background-color: var(--light);
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .stat-card h3 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: var(--gray);
            font-size: 1rem;
        }

        /* Services Section */
        .services {
            padding: 5rem 5%;
            background-color: #f3f4f6;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 25%;
        }

        .section-title p {
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .service-img {
            height: 200px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-img img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 1.5rem;
        }

        .service-content h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .service-content p {
            color: var(--gray);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .service-content a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .service-content a:hover {
            color: var(--primary-dark);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 5%;
            background-color: var(--dark);
            color: var(--light);
        }

        .testimonials .section-title h2 {
            color: var(--light);
        }

        .testimonials .section-title p {
            color: var(--light-gray);
        }

        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative; 
            overflow: hidden; /* This is crucial for hiding slides outside view */
        }

        /* --- TESTIMONIAL SLIDER CSS --- */
        .testimonial-carousel-inner {
            display: flex; /* Makes slides lay out horizontally */
            flex-direction: row;
            transition: transform 0.5s ease-in-out; 
            white-space: nowrap; /* Prevents wrapping of slides */
            /* The width will be set by JS dynamically */
            justify-content: space-between;
        }
        
        .testimonial-slide {
            flex-shrink: 0;   /* Crucial: Prevent shrinking */
            flex-grow: 0;     /* Crucial: Prevent growing */
            flex-basis: 100%; /* Each slide occupies exactly 100% of the parent's current visible width */
            max-width: 100%;      /* Ensures width is 100% of the parent container's visible area */
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-sizing: border-box; /* Essential for padding/border calculation */
            display: flex; /* Ensure internal content uses flex for alignment */
            flex-direction: column; /* Ensure content stacks vertically within slide */
            justify-content: space-between; 
            height: auto; /* Allow natural height based on content */
            min-height: 200px; 
            margin: 0; /* Ensure no external margins are interfering */

            /* Remove these debug styles after verification */
            /* border: 1px solid rgba(255, 255, 255, 0.2); */ 
        }

        .testimonial-slide.active {
            background-color: rgba(20, 184, 166, 0.2);
            border: 1px solid var(--primary);
        }

        .testimonial-content {
            white-space: normal; /* Allow text content to wrap normally */
            min-width: 0; /* Prevents text from pushing flex container too wide */
        }
        /* --- END TESTIMONIAL SLIDER CSS --- */


        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 0.5rem; 
            margin-top: auto; /* Pushes author info to the bottom if content is short */
        }

        .author-info h4 {
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
            color: var(--light);
        }

        .author-info p {
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        .rating-stars { 
            color: gold;
            margin-bottom: 0.8rem;
        }
        .rating-stars i {
            margin-right: 0.1rem;
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
            /* Hidden by default if only one review, shown by JS if > 1 */
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--gray);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .slider-dot.active {
            background-color: var(--primary);
        }

        /* View All Button Styles */
        .view-all-container {
            text-align: center;
            margin-top: 2rem;
        }
        
        .btn-view-all {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-view-all:hover {
            background-color: var(--primary);
            color: var(--light);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(20, 184, 166, 0.3);
        }
        
        .btn-show-less {
            background-color: transparent;
            color: var(--light);
            border: 2px solid var(--light);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-show-less:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        /* CTA Section */
        .cta {
            padding: 5rem 5%;
            background: linear-gradient(rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.9)), 
                        url('https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80') no-repeat center center/cover;
            color: var(--light);
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .cta p {
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
            opacity: 0.9;
        }

       
        /* About Page Styles - Kept for completeness but not directly related to testimonial issue */
        .about-hero {
            height: 60vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px;
        }

        .about-hero-content {
            max-width: 800px;
        }

        .about-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .about-hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .about-content {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 5rem;
        }

        .about-section.reverse {
            grid-template-columns: 1fr 1fr;
        }

        .about-img {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .about-img img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .about-img:hover img {
            transform: scale(1.05);
        }

        .about-text h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .about-text h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 0;
        }

        .about-text p {
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .mission-vision {
            background-color: #f3f4f6;
            padding: 5rem 5%;
        }

        .mv-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .mv-card {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .mv-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .mv-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .mv-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .mv-card p {
            color: var(--gray);
            line-height: 1.6;
        }

        /* Services Page Styles - Kept for completeness */
        .services-hero {
            height: 60vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px;
        }

        .services-hero-content {
            max-width: 800px;
        }

        .services-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .services-hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .services-details {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-process {
            margin-bottom: 5rem;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .process-step {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .process-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .step-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .process-step i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .process-step h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .process-step p {
            color: var(--gray);
            line-height: 1.6;
        }

        .projects-showcase {
            background-color: #f3f4f6;
            padding: 5rem 5%;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .project-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .project-img {
            height: 250px;
            overflow: hidden;
        }

        .project-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-img img {
            transform: scale(1.1);
        }

        .project-info {
            padding: 1.5rem;
        }

        .project-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .project-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .project-info p {
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Contact Page Styles - Kept for completeness */
        .contact-hero {
            height: 60vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px;
        }

        .contact-hero-content {
            max-width: 800px;
        }

        .contact-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .contact-hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .contact-container {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .contact-info {
            background-color: #f3f4f6;
            border-radius: 10px;
            padding: 2rem;
        }

        .contact-info h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .contact-info h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 0;
        }

        .contact-details {
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-top: 0.3rem;
        }

        .contact-text h3 {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
            color: var(--dark);
        }

        .contact-text p, .contact-text a {
            color: var(--gray);
            text-decoration: none;
            line-height: 1.6;
            transition: color 0.3s ease;
        }

        .contact-text a:hover {
            color: var(--primary);
        }

        .business-hours {
            margin-top: 2rem;
        }

        .business-hours h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .hours-item span:first-child {
            font-weight: 500;
        }

        .hours-item span:last-child {
            color: var(--gray);
        }

        .contact-form {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .contact-form h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .contact-form h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .map-container {
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 3rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

      
        /* Responsive Styles */
        @media (max-width: 1024px) {
            .hero-content h1 {
                font-size: 3rem;
            }
            
            .about-section, 
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .about-section.reverse {
                grid-template-columns: 1fr;
            }
            
            .about-img {
                order: -1;
            }
            
            .about-section.reverse .about-img {
                order: 1;
            }
        }

        @media (max-width: 768px) {
         
            
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
            
            .about-hero-content h1,
            .services-hero-content h1,
            .contact-hero-content h1 {
                font-size: 2.5rem;
            }
            
            .stat-card h3 {
                font-size: 2rem;
            }
        }

        /* Animations */
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

        .animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate.animated {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
   <?php include('common/header.php') ?>
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Powering a <span>Greener Tomorrow</span> with Solar Energy</h1>
            <p>Hari Infra Projects is a trusted EPC company specializing in solar rooftop solutions for residential, commercial, and industrial clients across Gujarat. With 450+ successful projects, we're committed to delivering efficient, cost-effective solar systems.</p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn btn-primary">Get a Free Quote</a>
                <a href="services.php" class="btn btn-outline">Our Services</a>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stats-container">
            <div class="stat-card animate">
                <i class="fas fa-solar-panel"></i>
                <h3>450+</h3>
                <p>Projects Completed</p>
            </div>
            <div class="stat-card animate">
                <i class="fas fa-bolt"></i>
                <h3>2+ MW</h3>
                <p>Installed Capacity</p>
            </div>
            <div class="stat-card animate">
                <i class="fas fa-map-marker-alt"></i>
                <h3>6+</h3>
                <p>Districts Covered</p>
            </div>
            <div class="stat-card animate">
                <i class="fas fa-smile"></i>
                <h3>100%</h3>
                <p>Customer Satisfaction</p>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="section-title">
            <h2>Our Solar Solutions</h2>
            <p>We provide comprehensive solar EPC solutions tailored to meet your specific energy needs and budget requirements.</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card animate">
                <div class="service-img">
                    <img src="001.jpg" alt="Residential Solar Solutions">
                </div>
                <div class="service-content">
                    <h3>Residential Solar Solutions</h3>
                    <p>Custom-designed solar systems for homes that reduce electricity bills and provide energy independence.</p>
                    <a href="services.php">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            
            <div class="service-card animate">
                <div class="service-img">
                    <img src="002.jpg" alt="Commercial Solar Systems">
                </div>
                <div class="service-content">
                    <h3>Commercial Solar Systems</h3>
                    <p>Cost-effective solar solutions for businesses to reduce operational costs and carbon footprint.</p>
                    <a href="services.php">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            
            <div class="service-card animate">
                <div class="service-img">
                    <img src="003.jpg" alt="Industrial Solar Plants">
                </div>
                <div class="service-content">
                    <h3>Industrial Solar Plants</h3>
                    <p>Large-scale solar installations for industries with high energy demands and reliable performance.</p>
                    <a href="services.php">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-title">
            <h2>What Our Clients Say</h2>
            <p>Hear from our satisfied customers who have experienced our solar solutions firsthand.</p>
        </div>
        
        <div class="testimonials-container">
            <div class="testimonial-carousel-inner">
                <?php foreach ($reviews as $index => $review): ?>
                    <div class="testimonial-slide <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <div class="testimonial-content">
                            "<?php echo nl2br(htmlspecialchars($review['review'])); ?>"
                        </div>
                        <div class="rating-stars">
                            <?php 
                            for ($i = 0; $i < $review['rating']; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            for ($i = $review['rating']; $i < 5; $i++) {
                                echo '<i class="far fa-star"></i>'; // Outline star for unrated
                            }
                            ?>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-info">
                                <h4><?php echo htmlspecialchars($review['name']); ?></h4>
                                <p>Reviewed on: <?php echo date('F j, Y', strtotime($review['created_at'])); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="slider-controls">
                <?php if (count($reviews) > 1): // Only show dots if more than one review ?>
                    <?php foreach ($reviews as $index => $review): ?>
                        <div class="slider-dot <?php echo ($index === 0) ? 'active' : ''; ?>" data-slide-index="<?php echo $index; ?>"></div>
                    <?php endforeach; ?>
                <?php else: // If 0 or 1 review, show one dot for the single visible "slide" ?>
                    <div class="slider-dot active"></div>
                <?php endif; ?>
            </div>
            
            <!-- View All Button -->
            <div class="view-all-container">
                <?php if (!$show_all && $total_reviews > 6): ?>
                    <a href="index.php?show_all_reviews=1#testimonials" class="btn-view-all">
                        View All Reviews (<?php echo $total_reviews; ?>)
                        <i class="fas fa-arrow-right"></i>
                    </a>
                <?php elseif ($show_all): ?>
                    <a href="index.php#testimonials" class="btn-show-less">
                        <i class="fas fa-arrow-left"></i>
                        Show Less Reviews
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="cta">
        <h2>Ready to Go Solar?</h2>
        <p>Get a free site assessment and customized solar solution for your home or business. Our experts will guide you through the entire process.</p>
        <a href="https://wa.me/916355048708?text=Hello%20Hari%20Infra%20Projects%20Team%2C%20I%27m%20interested%20in%20your%20Comprehensive%20solar%20solutions.%20Please%20share%20details%20about%20System%20Design%2C%20Procurement%20and%20O%26M%20services." target="_blank" rel="noopener" class="btn btn-primary">Request Free Consultation</a>
    </section>

    <?php include('common/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5" crossorigin="anonymous"></script>
    <script>
        // Header scroll behavior is handled by header.php
        // No duplicate scroll handler needed here

        // Mobile Menu Toggle - Updated positioning
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

        // Testimonial Slider (FIXED LOGIC)
        const slidesContainer = document.querySelector('.testimonial-carousel-inner');
        const dotsContainer = document.querySelector('.slider-controls');
        let slides = []; // Initialize as empty, will be populated on load
        let dots = []; // Initialize as empty
        let currentSlideIndex = 0;
        let slideInterval; 

        function updateSlider() {
            slides = Array.from(document.querySelectorAll('.testimonial-slide')); // Re-fetch all slides
            dots = Array.from(document.querySelectorAll('.slider-dot')); // Re-fetch all dots

            // If no slides, hide controls and reset
            if (slides.length === 0) {
                if (slidesContainer) slidesContainer.style.transform = `translateX(0%)`;
                if (dotsContainer) dotsContainer.style.display = 'none';
                return;
            }

            // Crucial: Set the total width of the inner carousel container
            // This needs to be (number of slides) * 100% because each slide takes up 100% width.

            // Calculate the transform value to show the current slide
            // We translate the container by a percentage equivalent to the current slide's position.
            const translateValue = -(currentSlideIndex * (100));
            slidesContainer.style.transform = `translateX(${translateValue}%)`;

            // Update active dot
            dots.forEach((dot, index) => {
                if (index === currentSlideIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            // Show/hide dots container based on number of reviews
            if (dotsContainer) {
                if (slides.length > 1) {
                    dotsContainer.style.display = 'flex'; // Show if more than one slide
                } else {
                    dotsContainer.style.display = 'none'; // Hide if only one slide
                }
            }
        }

        function showNextSlide() {
            slides = Array.from(document.querySelectorAll('.testimonial-slide')); // Re-fetch to be safe
            if (slides.length === 0) return; // Guard clause
            currentSlideIndex = (currentSlideIndex + 1) % slides.length;
            updateSlider();
        }

        function startAutoSlide() {
            stopAutoSlide(); // Clear any existing interval to prevent duplicates
            slides = Array.from(document.querySelectorAll('.testimonial-slide')); // Re-fetch to check length
            if (slides.length > 1) { // Only auto-slide if there's more than one review
                slideInterval = setInterval(showNextSlide, 5000); // Auto-slide every 5 seconds
            }
        }

        function stopAutoSlide() {
            clearInterval(slideInterval);
        }

        // Event delegation for dots (important for dynamically added dots)
        if (dotsContainer) {
            dotsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('slider-dot')) {
                    const index = parseInt(event.target.dataset.slideIndex);
                    if (!isNaN(index)) {
                        stopAutoSlide(); 
                        currentSlideIndex = index;
                        updateSlider();
                        startAutoSlide(); // Restart auto-slide after a brief pause
                    }
                }
            });
        }
        
        // Initial setup on page load
        window.addEventListener('load', () => {
            updateSlider(); // Set initial slide and dot positions
            startAutoSlide(); // Start the auto-slide animation

            // Run scroll animation check on load for elements with 'animate' class
            const animateElements = document.querySelectorAll('.animate'); 
            function checkScroll() {
                animateElements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    if (elementPosition < windowHeight - 100) {
                        element.classList.add('animated');
                    }
                });
            }
            window.addEventListener('scroll', checkScroll);
            checkScroll(); // Run once on load for initial visibility
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 130, // Adjusted for fixed header + top bar
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active link highlighting is handled by PHP in header.php
        // No JavaScript needed - PHP sets the active class based on current page
    </script>
    <a href="https://wa.me/916355048708?text=Hello%20Hari%20Infra%20Projects%20Team%2C%20I%27m%20interested%20in%20your%20Comprehensive%20solar%20solutions.%20Please%20share%20details%20about%20System%20Design%2C%20Procurement%20and%20O%26M%20services." target="_blank" aria-label="Chat on WhatsApp"
       style="position: fixed; bottom: 20px; right: 20px; background-color: #25d366; color: white; font-size: 28px; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 1000; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: background-color 0.3s ease;"
       onmouseover="this.style.backgroundColor='#1ebea5'; this.style.transform='translateY(-3px)'"
       onmouseout="this.style.backgroundColor='#25d366'; this.style.transform='none'">
      <i class="fab fa-whatsapp"></i>
    </a>

</body>
</html>