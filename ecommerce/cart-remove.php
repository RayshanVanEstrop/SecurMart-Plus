<?php
require("includes/common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    // Use prepared statement to delete data and handle errors
    $query = "DELETE FROM user_item WHERE item_id = ? AND user_id = ? AND status = 1";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $item_id, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            // Item removed from the cart successfully
            header('location:cart.php');
        } else {
            // Handle database execution error
            echo "Failed to remove item from the cart. Please try again later.";
        }
    } else {
        // Handle prepared statement creation error
        echo "Error in preparing the SQL statement.";
    }
}
?>
