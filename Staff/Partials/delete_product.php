<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];

    // Fetch product name for logging
    $stmt = $conn->prepare("SELECT product_name FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->bind_result($productName);
    $stmt->fetch();
    $stmt->close();

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        // Log the admin action
        $action = "Staff deleted product: " . $productName;
        $logStmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
        $logStmt->bind_param("s", $action);
        $logStmt->execute();
        $logStmt->close();

        echo '<script>';
        
        echo 'window.location.href = "../Staff.php";';
        echo '</script>';
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
