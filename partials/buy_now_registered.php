<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['user_id'])) {
    echo "You need to be logged in to perform this action.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'] ?? 'DEFAULT';
    $user_id = $_SESSION['user_id'];

    // Check which button was clicked
    if ($_POST['action'] === 'add_to_cart') {
        // Add to Cart logic
        $insert_query = "INSERT INTO UserCartOrder (user_id, product_id, quantity, color) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("siis", $user_id, $product_id, $quantity, $color);
        $insert_stmt->execute();

        // Redirect back to the product or cart page
        header("Location: ../cartMain.php");
        exit();

    } elseif ($_POST['action'] === 'buy_now') {
        // Buy Now logic
        // Retrieve the product price
        $query = "SELECT price FROM products WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        // Calculate the total price
        $price = $product['price'] * $quantity;

        // Insert into UserBuyedProducts
        $insert_query = "INSERT INTO UserBuyedProducts (user_id, product_id, quantity, price, color) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("siids", $user_id, $product_id, $quantity, $price, $color);
        $insert_stmt->execute();

        // Redirect to checkout process page
        header("Location: ../UserCheckout_Process.php");
        exit();
    }
}
?>
