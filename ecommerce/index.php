<?php
// Establish the connection to the database and start the session
require("includes/common.php");

// Redirect the user to the products page if they are logged in.
if (isset($_SESSION['email'])) {
  header('location: products.php');
}
?>

<!-- Specify the document type as HTML -->
<!DOCTYPE html>
<!-- Specify the language as English -->
<html lang="en">
<head>
    <!-- Instruct the browser on how to control the page's dimensions and scaling -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of the index page -->
    <title>Welcome | SecurMart+</title>
    <!-- Include Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Include Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Include Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body style="padding-top: 50px;">

    <!-- Include the header -->
    <?php
    include 'includes/header.php';
    ?>
    <!-- Header end -->

    <div id="content">
        <!-- Main banner image -->
        <div id="banner_image">
            <div class="container">
                <center>
                    <div id="banner_content">
                        <h1>Welcome to Your Trusted Lifestyle Store.</h1>
                        <p>The Secured Marketplace for all your needs.</p>
                        <br/>
                        <a href="products.php" class="btn btn-danger btn-lg active">Browse Now!</a>
                    </div>
                </center>
            </div>
        </div>
        <!-- Main banner image end -->
    </div>

    <!-- Include the footer -->
    <?php
    include 'includes/footer.php';
    ?>
    <!-- Footer end -->

</body>
</html>
