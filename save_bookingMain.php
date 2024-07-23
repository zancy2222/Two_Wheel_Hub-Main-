<?php
// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

require 'Partials/db_conn.php';
require 'partials/session.php'; // Assuming session has user info

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
    $email = $_SESSION['email']; // Email from session
    $first_name = $_SESSION['first_name']; // First name from session
    $middle_name = $_SESSION['middle_name']; // Middle name from session
    $last_name = $_SESSION['last_name']; // Last name from session
    $complete_address = $_SESSION['complete_address']; // Complete address from session
    $unit_no = $_SESSION['unit_no']; // Unit no from session
    $street = $_SESSION['street']; // Street from session
    $barangay = $_SESSION['barangay']; // Barangay from session
    $city = $_SESSION['city']; // City from session
    $province = $_SESSION['province']; // Province from session
    $zip_code = $_SESSION['zip_code']; // Zip code from session
    $phone = $_SESSION['phone']; // Phone from session
    $reference_code = generateReferenceCode();

    $date = DateTime::createFromFormat('m/d/Y', $selected_date)->format('Y-m-d');
    $period = strpos($preferred_time, 'AM') !== false ? 'AM' : 'PM';

    $conn->begin_transaction();
    try {
        $stmt = $conn->prepare("SELECT slots_remaining FROM slots WHERE date = ? AND period = ?");
        $stmt->bind_param("ss", $date, $period);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $slots_remaining = $row['slots_remaining'];
        } else {
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

        $stmt = $conn->prepare("INSERT INTO appointments (selected_date, preferred_time, service_category, service, email, first_name, middle_name, last_name, complete_address, unit_no, street, barangay, city, province, zip_code, phone, reference_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssss", $date, $preferred_time, $service_category, $service, $email, $first_name, $middle_name, $last_name, $complete_address, $unit_no, $street, $barangay, $city, $province, $zip_code, $phone, $reference_code);
        $stmt->execute();

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'danielzanbaltazar.forwork@gmail.com'; // SMTP username
        $mail->Password = 'nqzk mmww mxin ikve'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('danielzanbaltazar.forwork@gmail.com', 'AVMOTO Booking Confirmation');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body = "Thank you for your booking. Your reference code is $reference_code.";

        $mail->send();

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
