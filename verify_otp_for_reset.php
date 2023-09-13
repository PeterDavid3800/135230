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
