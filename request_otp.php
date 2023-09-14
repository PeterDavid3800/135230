<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Request OTP</title>
    <style>
        body {
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: green;
        }

        form {
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            max-width: 300px; /* Adjust the max-width to your preference */
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: green;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        .gender-label {
            display: inline-block;
            margin-right: 20px;
            color: green;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Make the button expand to full width */
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }

        a {
            color: green;
            text-decoration: none;
        }
    </style>
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
