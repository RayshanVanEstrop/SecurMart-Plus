<?php
require("includes/common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Validate that the item exists and is in the user's cart (status 1) before changing its status.
    $query = "SELECT id FROM user_item WHERE user_id = $user_id AND item_id = $item_id AND status = 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
        // Mark the item as ordered (status 2)
        $updateQuery = "UPDATE user_item SET status = 2 WHERE user_id = $user_id AND item_id = $item_id";
        mysqli_query($con, $updateQuery) or die(mysqli_error($con));
        
        // Redirect to the success page
        header('location: success.php');
    } else {
        // Handle the case where the item is not in the user's cart
        header('location: cart.php?error=Item not found in your cart');
    }
} else {
    // Handle invalid or missing item ID
    header('location: cart.php?error=Invalid item ID');
}
?>
