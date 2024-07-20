<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['editUserId'];
    $first_name = $_POST['editFirstName'];
    $last_name = $_POST['editLastName'];
    $email = $_POST['editEmail'];
    $unit_no_house_no_building = $_POST['editUnitNo'];
    $street = $_POST['editStreet'];
    $barangay = $_POST['editBarangay'];
    $city = $_POST['editCity'];
    $province = $_POST['editProvince'];
    $zip_code = $_POST['editZipCode'];
    $mobile_phone_no = $_POST['editPhone'];

    $sql = "UPDATE Users 
            SET first_name = ?, last_name = ?, email = ?, 
                unit_no_house_no_building = ?, street = ?, 
                barangay = ?, city = ?, province = ?, 
                zip_code = ?, mobile_phone_no = ? 
            WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssi", 
            $first_name, $last_name, $email, 
            $unit_no_house_no_building, $street, 
            $barangay, $city, $province, 
            $zip_code, $mobile_phone_no, $id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
