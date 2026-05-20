<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
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

        /* Services Page Specific Styles */
        .services-hero {
            height: 60vh;
            background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
                url('services.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
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
            margin-bottom: 1rem;
        }

        .service-process h2 {
            text-align: center;
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .service-process h2::after {
            content: '';
            position: absolute;
            width: 20%;
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .service-process p {
            text-align: center;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.6;
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

        .professional-services {
            padding: 80px 0;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 60px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            align-items: start;
        }

        .service-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .service-img-container {
            height: 200px;
            overflow: hidden;
        }

        .service-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-img {
            transform: scale(1.03);
        }

        .service-title {
            font-size: 22px;
            color: #2c3e50;
            margin: 20px 20px 15px;
            font-weight: 600;
        }

        .service-desc {
            margin: 0 20px 20px;
        }

        .desc-text {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .desc-text.expanded {
            -webkit-line-clamp: unset;
            display: block;
        }

        .read-more-btn {
            background: transparent;
            color: #3498db;
            border: none;
            padding: 0 20px 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .read-more-btn:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .read-more-btn::after {
            content: '↓';
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .read-more-btn.expanded::after {
            content: '↑';
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .section-title {
                font-size: 28px;
            }

            .section-subtitle {
                font-size: 16px;
                margin-bottom: 40px;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Footer */
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

    <section class="services-hero">
        <div class="services-hero-content">
            <h1>Our Solar Services</h1>
            <p>Comprehensive solar EPC services tailored to meet your specific energy needs across residential,
                commercial, and industrial sectors.</p>
        </div>
    </section>

    <section class="services-details">
        <div class="service-process">
            <h2 class="animate">Our Process</h2>
            <p class="animate">At Hari Infra Projects, we follow a systematic approach to ensure every solar
                installation meets the highest standards of quality, safety, and performance.</p>

            <div class="process-steps">
                <div class="process-step animate">
                    <div class="step-number">1</div>
                    <i class="fas fa-search-location"></i>
                    <h3>Site Survey</h3>
                    <p>Our experts conduct a thorough site assessment to evaluate solar potential, shading analysis, and
                        structural suitability.</p>
                </div>

                <div class="process-step animate">
                    <div class="step-number">2</div>
                    <i class="fas fa-pencil-ruler"></i>
                    <h3>Custom Design</h3>
                    <p>We create optimized system designs tailored to your energy needs, roof type, and budget
                        requirements.</p>
                </div>

                <div class="process-step animate">
                    <div class="step-number">3</div>
                    <i class="fas fa-file-signature"></i>
                    <h3>Approvals</h3>
                    <p>We handle all necessary permits, net metering applications, and government subsidy paperwork.</p>
                </div>

                <div class="process-step animate">
                    <div class="step-number">4</div>
                    <i class="fas fa-solar-panel"></i>
                    <h3>Installation</h3>
                    <p>Our certified technicians install your system with precision, ensuring optimal performance and
                        safety.</p>
                </div>

                <div class="process-step animate">
                    <div class="step-number">5</div>
                    <i class="fas fa-plug"></i>
                    <h3>Commissioning</h3>
                    <p>We conduct thorough testing and connect your system to the grid for seamless operation.</p>
                </div>

                <div class="process-step animate">
                    <div class="step-number">6</div>
                    <i class="fas fa-tools"></i>
                    <h3>Maintenance</h3>
                    <p>We provide ongoing monitoring, cleaning, and maintenance services to ensure peak performance.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services-details">
        <div class="service-process">
            <h2 class="animate">Our Services</h2>
            <p class="section-subtitle">Comprehensive solar solutions for all your energy needs</p>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-img-container">
                        <img src="solar-consulting.jpeg" alt="Solar Consulting" class="service-img">
                    </div>
                    <h3 class="service-title">Our Expertise</h3>
                    <div class="service-desc">
                        <p class="desc-text">As a leading Solar EPC company in India, we offer comprehensive, end-to-end
                            solar energy solutions tailored to the unique needs of commercial, industrial, and
                            utility-scale clients.
                            From concept to commissioning—and beyond—we ensure high-quality execution and
                            long-term system performance.</p>
                    </div>
                    <button class="read-more-btn">Read More</button>
                </div>

                <div class="service-card">
                    <div class="service-img-container">
                        <img src="system-design.jpeg" alt="System Design" class="service-img">
                    </div>
                    <h3 class="service-title">Engineering</h3>
                    <div class="service-desc">
                        <p class="desc-text">We deliver detailed engineering and system design services customized for
                            each project site. Our team leverages advanced tools and industry best practices to optimize
                            energy
                            output, ensure structural integrity, and meet all technical standards and compliance
                            requirements.</p>
                    </div>
                    <button class="read-more-btn">Read More</button>
                </div>

                <div class="service-card">
                    <div class="service-img-container">
                        <img src="installation.jpeg" alt="Installation" class="service-img">
                    </div>
                    <h3 class="service-title">Procurement</h3>
                    <div class="service-desc">
                        <p class="desc-text">We source only Tier-1 quality components—including solar panels, inverters,
                            structures, and balance-of-system materials—from globally trusted manufacturers. Our
                            procurement
                            process ensures reliability, performance, and timely delivery, all at competitive pricing.
                        </p>
                    </div>
                    <button class="read-more-btn">Read More</button>
                </div>

                <div class="service-card">
                    <div class="service-img-container">
                        <img src="maintenance.jpeg" alt="Maintenance" class="service-img">
                    </div>
                    <h3 class="service-title">Construction & Commissioning</h3>
                    <div class="service-desc">
                        <p class="desc-text">Our skilled teams handle complete project execution—civil work, mounting,
                            electrical installation, and grid integration—with a focus on safety, quality, and
                            efficiency. Every
                            project undergoes thorough testing and quality checks before final commissioning.</p>
                    </div>
                    <button class="read-more-btn">Read More</button>
                </div>

                <div class="service-card">
                    <div class="service-img-container">
                        <img src="monitoring.jpeg" alt="Monitoring" class="service-img">
                    </div>
                    <h3 class="service-title">Operation & Maintenance (O&M)</h3>
                    <div class="service-desc">
                        <p class="desc-text">We offer professional O&M services to keep your solar plant running at peak
                            efficiency— <b>regardless of whether we built your system or not.</b> Our maintenance
                            offerings include
                            routine inspections, performance monitoring, panel cleaning, troubleshooting, preventive
                            maintenance, and system upgrades. With our proactive approach, we help reduce
                            downtime, improve energy yield, and extend system life.
                        </p>
                    </div>
                    <button class="read-more-btn">Read More</button>
                </div>
            </div>
        </div>
    </section>

    <?php include('common/footer.php') ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /* 1. Integrated Mobile Responsive Menu Logic */
            const menuToggle = document.getElementById('menu-toggle') ||
                document.getElementById('menuToggle') ||
                document.querySelector('.navbar-toggler');

            const navbar = document.getElementById('navbar') ||
                document.querySelector('.navbar') ||
                document.querySelector('.navbar-collapse');

            if (menuToggle && navbar) {
                menuToggle.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Toggle the 'active' class (custom CSS) or 'show' (Bootstrap)
                    navbar.classList.toggle('active');
                    navbar.classList.toggle('show');

                    // Update Icon between bars and X
                    if (navbar.classList.contains('active') || navbar.classList.contains('show')) {
                        menuToggle.innerHTML = '<i class="fas fa-times"></i>';
                    } else {
                        menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                });
            }

            // Close menu when clicking on any link
            const navLinks = document.querySelectorAll('.navbar a, .navbar-nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (navbar) {
                        navbar.classList.remove('active');
                        navbar.classList.remove('show');
                    }
                    if (menuToggle) {
                        menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                });
            });

            /* 2. Read More / Accordion Logic */
            const readMoreBtns = document.querySelectorAll('.read-more-btn');
            readMoreBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const currentCard = this.closest('.service-card');
                    const currentText = currentCard.querySelector('.desc-text');
                    const isAlreadyOpen = currentText.classList.contains('expanded');

                    readMoreBtns.forEach(otherBtn => {
                        const otherCard = otherBtn.closest('.service-card');
                        const otherText = otherCard.querySelector('.desc-text');
                        if (otherText !== currentText) {
                            otherText.classList.remove('expanded');
                            otherBtn.classList.remove('expanded');
                            otherBtn.textContent = 'Read More';
                        }
                    });

                    if (isAlreadyOpen) {
                        currentText.classList.remove('expanded');
                        this.classList.remove('expanded');
                        this.textContent = 'Read More';
                    } else {
                        currentText.classList.add('expanded');
                        this.classList.add('expanded');
                        this.textContent = 'Read Less';
                    }
                });
            });

            /* 3. Scroll Animation Logic */
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
        });

        /* 4. Sticky Header Logic */
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header') || document.querySelector('header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4yFFTOpGkWT/s3E3x1aCpe/HFjFKJtYw4z/y6I7gqM4V+Jt+N2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlco9tFhENBMJ+1L74jKkgu1qgmnL+6Xz8/Q2D1tF1X5w5"
        crossorigin="anonymous"></script>
</body>

</html>