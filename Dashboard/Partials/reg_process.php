<?php
include '../db_conn.php'; // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $sql = "INSERT INTO users (first_name, last_name, email, password, unit_no_house_no_building, street, barangay, city, province, zip_code, mobile_phone_no)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$unit_no_house_no_building', '$street', '$barangay', '$city', '$province', '$zip_code', '$mobile_phone_no')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
