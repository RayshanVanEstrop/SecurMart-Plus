<?php
require("common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old-password'];
    $new_password = $_POST['password'];
    $new_password1 = $_POST['password1'];

    // Retrieve the user's current password from the database
    $email = $_SESSION['email'];
    $query = "SELECT password FROM users WHERE email = :email";
    $query_params = array(':email' => $email);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

    $row = $stmt->fetch();
    $hashed_password = $row['password'];

    // Verify the old password using password_verify()
    if (password_verify($old_password, $hashed_password)) {
        // Check if the new passwords match
        if ($new_password === $new_password1) {
            // Hash the new password with password_hash()
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the user's password in the database
            $query = "UPDATE users SET password = :new_password WHERE email = :email";
            $query_params = array(':new_password' => $new_password, ':email' => $email);

            try {
                $stmt = $db->prepare($query);
                $stmt->execute($query_params);
                $success = "Password updated successfully!";
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
        } else {
            $error = "New passwords do not match.";
        }
    } else {
        $error = "Old password is incorrect.";
    }
}
?>
