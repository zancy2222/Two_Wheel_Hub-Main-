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

    // Insert checkout details into RegisteredBuyedProducts with reference code and status
    $sql = "INSERT INTO RegisteredBuyedProducts 
            (user_id, delivery_option, payment_option, total_price, reference_code, status) 
            VALUES 
            (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdss", $userId, $deliveryOption, $paymentOption, $totalPrice, $referenceCode, $status);

    if ($stmt->execute()) {
        $buyedProductId = $stmt->insert_id;

        // Fetch purchased items
        $sql = "SELECT p.id AS product_id, pu.size, pu.color, pu.quantity, p.price
                FROM RegisteredPurchased pu
                JOIN products p ON pu.product_id = p.id
                WHERE pu.user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Insert purchased items into RegisteredBuyedProductItems and update quantities
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $size = $row['size'];
            $color = $row['color'];
            $quantity = $row['quantity'];
            $price = $row['price'];

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

                    //Recipients
                    $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO ALERT STOCKS');
                    $mail->addAddress('danielzanbaltazar.forwork@gmail.com');

                    // Content
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

        // Send the reference code to the user's email
        $userEmailSql = "SELECT email FROM Users WHERE id = ?";
        $userEmailStmt = $conn->prepare($userEmailSql);
        $userEmailStmt->bind_param("i", $userId);
        $userEmailStmt->execute();
        $userEmailResult = $userEmailStmt->get_result();
        $userEmailRow = $userEmailResult->fetch_assoc();
        $userEmail = $userEmailRow['email'];

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; // Replace with your email
            $mail->Password   = 'nqzk mmww mxin ikve'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO');
            $mail->addAddress($userEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Purchase Reference Code';
            $mail->Body    = "Thank you for your purchase!<br>Your reference code is: <strong>$referenceCode</strong>";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Clear purchased items after checkout
        $delete_sql = "DELETE FROM RegisteredPurchased WHERE user_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $userId);
        $delete_stmt->execute();
        $delete_stmt->close();

        // Redirect to a success or confirmation page
        header("Location: ../buyitemsMain.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: buyitemsMain.php");
}
?>
