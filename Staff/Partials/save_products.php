<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $colors = $_POST['color'];
    $sizes = $_POST['size'];
    $quantities = $_POST['quantity'];

    $targetDir = "../../Dashboard/Partials/uploads/";
    $productImage = basename($_FILES["productImage"]["name"]);
    $targetFilePath = $targetDir . $productImage;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    if ($_FILES["productImage"]["size"] > 500000) {
        die("Sorry, your file is too large.");
    }

    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (!move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)) {
        die("Sorry, there was an error uploading your file.");
    }

    $sql = "INSERT INTO products (product_image, product_name, description, category, price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $productImage, $productName, $description, $category, $price);

    if ($stmt->execute()) {
        $productId = $stmt->insert_id;
        $stmt->close();

        $sql = "INSERT INTO product_variations (product_id, color, size, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        foreach ($colors as $index => $color) {
            $size = $sizes[$index];
            $quantity = $quantities[$index];
            $stmt->bind_param("isss", $productId, $color, $size, $quantity);
            $stmt->execute();
        }

        $stmt->close();

        // Log the admin action
        $action = "Staff added product: " . $productName;
        $sql = "INSERT INTO AdminLogs (action) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $action);
        $stmt->execute();
        $stmt->close();

        echo '<script>';
        
        echo 'window.location.href = "../Staff.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
