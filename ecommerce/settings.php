<?php
require_once("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $old_password = mysqli_real_escape_string($con, $_POST['old-password']);
    $new_password = mysqli_real_escape_string($con, $_POST['password']);
    $new_password1 = mysqli_real_escape_string($con, $_POST['password1']);

    // Check if the new passwords match
    if ($new_password !== $new_password1) {
        $error = "New passwords do not match.";
    } else {
        // Verify the old password
        $user_id = $_SESSION['user_id'];
        $query = "SELECT password FROM users WHERE id = $user_id";
        $result = mysqli_query($con, $query) or die($mysqli_error($con));
        $row = mysqli_fetch_array($result);
        $hashed_password = $row['password'];

        if (password_verify($old_password, $hashed_password)) {
            // Update the user's password
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE id = $user_id";
            mysqli_query($con, $update_query) or die($mysqli_error($con));
            $success = "Password updated successfully!";
        } else {
            $error = "Old password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings | SecurMart+</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="col-lg-4 col-md-6">
                    <img src="img/settings.jpg">
                </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="settings.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password" placeholder="Old Password" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1" placeholder="Re-type New Password" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                        <?php
                        if (isset($error)) {
                            echo "<div class='alert alert-danger' style='margin-top: 10px;'>$error</div>";
                        } elseif (isset($success)) {
                            echo "<div class='alert alert-success' style='margin-top: 10px;'>$success</div>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
