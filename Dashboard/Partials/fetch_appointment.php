<?php
include '../db_conn.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = 5;
$offset = ($page - 1) * $rowsPerPage;

$sqlTotal = "SELECT COUNT(*) AS total FROM Appointment";
$resultTotal = $conn->query($sqlTotal);
$totalRows = $resultTotal->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $rowsPerPage);

$sql = "SELECT appointment_id AS id, reference_code FROM Appointment LIMIT $offset, $rowsPerPage";
$result = $conn->query($sql);

$rows = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows .= "<tr>";
        $rows .= "<td>" . $row["id"] . "</td>";
        $rows .= "<td>" . $row["reference_code"] . "</td>";
        $rows .= "<td class='action-buttons'>
                    <button class='view-button' onclick='viewDetails(" . $row["id"] . ", \"Appointment\")'>View</button>
                    <button class='delete-button' data-id='" . $row["id"] . "'>Delete</button>
                  </td>";
        $rows .= "</tr>";
    }
} else {
    $rows .= "<tr><td colspan='3'>No appointments found</td></tr>";
}

echo json_encode(['rows' => $rows, 'totalPages' => $totalPages]);

$conn->close();
?>
