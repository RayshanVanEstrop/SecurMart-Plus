<?php
require("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order History | SecurMart+</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid" id="content">
        <?php include 'includes/header.php'; ?>
        <div class="col-lg-4 col-md-6">
            <img src="img/history.jpg" style="float: left;" width="600px">
        </div>
        <div class="row decor_bg">
            <div class="col-md-6">
                <table class="table table-striped">
                    <!-- Show table only if there are items in the order history -->
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT items.name AS Name, items.price AS Price, user_item.date_time AS OrderTime
                              FROM user_item
                              JOIN items ON user_item.item_id = items.id
                              WHERE user_item.user_id = '$user_id' AND user_item.status = 2";
                    $result = mysqli_query($con, $query) or die($mysqli_error($con));

                    if (mysqli_num_rows($result) >= 1) {
                    ?>
                        <h1 style="margin-bottom: 20px; font-weight: 20;"><center>Order History</center></h1>
                        <thead>
                            <tr>
                                <th>Item name</th>
                                <th>Price</th>
                                <th>Order Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr><td>' . $row["Name"] . '</td><td>Rs. ' . $row["Price"] . '</td><td>' . date('Y-m-d H:i:s', strtotime($row["OrderTime"])) . '</td></tr>';
                                $total += $row["Price"];
                            }
                            echo '<tr><td>Total</td><td>Rs. ' . $total . '</td><td></td></tr>';
                            ?>
                        </tbody>
                    <?php
                    } else {
                        echo "Sorry! No orders placed yet";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
</body>
</html>
