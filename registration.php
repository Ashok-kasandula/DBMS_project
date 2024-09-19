<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            background-image: url('hotel.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 50px auto;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"],
        textarea,
        button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Registration Form</h2>
    <form id="myForm" action="regi.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone" required><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="40" required></textarea><br>
        
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <button type="submit" name="signUp">Register</button>
    </form>
</body>
</html>
