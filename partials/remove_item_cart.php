<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['guest_id'])) {
    echo "No products in cart.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $session_id = $_SESSION['guest_id'];
    $item_id = intval($_POST['item_id']);

    // Prepare and execute delete statement
    $delete_query = "DELETE FROM GuestCartOrder WHERE session_id = ? AND id = ?";
    $stmt_delete = $conn->prepare($delete_query);
    $stmt_delete->bind_param("si", $session_id, $item_id);

    if ($stmt_delete->execute()) {
        // Optionally, fetch the remaining cart items to update the display
        $query_cart = "SELECT p.image, p.description, g.quantity, p.price, g.color, g.id AS g_id
                       FROM GuestCartOrder g
                       JOIN products p ON g.product_id = p.id
                       WHERE g.session_id = ?";
        $stmt_cart = $conn->prepare($query_cart);
        $stmt_cart->bind_param("s", $session_id);
        $stmt_cart->execute();
        $result_cart = $stmt_cart->get_result();
        $cart_products = $result_cart->fetch_all(MYSQLI_ASSOC);

        // Redirect or display success message
        header("Location: ../cart.php"); // Redirect to the cart page to see the changes
        exit();
    } else {
        echo "Failed to remove item from cart.";
    }
} else {
    echo "Invalid request.";
}
?>
