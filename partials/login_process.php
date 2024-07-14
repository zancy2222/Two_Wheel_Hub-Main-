<?php
session_start();
include 'db_conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Store user ID in session
            $_SESSION['user_id'] = $user_id;
            header("Location: ../ShopMain.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "You need to register first.";
    }
    
    $stmt->close();
}

$conn->close();
?>
