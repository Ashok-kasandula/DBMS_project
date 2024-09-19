<?php
include('connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logi.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM registration WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e0f7fa; 
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #f8f9fa; 
            padding: 20px;
            border-radius: 10px; 
            width: 400px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .profile-container h2 {
            margin: 0 0 20px 0;
            color: #333; 
        }

        .profile-container p {
            margin: 10px 0;
        }

        .profile-container .edit-btn {
            background-color: #007bff; 
            color: #fff; 
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .profile-container .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $user['date']; ?></p>
        <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
        <a href="edit_profile.php" class="edit-btn">Edit Profile</a>
    </div>
</body>
</html>
