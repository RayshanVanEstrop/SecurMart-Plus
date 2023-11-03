<?php
require("includes/common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Use prepared statement to insert data and handle errors
    $query = "INSERT INTO user_item (user_id, item_id, status) VALUES (?, ?, 1)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
        if (mysqli_stmt_execute($stmt)) {
            // Item added to cart successfully
            header('location: products.php');
        } else {
            // Handle database execution error
            echo "Failed to add item to cart. Please try again later.";
        }
    } else {
        // Handle prepared statement creation error
        echo "Error in preparing the SQL statement.";
    }
}
?>
