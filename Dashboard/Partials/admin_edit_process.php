<?php
include '../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    // Start building the SQL query
    $sql = "UPDATE admin_users SET 
            full_name = '$full_name', 
            email = '$email', 
            contact = '$contact', 
            role = '$role'";

    // Check if password is provided
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql .= ", password = '$hashedPassword'";
    }

    // Complete the SQL query
    $sql .= " WHERE id = $id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        
        echo 'window.location.href = "../AdminAcc.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
