<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];

    // Prepare the SQL statement to delete the product
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
