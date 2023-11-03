<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation | SecurMart+</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid" id="content">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3 align="center">Your order has been placed successfully. Thank you for shopping with us.</h3>
                <hr>
                <!-- Provide order details here -->
                <div align="center">
                    <p>Your order will be delivered in 2 days.</p>
                    <!-- You can show order summary, invoice, or tracking details here -->
                </div>
                <hr>
                <p align="center">
                    Click <a href="products.php">here</a> to purchase any other item.
                </p>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
