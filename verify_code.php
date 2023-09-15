<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Two-Factor Authentication via Email</title>
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

        input[type="email"],
        input[type="text"] {
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
            width: 100%;
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
    <h2>Two-Factor Authentication via Email</h2>
    <form action="process_verify.php" method="POST">

        <label for="code">Enter the Code Sent to Your Email:</label>
        <input type="text" id="code" name="code" required>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
