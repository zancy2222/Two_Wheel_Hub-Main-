<?php
include 'db_conn.php';

$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch guest orders
$sqlGuest = "SELECT gp.id AS order_id, gp.reference_code, gp.status
             FROM GuestBuyedProducts gp
             WHERE gp.reference_code LIKE '%$searchTerm%'
             ORDER BY gp.purchased_at DESC";
$stmtGuest = $conn->prepare($sqlGuest);
$stmtGuest->execute();
$resultGuest = $stmtGuest->get_result();

$guestOrdersHtml = '';
while ($row = $resultGuest->fetch_assoc()) {
    $guestOrdersHtml .= "<tr>";
    $guestOrdersHtml .= "<td>" . htmlspecialchars($row['order_id']) . "</td>";
    $guestOrdersHtml .= "<td>" . htmlspecialchars($row['reference_code']) . "</td>";
    $guestOrdersHtml .= "<td>" . htmlspecialchars($row['status']) . "</td>";
    $guestOrdersHtml .= "<td class='action-buttons'>
                            <button onclick=\"viewOrder('" . htmlspecialchars($row['order_id']) . "')\">View</button>
                            <button onclick=\"modifyOrder('" . htmlspecialchars($row['order_id']) . "')\">Modify</button>
                          </td>";
    $guestOrdersHtml .= "</tr>";
}

// Fetch registered orders
$sqlRegistered = "SELECT rbp.id AS order_id, rbp.reference_code, rbp.status
                  FROM RegisteredBuyedProducts rbp
                  WHERE rbp.reference_code LIKE '%$searchTerm%'
                  ORDER BY rbp.purchased_at DESC";
$stmtRegistered = $conn->prepare($sqlRegistered);
$stmtRegistered->execute();
$resultRegistered = $stmtRegistered->get_result();

$registeredOrdersHtml = '';
while ($row = $resultRegistered->fetch_assoc()) {
    $registeredOrdersHtml .= "<tr>";
    $registeredOrdersHtml .= "<td>" . htmlspecialchars($row['order_id']) . "</td>";
    $registeredOrdersHtml .= "<td>" . htmlspecialchars($row['reference_code']) . "</td>";
    $registeredOrdersHtml .= "<td>" . htmlspecialchars($row['status']) . "</td>";
    $registeredOrdersHtml .= "<td class='action-buttons'>
                                <button onclick=\"viewOrder('" . htmlspecialchars($row['order_id']) . "')\">View</button>
                                <button onclick=\"modifyOrder('" . htmlspecialchars($row['order_id']) . "')\">Modify</button>
                              </td>";
    $registeredOrdersHtml .= "</tr>";
}

$response = array(
    'guestOrders' => $guestOrdersHtml,
    'registeredOrders' => $registeredOrdersHtml
);

echo json_encode($response);
$conn->close();
?>
