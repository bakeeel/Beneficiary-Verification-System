<?php
require_once 'config.php';

// Admin credentials
$admin_username = 'admin';
$admin_password = password_hash('admin123', PASSWORD_DEFAULT);

// Check if admin already exists
$check_sql = "SELECT id FROM users WHERE username = ?";
$check_stmt = mysqli_prepare($conn, $check_sql);
mysqli_stmt_bind_param($check_stmt, "s", $admin_username);
mysqli_stmt_execute($check_stmt);
mysqli_stmt_store_result($check_stmt);

if (mysqli_stmt_num_rows($check_stmt) > 0) {
    echo "Admin user already exists!";
} else {
    // Insert admin user
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'admin')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $admin_username, $admin_password);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Admin user created successfully!";
        echo "\nUsername: admin";
        echo "\nPassword: admin123";
    } else {
        echo "Error creating admin user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
