<?php
include '../db_conn.php';

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'appointments') {
    $sql = "SELECT * FROM appointments WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>ID: " . $row["id"] . "</p>";
        echo "<p>Selected Date: " . $row["selected_date"] . "</p>";
        echo "<p>Preferred Time: " . $row["preferred_time"] . "</p>";
        echo "<p>Service Category: " . $row["service_category"] . "</p>";
        echo "<p>Service: " . $row["service"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Full Name: " . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</p>";
        echo "<p>Complete Address: " . $row["complete_address"] . "</p>";
        echo "<p>Unit No: " . $row["unit_no"] . "</p>";
        echo "<p>Street: " . $row["street"] . "</p>";
        echo "<p>Barangay: " . $row["barangay"] . "</p>";
        echo "<p>City: " . $row["city"] . "</p>";
        echo "<p>Province: " . $row["province"] . "</p>";
        echo "<p>Zip Code: " . $row["zip_code"] . "</p>";
        echo "<p>Phone: " . $row["phone"] . "</p>";
        echo "<p>Reference Code: " . $row["reference_code"] . "</p>";
    } else {
        echo "No details found";
    }
} else if ($type == 'Appointment') {
    $sql = "SELECT a.*, u.first_name, u.last_name, u.email, u.complete_address, u.mobile_phone_no 
            FROM Appointment a 
            JOIN Users u ON a.user_id = u.id 
            WHERE appointment_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>ID: " . $row["appointment_id"] . "</p>";
        echo "<p>Selected Date: " . $row["selected_date"] . "</p>";
        echo "<p>Preferred Time: " . $row["preferred_time"] . "</p>";
        echo "<p>Service Category: " . $row["service_category"] . "</p>";
        echo "<p>Service: " . $row["service"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Full Name: " . $row["first_name"] . " " . $row["last_name"] . "</p>";
        echo "<p>Complete Address: " . $row["complete_address"] . "</p>";
        echo "<p>Mobile Phone No.: " . $row["mobile_phone_no"] . "</p>";
        echo "<p>Reference Code: " . $row["reference_code"] . "</p>";
    } else {
        echo "No details found";
    }
}

$conn->close();
?>
