<?php
include('connect.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$dob = $_POST['date'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Hash the password before storing it in the database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the user data into the database
$sql = "INSERT INTO users (Username, Email, Password, DateOfBirth, RoleID, Gender) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("sssisi", $firstname, $email, $hashedPassword, $dob, $role, $gender);
$stmt->execute();
$stmt->close();

// Redirect to the login page
header('location: login.php');
exit();
?>
