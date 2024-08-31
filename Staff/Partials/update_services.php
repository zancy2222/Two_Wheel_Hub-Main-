<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryId = $_POST['editCategoryId'];
    $categoryName = $_POST['editCategoryName'];
    $services = $_POST['editServices'];

    // Update category name
    $sql = "UPDATE ServiceCategories SET category_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $categoryName, $categoryId);
    $stmt->execute();
    $stmt->close();

    // Delete existing services for the category
    $sql = "DELETE FROM Services WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $stmt->close();

    // Insert new services
    $servicesArray = explode(',', $services);
    $sql = "INSERT INTO Services (service_name, category_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    foreach ($servicesArray as $service) {
        $service = trim($service);
        if (!empty($service)) {
            $stmt->bind_param("si", $service, $categoryId);
            $stmt->execute();
        }
    }
    $stmt->close();

    // Log the admin action
    $servicesList = implode(", ", array_map('trim', $servicesArray)); // Create a comma-separated list of services
    $action = "Staff edited category: $categoryName and updated services to: $servicesList";
    $logStmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
    $logStmt->bind_param("s", $action);
    $logStmt->execute();
    $logStmt->close();

    echo '<script>';
        
    echo 'window.location.href = "../Staff.php";';
    echo '</script>';
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
