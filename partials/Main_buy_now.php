<?php
include 'db_conn.php';
include 'session.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];
$color = $_POST['color'];

// Validate and sanitize input
$productId = intval($productId);
$color = $conn->real_escape_string($color);

// Fetch size from product_variations based on the selected color
$sizeQuery = "SELECT size FROM product_variations WHERE product_id = ? AND color = ? LIMIT 1";
$sizeStmt = $conn->prepare($sizeQuery);
$sizeStmt->bind_param("is", $productId, $color);
$sizeStmt->execute();
$sizeResult = $sizeStmt->get_result();
$size = $sizeResult->fetch_assoc()['size'];
$sizeStmt->close();

// Insert purchase data into the RegisteredPurchased table
$sql = "INSERT INTO RegisteredPurchased (user_id, product_id, color, size, quantity, purchased_at)
        VALUES (?, ?, ?, ?, 1, NOW())";  // Set quantity to 1 for the purchase
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $userId, $productId, $color, $size);

if ($stmt->execute()) {
    $response = ['success' => true];
} else {
    $response = ['success' => false, 'error' => $stmt->error];
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
