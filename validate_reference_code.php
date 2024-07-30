<?php
require 'partials/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference_code = $_POST['reference_code'];

    $stmt = $conn->prepare("SELECT * FROM Appointment WHERE reference_code = ?");
    $stmt->bind_param("s", $reference_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'Success';
    } else {
        echo 'Invalid reference code';
    }

    $stmt->close();
    $conn->close();
}
?>
