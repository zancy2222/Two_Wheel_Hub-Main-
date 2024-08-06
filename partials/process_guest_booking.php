<?php
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_category = $_POST['service_category'];
    $service = $_POST['service'];
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];
    $email_address = $_POST['email_address'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $unit_no_house_no_building = $_POST['unit_no_house_no_building']; 
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $mobile_phone_no = $_POST['mobile_phone_no'];

    $complete_address = $unit_no_house_no_building . ', ' . $street . ', ' . $barangay . ', ' . $city . ', ' . $province . ', ' . $zip_code;

    $stmt = $conn->prepare("INSERT INTO GuestAppointment (service_category, service, preferred_date, preferred_time, email_address, first_name, last_name, complete_address, unit_no_house_no_building, street, barangay, city, province, zip_code, mobile_phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $service_category, $service, $preferred_date, $preferred_time, $email_address, $first_name, $last_name, $complete_address, $unit_no_house_no_building, $street, $barangay, $city, $province, $zip_code, $mobile_phone_no);

    if ($stmt->execute()) {
        header("Location: booking_confirmation.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
