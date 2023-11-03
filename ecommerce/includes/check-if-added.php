<?php
//Check the user's cart for added items
function check_if_added_to_cart($item_id) {
    // Check if the user is logged in and get their user_id from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        require("common.php"); // Connect to the database

        // Use prepared statements to prevent SQL injection
        $query = "SELECT 1 FROM user_item WHERE item_id = ? AND user_id = ? AND status = 1";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ii", $item_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the product is added to the cart
        if (mysqli_num_rows($result) >= 1) {
            return 1; // Return 1 if added to cart
        } else {
            return 0; // Return 0 if not added to cart
        }
    } else {
        // Handle the case when the user is not authenticated (session variable not set)
        return 0;
    }
}
?>