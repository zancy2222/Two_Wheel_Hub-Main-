<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['user_id'])) {
    echo "No products found for removal.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $user_id = $_SESSION['user_id'];
    $item_id = intval($_POST['item_id']);

    // Prepare and execute delete statement
    $delete_query = "DELETE FROM UserBuyedProducts WHERE user_id = ? AND product_id = ?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param("ii", $user_id, $item_id);

    if ($stmt_delete->execute()) {
        // Redirect or display success message
        header("Location: ../UserCheckout_Process.php");
        exit();
    } else {
        echo "Failed to remove item.";
    }
} else {
    echo "Invalid request.";
}
?>
