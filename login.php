<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            max-width: 400px;
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
        input[type="date"] {
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

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
<h2>Login</h2>
<body>
    <div id="dashboard">
        <a href="registration.php">Sign Up</a> |
        <a href="login.php">Login</a>
    </div>
<form action="process_login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
    <a href="request_otp.php">Forgot your password? Request an OTP for password reset.</a>
</form>
</body>
</html>