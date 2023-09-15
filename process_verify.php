<?php
session_start();

// Get the user-entered verification code
$userVerificationCode = $_POST['code'];

// Get the stored verification code from the session (or your database)
$storedVerificationCode = $_SESSION['verification_code'];

if ($userVerificationCode == $storedVerificationCode) {
    // Verification successful
    // Redirect the user to the dashboard or any other desired page
    // Redirect based on the user's role
    switch ($roleID) {
        case 1: // Administrator
            header("Location: dashboard_admin.php");
            break;
        case 2: // Customer
            header("Location: dashboard_customer.php");
            break;
        case 3: // Merchant
            header("Location: dashboard_merchant.php");
            break;
        default:
            // Redirect to a default page if role is unknown
            header("Location: default_dashboard.php");
            break;
    }
    exit(); // Ensure script execution stops here
} else {
    // Verification failed, handle the error (e.g., show an error message)
    echo 'Verification failed. Please try again.';
}
?>
