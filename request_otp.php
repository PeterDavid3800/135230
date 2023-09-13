<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Request OTP</title>
</head>

<body>
    <h2>Request OTP</h2>
    <p>Enter your registered email address to receive an OTP for password reset:</p>
    <form action="send_password_reset_otp.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Request OTP">
    </form>
</body>

</html>
