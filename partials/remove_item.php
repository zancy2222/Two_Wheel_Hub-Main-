<?php
session_start();
include 'db_conn.php';

// Check if user is logged in
if (!isset($_SESSION['guest_id'])) {
    echo "No user session found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'];
    $source = $_POST['source'];
    $session_id = $_SESSION['guest_id'];

    // Prepare SQL queries based on source
    if ($source === 'cart') {
        // Remove from GuestCartOrder
        $query = "DELETE FROM GuestCartOrder WHERE id = ? AND session_id = ?";
    } elseif ($source === 'bought') {
        // Remove from GuestBuyedProducts
        $query = "DELETE FROM GuestBuyedProducts WHERE id = ? AND session_id = ?";
    } else {
        echo "Invalid source.";
        exit();
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $item_id, $session_id);

    if ($stmt->execute()) {
        echo "Item removed successfully.";
    } else {
        echo "Error removing item: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: ../GuestCheckout_Process.php");
exit();
?>
