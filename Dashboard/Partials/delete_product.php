<?php
// Include database connection
include '../db_conn.php';

// Check if 'id' parameter is provided in the query string
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Prepare SQL statement to delete the product
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);

        if ($stmt->execute()) {
            // If the product is successfully deleted
            echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
        } else {
            // If there was an error deleting the product
            echo json_encode(['success' => false, 'message' => 'Error deleting product: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        // If no ID is provided, return an error message
        echo json_encode(['success' => false, 'message' => 'No product ID provided']);
    }
} else {
    // If the request method is not DELETE, return an error message
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

// Close database connection
$conn->close();
?>
