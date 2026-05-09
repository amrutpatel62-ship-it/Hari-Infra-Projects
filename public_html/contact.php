<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Hari Infra Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        /* Hero Section */
        .hero {
            height: 100vh;
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

        /* Section Title */
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

        /* Contact Page Specific Styles */
        .contact-hero {
            height: 60vh;
            background: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.7)),
                url('contect.png') no-repeat center center/cover;
            display: flex;
            align-items: center;
            padding: 0 5%;
            color: var(--light);
            margin-top: 80px;
            /* Adjust for fixed header */
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

        .contact-text p,
        .contact-text a {
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

        /* Toast Notification Styles */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 99999;
            max-width: 400px;
            pointer-events: none;
        }

        .toast-container .toast {
            pointer-events: auto;
        }

        .toast {
            background-color: white;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideInRight 0.3s ease;
            min-width: 300px;
            opacity: 1;
        }

        .toast.success {
            border-left: 4px solid #10b981;
        }

        .toast.error {
            border-left: 4px solid #ef4444;
        }

        .toast.warning {
            border-left: 4px solid #f59e0b;
        }

        .toast-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .toast.success .toast-icon {
            color: #10b981;
        }

        .toast.error .toast-icon {
            color: #ef4444;
        }

        .toast.warning .toast-icon {
            color: #f59e0b;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--dark);
        }

        .toast-message {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.4;
        }

        .toast-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--gray);
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: color 0.2s ease;
        }

        .toast-close:hover {
            color: var(--dark);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        @media (max-width: 480px) {
            .toast-container {
                right: 10px;
                left: 10px;
                max-width: none;
            }

            .toast {
                min-width: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Toast Notification Container -->
    <div class="toast-container" id="toastContainer"></div>

    <?php include('common/header.php') ?>

    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Get in Touch</h1>
            <p>Have questions about solar solutions for your home or business? Our team is ready to assist you with
                expert advice and free consultations.</p>
        </div>
    </section>

    <section class="contact-container">
        <div class="contact-info animate">
            <h2>Contact Information</h2>
            <p>Reach out to us for solar consultations, project inquiries, or any questions about our services. We're
                here to help you transition to clean energy.</p>

            <div class="contact-details">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-text">
                        <h3>Our Office</h3>
                        <p>25-A ASHTAVINAYAK INDUSTRIAL PARK, MEHSANA, nr. ISCON CIRCLE, BYPASS ROAD, Nugar, Gujarat
                            384002</p>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div class="contact-text">
                        <h3>Phone</h3>
                        <a href="tel:+916355048708" style="color: inherit; text-decoration: none;">+91 63550 48708</a>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div class="contact-text">
                        <h3>Email</h3>
                        <a href="mailto:info@hariindia.in"
                            style="color: inherit; text-decoration: none;">info@hariindia.in</a>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fab fa-whatsapp"></i>
                    <div class="contact-text">
                        <h3>WhatsApp</h3>
                        <a href="https://wa.me/916355048708" target="_blank"
                            style="color: inherit; text-decoration: none;">+91 63550 48708</a>
                    </div>
                </div>
            </div>


            <div class="business-hours">
                <h3>Business Hours</h3>
                <div class="hours-item">
                    <span>Monday - Friday</span>
                    <span>10:00 AM - 6:00 PM</span>
                </div>
                <div class="hours-item">
                    <span>Saturday</span>
                    <span>10:00 AM - 4:00 PM</span>
                </div>
                <div class="hours-item">
                    <span>Sunday</span>
                    <span>Closed</span>
                </div>
            </div>
        </div>

        <div class="contact-form animate">
            <h2>Send Us a Message</h2>
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn" style="width: 100%;">Send Message</button>
            </form>
        </div>
    </section>


    <div
        style="position: relative; text-align: center; width: 90%; max-width: 1000px; height: 400px; border-radius: 10px; overflow: hidden; margin: 3rem auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);">
        <iframe
            src="https://maps.google.com/maps?width=1000&height=400&hl=en&q=HARI Solar by HARI INFRA PROJECTS, 25-A ASHTAVINAYAK INDUSTRIAL PARK, MEHSANA, nr. ISCON CIRCLE, BYPASROAD, Nugar, Gujarat 384002&t=&z=14&ie=UTF8&iwloc=B&output=embed"
            style="width: 100%; height: 100%; border: none;" frameborder="0" scrolling="no" marginheight="0"
            marginwidth="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <br>

    <?php include('common/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        // Header Scroll Effect
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            if (header && window.scrollY > 50) {
                header.classList.add('scrolled');
            } else if (header) {
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
                if (navbar) navbar.classList.remove('active');
                if (menuToggle) menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Toast Notification Function
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) {
                console.error('Toast container not found');
                // Fallback to alert if toast container doesn't exist
                alert(message);
                return;
            }

            const toast = document.createElement('div');
            toast.className = `toast ${type}`;

            const icons = {
                success: '<i class="fas fa-check-circle"></i>',
                error: '<i class="fas fa-exclamation-circle"></i>',
                warning: '<i class="fas fa-exclamation-triangle"></i>'
            };

            const titles = {
                success: 'Success!',
                error: 'Error',
                warning: 'Warning'
            };

            // Clean up technical error messages for users
            let userMessage = message;
            if (type === 'error' || type === 'warning') {
                // Remove technical prefixes
                userMessage = userMessage.replace(/^(Server Error|Connection error|Resend API Error|cURL Error):\s*/i, '');
                // Simplify domain verification errors
                if (userMessage.includes('domain is not verified')) {
                    userMessage = 'Email service is temporarily unavailable. Your message has been saved and we will contact you soon.';
                }
            }

            toast.innerHTML = `
                <div class="toast-icon">${icons[type] || icons.success}</div>
                <div class="toast-content">
                    <div class="toast-title">${titles[type] || 'Notification'}</div>
                    <div class="toast-message">${userMessage}</div>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            `;

            toastContainer.appendChild(toast);

            // Force visibility - use requestAnimationFrame to ensure DOM is ready
            requestAnimationFrame(() => {
                toast.style.display = 'flex';
                toast.style.opacity = '1';
                toast.style.visibility = 'visible';
            });

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.style.animation = 'fadeOut 0.3s ease';
                    toast.style.opacity = '0';
                    setTimeout(() => {
                        if (toast.parentElement) {
                            toast.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }

        // UPDATED: REAL DATABASE SUBMISSION with Toast Notifications
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');

        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerText = "Sending...";

                const formData = new FormData(this);

                fetch('submit_form.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) { throw new Error('Network response was not ok'); }
                        return response.text().then(text => {
                            try {
                                return JSON.parse(text);
                            } catch (e) {
                                console.error('JSON parse error:', e, 'Response text:', text);
                                throw new Error('Invalid response from server');
                            }
                        });
                    })
                    .then(data => {
                        console.log('Response data:', data); // Debug log
                        if (data && data.status === "success") {
                            showToast(data.message || 'Your message has been sent successfully!', 'success');
                            contactForm.reset();
                        } else {
                            showToast(data.message || 'An error occurred. Please try again.', data.status === "error" ? 'error' : 'warning');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Unable to connect to server. Please check your internet connection and try again.', 'error');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerText = "Send Message";
                    });
            });
        }
    </script>
    <a href="https://wa.me/916355048708" target="_blank" aria-label="Chat on WhatsApp"
        style="position: fixed; bottom: 20px; right: 20px; background-color: #25d366; color: white; font-size: 28px; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 1000; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: background-color 0.3s ease;"
        onmouseover="this.style.backgroundColor='#1ebea5'; this.style.transform='translateY(-3px)'"
        onmouseout="this.style.backgroundColor='#25d366'; this.style.transform='none'">
        <i class="fab fa-whatsapp"></i>
    </a>
</body>

</html>