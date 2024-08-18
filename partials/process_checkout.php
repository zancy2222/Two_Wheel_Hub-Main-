<?php
session_start();
include 'db_conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sessionId = session_id();
    $email = $_POST['email'];
    $deliveryOption = $_POST['deliveryOption'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipCode = $_POST['zipCode'];
    $phone = $_POST['phone'];
    $paymentOption = $_POST['paymentOption'];
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;

    // Generate the reference code (3 digits + 3 letters)
    $referenceCode = strtoupper(substr(md5(time()), 0, 3)) . rand(100, 999);
    $status = 'Processing'; // Set the initial status
    $purchaseDate = date('Y-m-d H:i:s');

    $sql = "INSERT INTO GuestBuyedProducts 
            (session_id, email, delivery_option, first_name, middle_name, last_name, address, street, barangay, city, province, zip_code, phone, payment_option, total_price, reference_code, status, purchased_at) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssdsss", $sessionId, $email, $deliveryOption, $firstName, $middleName, $lastName, $address, $street, $barangay, $city, $province, $zipCode, $phone, $paymentOption, $totalPrice, $referenceCode, $status, $purchaseDate);

    if ($stmt->execute()) {
        $buyedProductId = $stmt->insert_id;

        $sql = "SELECT p.id AS product_id, p.product_name, pu.size, pu.color, pu.quantity, p.price
                FROM purchased pu
                JOIN products p ON pu.product_id = p.id
                WHERE pu.session_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sessionId);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];

        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $size = $row['size'];
            $color = $row['color'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $productName = $row['product_name'];

            $insertItemSql = "INSERT INTO GuestBuyedProductItems 
                              (buyed_product_id, product_id, size, color, quantity, price) 
                              VALUES (?, ?, ?, ?, ?, ?)";
            $insertItemStmt = $conn->prepare($insertItemSql);
            $insertItemStmt->bind_param("iissid", $buyedProductId, $productId, $size, $color, $quantity, $price);
            $insertItemStmt->execute();

            $products[] = [
                'product_name' => $productName,
                'color' => $color,
                'size' => $size,
                'quantity' => $quantity,
                'price' => $price
            ];

            // Update quantity and check for low stock alert
            $updateQtySql = "UPDATE product_variations SET quantity = quantity - ? WHERE product_id = ? AND color = ?";
            $updateQtyStmt = $conn->prepare($updateQtySql);
            $updateQtyStmt->bind_param("iis", $quantity, $productId, $color);
            $updateQtyStmt->execute();

            $checkQtySql = "SELECT pv.quantity, p.product_name FROM product_variations pv JOIN products p ON pv.product_id = p.id WHERE pv.product_id = ? AND pv.color = ?";
            $checkQtyStmt = $conn->prepare($checkQtySql);
            $checkQtyStmt->bind_param("is", $productId, $color);
            $checkQtyStmt->execute();
            $checkQtyResult = $checkQtyStmt->get_result();
            $checkQtyRow = $checkQtyResult->fetch_assoc();

            if ($checkQtyRow['quantity'] == 10) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; 
                    $mail->Password   = 'nqzk mmww mxin ikve'; 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO ALERT STOCKS');
                    $mail->addAddress('danielzanbaltazar.forwork@gmail.com');

                    $mail->isHTML(true);
                    $mail->Subject = 'Low Stocks Alert!';
                    $mail->Body    = "Low Stocks Alert!<br>Product Name: " . htmlspecialchars($checkQtyRow['product_name']) . "<br>Color: " . htmlspecialchars($color) . "<br>Quantity: " . htmlspecialchars($checkQtyRow['quantity']) . "<br>";

                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }

        $delete_sql = "DELETE FROM purchased WHERE session_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $sessionId);
        $delete_stmt->execute();
        $delete_stmt->close();

        // Insert notification for low stock alert
        $notificationSql = "INSERT INTO notifications (message, is_read, created_at) VALUES (?, 0, NOW())";
        $notificationStmt = $conn->prepare($notificationSql);
        $notificationMessage = "Low Stocks Alert! Product Name: " . htmlspecialchars($checkQtyRow['product_name']) . ", Color: " . htmlspecialchars($color) . ", Quantity: " . htmlspecialchars($checkQtyRow['quantity']);
        $notificationStmt->bind_param("s", $notificationMessage);
        $notificationStmt->execute();

        // Generate digital receipt image
        $imageWidth = 600;
        $imageHeight = 450 + (count($products) * 50); // Dynamic height based on product count
        $receiptImage = imagecreatetruecolor($imageWidth, $imageHeight);

        // Colors
        $white = imagecolorallocate($receiptImage, 255, 255, 255);
        $black = imagecolorallocate($receiptImage, 0, 0, 0);
        $gray = imagecolorallocate($receiptImage, 200, 200, 200);

        // Fill background
        imagefilledrectangle($receiptImage, 0, 0, $imageWidth, $imageHeight, $white);

        // Add text
        $fontPath = 'League_Spartan/LeagueSpartan-VariableFont_wght.ttf'; // Path to the font file

        // Store name and title
        imagettftext($receiptImage, 24, 0, 20, 50, $black, $fontPath, "AV MOTO");
        imagettftext($receiptImage, 20, 0, 20, 90, $black, $fontPath, "Digital Receipt");

        // Details
        imagettftext($receiptImage, 16, 0, 20, 130, $black, $fontPath, "Reference Code: $referenceCode");
        imagettftext($receiptImage, 16, 0, 20, 160, $black, $fontPath, "Full Name: $firstName $middleName $lastName");
        imagettftext($receiptImage, 16, 0, 20, 190, $black, $fontPath, "Delivery Option: $deliveryOption");
        imagettftext($receiptImage, 16, 0, 20, 220, $black, $fontPath, "Payment Option: $paymentOption");
        imagettftext($receiptImage, 16, 0, 20, 250, $black, $fontPath, "Total Price: PHP " . number_format($totalPrice, 2));
        imagettftext($receiptImage, 16, 0, 20, 280, $black, $fontPath, "Purchase Date: $purchaseDate");

        $y = 320;
        foreach ($products as $product) {
            imagettftext($receiptImage, 14, 0, 20, $y, $black, $fontPath, "Product: {$product['product_name']}");
            imagettftext($receiptImage, 14, 0, 20, $y + 30, $black, $fontPath, "Color: {$product['color']} | Quantity: {$product['quantity']} | Price: PHP " . number_format($product['price'], 2));
            $y += 60;
        }

        // Output image as a file
        $imageFileName = 'receipt_' . time() . '.png';
        $imageFilePath = 'receipts/' . $imageFileName;
        imagepng($receiptImage, $imageFilePath);
        imagedestroy($receiptImage);

        // Send email with receipt attached
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; 
            $mail->Password   = 'nqzk mmww mxin ikve'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your Purchase Receipt';
            $mail->Body    = 'Thank you for your purchase! Please find your receipt attached.';

            $mail->addAttachment($imageFilePath); // Attach the receipt image

            $mail->send();
            header("Location: ../AllProducts.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
