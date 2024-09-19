<?php 
include('connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('hotel.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
    .admin-container {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 20px;
        right: 20px;
        text-align: center;
        max-width: 100px;
        width: 100%;
    }

    .admin-container a {
        text-decoration: none;
        color: #000;
        display: block;
    }

    .admin-container .admin-icon {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: calc(100% - 40px);
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
    }

    .login-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login-container input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>
</head>
<body>
    <div class="admin-container">
        <a href="Admin/admin.php">
            <div class="admin-icon"><i class="fas fa-user-shield"></i></div>
            <div>Admin</div>
        </a>
    </div>
<div class="login-container">
    <h2>User Login</h2>
    <form action="regi.php" method="post">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Sign In" name="signIn"><br><br>
        <p>or new user</p>
    </form>
    <form action="registration.php" method="get">
        <input type="submit" value="Sign Up">
    </form>
</div>
</body>
</html>