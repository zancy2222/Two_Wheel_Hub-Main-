<?php
require 'Partials/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference_code = $_POST['reference_code'];

    $stmt = $conn->prepare("SELECT * FROM appointments WHERE reference_code = ?");
    $stmt->bind_param("s", $reference_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'Booking confirmed!';
    } else {
        echo 'Invalid reference code. Please check your email and try again.';
    }

    $stmt->close();
    $conn->close();
}
?>
