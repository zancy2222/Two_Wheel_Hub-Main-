<?php
include 'db_conn.php';

$query = "SELECT id, category_name FROM ServiceCategories";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row['id']) . "' data-name='" . htmlspecialchars($row['category_name']) . "'>" . htmlspecialchars($row['category_name']) . "</option>";
    }
} else {
    echo "<option value=''>No categories found</option>";
}

$conn->close();
?>
