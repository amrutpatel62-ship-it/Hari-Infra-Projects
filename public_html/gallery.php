<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* Hero Section (General styles from index) - Keeping it for reference, though gallery-hero is specific */
        .hero {
            height: 100vh;

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

        /* Section Title (General styles from index) */
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

        /* Gallery Page Specific Styles */
        .gallery-hero {
            height: 60vh;
            background-image:
                linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
                url('003.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            /* Adjusted for top info bar + header */
        }

        .gallery-hero-content {
            max-width: 800px;
        }

        .gallery-hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .gallery-hero-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .gallery-content {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* --- GALLERY GRID CHANGES START HERE --- */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            /* Default background - you can set this to white or black based on your preference for items not configured */
            background-color: white;
            margin-bottom: 1.5rem;
            display: inline-block;
            width: 100%;
            box-sizing: border-box;
            -webkit-column-break-inside: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        /* New classes for dynamic backgrounds */
        .gallery-item.bg-black {
            background-color: black;
            /* Adjust box-shadow color if needed for better contrast on black background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .gallery-item.bg-white {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery-item.bg-black .item-title {
            color: white;
            /* Text color for black background */
        }

        /* End new classes */


        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
            max-height: 600px;
        }

        .gallery-item .item-title {
            padding: 1rem;
            font-weight: 600;
            color: var(--dark);
            /* Default text color */
            text-align: center;
        }

        /* --- GALLERY GRID CHANGES END HERE --- */


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

        /* Responsive Styles for Gallery Grid and Top Bar */
        @media (max-width: 1024px) {
            .gallery-grid {
                columns: 2 280px;
                /* 2 columns on medium screens */
            }

            .top-info-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .contact-info {
                gap: 1rem;
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

            .gallery-grid {
                columns: 1 250px;
                /* Single column on small screens */
            }

            .top-info-bar {
                font-size: 0.8rem;
                padding: 0.5rem 5%;
            }

            .contact-info {
                flex-direction: column;
                gap: 0.5rem;
            }

            .gallery-hero {
                margin-top: 120px;
                /* Adjusted for mobile header positioning */
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
            .contact-hero-content h1,
            .gallery-hero-content h1 {
                font-size: 2.5rem;
            }

            .stat-card h3 {
                font-size: 2rem;
            }

            .gallery-grid {
                columns: 1;
                /* Always single column on very small screens */
            }

            .top-info-bar {
                display: none;
                /* Hide top bar on very small screens to save space */
            }

            header {
                top: 0;
                /* Reset header position when top bar is hidden */
            }

            .gallery-hero {
                margin-top: 80px;
                /* Reset margin when top bar is hidden */
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

    <section class="gallery-hero">
        <div class="gallery-hero-content">
            <h1>Our Projects & Moments</h1>
            <p>Explore a collection of our completed solar projects, team activities, and key milestones that define our
                journey.</p>
        </div>
    </section>

    <section class="gallery-content">
        <div class="section-title animate">
            <h2>Our Gallery</h2>
            <p>Showcasing the quality of our work and the dedication of our team through images and videos.</p>
        </div>

        <div class="gallery-grid">
            <?php
            $gallery_dir = 'gallery/';
            $config_file = 'gallery_config.json'; // Path to your config file
            $files = scandir($gallery_dir);
            $media_items = [];
            $background_config = [];

            // Attempt to load background configuration
            if (file_exists($config_file)) {
                $json_content = file_get_contents($config_file);
                $decoded_json = json_decode($json_content, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded_json)) {
                    $background_config = $decoded_json;
                } else {
                    error_log("Error decoding JSON from " . $config_file . ": " . json_last_error_msg());
                }
            } else {
                error_log("Gallery config file not found: " . $config_file);
            }


            // Define supported image and video extensions
            $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $video_extensions = ['mp4', 'webm', 'ogg', 'mov'];

            foreach ($files as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $file_path = $gallery_dir . $file;
                $file_info = pathinfo($file_path);
                $extension = strtolower($file_info['extension']);

                if (in_array($extension, $video_extensions)) {
                    $media_items['videos'][] = [
                        'type' => 'video',
                        'path' => $file_path,
                        'name' => basename($file, '.' . $extension),
                        'filename_only' => $file // Store original filename for config lookup
                    ];
                } elseif (in_array($extension, $image_extensions)) {
                    $media_items['images'][] = [
                        'type' => 'image',
                        'path' => $file_path,
                        'name' => basename($file, '.' . $extension),
                        'filename_only' => $file // Store original filename for config lookup
                    ];
                }
            }

            // Prioritize videos, then images
            if (isset($media_items['videos'])) {
                foreach ($media_items['videos'] as $video) {
                    $bg_class = '';
                    if (isset($background_config[$video['filename_only']])) {
                        $bg_class = 'bg-' . htmlspecialchars($background_config[$video['filename_only']]);
                    }
                    echo '<div class="gallery-item animate ' . $bg_class . '">';
                    echo '<video controls playsinline preload="metadata">';
                    echo '<source src="' . htmlspecialchars($video['path']) . '" type="video/' . pathinfo($video['path'], PATHINFO_EXTENSION) . '">';
                    echo 'Your browser does not support the video tag. Please download the video: <a href="' . htmlspecialchars($video['path']) . '">Download ' . htmlspecialchars($video['name']) . '</a>';
                    echo '</video>';
                    echo '<div class="item-title">' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $video['name']))) . '</div>';
                    echo '</div>';
                }
            }

            if (isset($media_items['images'])) {
                foreach ($media_items['images'] as $image) {
                    $bg_class = '';
                    if (isset($background_config[$image['filename_only']])) {
                        $bg_class = 'bg-' . htmlspecialchars($background_config[$image['filename_only']]);
                    }
                    echo '<div class="gallery-item animate ' . $bg_class . '">';
                    echo '<img src="' . htmlspecialchars($image['path']) . '" alt="' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $image['name']))) . '">';
                    echo '<div class="item-title">' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $image['name']))) . '</div>';
                    echo '</div>';
                }
            }

            if (empty($media_items['videos']) && empty($media_items['images'])) {
                echo '<p style="text-align: center; column-span: all; color: var(--gray);">No media items found in the gallery folder.</p>';
            }
            ?>
        </div>
    </section>

    <?php include('common/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5"
        crossorigin="anonymous"></script>
    <script>
        // Header Scroll Effect - Modified to handle top info bar
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            const topInfoBar = document.querySelector('.top-info-bar');

            if (window.scrollY > 50) {
                header.classList.add('scrolled');
                // if (topInfoBar) {
                //     topInfoBar.style.transform = 'translateY(-100%)';
                // }
            } else {
                header.classList.remove('scrolled');
                // if (topInfoBar) {
                //     topInfoBar.style.transform = 'translateY(0)';
                // }
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

        // Scroll Animation (for elements with .animate class)
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

        // Smooth scrolling for anchor links (if any on this page)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 140, // Adjust for top info bar + header height
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active link highlighting for the current page in the navbar
        // This will ensure 'Gallery' is always active on gallery.php


        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes('gallery.php')) { // Always active for services.html
                link.classList.add('active');
            }
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