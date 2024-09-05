<?php
session_start();
include 'db_conn.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "No products in cart.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch all cart items
$query_cart = "SELECT c.product_id, c.quantity, p.price, c.color 
               FROM UserCartOrder c
               JOIN products p ON c.product_id = p.id
               WHERE c.user_id = ?";

$stmt_cart = $conn->prepare($query_cart);
$stmt_cart->bind_param("i", $user_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

while ($cart_item = $result_cart->fetch_assoc()) {
    $product_id = $cart_item['product_id'];
    $quantity = $cart_item['quantity'];
    $color = $cart_item['color'];
    $price = $cart_item['price'] * $quantity;

    // Insert each cart item into UserBuyedProducts
    $insert_query = "INSERT INTO UserBuyedProducts (user_id, product_id, quantity, price, color) 
                     VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("iiids", $user_id, $product_id, $quantity, $price, $color);
    $insert_stmt->execute();
}

// Clear the cart after checkout
$delete_query = "DELETE FROM UserCartOrder WHERE user_id = ?";
$delete_stmt = $conn->prepare($delete_query);
$delete_stmt->bind_param("i", $user_id);
$delete_stmt->execute();

// Redirect to the checkout process page
header("Location: ../Cart_UserCheckout_Process.php");
exit();
?>
