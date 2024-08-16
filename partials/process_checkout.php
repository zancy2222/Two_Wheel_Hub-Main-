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

    $sql = "INSERT INTO GuestBuyedProducts 
            (session_id, email, delivery_option, first_name, middle_name, last_name, address, street, barangay, city, province, zip_code, phone, payment_option, total_price, reference_code, status) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssdss", $sessionId, $email, $deliveryOption, $firstName, $middleName, $lastName, $address, $street, $barangay, $city, $province, $zipCode, $phone, $paymentOption, $totalPrice, $referenceCode, $status);

    if ($stmt->execute()) {
        $buyedProductId = $stmt->insert_id;

        $sql = "SELECT p.id AS product_id, pu.size, pu.color, pu.quantity, p.price
                FROM purchased pu
                JOIN products p ON pu.product_id = p.id
                WHERE pu.session_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sessionId);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $size = $row['size'];
            $color = $row['color'];
            $quantity = $row['quantity'];
            $price = $row['price'];

            $insertItemSql = "INSERT INTO GuestBuyedProductItems 
                              (buyed_product_id, product_id, size, color, quantity, price) 
                              VALUES (?, ?, ?, ?, ?, ?)";
            $insertItemStmt = $conn->prepare($insertItemSql);
            $insertItemStmt->bind_param("iissid", $buyedProductId, $productId, $size, $color, $quantity, $price);
            $insertItemStmt->execute();

            $updateQtySql = "UPDATE product_variations SET quantity = quantity - ? 
                             WHERE product_id = ? AND color = ?";
            $updateQtyStmt = $conn->prepare($updateQtySql);
            $updateQtyStmt->bind_param("iis", $quantity, $productId, $color);
            $updateQtyStmt->execute();

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
                    $mail->Body    = "Low Stocks Alert!<br>
                          Product Name: " . htmlspecialchars($checkQtyRow['product_name']) . "<br>
                          Color: " . htmlspecialchars($color) . "<br>
                          Quantity: " . htmlspecialchars($checkQtyRow['quantity']) . "<br>";

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

        // Send email with the reference code
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
            $mail->Subject = 'Your Purchase Reference Code';
            $mail->Body    = "Thank you for your purchase!<br>Your reference code is: <strong>$referenceCode</strong>";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("Location: ../buyitems.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: BuyItems.php");
}
?>
