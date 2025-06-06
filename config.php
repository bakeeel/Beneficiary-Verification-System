
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'u260325039_root');
define('DB_PASSWORD', '0Mk~UNVxh#E');
define('DB_NAME', 'u260325039_Kafel_benef');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if (mysqli_query($conn, $sql)) {
    mysqli_select_db($conn, DB_NAME);
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Create required tables
// $tables = [
//     "CREATE TABLE IF NOT EXISTS users (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         username VARCHAR(50) UNIQUE NOT NULL,
//         password VARCHAR(255) NOT NULL,
//         role ENUM('admin', 'restaurant') NOT NULL,
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )",
    
//     "CREATE TABLE IF NOT EXISTS beneficiaries (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         name VARCHAR(100) NOT NULL,
//         phone VARCHAR(20),
//         email VARCHAR(100),
//         status ENUM('active', 'inactive') DEFAULT 'active',
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )",
    
//     "CREATE TABLE IF NOT EXISTS offers (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         title VARCHAR(100) NOT NULL,
//         discount_percentage INT NOT NULL,
//         start_date DATE NOT NULL,
//         end_date DATE NOT NULL,
//         status ENUM('active', 'inactive') DEFAULT 'active',
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )",
    
//     "CREATE TABLE IF NOT EXISTS discount_codes (
//         id INT PRIMARY KEY AUTO_INCREMENT,
//         beneficiary_id INT,
//         offer_id INT,
//         code VARCHAR(20) UNIQUE NOT NULL,
//         is_used BOOLEAN DEFAULT FALSE,
//         used_at TIMESTAMP NULL,
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id),
//         FOREIGN KEY (offer_id) REFERENCES offers(id)
//     )"
// ];

// foreach ($tables as $sql) {
//     if (!mysqli_query($conn, $sql)) {
//         die("Error creating table: " . mysqli_error($conn));
//     }
// }

?>
