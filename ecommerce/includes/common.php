<?php
// Load database credentials from a separate configuration file
include 'config.php';

// Create a database connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Disable detailed error messages in a production environment.
ini_set('display_errors', 0);
error_reporting(0);

// Start a session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
