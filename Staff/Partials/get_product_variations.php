<?php
include '../db_conn.php';

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];

    $sql = "SELECT color, size, quantity FROM product_variations WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    $variations = [];
    while ($row = $result->fetch_assoc()) {
        $variations[] = $row;
    }

    echo json_encode($variations);

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
