<?php
// Include database connection
include '../db_conn.php';

// Check if 'id' parameter is provided in the query string
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Prepare SQL statement to fetch product details
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if product exists
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Fetch colors associated with the product
        $stmt_colors = $conn->prepare("SELECT color FROM product_colors WHERE product_id = ?");
        $stmt_colors->bind_param("i", $productId);
        $stmt_colors->execute();
        $result_colors = $stmt_colors->get_result();

        $colors = [];
        while ($row = $result_colors->fetch_assoc()) {
            $colors[] = $row['color'];
        }

        // Append colors to product details
        $product['colors'] = $colors;

        // Return product data as JSON
        echo json_encode($product);
    } else {
        // If no product found, return an error message
        echo json_encode(['error' => 'Product not found']);
    }

    // Close statements
    $stmt->close();
    $stmt_colors->close();
} else {
    // If no ID is provided, return an error message
    echo json_encode(['error' => 'No product ID provided']);
}

// Close database connection
$conn->close();
?>
