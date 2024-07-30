<?php
session_start();
include 'db_conn.php';

if (!isset($_POST['product_id']) || !isset($_POST['color']) || !isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$productId = $_POST['product_id'];
$color = $_POST['color'];
$userId = $_SESSION['user_id'];

// Check if the item already exists in the cart
$sql = "SELECT * FROM RegisteredCart WHERE user_id = ? AND product_id = ? AND color = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $userId, $productId, $color);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If the item exists, update the quantity
    $sql = "UPDATE RegisteredCart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ? AND color = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $userId, $productId, $color);
} else {
    // If the item does not exist, insert a new row
    $sql = "INSERT INTO RegisteredCart (user_id, product_id, color, quantity) VALUES (?, ?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $userId, $productId, $color);
}

if ($stmt->execute()) {
    // Fetch the updated cart count
    $sql = "SELECT COUNT(*) AS cart_count FROM RegisteredCart WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo json_encode(['cart_count' => $row['cart_count']]);
} else {
    echo json_encode(['error' => 'Failed to add to cart']);
}

$stmt->close();
$conn->close();
?>
