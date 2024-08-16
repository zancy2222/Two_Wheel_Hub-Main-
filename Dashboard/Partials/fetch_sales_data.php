<?php
// db_conn.php - Your database connection file
include('../db_conn.php');

$year = isset($_POST['year']) ? $_POST['year'] : date('Y'); // Default to the current year if not set

// Fetch sales data for guests
$guestQuery = "SELECT MONTH(purchased_at) AS month, SUM(total_price) AS total_sales 
               FROM GuestBuyedProducts 
               WHERE YEAR(purchased_at) = ? 
               GROUP BY MONTH(purchased_at)";
$stmt = $conn->prepare($guestQuery);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

$guestSales = array_fill(1, 12, 0); // Initialize array with zeros for all 12 months

while ($row = $result->fetch_assoc()) {
    $guestSales[$row['month']] = $row['total_sales'];
}

// Fetch sales data for registered users
$registeredQuery = "SELECT MONTH(purchased_at) AS month, SUM(total_price) AS total_sales 
                    FROM RegisteredBuyedProducts 
                    WHERE YEAR(purchased_at) = ? 
                    GROUP BY MONTH(purchased_at)";
$stmt = $conn->prepare($registeredQuery);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

$registeredSales = array_fill(1, 12, 0);

while ($row = $result->fetch_assoc()) {
    $registeredSales[$row['month']] = $row['total_sales'];
}

// Combine guest and registered sales
$totalSales = array_map(function($guest, $registered) {
    return $guest + $registered;
}, $guestSales, $registeredSales);

echo json_encode($totalSales);
?>
