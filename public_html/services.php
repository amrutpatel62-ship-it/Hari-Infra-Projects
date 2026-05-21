<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            
        background-image:linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
    url('services.png');
              background-repeat: no-repeat;
              background-position: center center;
              background-size: cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px; /* Adjust for fixed header */
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

        .service-process h2 { /* Added for the h2 inside service-process */
            text-align: center;
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            width: 100%; /* To center the ::after pseudo-element */
        }

        .service-process h2::after { /* Added for the h2 inside service-process */
            content: '';
            position: absolute;
            width: 20%; /* Adjusted for a smaller underline */
            height: 3px;
            background-color: var(--primary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .service-process p { /* Added for the p inside service-process */
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

        /* .section-title {
            text-align: center;
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
        } */

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
        }

        .service-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
            margin: 0 20px;
            position: relative;
            overflow: hidden;
        }

        .desc-text {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
            margin: 0 0 20px;
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
            padding: 0 20px 25px;
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
            .services-hero-content h1 {
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
           
            
            .services-hero-content h1 {
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
            .services-hero-content h1 {
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const readMoreBtns = document.querySelectorAll('.read-more-btn');
    
    readMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const descText = this.parentElement.querySelector('.desc-text');
            descText.classList.toggle('expanded');
            this.classList.toggle('expanded');
            
            if (descText.classList.contains('expanded')) {
                this.textContent = 'Read Less';
            } else {
                this.textContent = 'Read More';
            }
        });
    });
});
</script>
</head>
<body>
   <?php include('common/header.php') ?>

    <section class="services-hero">
        <div class="services-hero-content">
            <h1>Our Solar Solutions</h1>
            <p>Comprehensive solar EPC services tailored to meet your specific energy needs across residential, commercial, and industrial sectors.</p>
        </div>
    </section>

    <section class="services-details">
        <div class="service-process">
            <h2 class="animate">Our Process</h2>
            <p class="animate">At Hari Infra Projects, we follow a systematic approach to ensure every solar installation meets the highest standards of quality, safety, and performance.</p>
            
            <div class="process-steps">
                <div class="process-step animate">
                    <div class="step-number">1</div>
                    <i class="fas fa-search-location"></i>
                    <h3>Site Survey</h3>
                    <p>Our experts conduct a thorough site assessment to evaluate solar potential, shading analysis, and structural suitability.</p>
                </div>
                
                <div class="process-step animate">
                    <div class="step-number">2</div>
                    <i class="fas fa-pencil-ruler"></i>
                    <h3>Custom Design</h3>
                    <p>We create optimized system designs tailored to your energy needs, roof type, and budget requirements.</p>
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
                    <p>Our certified technicians install your system with precision, ensuring optimal performance and safety.</p>
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
            <h2 class="animate">Services</h2>
        <p class="section-subtitle">Comprehensive solar solutions for all your energy needs</p>
        
        <div class="services-grid">
            <!-- Service 1 -->
            <div class="service-card">
                <div class="service-img-container">
                    <img src="solar-consulting.jpeg" alt="Solar Consulting" class="service-img">
                </div>
                <h3 class="service-title">Our Services</h3>
                <div class="service-desc">
                    <p class="desc-text">As a leading Solar EPC company in India, we offer comprehensive, end-to-end solar energy
                        solutions tailored to the unique needs of commercial, industrial, and utility-scale clients.
                        From concept to commissioning—and beyond—we ensure high-quality execution and
                        long-term system performance.</p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>
            
            <!-- Service 2 -->
            <div class="service-card">
                <div class="service-img-container">
                    <img src="system-design.jpeg" alt="System Design" class="service-img">
                </div>
                <h3 class="service-title">Engineering</h3>
                <div class="service-desc">
                    <p class="desc-text">We deliver detailed engineering and system design services customized for each project
                        site. Our team leverages advanced tools and industry best practices to optimize energy
                        output, ensure structural integrity, and meet all technical standards and compliance
                        requirements.</p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>
            
            <!-- Service 3 -->
            <div class="service-card">
                <div class="service-img-container">
                    <img src="installation.jpeg" alt="Installation" class="service-img">
                </div>
                <h3 class="service-title">Procurement</h3>
                <div class="service-desc">
                    <p class="desc-text">We source only Tier-1 quality components—including solar panels, inverters, structures,
                        and balance-of-system materials—from globally trusted manufacturers. Our procurement
                        process ensures reliability, performance, and timely delivery, all at competitive pricing.</p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>
            
            <!-- Service 4 -->
            <div class="service-card">
                <div class="service-img-container">
                    <img src="maintenance.jpeg" alt="Maintenance" class="service-img">
                </div>
                <h3 class="service-title">Construction & Commissioning</h3>
                <div class="service-desc">
                    <p class="desc-text">Our skilled teams handle complete project execution—civil work, mounting, electrical
                        installation, and grid integration—with a focus on safety, quality, and efficiency. Every
                        project undergoes thorough testing and quality checks before final commissioning.</p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>
            
            <!-- Service 5 -->
            <div class="service-card">
                <div class="service-img-container">
                    <img src="monitoring.jpeg" alt="Monitoring" class="service-img">
                </div>
                <h3 class="service-title">Operation & Maintenance (O&M) </h3>
                <div class="service-desc">
                    <p class="desc-text">We offer professional O&M services to keep your solar plant running at peak efficiency—
                        <b>regardless of whether we built your system or not.</b> Our maintenance offerings include
                        routine inspections, performance monitoring, panel cleaning, troubleshooting, preventive
                        maintenance, and system upgrades. With our proactive approach, we help reduce
                        downtime, improve energy yield, and extend system life.</p>
                </div>
                <button class="read-more-btn">Read More</button>
            </div>
        </div>
    </div>
</section>

    <section id="projects" class="projects-showcase">
        <div class="section-title">
            <h2>Our Projects</h2>
            <p>Explore some of our recent solar installations across Gujarat</p>
        </div>
        
        <div class="projects-grid">
            <div class="project-card animate">
                <div class="project-img">
                    <img src="001.jpg" alt="Residential Project">
                </div>
                <div class="project-info">
                    <h3>Residential Rooftop</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Ahmedabad</span>
                        <span>5 kW</span>
                    </div>
                    <p>A 3.24 KW rooftop solar system installed for a faily home, reducing electricity bills by 80% annully.</p>
                </div>
            </div>
            
            <div class="project-card animate">
                <div class="project-img">
                    <img src="002.jpg" alt="Commercial Project">
                </div>
                <div class="project-info">
                    <h3>Commercial Complex</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Mehsana</span>
                        <span>50 kW</span>
                    </div>
                    <p>A 50KW solar installation for a automobile workshop (Vimko Motors) At Mehsana</p>
                </div>
            </div>
            
            <div class="project-card animate">
                <div class="project-img">
                    <img src="003.jpg" alt="Industrial Project">
                </div>
                <div class="project-info">
                    <h3>Industrial Plant</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Changodat</span>
                        <span>500 kW</span>
                    </div>
                    <p>240 KW .plant at ACME Dietcare Pvt. Ltd. Changodat, Ahmedabad-Bavala Highway.</p>
                </div>
            </div>
            
            <div class="project-card animate" style="display: none;">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Agricultural Project">
                </div>
                <div class="project-info">
                    <h3>Agricultural Pump</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Patan</span>
                        <span>10 HP</span>
                    </div>
                    <p>A solar-powered agricultural pump installation providing reliable irrigation for a 5-acre farm.</p>
                </div>
            </div>
            
            <div class="project-card animate" style="display: none;">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80" alt="School Project">
                </div>
                <div class="project-info">
                    <h3>School Installation</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Himmatnagar</span>
                        <span>25 kW</span>
                    </div>
                    <p>A 25kW solar system for a local school with government subsidy benefits and educational displays.</p>
                </div>
            </div>
            
            <div class="project-card animate" style="display: none;">
                <div class="project-img">
                    <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Hospital Project">
                </div>
                <div class="project-info">
                    <h3>Hospital Backup</h3>
                    <div class="project-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Surendranagar</span>
                        <span>30 kW</span>
                    </div>
                    <p>A 30kW solar installation with battery backup for uninterrupted power at a rural healthcare center.</p>
                </div>
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