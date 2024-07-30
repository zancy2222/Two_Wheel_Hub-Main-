<?php
session_start();
include 'db_conn.php';

$sessionId = session_id();

$sql = "SELECT SUM(quantity) as cart_count FROM cart WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sessionId);
$stmt->execute();
$result = $stmt->get_result();
$cartCount = $result->fetch_assoc()['cart_count'];

$stmt->close();
$conn->close();

echo json_encode(['cart_count' => $cartCount ?: 0]);
?>
