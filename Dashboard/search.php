<?php
include 'db_conn.php';

$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = 5;
$offset = ($page - 1) * $rowsPerPage;

$totalRowsSql = "SELECT COUNT(*) as total FROM products WHERE product_name LIKE '%$searchTerm%'";
$totalRowsResult = $conn->query($totalRowsSql);
$totalRows = $totalRowsResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $rowsPerPage);

$sql = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%' LIMIT $offset, $rowsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td><img src='Partials/uploads/" . $row["product_image"] . "' alt='" . $row["product_name"] . "' width='150'></td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";

        echo "<td>";
        $productId = $row["id"];
        $variationsSql = "SELECT * FROM product_variations WHERE product_id = $productId";
        $variationsResult = $conn->query($variationsSql);
        if ($variationsResult->num_rows > 0) {
            while ($variation = $variationsResult->fetch_assoc()) {
                echo "Color: " . $variation["color"] . " - Size: " . $variation["size"] . "<br>";
            }
        }
        echo "</td>";

        echo "<td>";
        if ($variationsResult->num_rows > 0) {
            $variationsResult->data_seek(0); // Reset result pointer to beginning
            while ($variation = $variationsResult->fetch_assoc()) {
                echo $variation["quantity"] . "<br>";
            }
        }
        echo "</td>";

        echo "<td>₱" . $row["price"] . "</td>";
        echo "<td class='action-buttons'>
                <button class='edit-button'>Edit</button>
                <button class='delete-button' data-id='" . $row["id"] . "'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No products found</td></tr>";
}
$conn->close();
?>
