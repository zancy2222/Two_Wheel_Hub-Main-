<?php
include 'partials/db_conn.php';

if (isset($_GET['product_id']) && isset($_GET['color'])) {
    $productId = $_GET['product_id'];
    $color = $_GET['color'];

    $sql = "SELECT size, quantity FROM product_variations WHERE product_id = ? AND color = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $productId, $color);
    $stmt->execute();
    $result = $stmt->get_result();

    $variations = [];
    while ($row = $result->fetch_assoc()) {
        $variations[] = $row;
    }

    $stmt->close();
    $conn->close();

    echo json_encode($variations);
} else {
    echo json_encode([]);
}
?>
