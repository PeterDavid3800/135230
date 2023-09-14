<?php
require_once 'vendor/autoload.php';
use OTPHP\TOTP;

$host = "localhost";
$username = "root";
$password = "";
$database = "isproject2";

$connect = new mysqli($host, $username, $password, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["userID"];
    $otpCode = $_POST["otp_code"];

    // Retrieve the TOTP secret from the database based on the user's ID
    $sql = "SELECT VerificationToken FROM users WHERE UserID = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->bind_result($totpSecret);

    if ($stmt->fetch()) {
        // Verify the TOTP code using the retrieved secret
        if (verifyTOTPCode($otpCode, $totpSecret)) {
            echo "TOTP code is valid.";
            // Redirect the user to the dashboard or perform other actions here
        } else {
            echo "TOTP code is invalid.";
        }
    } else {
        echo "User not found or TOTP secret not available.";
    }

    $stmt->close();
    $connect->close();
}

function verifyTOTPCode($otpCode, $totpSecret) {
    try {
        // Create a TOTP instance with the provided TOTP secret
        $totp = TOTP::create();
        $totp->setSecret($totpSecret); // Set the secret

        // Verify the TOTP code
        if ($totp->verify($otpCode)) {
            return true; // TOTP code is valid
        } else {
            return false; // TOTP code is invalid
        }
    } catch (\Exception $e) {
        // Handle any exceptions (e.g., invalid secret or code format)
        return false;
    }
}
?>
