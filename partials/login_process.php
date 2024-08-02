<?php
session_start();
include 'db_conn.php';

$defaultAdminEmail = 'AVMOTO_Admin@gmail.com';
$defaultAdminPassword = 'avmotoadminpassword';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    if ($email === $defaultAdminEmail && $password === $defaultAdminPassword) {
        // Admin login successful
        $_SESSION['user_id'] = 'admin'; // Set a special session identifier for the admin

        // Log admin login
        $action = "Admin has been logged in.";
        $stmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
        $stmt->bind_param("s", $action);
        $stmt->execute();
        $stmt->close();

        header("Location: ../Dashboard/Dashb.php");
        exit();
    } else {
        // Check for regular user login
        $stmt = $conn->prepare("SELECT id, first_name, last_name, password FROM Users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $first_name, $last_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;

                // Log user login
                $action = "User ($first_name $last_name) has been logged in.";
                $stmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
                $stmt->bind_param("s", $action);
                $stmt->execute();
                $stmt->close();

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
}

$conn->close();
?>
