<?php
require("includes/common.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT id, email, password FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row['password'])) {
            // Password is correct, create a session
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location: products.php');
        } else {
            $error = "Incorrect email or password.";
        }
    } else {
        $error = "User not found. Please sign up.";
    }
}

if (isset($error)) {
    header('location: login.php?error=' . $error);
}
?>
