<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['editProductId'];
    $productName = $_POST['editProductName'];
    $description = $_POST['editDescription'];
    $category = $_POST['editCategory'];
    $size = $_POST['editSize'];
    $color = $_POST['editColor'];
    $price = preg_replace('/[^0-9.]/', '', $_POST['editPrice']); // Strip out non-numeric characters

    // Handle file upload
    if (!empty($_FILES['editProductImage']['name'])) {
        $targetDir = "Partials/uploads/";
        $targetFile = $targetDir . basename($_FILES["editProductImage"]["name"]);
        if (move_uploaded_file($_FILES["editProductImage"]["tmp_name"], $targetFile)) {
            $productImage = basename($_FILES["editProductImage"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        // If no new image is uploaded, keep the old image
        $sql = "SELECT product_image FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $productImage = $row['product_image'];
    }

    // Update the product in the database
    $sql = "UPDATE products SET product_name=?, description=?, category=?, size=?, color=?, price=?, product_image=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $productName, $description, $category, $size, $color, $price, $productImage, $productId);

    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
