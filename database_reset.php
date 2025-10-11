<?php

// Database configuration
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'bus_ticket';

try {
    // Connect to MySQL without database
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Drop database if exists
    $pdo->exec("DROP DATABASE IF EXISTS `$database`");
    echo "Database dropped successfully\n";

    // Create new database
    $pdo->exec("CREATE DATABASE `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database created successfully\n";

    // Select the database
    $pdo->exec("USE `$database`");

    echo "All operations completed successfully\n";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}