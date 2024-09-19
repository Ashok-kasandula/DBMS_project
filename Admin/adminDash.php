<?php 
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logout-container {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 50px;
        }

        .logout-container a {
            text-decoration: none;
            color: #000;
            display: block;
            font-size: 24px;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 100px;
            width: 90%;
            max-width: 1200px;
        }

        .dashboard-item {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .dashboard-item:hover {
            transform: translateY(-5px);
            background-color: rgba(255, 255, 255, 1);
        }

        .dashboard-item h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .dashboard-item i {
            font-size: 48px;
            margin-bottom: 10px;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="content">
        <div class="logout-container">
            <a href="userlogout.php"><i class="fas fa-sign-out-alt"></i></a>
            <p>Logout</p>
        </div>

        <div class="dashboard-container">
            <a href="food_booked.php" class="dashboard-item">
                <i class="fas fa-utensils"></i>
                <h3>Food Booked</h3>
                <p>Details about food bookings...</p>
            </a>
            <a href="room_booked.php" class="dashboard-item">
                <i class="fas fa-bed"></i>
                <h3>Room Booked</h3>
                <p>Details about room bookings...</p>
            </a>
            <a href="partyhall_booked.php" class="dashboard-item">
                <i class="fas fa-birthday-cake"></i>
                <h3>Party Hall Booked</h3>
                <p>Details about party hall bookings...</p>
            </a>
            <a href="swimmingpool_booked.php" class="dashboard-item">
                <i class="fas fa-swimmer"></i>
                <h3>Swimming Pool Booked</h3>
                <p>Details about swimming pool bookings...</p>
            </a>
        </div>
    </div>
</body>
</html>
