<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['editProductId'];
    $productName = $_POST['editProductName'];
    $description = $_POST['editDescription'];
    $category = $_POST['editCategory'];
    $price = $_POST['editPrice'];
    $colors = $_POST['editColor'];
    $sizes = $_POST['editSize'];
    $quantities = $_POST['editQuantity'];

    // Handle file upload
    if (!empty($_FILES['editProductImage']['name'])) {
        $targetDir = "../../Dashboard/Partials/uploads/";
        $productImage = basename($_FILES["editProductImage"]["name"]);
        $targetFilePath = $targetDir . $productImage;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["editProductImage"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        if ($_FILES["editProductImage"]["size"] > 500000) {
            die("Sorry, your file is too large.");
        }

        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (!in_array($imageFileType, $allowedTypes)) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (!move_uploaded_file($_FILES["editProductImage"]["tmp_name"], $targetFilePath)) {
            die("Sorry, there was an error uploading your file.");
        }

        $sql = "UPDATE products SET product_image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $productImage, $productId);
        $stmt->execute();
        $stmt->close();
    }

    // Update product details
    $sql = "UPDATE products SET product_name = ?, description = ?, category = ?, price = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssdi", $productName, $description, $category, $price, $productId);
        if ($stmt->execute()) {
            $stmt->close();

            // Delete existing variations
            $sql = "DELETE FROM product_variations WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $stmt->close();

            // Insert new variations
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
            $action = "Staff edited product: " . $productName;
            $logStmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
            $logStmt->bind_param("s", $action);
            $logStmt->execute();
            $logStmt->close();

            echo '<script>';
        
            echo 'window.location.href = "../Products.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
