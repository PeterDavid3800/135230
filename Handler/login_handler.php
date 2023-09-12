<?php
session_start();
include('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE Email = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($user && password_verify($password, $user['Password'])) {
    $_SESSION['user_id'] = $user['UserID'];
    $_SESSION['username'] = $user['Username'];
    $_SESSION['role_id'] = $user['RoleID'];

    // Redirect to the appropriate dashboard based on the user's role
    if ($user['RoleID'] == 2) {
        header('location: dashboard_customer.php');
    } elseif ($user['RoleID'] == 3) {
        header('location: dashboard_merchant.php');
    } elseif ($user['RoleID'] == 1) {
        header('location: dashboard_admin.php');
    } else {
        // Handle other roles or errors
    }
} else {
    // Handle invalid login
    header('location: login.php?error=1');
    exit();
}
?>
