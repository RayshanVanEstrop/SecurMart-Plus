<?php
session_start();

if (isset($_SESSION['email'])) {
    // User is logged in, so we can destroy the session
    session_destroy();
}

// Redirect the user to the desired page after logout
header('location: index.php');
