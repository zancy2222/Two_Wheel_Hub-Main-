<?php
session_start();
include 'db_conn.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "No user session found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'];
    $source = $_POST['source'];
    $user_id = $_SESSION['user_id'];

    // Validate item_id and source
    if (!is_numeric($item_id) || !in_array($source, ['cart', 'bought'])) {
        echo "Invalid parameters.";
        exit();
    }

    // Prepare SQL queries based on source
    if ($source === 'cart') {
        // Remove from UserCartOrder
        $query = "DELETE FROM UserCartOrder WHERE id = ? AND user_id = ?";
    } elseif ($source === 'bought') {
        // Remove from UserBuyedProducts
        $query = "DELETE FROM UserBuyedProducts WHERE id = ? AND user_id = ?";
    } else {
        echo "Invalid source.";
        exit();
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $item_id, $user_id);

    if ($stmt->execute()) {
        // Redirect or display success message
        header("Location: ../UserCheckout_Process.php"); // Adjust the path as necessary
        exit();
    } else {
        echo "Error removing item: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
