<?php
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

    // Prepare and execute the SQL query to insert data into the 'users' table
    $sql = "INSERT INTO users (Username, Email, Password, DateOfBirth, RoleID, Gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssssis", $username, $email, $password, $dateOfBirth, $roleId, $gender);

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
