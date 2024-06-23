<?php
// Database configuration
$host = 'localhost';
$db = 'project_db'; // Replace with your database name
$user = 'postgres'; // Replace with your database user
$pass = 'sahil'; // Replace with your database password
$port = '5432'; // Default PostgreSQL port

// DSN (Data Source Name)
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
