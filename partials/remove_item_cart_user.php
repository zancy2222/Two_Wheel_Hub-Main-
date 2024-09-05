<?php
session_start();
include 'db_conn.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "No products in cart.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $user_id = $_SESSION['user_id'];
    $item_id = intval($_POST['item_id']);

    // Prepare and execute delete statement
    $delete_query = "DELETE FROM UserCartOrder WHERE user_id = ? AND id = ?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param("ii", $user_id, $item_id);

    if ($stmt_delete->execute()) {
        // Redirect to the cart page to see the changes
        header("Location: ../cartMain.php"); 
        exit();
    } else {
        echo "Failed to remove item from cart.";
    }
} else {
    echo "Invalid request.";
}
?>
