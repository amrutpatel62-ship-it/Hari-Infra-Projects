<footer>
    <div class="footer-container">
        <!-- Logo & Description -->
        <div class="footer-col">
            <div class="logo">
                <h1 style="color: white;"><span>HARI</span> Infra Projects</h1>
            </div>
            <p>Powering a greener tomorrow with reliable, efficient, and affordable solar energy solutions across
                Gujarat since 2021.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=100088891761152" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/hariinfraprojects_harisolar/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com/@hariinfraprojects8384?si=0pRCnY0vWfkuTpHb" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <!-- Our Services (Scroll to Projects Section on services.php) -->
        <div class="footer-col">
            <h3>Our Services</h3>
            <ul class="footer-links">
                <li><a href="services.php#projects">Residential Solar</a></li>
                <li><a href="services.php#projects">Commercial Solar</a></li>
                <li><a href="services.php#projects">Industrial Solar</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-col">
            <h3>Contact Us</h3>
            <div class="footer-contact">
                <p><i class="fas fa-map-marker-alt"></i> 25-A ASHTAVINAYAK INDUSTRIAL PARK, MEHSANA, nr. ISCON CIRCLE, BYPASROAD, Nugar, Gujarat 384002</p>
                <p><i class="fas fa-phone-alt"></i><a href="tel:+916355048708" style="color: inherit; text-decoration: none;">+91 6355048708</a></p>
                <p><i class="fas fa-envelope"></i><a href="mailto:info@hariindia.in" style="color: inherit; text-decoration: none;">info@hariindia.in</a></p>
                <p><i class="fab fa-whatsapp"></i><a href="https://wa.me/916355048708?text=Hello%20Hari%20Infra%20Projects%20Team%2C%20I'm%20interested%20in%20your%20solar%20solutions." target="_blank" rel="noopener" style="color: inherit; text-decoration: none;">+91 6355048708</a></p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Hari Infra Projects. All Rights Reserved.</p>
    </div>
</footer>

<!-- Smooth Scroll CSS -->
<style>
html {
    scroll-behavior: smooth;
}
</style>

<!-- Optional JS: Smooth scroll on page load for services.php -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Only scroll if there is #projects in URL
    if(window.location.hash === '#projects') {
        const projectsSection = document.getElementById('projects');
        if(projectsSection) {
            projectsSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
</script>
