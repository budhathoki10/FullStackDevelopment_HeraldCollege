<?php
// db.php
$host = "localhost";
$user = "root";   // change if needed
$pass = "";       // add password if you set one
$dbname = "school_db";

try {
    // First connect without database
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if it doesn't exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");

    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        course VARCHAR(100) NOT NULL
    )";
    $conn->exec($sql);

    // Optional: message for debugging
    // echo "✅ Database and table ready!";
} catch (PDOException $e) {
    die("❌ Database error: " . $e->getMessage());
}
?>