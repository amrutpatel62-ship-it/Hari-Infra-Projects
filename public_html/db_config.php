<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u717615357_hari');
define('DB_PASSWORD', 'Hari@6298#DB');
define('DB_NAME', 'u717615357_hari');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USERNAME,
        DB_PASSWORD
    );
    // Enable error reporting to catch issues
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If this fails, it will print the specific error message
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>