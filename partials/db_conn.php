<?php
$servername = "localhost"; // change if necessary
$username = "root"; // change if necessary
$password = ""; // change if necessary
$dbname = "AV_MOTO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
