<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>

<body>
    <h2>Registration</h2>
    <form action="registration_handler.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" required>
        <label for="other">Other</label><br><br>

        <label for="date">Date of Birth:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="password2">Confirm Password:</label>
        <input type="password" id="password2" name="password2" required><br><br>

        <label for="role">Select Role:</label>
        <select id="role" name="role" required>
            <option value="2">Customer</option>
            <option value="3">Merchant</option>
            <option value="1">Administrator</option>
        </select><br><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
