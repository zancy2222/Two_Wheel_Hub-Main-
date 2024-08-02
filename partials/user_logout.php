<?php
session_start();
include 'db_conn.php';

// Check if a user session exists
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user details for logging purposes
    $stmt = $conn->prepare("SELECT first_name, last_name FROM Users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    $stmt->fetch();
    $stmt->close();

    // Log user logout
    $action = "User ($first_name $last_name) has been logged out.";
    $stmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
    $stmt->bind_param("s", $action);
    $stmt->execute();
    $stmt->close();

    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();

    header("Location: ../Login.php"); // Adjust path as necessary
    exit();
} else {
    // Redirect to login if not logged in
    header("Location: ../Login.php"); // Adjust path as necessary
    exit();
}

$conn->close();
?>
