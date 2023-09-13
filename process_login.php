<?php
session_start(); // Start a session (if not already started)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include("connect.php");

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the SQL query to fetch user data by email
    $sql = "SELECT UserID, Email, Password, RoleID FROM users WHERE Email = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userID, $dbEmail, $dbPassword, $roleID);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $dbPassword)) {
            // Password is correct, store user data in session
            $_SESSION["userID"] = $userID;
            $_SESSION["userEmail"] = $dbEmail;
            $_SESSION["userRole"] = $roleID;

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
            exit(); // Ensure no further output after redirection
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Email not found. Please register or check your email.";
    }

    // Close the database connection
    $stmt->close();
    $connect->close();
}
?>
