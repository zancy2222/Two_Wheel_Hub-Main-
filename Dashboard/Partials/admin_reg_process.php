<?php
// Include the database connection file
include '../db_conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $role = trim($_POST['role']);
    $password = trim($_POST['password']);

    // Validate the input data (this can be expanded with more validation as needed)
    if (empty($full_name) || empty($email) || empty($contact) || empty($role) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO admin_users (full_name, email, contact, role, password) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind the variables to the prepared statement
        $stmt->bind_param("sssss", $full_name, $email, $contact, $role, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>';
        
            echo 'window.location.href = "../AdminAcc.php";';
            echo '</script>';
            exit();
        } else {
            // If there's an error, return an error message
            echo "Error: Could not execute the query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // If there's an error preparing the statement, return an error message
        echo "Error: Could not prepare the query: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
