<?php
session_start();
include 'db_conn.php';

// Assuming you have a table to store notifications
$sql = "SELECT * FROM notifications WHERE is_read = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
$count = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
        $count++;
    }
}

// Return the notifications count and messages
echo json_encode([
    'count' => $count,
    'message' => implode('<br>', array_map(function($n) { 
        return htmlspecialchars($n['message']); 
    }, $notifications))
]);

$conn->close();
?>
