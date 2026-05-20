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
            background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
                url('003.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px;
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

        /* Gallery Grid */
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
            background-color: white;
            margin-bottom: 1.5rem;
            display: flex;
            /* Changed from inline-block to flex for alignment */
            flex-direction: column;
            width: 100%;
            box-sizing: border-box;
            cursor: pointer;
        }

        /* UPDATED: Added Play Button Overlay for Videos */
        .gallery-item[data-type="video"]::before {
            content: '\f04b';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(20, 184, 166, 0.8);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            font-size: 20px;
            pointer-events: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: 0.3s;
        }

        .gallery-item:hover[data-type="video"]::before {
            background: #14b8a6;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .gallery-item.bg-black {
            background-color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .gallery-item.bg-white {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery-item.bg-black .item-title {
            color: white;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* SOLUTION: Fixed height and object-fit cover ensures even alignment */
        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 250px;
            /* Force same height for all grid items */
            display: block;
            object-fit: cover;
            /* Crops center to fit, prevents stretching */
        }

        .gallery-item .item-title {
            padding: 1rem;
            font-weight: 600;
            color: var(--dark);
            text-align: center;
            margin-top: auto;
            /* Ensures title stays at bottom */
        }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            position: relative;
            animation: scaleIn 0.3s ease;
        }

        .lightbox-content img,
        .lightbox-content video {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 8px;
            height: auto;
            /* Allow lightbox to show full image */
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 40px;
            color: white;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10000;
        }

        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        .lightbox-title {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 1.1rem;
            max-width: 80%;
            text-align: center;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 50px;
            color: white;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10000;
        }

        .lightbox-nav:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-prev {
            left: 20px;
        }

        .lightbox-next {
            right: 20px;
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

        /* Responsive Styles */
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
                grid-template-columns: 1fr;
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
            }

            .lightbox-close {
                top: 10px;
                right: 10px;
                font-size: 30px;
                width: 40px;
                height: 40px;
            }

            .lightbox-nav {
                font-size: 30px;
                width: 45px;
                height: 45px;
            }

            .lightbox-prev {
                left: 10px;
            }

            .lightbox-next {
                right: 10px;
            }

            .lightbox-title {
                font-size: 0.9rem;
                padding: 8px 15px;
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

            .top-info-bar {
                display: none;
            }

            header {
                top: 0;
            }

            .gallery-hero {
                margin-top: 80px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

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
            $config_file = 'gallery_config.json';
            $files = scandir($gallery_dir);
            $media_items = [];
            $background_config = [];

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
                        'filename_only' => $file
                    ];
                } elseif (in_array($extension, $image_extensions)) {
                    $media_items['images'][] = [
                        'type' => 'image',
                        'path' => $file_path,
                        'name' => basename($file, '.' . $extension),
                        'filename_only' => $file
                    ];
                }
            }

            if (isset($media_items['videos'])) {
                foreach ($media_items['videos'] as $video) {
                    $bg_class = '';
                    if (isset($background_config[$video['filename_only']])) {
                        $bg_class = 'bg-' . htmlspecialchars($background_config[$video['filename_only']]);
                    }
                    echo '<div class="gallery-item animate ' . $bg_class . '" data-type="video" data-src="' . htmlspecialchars($video['path']) . '" data-title="' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $video['name']))) . '">';
                    // UPDATED: Added 'controls' here to show the play/volume bar
                    echo '<video playsinline preload="metadata" controls>';
                    echo '<source src="' . htmlspecialchars($video['path']) . '" type="video/' . pathinfo($video['path'], PATHINFO_EXTENSION) . '">';
                    echo 'Your browser does not support the video tag.';
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
                    echo '<div class="gallery-item animate ' . $bg_class . '" data-type="image" data-src="' . htmlspecialchars($image['path']) . '" data-title="' . htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $image['name']))) . '">';
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

    <div class="lightbox" id="lightbox">
        <div class="lightbox-close" id="lightbox-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="lightbox-nav lightbox-prev" id="lightbox-prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="lightbox-content" id="lightbox-content">
        </div>
        <div class="lightbox-nav lightbox-next" id="lightbox-next">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="lightbox-title" id="lightbox-title"></div>
    </div>

    <?php include('common/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5"
        crossorigin="anonymous"></script>
    <script>
        // Header Scroll Effect
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            const topInfoBar = document.querySelector('.top-info-bar');

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

            // Close menu when clicking on a link
            const navLinks = document.querySelectorAll('.navbar a');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    navbar.classList.remove('active');
                    menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                });
            });

            // Active link highlighting
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes('gallery.php')) {
                    link.classList.add('active');
                }
            });
        }

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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 140,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Lightbox Functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxContent = document.getElementById('lightbox-content');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxNext = document.getElementById('lightbox-next');
        const galleryItems = document.querySelectorAll('.gallery-item');

        let currentIndex = 0;
        let mediaArray = [];

        // Build media array from gallery items
        galleryItems.forEach((item, index) => {
            mediaArray.push({
                type: item.dataset.type,
                src: item.dataset.src,
                title: item.dataset.title
            });

            // Add click event to open lightbox
            item.addEventListener('click', function () {
                currentIndex = index;
                openLightbox();
            });
        });

        function openLightbox() {
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
            showMedia(currentIndex);
        }

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling

            // Stop any playing video
            const video = lightboxContent.querySelector('video');
            if (video) {
                video.pause();
            }
        }

        function showMedia(index) {
            const media = mediaArray[index];
            lightboxTitle.textContent = media.title;

            if (media.type === 'image') {
                lightboxContent.innerHTML = `<img src="${media.src}" alt="${media.title}">`;
            } else if (media.type === 'video') {
                lightboxContent.innerHTML = `
                    <video controls autoplay playsinline>
                        <source src="${media.src}" type="video/${media.src.split('.').pop()}">
                        Your browser does not support the video tag.
                    </video>
                `;
            }
        }

        function showNext() {
            currentIndex = (currentIndex + 1) % mediaArray.length;
            showMedia(currentIndex);
        }

        function showPrev() {
            currentIndex = (currentIndex - 1 + mediaArray.length) % mediaArray.length;
            showMedia(currentIndex);
        }

        // Event Listeners
        lightboxClose.addEventListener('click', closeLightbox);
        lightboxNext.addEventListener('click', showNext);
        lightboxPrev.addEventListener('click', showPrev);

        // Close lightbox when clicking outside content
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('active')) return;

            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowRight') {
                showNext();
            } else if (e.key === 'ArrowLeft') {
                showPrev();
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