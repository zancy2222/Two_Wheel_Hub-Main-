<?php
session_start();
include 'db_conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

function generateReferenceCode() {
    $digits = rand(100, 999);
    $letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
    return $digits . $letters;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $deliveryOption = $_POST['deliveryOption'];
    $paymentOption = $_POST['paymentOption'];
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;
    $referenceCode = generateReferenceCode();
    $status = 'Processing'; // Set the initial status
    $purchaseDate = date('Y-m-d H:i:s');

    // Fetch user's full name
    $userNameSql = "SELECT CONCAT(first_name, ' ', last_name) AS full_name, email FROM Users WHERE id = ?";
    $userNameStmt = $conn->prepare($userNameSql);
    $userNameStmt->bind_param("i", $userId);
    $userNameStmt->execute();
    $userNameResult = $userNameStmt->get_result();
    $userNameRow = $userNameResult->fetch_assoc();
    $fullName = $userNameRow['full_name'];
    $userEmail = $userNameRow['email'];

    // Insert checkout details into RegisteredBuyedProducts
    $sql = "INSERT INTO RegisteredBuyedProducts 
            (user_id, delivery_option, payment_option, total_price, reference_code, status, purchased_at) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdsss", $userId, $deliveryOption, $paymentOption, $totalPrice, $referenceCode, $status, $purchaseDate);

    if ($stmt->execute()) {
        $buyedProductId = $stmt->insert_id;

        // Fetch purchased items
        $sql = "SELECT p.id AS product_id, pu.size, pu.color, pu.quantity, p.price, p.product_name
                FROM RegisteredPurchased pu
                JOIN products p ON pu.product_id = p.id
                WHERE pu.user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Insert purchased items into RegisteredBuyedProductItems and update quantities
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $size = $row['size'];
            $color = $row['color'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $productName = $row['product_name'];

            // Insert into RegisteredBuyedProductItems
            $insertItemSql = "INSERT INTO RegisteredBuyedProductItems 
                              (buyed_product_id, product_id, size, color, quantity, price) 
                              VALUES (?, ?, ?, ?, ?, ?)";
            $insertItemStmt = $conn->prepare($insertItemSql);
            $insertItemStmt->bind_param("iissid", $buyedProductId, $productId, $size, $color, $quantity, $price);
            $insertItemStmt->execute();

            // Update product_variations quantity
            $updateQtySql = "UPDATE product_variations SET quantity = quantity - ? 
                             WHERE product_id = ? AND color = ?";
            $updateQtyStmt = $conn->prepare($updateQtySql);
            $updateQtyStmt->bind_param("iis", $quantity, $productId, $color);
            $updateQtyStmt->execute();

            // Check if the quantity has reached 10
            $checkQtySql = "SELECT pv.quantity, p.product_name 
                            FROM product_variations pv 
                            JOIN products p ON pv.product_id = p.id 
                            WHERE pv.product_id = ? AND pv.color = ?";
            $checkQtyStmt = $conn->prepare($checkQtySql);
            $checkQtyStmt->bind_param("is", $productId, $color);
            $checkQtyStmt->execute();
            $checkQtyResult = $checkQtyStmt->get_result();
            $checkQtyRow = $checkQtyResult->fetch_assoc();

            if ($checkQtyRow['quantity'] == 10) {
                // Send email notification for low stock
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; // Replace with your email
                    $mail->Password   = 'nqzk mmww mxin ikve'; // Replace with your email password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO ALERT STOCKS');
                    $mail->addAddress('danielzanbaltazar.forwork@gmail.com');

                    $mail->isHTML(true);
                    $mail->Subject = 'Low Stocks Alert!';
                    $mail->Body    = "Low Stocks Alert!<br>
                                      Product Name: " . htmlspecialchars($checkQtyRow['product_name']) . "<br>
                                      Color: " . htmlspecialchars($color) . "<br>
                                      Quantity: " . htmlspecialchars($checkQtyRow['quantity']) . "<br>";

                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

            $products[] = [
                'product_name' => $productName,
                'color' => $color,
                'size' => $size,
                'quantity' => $quantity,
                'price' => $price
            ];
        }

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
        imagettftext($receiptImage, 16, 0, 20, 130, $black, $fontPath, "Full Name: $fullName");
        imagettftext($receiptImage, 16, 0, 20, 160, $black, $fontPath, "Reference Code: $referenceCode");
        imagettftext($receiptImage, 16, 0, 20, 190, $black, $fontPath, "Delivery Option: $deliveryOption");
        imagettftext($receiptImage, 16, 0, 20, 220, $black, $fontPath, "Payment Option: $paymentOption");
        imagettftext($receiptImage, 16, 0, 20, 250, $black, $fontPath, "Total Price: PHP " . number_format($totalPrice, 2));
        imagettftext($receiptImage, 16, 0, 20, 280, $black, $fontPath, "Purchase Date: $purchaseDate");

        $y = 320;
        foreach ($products as $product) {
            imagettftext($receiptImage, 14, 0, 20, $y, $black, $fontPath, "Product: {$product['product_name']}");
            imagettftext($receiptImage, 14, 0, 20, $y + 30, $black, $fontPath, "Color: {$product['color']} | Size: {$product['size']} | Quantity: {$product['quantity']} | Price: PHP " . number_format($product['price'], 2));
            $y += 60;
        }

        // Output and save image
        $imageFilePath = 'receipts/receipt_' . $buyedProductId . '.png';
        imagepng($receiptImage, $imageFilePath);
        imagedestroy($receiptImage);

        // Save receipt image path to database
        $imageSql = "UPDATE RegisteredBuyedProducts SET receipt_image = ? WHERE id = ?";
        $imageStmt = $conn->prepare($imageSql);
        $imageStmt->bind_param("si", $imageFilePath, $buyedProductId);
        $imageStmt->execute();

        // Send receipt email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; // Replace with your email
            $mail->Password   = 'nqzk mmww mxin ikve'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO');
            $mail->addAddress($userEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Your Purchase Receipt';
            $mail->Body    = "Dear $fullName,<br><br>
                              Thank you for your purchase. Please find your receipt attached.<br><br>
                              Best regards,<br>
                              AV MOTO";

            $mail->addAttachment($imageFilePath);

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Clean up: Remove the receipt image file
        unlink($imageFilePath);

        echo "Purchase successful. A receipt has been sent to your email.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Clear purchased items from RegisteredPurchased
    $deleteSql = "DELETE FROM RegisteredPurchased WHERE user_id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $userId);
    $deleteStmt->execute();
} else {
    echo "You must be logged in to make a purchase.";
}
?>
