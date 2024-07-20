<?php
include '../db_conn.php';

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
