<?php
require_once 'vendor/autoload.php';

use OTPHP\TOTP;

// Function to generate a TOTP secret
function generateTOTPSecret() {
    // Generate a new TOTP secret
    $totp = TOTP::create();
    
    // Get the secret key as a string
    $secret = $totp->getSecret();
    
    return $secret;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include("connect.php");

    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["date"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password
    $roleId = $_POST["role"];

    // Check if 2FA should be enabled
    $enable2FA = isset($_POST['enable_2fa']) && $_POST['enable_2fa'] == 'on';

    // Generate a TOTP secret key if 2FA is enabled
    $totpSecret = $enable2FA ? generateTOTPSecret() : null;

    // Prepare and execute the SQL query to insert data into the 'users' table
    $sql = "INSERT INTO users (Username, Email, Password, DateOfBirth, RoleID, Gender, TOTPSecret, Is2FAEnabled) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssssisis", $username, $email, $password, $dateOfBirth, $roleId, $gender, $totpSecret, $enable2FA);

    // Set the username (you can generate a username or use some logic to create one)
    $username = $firstname . $lastname;

    // Check if the query was successful
    if ($stmt->execute()) {
        switch ($roleId) {
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
        exit();
    } 
    else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $connect->close();
}
?>
