<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['guest_id'])) {
    echo "No products found for removal.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $session_id = $_SESSION['guest_id'];
    $item_id = intval($_POST['item_id']);

    // Prepare and execute delete statement
    $delete_query = "DELETE FROM GuestBuyedProducts WHERE session_id = ? AND product_id = ?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param("si", $session_id, $item_id);

    if ($stmt_delete->execute()) {
        // Redirect or display success message
        header("Location: ../Cart_GuestCheckout_Process.php"); // Redirect to the order summary page to see the changes
        exit();
    } else {
        echo "Failed to remove item.";
    }
} else {
    echo "Invalid request.";
}
?>
