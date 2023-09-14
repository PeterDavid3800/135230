<?php
session_start(); // Start a session

// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php'; 

use OTPHP\TOTP;


require 'vendor/autoload.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include("connect.php"); // Make sure to include your database connection script

    // Retrieve form data
    $email = $_POST["email"];

    // Generate a random OTP (6-digit code)
    $otp = sprintf("%06d", mt_rand(0, 999999));

    // Store the OTP in the session
    $_SESSION["otp"] = $otp;

    // Send the OTP via email
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your_username';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' as needed
        $mail->Port = 587; // Use the appropriate port

        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset OTP';
        $mail->Body = 'Your OTP for password reset is: ' . $otp;

        $mail->send();
        echo 'An OTP has been sent to your email.';

        // Redirect the user to the OTP verification page for password reset
        header('Location: verify_reset_otp.php');
        exit;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }

    // Close the database connection if you opened one
    // No need to perform user registration in this script
}
?>
