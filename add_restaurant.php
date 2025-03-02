<?php
require_once 'config.php';

// Restaurant credentials
$restaurant_username = 'restaurant1';
$restaurant_password = password_hash('restaurant123', PASSWORD_DEFAULT);

// Check if restaurant user already exists
$check_sql = "SELECT id FROM users WHERE username = ?";
$check_stmt = mysqli_prepare($conn, $check_sql);
mysqli_stmt_bind_param($check_stmt, "s", $restaurant_username);
mysqli_stmt_execute($check_stmt);
mysqli_stmt_store_result($check_stmt);

if (mysqli_stmt_num_rows($check_stmt) > 0) {
    echo "Restaurant user already exists!";
} else {
    // Insert restaurant user
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'restaurant')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $restaurant_username, $restaurant_password);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Restaurant user created successfully!";
        echo "\nUsername: restaurant1";
        echo "\nPassword: restaurant123";
    } else {
        echo "Error creating restaurant user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
