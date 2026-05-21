<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <style>
       
        /* Hero Section (General styles from index) */
        .hero {
            height:120vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('about.png') no-repeat center center/cover;
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

        /* About Page Specific Styles */
        .about-hero {
            height: 60vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)), 
                        url('about.png') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px; /* Adjust for fixed header */
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

        /* New styles for Team section */
        .team-section {
            padding: 5rem 5%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            justify-content: center; /* Center items if fewer than grid columns */
        }

        .team-member-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .team-member-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
            border: 4px solid var(--primary);
            box-shadow: 0 0 0 5px rgba(20, 184, 166, 0.2);
        }

        .team-member-card h3 {
            font-size: 1.6rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .team-member-card p {
            font-size: 1rem;
            color: var(--primary);
            font-weight: 500;
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

            .team-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .top-info-content {
                justify-content: center;
                gap: 15px;
            }
            
            .slogan {
                order: 3;
                width: 100%;
                text-align: center;
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
            
            .contact-info {
                flex-direction: column;
                gap: 10px;
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

            .team-container {
                grid-template-columns: 1fr; /* Stack members on small screens */
            }
            
            .top-info-content {
                flex-direction: column;
                gap: 10px;
            }
            
            .slogan {
                order: 0;
                width: auto;
            }
            
            .contact-info {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
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

    <section class="about-hero">
        <div class="about-hero-content">
            <h1>About Hari Infra Projects</h1>
            <p>Established in 2021, we are a trusted EPC company specializing in solar rooftop solutions, committed to powering Gujarat's renewable energy future.</p>
        </div>
    </section>

    <section class="about-content">
        <div class="about-section animate">
            <div class="about-text">
                <h2>Our Story</h2>
                <p>Founded in 2021 in Mehsana, Gujarat, Hari Infra Projects began with a vision to make solar energy accessible and affordable for all. What started as a small team of solar enthusiasts has grown into a reputable EPC company with over 450 successful projects across residential, commercial, and industrial sectors.</p>
                <p>Our journey has been marked by continuous learning, innovation, and an unwavering commitment to quality. From our first 1kW residential installation to our recent 500kW industrial solar plant, each project has strengthened our expertise and reinforced our dedication to sustainable energy solutions.</p>
            </div>
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80" alt="Our Team">
            </div>
        </div>
        
        <div class="about-section reverse animate">
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Solar Installation">
            </div>
            <div class="about-text">
                <h2>Why Choose Us</h2>
                <p>With 2+ MW of cumulative installed capacity, Hari Infra Projects stands out for its technical expertise, transparent processes, and customer-centric approach. We use only high-efficiency components from trusted manufacturers and maintain strict quality control at every stage.</p>
                <p>Our team combines deep solar industry knowledge with local expertise, enabling us to deliver customized solutions that maximize energy generation and return on investment for our clients across North and Central Gujarat.</p>
            </div>
        </div>
    </section>

    <section class="mission-vision">
        <div class="section-title">
            <h2>Our Mission & Vision</h2>
            <p>Driving Gujarat's transition to clean, renewable energy through innovative solar solutions</p>
        </div>
        
        <div class="mv-container">
            <div class="mv-card animate">
                <i class="fas fa-bullseye"></i>
                <h3>Our Mission</h3>
                <p>To make clean, renewable solar energy both accessible and affordable for every home and business in Gujarat. We strive to help our clients reduce electricity bills, lower carbon footprints, and achieve energy independence through reliable solar solutions.</p>
            </div>
            
            <div class="mv-card animate">
                <i class="fas fa-eye"></i>
                <h3>Our Vision</h3>
                <p>To be Gujarat's most trusted solar EPC company, recognized for quality, innovation, and customer satisfaction. We envision a future where solar energy powers sustainable development across urban and rural communities alike.</p>
            </div>
            
            <div class="mv-card animate">
                <i class="fas fa-handshake"></i>
                <h3>Our Values</h3>
                <p>Integrity, Quality, Innovation, and Sustainability guide everything we do. We believe in transparent dealings, long-term relationships, and solutions that benefit both our clients and the environment.</p>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="section-title">
            <h2>Meet Our Founders</h2>
            <p>Hari Infra Projects is led by experienced professionals dedicated to excellence in solar energy.</p>
        </div>
        
        <div class="team-container">
            <div class="team-member-card animate">
                <img src="owner1.png" alt="Owner 1 Name"> <h3>Krupal Mehta</h3>
            </div>
            
            <div class="team-member-card animate">
                <img src="owner2.png" alt="Owner 2 Name"> <h3>Amrut Patel</h3>
            </div>
        </div>
    </section>

    <?php include('common/footer.php') ?>

    <script>
        // Sticky header functionality
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.navbar').classList.toggle('active');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5" crossorigin="anonymous"></script>
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
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for fixed header height
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active link highlighting is handled by PHP in header.php
        // No JavaScript needed - PHP sets the active class based on current page
    </script>
    <a href="https://wa.me/916355048708" target="_blank" aria-label="Chat on WhatsApp"
        style="position: fixed; bottom: 20px; right: 20px; background-color: #25d366; color: white; font-size: 28px; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 1000; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: background-color 0.3s ease;"
        onmouseover="this.style.backgroundColor='#1ebea5'; this.style.transform='translateY(-3px)'"
        onmouseout="this.style.backgroundColor='#25d366'; this.style.transform='none'">
        <i class="fab fa-whatsapp"></i>
    </a>
</body>
</html>