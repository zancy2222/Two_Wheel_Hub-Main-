<?php
// Database connection
include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $category = $_POST['category'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Retrieve brand based on the selected category
    $brand = null;
    $size = null;
    $volume = null;
    $motorcycle = null;

    switch ($category) {
        case 'Rear Suspension':
            $brand = $_POST['brandRearSuspension'];
            $motorcycle = $_POST['motorcycleRearSuspension'];
            break;
        case 'CVT':
            $brand = $_POST['brandCVT'];
            $motorcycle = $_POST['motorcycleCVT'];
            break;
        case 'Tires':
            $brand = $_POST['brandTires'];
            $size = $_POST['sizeTires'];
            break;
        case 'Oil':
            $brand = $_POST['brandOil'];
            $volume = $_POST['volumeOil'];
            break;
        case 'Others':
            $brand = $_POST['brandOthers'];
            break;
        // Add more cases if needed
    }

    // Handle image upload
    $image = $_FILES['productImage']['name'];
    $imageTmpName = $_FILES['productImage']['tmp_name'];
    $imagePath = 'uploads/' . $image;
    move_uploaded_file($imageTmpName, $imagePath);

    // Insert product into database using MySQLi
    $stmt = $conn->prepare("INSERT INTO products (image, category, description, quantity, price, brand, size, volume, motorcycle) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssss", $image, $category, $description, $quantity, $price, $brand, $size, $volume, $motorcycle);

    if ($stmt->execute()) {
        $productId = $conn->insert_id;

        // Handle multiple colors for Rear Suspension
        if (isset($_POST['colorRearSuspension'])) {
            foreach ($_POST['colorRearSuspension'] as $color) {
                $colorStmt = $conn->prepare("INSERT INTO product_colors (product_id, color) VALUES (?, ?)");
                $colorStmt->bind_param("is", $productId, $color);
                $colorStmt->execute();
            }
        }

        // Redirect or success message
        header('Location: ../Products.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
