<div class="top-info-bar">
    <div class="container">
        <div class="top-info-content">
            <div class="slogan">Innovative Solutions To Maximize Performance...</div>
            <div class="contact-info2">
                <div class="contact-item2">
                    <i class="fas fa-phone"></i>
                    <span>+91 6355048708</span>
                </div>
                <div class="contact-item2">
                    <i class="fas fa-envelope"></i>
                    <span>info@hariindia.in</span>
                </div>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100088891761152"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/hariinfraprojects_harisolar/"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com/@hariinfraprojects8384?si=0pRCnY0vWfkuTpHb"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
<header id="header">
    <div class="header-content">
        <div class="logo">
            <img src="/logo.png" />
        </div>
        
        <?php
            // Get the current page filename
            $currentPage = basename($_SERVER['PHP_SELF']); 
        ?>
            
        <nav class="navbar" id="navbar">
            <a href="index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>
            <a href="about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">About Us</a>
            <a href="services.php" class="<?= ($currentPage == 'services.php') ? 'active' : '' ?>">Services</a>
            
            <a href="gallery.php" class="<?= ($currentPage == 'gallery.php') ? 'active' : '' ?>">Our Projects</a>
            <a href="compare.php" class="<?= ($currentPage == 'compare.php') ? 'active' : '' ?>">Why Choose Us</a>
            
            <a href="contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">Contact Us</a>
        </nav>
        
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>
<style>
    .header {
        padding: 10px 5% !important;
    }
    /* Assuming your .navbar a.active is defined in header.css to create the underline */
</style>
<script>
    // Header and Top Info Bar Scroll Behavior
    (function() {
        let lastScrollTop = 0;
        const topInfoBar = document.querySelector('.top-info-bar');
        const header = document.getElementById('header');
        let topInfoBarHeight = topInfoBar ? topInfoBar.offsetHeight : 42;
        
        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 50) {
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down - hide top info bar
                    if (topInfoBar) {
                        topInfoBar.classList.add('hidden');
                    }
                    // When top-info-bar is hidden, header should be at top: 0
                    header.classList.add('scrolled');
                } else if (scrollTop < lastScrollTop) {
                    // Scrolling up - show top info bar
                    if (topInfoBar) {
                        topInfoBar.classList.remove('hidden');
                    }
                    // When top-info-bar is visible, header should be at top: 42px
                    header.classList.remove('scrolled');
                } else {
                    // No scroll direction change, sync header position with top-info-bar visibility
                    if (topInfoBar && topInfoBar.classList.contains('hidden')) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }
            } else {
                // At the top - show everything
                header.classList.remove('scrolled');
                if (topInfoBar) {
                    topInfoBar.classList.remove('hidden');
                }
            }
            
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }
        
        // Throttle scroll events for better performance
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            handleScroll();
        });
    })();
</script>