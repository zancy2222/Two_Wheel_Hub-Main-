<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'partials/db_conn.php';

function generateReferenceCode() {
    $digits = rand(100, 999);
    $letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
    return $digits . $letters;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_date = $_POST['selected_date'];
    $preferred_time = $_POST['preferred_time'];
    $service_category = $_POST['service_category'];
    $service = $_POST['service'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $complete_address = $_POST['complete_address'];
    $unit_no = $_POST['unit_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $phone = $_POST['phone'];
    $reference_code = generateReferenceCode();

    // Check if the reference code is valid
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE reference_code = ?");
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

        // Insert appointment
        $stmt = $conn->prepare("INSERT INTO appointments (selected_date, preferred_time, service_category, service, email, first_name, middle_name, last_name, complete_address, unit_no, street, barangay, city, province, zip_code, phone, reference_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssss", $date, $preferred_time, $service_category, $service, $email, $first_name, $middle_name, $last_name, $complete_address, $unit_no, $street, $barangay, $city, $province, $zip_code, $phone, $reference_code);
        $stmt->execute();

        // Send confirmation email
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'danielzanbaltazar.forwork@gmail.com'; 
        $mail->Password   = 'nqzk mmww mxin ikve'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AV MOTO Booking Confirmation');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'AV MOTO Booking Confirmation';
        $mail->Body = 'Thank you for your booking. Your reference code is ' . $reference_code;

        if (!$mail->send()) {
            throw new Exception('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }

        $conn->commit();
        echo 'Reference code sent to your email. Please check your email and enter the reference code to confirm the booking.';

    } catch (Exception $e) {
        $conn->rollback();
        echo 'Error: ' . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
