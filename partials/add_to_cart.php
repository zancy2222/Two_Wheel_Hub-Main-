<?php
session_start();
include 'db_conn.php';

$sessionId = session_id();
$productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$color = isset($_POST['color']) ? $_POST['color'] : '';

$sql = "SELECT * FROM cart WHERE session_id = ? AND product_id = ? AND color = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $sessionId, $productId, $color);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE session_id = ? AND product_id = ? AND color = ?";
} else {

    $sql = "INSERT INTO cart (session_id, product_id, color, quantity) VALUES (?, ?, ?, 1)";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $sessionId, $productId, $color);
$stmt->execute();


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
