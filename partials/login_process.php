<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $stmt = $conn->prepare("SELECT id, full_name, email, password, role FROM admin_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Admin or Staff user found
        $stmt->bind_result($user_id, $full_name, $email, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_role'] = $role;

            // Log login
            if ($role == 'Admin') {
                $action = "Admin ($full_name) has been logged in.";
                header("Location: ../Dashboard/Dashb.php");
            } elseif ($role == 'Staff') {
                $action = "Staff ($full_name) has been logged in.";
                header("Location: ../Staff/Staff.php");
            } else {
                echo '<script>';
                echo 'alert("Invalid user role.");';
                echo 'window.location.href = "../Login.php";';
                echo '</script>';
                exit();
            }

            $stmt_log = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
            $stmt_log->bind_param("s", $action);
            $stmt_log->execute();
            $stmt_log->close();
            
            exit();
        } else {
            echo '<script>';
            echo 'alert("Invalid Email or Password");';
            echo 'window.location.href = "../Login.php";';
            echo '</script>';
            exit();
        }
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
                $stmt_log = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
                $stmt_log->bind_param("s", $action);
                $stmt_log->execute();
                $stmt_log->close();

                header("Location: ../ShopMain.php");
                exit();
            } else {
                echo '<script>';
                echo 'alert("Invalid Email or Password");';
                echo 'window.location.href = "../Login.php";';
                echo '</script>';
                exit();
            }
        } else {
            echo '<script>';
            echo 'alert("Please Register First");';
            echo 'window.location.href = "../Login.php";';
            echo '</script>';
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>
