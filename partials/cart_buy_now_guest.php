<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['guest_id'])) {
    echo "No products in cart.";
    exit();
}

$session_id = $_SESSION['guest_id'];

// Fetch all cart items
$query_cart = "SELECT g.product_id, g.quantity, p.price, g.color 
               FROM GuestCartOrder g
               JOIN products p ON g.product_id = p.id
               WHERE g.session_id = ?";

$stmt_cart = $conn->prepare($query_cart);
$stmt_cart->bind_param("s", $session_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();

while ($cart_item = $result_cart->fetch_assoc()) {
    $product_id = $cart_item['product_id'];
    $quantity = $cart_item['quantity'];
    $color = $cart_item['color'];
    $price = $cart_item['price'] * $quantity;

    // Insert each cart item into GuestBuyedProducts
    $insert_query = "INSERT INTO GuestBuyedProducts (session_id, product_id, quantity, price, color) 
                     VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("siids", $session_id, $product_id, $quantity, $price, $color);
    $insert_stmt->execute();
}

// Clear the cart after checkout
$delete_query = "DELETE FROM GuestCartOrder WHERE session_id = ?";
$delete_stmt = $conn->prepare($delete_query);
$delete_stmt->bind_param("s", $session_id);
$delete_stmt->execute();

// Redirect to the checkout process page
header("Location: ../Cart_GuestCheckout_Process.php");
exit();
?>
