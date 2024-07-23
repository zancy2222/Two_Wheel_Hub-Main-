<?php
require 'Partials/db_conn.php';

$date = $_GET['date'];
$period = $_GET['period'];

$stmt = $conn->prepare("SELECT slots_remaining FROM slots WHERE date = ? AND period = ?");
$stmt->bind_param("ss", $date, $period);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['slots_remaining' => $row['slots_remaining']]);
} else {
    echo json_encode(['slots_remaining' => 20]);
}

$stmt->close();
$conn->close();
?>
