<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'db_conn.php';

function generateReferenceCode() {
    $digits = rand(100, 999);
    $letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
    return $digits . $letters;
}

function generateReceiptImage($data) {
    // Create a new image
    $image = imagecreatetruecolor(400, 300);

    // Set background color
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 400, 300, $bgColor);

    // Set text color
    $textColor = imagecolorallocate($image, 0, 0, 0);

    // Path to the font file
    $fontPath = 'League_Spartan/LeagueSpartan-VariableFont_wght.ttf';
    $fontSize = 12; // Adjust font size as needed
    $yPosition = 20;

    // Add text to image
    imagettftext($image, $fontSize, 0, 20, $yPosition, $textColor, $fontPath, "AV MOTO");
    $yPosition += 30;
    imagettftext($image, $fontSize, 0, 20, $yPosition, $textColor, $fontPath, "Digital Receipt");
    $yPosition += 40;

    foreach ($data as $label => $value) {
        imagettftext($image, $fontSize, 0, 20, $yPosition, $textColor, $fontPath, "$label: $value");
        $yPosition += 30;
    }

    // Save the image
    $receiptPath = 'receipts/receipt_' . $data['Reference Code'] . '.png';
    imagepng($image, $receiptPath);
    imagedestroy($image);

    return $receiptPath;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_date = $_POST['selected_date'];
    $preferred_time = $_POST['preferred_time'];
    $service_category_id = $_POST['service_category'];
    $service = $_POST['service'];
    $user_id = $_POST['user_id']; // Assuming user ID is provided
    $email = $_POST['email']; // Assuming email is provided for notifications
    $reference_code = generateReferenceCode();

    // Validate reference code
    $stmt = $conn->prepare("SELECT * FROM appointment WHERE reference_code = ?");
    $stmt->bind_param("s", $reference_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'Error: Reference code already used.';
        exit;
    }

    // Convert date format and determine period
    $date = $selected_date; // Already in YYYY-MM-DD format
    $period = strpos($preferred_time, 'AM') !== false ? 'AM' : 'PM';

    $conn->begin_transaction();
    try {
        // Check and update slot availability
        $stmt = $conn->prepare("SELECT slots_remaining FROM slots WHERE date = ? AND period = ?");
        $stmt->bind_param("ss", $date, $period);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $slots_remaining = $row['slots_remaining'];
        } else {
            // Insert default slots if not existing
            $slots_remaining = 20;
            $stmt = $conn->prepare("INSERT INTO slots (date, period, slots_remaining) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $date, $period, $slots_remaining);
            $stmt->execute();
        }

        if ($slots_remaining <= 0) {
            throw new Exception("No slots available for $period on $date");
        }

        $stmt = $conn->prepare("UPDATE slots SET slots_remaining = slots_remaining - 1 WHERE date = ? AND period = ?");
        $stmt->bind_param("ss", $date, $period);
        $stmt->execute();

        // Get service category name
        $stmt = $conn->prepare("SELECT category_name FROM ServiceCategories WHERE id = ?");
        $stmt->bind_param("i", $service_category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category_row = $result->fetch_assoc();
        $service_category_name = $category_row['category_name'];

        // Fetch user's full name
        $stmt = $conn->prepare("SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_row = $result->fetch_assoc();
        $full_name = $user_row['full_name'];

        // Insert appointment with service category name
        $stmt = $conn->prepare("INSERT INTO appointment (selected_date, preferred_time, service_category, service, user_id, reference_code) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $date, $preferred_time, $service_category_name, $service, $user_id, $reference_code);
        $stmt->execute();

        // Generate the receipt image
        $receiptData = [
            'Full Name' => $full_name, // Use full name instead of user ID
            'Reference Code' => $reference_code,
            'Email' => $email,
            'Selected Date' => $selected_date,
            'Preferred Time' => $preferred_time,
            'Service Category' => $service_category_name,
            'Service' => $service
        ];
        $receiptPath = generateReceiptImage($receiptData);

        // Save receipt path to the database
        $stmt = $conn->prepare("UPDATE appointment SET receipt_image_path = ? WHERE reference_code = ?");
        $stmt->bind_param("ss", $receiptPath, $reference_code);
        $stmt->execute();

        // Send confirmation email with the receipt attached
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; // Replace with your email
        $mail->Password   = 'nqzk mmww mxin ikve'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO Booking Confirmation');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'AV MOTO Booking Confirmation';
        $mail->Body = 'Thank you for your booking. Your reference code is ' . $reference_code;
        $mail->addAttachment($receiptPath);

        if (!$mail->send()) {
            throw new Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }

        $conn->commit();
        echo 'Reference code and receipt sent to your email. Please check your email to confirm the booking.';

    } catch (Exception $e) {
        $conn->rollback();
        echo 'Error: ' . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
