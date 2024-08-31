<?php
include '../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['service_category'];
    $serviceNames = $_POST['service_name']; // Corrected from 'service_names' to 'service_name[]'

    // Check if service names are provided
    if (is_array($serviceNames) && !empty($serviceNames)) {
        // Insert category
        $stmt = $conn->prepare("INSERT INTO ServiceCategories (category_name) VALUES (?)");
        $stmt->bind_param("s", $category);
        
        if ($stmt->execute()) {
            $categoryId = $stmt->insert_id; // Get the ID of the inserted category
            $stmt->close();
            
            // Insert services
            $stmt = $conn->prepare("INSERT INTO Services (category_id, service_name) VALUES (?, ?)");
            foreach ($serviceNames as $serviceName) {
                $serviceName = trim($serviceName); // Trim whitespace
                if (!empty($serviceName)) { // Ensure service name is not empty
                    $stmt->bind_param("is", $categoryId, $serviceName);
                    $stmt->execute();
                }
            }
            $stmt->close();

            // Log the admin action
            $servicesList = implode(", ", array_map('trim', $serviceNames)); // Create a comma-separated list of services
            $action = "Staff added a new service category: $category with services: $servicesList";
            $logStmt = $conn->prepare("INSERT INTO AdminLogs (action) VALUES (?)");
            $logStmt->bind_param("s", $action);
            $logStmt->execute();
            $logStmt->close();

            echo '<script>';
        
            echo 'window.location.href = "../Staff.php";';
            echo '</script>';
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "No services provided.";
    }

    $conn->close();
}
?>
