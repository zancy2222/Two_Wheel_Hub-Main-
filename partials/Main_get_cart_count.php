<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT SUM(quantity) as cart_count FROM RegisteredCart WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartCount = $result->fetch_assoc()['cart_count'];

    $stmt->close();
    $conn->close();

    echo json_encode(['cart_count' => $cartCount ?: 0]);
} else {
    echo json_encode(['cart_count' => 0]);
}
?>
