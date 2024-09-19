<?php
include('connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logi.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $query = "UPDATE registration SET username=?, email=?, phone=?, date=?, address=?, password=? WHERE user_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $username, $email, $phone, $date, $address, $password, $user_id);

    if ($stmt->execute()) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

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
    <title>Edit Profile</title>
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

        .edit-profile-container {
            background-color: #fff; 
            padding: 20px;
            border-radius: 10px; 
            width: 400px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .edit-profile-container h2 {
            margin: 0 0 20px 0;
            color: #333; 
        }

        .edit-profile-container form {
            display: flex;
            flex-direction: column;
        }

        .edit-profile-container form input {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }

        .edit-profile-container form button {
            background-color: #007bff; 
            color: #fff; 
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .edit-profile-container form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" value="<?php echo $user['username']; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
            <input type="text" name="phone" placeholder="Phone" value="<?php echo $user['phone']; ?>" required>
            <input type="date" name="date" placeholder="Date of Birth" value="<?php echo $user['date']; ?>" required>
            <input type="text" name="address" placeholder="Address" value="<?php echo $user['address']; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
