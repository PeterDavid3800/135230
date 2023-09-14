<?php
require_once 'vendor/autoload.php'; 

use OTPHP\TOTP;

session_start(); // Start a session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the OTP entered by the user
    $userEnteredOTP = $_POST["otp"];

    // Retrieve the OTP stored in the session
    $storedOTP = $_SESSION["otp"];

    // Verify if the OTPs match
    if ($userEnteredOTP === $storedOTP) {
        // OTP is valid, allow the user to reset their password

        // Redirect the user to the password reset page (replace with your actual password reset page)
        header('Location: reset_password.php');
        exit;
    } else {
        // OTP is invalid
        echo "Invalid OTP. Please try again or request a new OTP.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OTP Verification for Password Reset</title>
</head>

<body>
    <h2>OTP Verification for Password Reset</h2>
    <p>Please enter the one-time password (OTP) sent to your email:</p>
    <form action="verify_reset_otp.php" method="POST">
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required><br><br>

        <input type="submit" value="Verify">
    </form>
</body>

</html>
