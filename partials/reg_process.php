<?php
include 'db_conn.php';


// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$complete_address = $_POST['unit_no_house_no_building'] . ', ' . $_POST['street'] . ', ' . $_POST['barangay'] . ', ' . $_POST['city'] . ', ' . $_POST['province'] . ', ' . $_POST['zip_code'];
$unit_no_house_no_building = $_POST['unit_no_house_no_building'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];
$mobile_phone_no = $_POST['mobile_phone_no'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Users (first_name, last_name, email, password, complete_address, unit_no_house_no_building, street, barangay, city, province, zip_code, mobile_phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $first_name, $last_name, $email, $password, $complete_address, $unit_no_house_no_building, $street, $barangay, $city, $province, $zip_code, $mobile_phone_no);

// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
