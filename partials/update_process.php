<?php
include 'db_conn.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $unit_no_house_no_building = $_POST['unit_no_house_no_building'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $mobile_phone_no = $_POST['mobile_phone_no'];

    // Update password only if it's provided
    if (!empty($password)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->prepare("UPDATE Users SET first_name=?, last_name=?, email=?, password=?, unit_no_house_no_building=?, street=?, barangay=?, city=?, province=?, zip_code=?, mobile_phone_no=? WHERE id=?");
        $query->bind_param("sssssssssssi", $first_name, $last_name, $email, $password_hashed, $unit_no_house_no_building, $street, $barangay, $city, $province, $zip_code, $mobile_phone_no, $user_id);
    } else {
        $query = $conn->prepare("UPDATE Users SET first_name=?, last_name=?, email=?, unit_no_house_no_building=?, street=?, barangay=?, city=?, province=?, zip_code=?, mobile_phone_no=? WHERE id=?");
        $query->bind_param("ssssssssssi", $first_name, $last_name, $email, $unit_no_house_no_building, $street, $barangay, $city, $province, $zip_code, $mobile_phone_no, $user_id);
    }

    if ($query->execute()) {
        echo "Details updated successfully.";
        header("Location: ../Accounts.php");
        exit();
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $conn->close();
}
?>
