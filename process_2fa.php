<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/Exception.php';
require 'PHPMailer-master/PHPMailer.php';
require 'PHPMailer-master/SMTP.php';

// Function to generate a random verification code
function generateVerificationCode() {
    return mt_rand(100000, 999999);
}

// Get the user's email from the form
$userEmail = $_POST['email'];

// Generate a verification code
$verificationCode = generateVerificationCode();

// Set up PHPMailer
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->SMTPDebug = 2; // Set to 2 for debugging
    $mail->isSMTP();
    $mail->Host = 'davidpeter487@gmail.com'; // Your SMTP server
    $mail->Port = 587; // SMTP port
    $mail->SMTPAuth = true;
    $mail->Username = 'davidpeter487@gmail.com'; // Your email address
    $mail->Password = 'BreezerTech.'; // Your email password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption

    // Recipients
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress($userEmail);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Two-Factor Authentication Code';
    $mail->Body = 'Your verification code is: ' . $verificationCode;

    // Send the email
    $mail->send();

    // Store the verification code in a session or database
    // For simplicity, we'll just display it here
    echo 'Verification code sent successfully. Code: ' . $verificationCode;

    // Redirect the user to 'verify_code.php' after successful email sending
    header("Location: verify_code.php");
    exit();
} catch (Exception $e) {
    echo 'Error: ' . $mail->ErrorInfo;
}
?>
