<?php
include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $brand = isset($_POST['brand']) ? $_POST['brand'] : null;
    $size = isset($_POST['size']) ? $_POST['size'] : null;
    $volume = isset($_POST['volume']) ? $_POST['volume'] : null;
    $motorcycle = isset($_POST['motorcycle']) ? $_POST['motorcycle'] : null;

    // Handle image upload if a new image is uploaded
    if (!empty($_FILES['productImage']['name'])) {
        $image = $_FILES['productImage']['name'];
        $imageTmpName = $_FILES['productImage']['tmp_name'];
        $imagePath = 'uploads/' . $image;
        move_uploaded_file($imageTmpName, $imagePath);

        // Update product with image
        $stmt = $conn->prepare("UPDATE products SET image=?, category=?, description=?, quantity=?, price=?, brand=?, size=?, volume=?, motorcycle=? WHERE id=?");
        $stmt->bind_param("sssisssssi", $image, $category, $description, $quantity, $price, $brand, $size, $volume, $motorcycle, $productId);
    } else {
        // Update product without changing the image
        $stmt = $conn->prepare("UPDATE products SET category=?, description=?, quantity=?, price=?, brand=?, size=?, volume=?, motorcycle=? WHERE id=?");
        $stmt->bind_param("sssissssi", $category, $description, $quantity, $price, $brand, $size, $volume, $motorcycle, $productId);
    }

    if ($stmt->execute()) {
        header('Location: ../products.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
