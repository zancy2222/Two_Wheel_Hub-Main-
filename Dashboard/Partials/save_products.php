<?php
include '../db_conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    
    $targetDir = "uploads/";
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

    $sql = "INSERT INTO products (product_image, product_name, description, category, size, color, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $productImage, $productName, $description, $category, $size, $color, $price);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
