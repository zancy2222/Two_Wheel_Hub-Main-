<?php
include '../db_conn.php';

$query = "
    SELECT 
        sc.id AS category_id, 
        sc.category_name AS category_name, 
        GROUP_CONCAT(s.service_name SEPARATOR ', ') AS services
    FROM ServiceCategories sc
    LEFT JOIN Services s ON sc.id = s.category_id
    GROUP BY sc.id
";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['services']) . "</td>";
        echo "<td class='action-buttons'>";
        echo "<button class='edit-button'>Edit</button>";
        // echo "<button class='delete-button'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}

$conn->close();
?>
