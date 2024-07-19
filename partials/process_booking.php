<?php
session_start();
include 'db_conn.php';

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in first.";
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_category = $_POST['service_category'];
    $service = $_POST['service'];
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];

    $stmt = $conn->prepare("INSERT INTO Appointment (user_id, service_category, service, preferred_date, preferred_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $service_category, $service, $preferred_date, $preferred_time);

    if ($stmt->execute()) {
        echo "Appointment successfully booked.";
        header("Location: ../BookingAppointmentMain.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
