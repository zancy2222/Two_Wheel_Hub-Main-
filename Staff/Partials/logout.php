<?php
session_start();
include '../db_conn.php';

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === 'admin') {
    // Log admin logout
    $action = "Admin has been logged out.";
    $stmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
    $stmt->bind_param("s", $action);
    $stmt->execute();
    $stmt->close();

    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();

    header("Location: ../../login.php"); // Adjust path as necessary
    exit();
} else {
    // Redirect to login if not logged in or not an admin
    header("Location: ../../login.php"); // Adjust path as necessary
    exit();
}

$conn->close();
?>
