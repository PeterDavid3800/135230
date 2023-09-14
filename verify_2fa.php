<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verify</title>
</head>

<body>
<form action="process_2fa.php" method="POST">
    <label for="otp_code">Enter your 2FA OTP code:</label>
    <input type="text" id="otp_code" name="otp_code" required>
    <input type="hidden" name="userID" value="<?php echo $_GET['userID']; ?>">
    <input type="submit" value="Verify">
</form>
