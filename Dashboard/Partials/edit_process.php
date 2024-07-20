<?php
include '../db_conn.php';

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$unit_no_house_no_building = $_POST['unit_no_house_no_building'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$zip_code = $_POST['zip_code'];
$mobile_phone_no = $_POST['mobile_phone_no'];

$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', password='$password', 
        unit_no_house_no_building='$unit_no_house_no_building', street='$street', barangay='$barangay', city='$city', 
        province='$province', zip_code='$zip_code', mobile_phone_no='$mobile_phone_no' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
