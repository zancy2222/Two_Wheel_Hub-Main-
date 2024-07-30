<?php
session_start();
include 'db_conn.php';

$sessionId = session_id(); 

$sql = "
    SELECT p.product_name, p.description, p.category, pv.size, pv.color, p.price, c.quantity
    FROM cart c
    JOIN products p ON c.product_id = p.id
    JOIN product_variations pv ON c.product_id = pv.product_id AND pv.color = c.color
    WHERE c.session_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sessionId);
$stmt->execute();
$result = $stmt->get_result();

$cartItems = [];
$totalPrice = 0;

while ($row = $result->fetch_assoc()) {
    $itemTotal = $row['price'] * $row['quantity'];
    $totalPrice += $itemTotal;

    $cartItems[] = [
        'product_name' => $row['product_name'],
        'description' => $row['description'],
        'category' => $row['category'],
        'size' => $row['size'],
        'color' => $row['color'],
        'price' => $row['price'],
        'quantity' => $row['quantity'],
        'total' => $itemTotal
    ];
}

$stmt->close();
$conn->close();

echo json_encode(['items' => $cartItems, 'total' => $totalPrice]);
?>
