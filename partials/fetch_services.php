<?php
include 'db_conn.php';

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

$query = "SELECT service_name FROM Services WHERE category_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row['service_name'];
}

echo json_encode($services);

$stmt->close();
$conn->close();
?>
