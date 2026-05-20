<?php
// PHP logic to fetch files from the 'compare' directory

$compare_dir = 'compare/';
$media_items = [];

// Define supported image and video extensions (including webp)
$image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$video_extensions = ['mp4', 'webm', 'ogg', 'mov'];

// Fetch files from the 'compare/' directory
if (is_dir($compare_dir)) {
    $files = scandir($compare_dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $file_path = $compare_dir . $file;
        $file_info = pathinfo($file_path);
        $extension = strtolower($file_info['extension']);

        if (in_array($extension, $video_extensions)) {
            $media_items['videos'][] = [
                'type' => 'video',
                'path' => $file_path,
                'name' => basename($file, '.' . $extension)
            ];
        } elseif (in_array($extension, $image_extensions)) {
            $media_items['images'][] = [
                'type' => 'image',
                'path' => $file_path,
                'name' => basename($file, '.' . $extension)
            ];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Choose Us - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* Hero Section for Compare Page */
        .compare-hero {
            height: 62vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
                url('https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            padding: 0 5%;
            margin-top: 80px;
        }

        .compare-hero-content {
            max-width: 800px;
        }

        .compare-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .compare-hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        /* Section Title (General styles) */
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

        /* Gallery Grid Styles (Re-used for compare content) */
        .gallery-content {
            /* Renamed from gallery-content if you want a different section name, but its structure applies */
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-grid>* {
            aspect-ratio: 4 / 3;
            /* Maintain 4:3 aspect ratio */
            object-fit: contain;
            width: 100%;
            background-color: #ccc;
            /* Fallback bg */
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Style images and videos */
        .gallery-grid img,
        .gallery-grid video {

            object-fit: contain;
            /* Ensure content fills the box */

        }

        .gallery-grid img {

            object-fit: contain;
            /* Ensure content fills the box */

        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .gallery-item {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            background-color: white;
            margin-bottom: 1.5rem;
            overflow: hidden;
            width: 100%;
            box-sizing: border-box;
            -webkit-column-break-inside: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }


        .gallery-item .item-title {
            padding: 1rem;
            font-weight: 600;
            color: var(--dark);
            /* Default text color */
            background-color: #ffffff !important;
            width: 100%;
            text-align: center;
            position: absolute;
            bottom: -1rem;
            z-index: 1;
        }

        /* LIGHTBOX STYLES FOR IMAGES ONLY */
        #imgLightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 10001;
            justify-content: center;
            align-items: center;
            cursor: zoom-out;
        }

        #imgLightbox img {
            max-width: 90%;
            max-height: 85vh;
            border: 3px solid #fff;
            border-radius: 4px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

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

        /* Responsive Styles for Gallery Grid */
        @media (max-width: 1024px) {
            .navbar {
                position: fixed;
                top: 0;
                right: -100%;
                /* Start hidden off-screen to the right */
                left: auto;
                /* Override any left: 0; */
                width: 250px;
                /* Adjust width as needed */
                height: 100vh;
                background-color: white;
                /* Or your preferred color */
                transition: 0.3s ease-in-out;
                z-index: 999;
                display: flex;
                flex-direction: column;
                padding-top: 80px;
                /* Space for the close button or header height */
            }

            .navbar.active {
                right: 0;
                left: auto;
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

                .gallery-grid {
                    columns: 1 250px;
                    /* Single column on small screens */
                }
            }

            @media (max-width: 480px) {
                .hero-content h1 {
                    font-size: 2rem;
                }

                .section-title h2 {
                    font-size: 2rem;
                }

                .compare-hero-content h1 {
                    /* Changed from gallery-hero-content */
                    font-size: 2.5rem;
                }

                .stat-card h3 {
                    font-size: 2rem;
                }

                .gallery-grid {
                    columns: 1;
                    /* Always single column on very small screens */
                }
            }

            /* Animations (General from index) */
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

    <section class="compare-hero">
        <div class="compare-hero-content">
            <h1>Why Choose Hari Infra Projects?</h1>
            <p>See the clear difference our solar solutions make. Our commitment to quality, efficiency, and customer
                satisfaction sets us apart.</p>
        </div>
    </section>

    <section class="gallery-content">
        <div class="section-title animate">
            <h2>Before & After Projects</h2>
            <p>Visual proof of our transformation power. Compare the before and after of our solar installations.</p>
        </div>

        <div class="gallery-grid"> <?php
        // Display videos first (UNTOUCHED CODE)
        if (isset($media_items['videos'])) {
            foreach ($media_items['videos'] as $video) {
                echo '<div class="gallery-item animate">';
                echo '<video controls playsinline preload="metadata">';
                echo '<source src="' . htmlspecialchars($video['path']) . '" type="video/' . pathinfo($video['path'], PATHINFO_EXTENSION) . '">';
                echo 'Your browser does not support the video tag. Please download the video: <a href="' . htmlspecialchars($video['path']) . '">Download ' . htmlspecialchars($video['name']) . '</a>';
                echo '</video>';
                echo '<div class="item-title">' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $video['name']))) . '</div>';
                echo '</div>';
            }
        }

        // Display images (UPDATED WITH CLICK ACTION)
        if (isset($media_items['images'])) {
            foreach ($media_items['images'] as $image) {
                // Added cursor:pointer style and onclick function here
                echo '<div class="gallery-item animate" style="cursor: pointer;" onclick="openImg(this)">';
                echo '<img src="' . htmlspecialchars($image['path']) . '" alt="Project Image">';
                echo '<div class="item-title">' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $image['name']))) . '</div>';
                echo '</div>';
            }
        }

        if (empty($media_items['videos']) && empty($media_items['images'])) {
            echo '<p style="text-align: center; column-span: all; color: var(--gray);">No comparison media found in the compare folder.</p>';
        }
        ?>
        </div>
    </section>

    <div id="imgLightbox" onclick="this.style.display='none'">
        <span class="close-btn">&times;</span>
        <img id="activeImg" src="" alt="Zoomed Image">
    </div>

    <?php include('common/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5"
        crossorigin="anonymous"></script>
    <script>
        // Image Lightbox Function
        function openImg(el) {
            var src = el.getElementsByTagName('img')[0].src;
            document.getElementById('activeImg').src = src;
            document.getElementById('imgLightbox').style.display = 'flex';
        }

        // Header Scroll Effect
        window.addEventListener('scroll', function () {
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

        if (menuToggle && navbar) {
            menuToggle.addEventListener('click', function () {
                navbar.classList.toggle('active');
                menuToggle.innerHTML = navbar.classList.contains('active') ?
                    '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
            });
        }

        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.navbar a');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                navbar.classList.remove('active');
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });

        // Scroll Animation
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
        window.addEventListener('load', checkScroll);

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 120,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    <a href="https://wa.me/916355048708" target="_blank" aria-label="Chat on WhatsApp"
        style="position: fixed; bottom: 20px; right: 20px; background-color: #25d366; color: white; font-size: 28px; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 1000; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: background-color 0.3s ease;"
        onmouseover="this.style.backgroundColor='#1ebea5'; this.style.transform='translateY(-3px)'"
        onmouseout="this.style.backgroundColor='#25d366'; this.style.transform='none'">
        <i class="fab fa-whatsapp"></i>
    </a>
</body>

</html>