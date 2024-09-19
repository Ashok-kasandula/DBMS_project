<?php
include('connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: logi.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #2E3440;
    color: #D8DEE9;
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 60px;
    background-color: #3B4252;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
    flex-shrink: 0; 
}

.sidebar a {
    color: #D8DEE9;
    text-decoration: none;
    margin: 20px 0;
    font-size: 24px;
    transition: color 0.3s;
}

.sidebar a:hover {
    color: #81A1C1;
}

.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 20px;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}

.topbar2 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}

.topbar h1 {
    margin: 0;
}

.topbar .user-info {
    display: flex;
    align-items: center;
}

.topbar .user-info p {
    margin: 0 10px 0 0;
}

.logout-container {
    display: flex;
    align-items: center;
}

.logout-container a {
    color: #D8DEE9;
    text-decoration: none;
    font-size: 24px;
}

.dashboard-container {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.dashboard-item, .branch {
    background-color: #4C566A;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    transition: transform 0.3s ease, background-color 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    flex: 1;
    max-width: calc(25% - 20px);
}

.dashboard-item:hover, .branch:hover {
    transform: translateY(-5px);
    background-color: #5E81AC;
}

.dashboard-item h3, .branch h3 {
    margin-bottom: 20px;
    color: #ECEFF4;
}

.dashboard-item i {
    font-size: 48px;
    margin-bottom: 10px;
    color: #81A1C1;
}

.branch {
    margin-top: 30px; 
}

.branch img {
    border-radius: 10px;
    margin-bottom: 10px;
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.branch p {
    margin: 0;
    color: #ECEFF4;
}

.about-contact-container {
    display: flex;
    gap: 20px;
    margin-top: 30px;
}

.about-us, .contact-us {
    background-color: #3B4252;
    padding: 20px;
    border-radius: 10px;
    color: #ECEFF4;
    flex: 1;
    max-height: 300px;
    overflow: auto;
}

.about-us h2, .contact-us h2 {
    color: #81A1C1;
    margin-bottom: 20px;
}

.about-us p, .contact-us p {
    margin: 0 0 10px;
}
    </style>

</head>
<body>
    <div class="sidebar">
        <a href="userDash.php"><i class="fas fa-home"></i></a>
        <a href="profile.php"><i class="fas fa-user"></i></a>
        <a href="staff.html"><i class="fas fa-user-tie"></i></a>
        <a href="FeedBack.html"><i class="fas fa-comment"></i></a>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h1>Hotel Paradise</h1>
            <div class="user-info">
                <p>Welcome, <?php echo $username; ?></p>
                <div class="logout-container">
                    <a href="userLogOut.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="dashboard-container">
            <a href="web_development/food.html" class="dashboard-item">
                <i class="fas fa-utensils"></i>
                <h3>Order Food</h3>
                <p>Food menu</p>
            </a>
            <a href="dashboard.php" class="dashboard-item">
                <i class="fas fa-bed"></i>
                <h3>Book Room</h3>
                <p>Rooms catalog</p>
            </a>
            <a href="partyHall.php" class="dashboard-item">
                <i class="fas fa-birthday-cake"></i>
                <h3>Book Party Hall</h3>
                <p>Party hall catalog</p>
            </a>
            <a href="swimmingPool.php" class="dashboard-item">
                <i class="fas fa-swimmer"></i>
                <h3>Book Swimming pool</h3>
                <p>Swimming pool catalog</p>
            </a>
        </div>
        <div class="topbar2">
            <h1>Our Branches<h1>
        </div>

        <div class="dashboard-container">
            <div class="branch">
                <img src="brp1.jpeg" alt="Branch 1">
                <h3>Branch 1</h3>
                <p>123 Main Street, Mangaluru</p>
            </div>
            <div class="branch">
                <img src="brp2.jpg" alt="Branch 2">
                <h3>Branch 2</h3>
                <p>456 Elm Street,Vizag</p>
            </div>
            <div class="branch">
                <img src="brp3.jpg" alt="Branch 3">
                <h3>Branch 3</h3>
                <p>789 Oak Avenue,Ananthapur </p>
            </div>
            <div class="branch">
                <img src="br4.jpg" alt="Branch 4">
                <h3>Branch 4</h3>
                <p>101 Pine Street,Hyderabadh</p>
            </div>
            <div class="branch">
                <img src="br5.jpeg" alt="Branch 5">
                <h3>Branch 5</h3>
                <p>202 Maple Street, Munbai</p>
            </div>
        </div>

        <div class="about-contact-container">
            <div class="about-us">
                <h2>About Us</h2>
                <p>Welcome to Hotel Paradise, your ultimate destination for luxury and comfort. Nestled in the heart of the city, our hotel offers an unparalleled experience with top-notch amenities and exceptional service. Whether you are here for business or leisure, our elegant rooms, exquisite dining options, and state-of-the-art facilities will make your stay unforgettable. Our dedicated staff is committed to providing personalized service to ensure your utmost satisfaction.</p>
                <p>At Hotel Paradise, we believe in creating a home away from home for our guests. Our beautifully designed interiors, combined with modern conveniences, provide a perfect blend of style and functionality. Relax in our spa, take a dip in our pool, or enjoy a delicious meal at one of our renowned restaurants. Whatever your needs, we are here to make your stay as comfortable and enjoyable as possible.</p>
                <p>Join us at Hotel Paradise and experience the epitome of luxury and hospitality.</p>
            </div>

            <div class="contact-us">
                <h2>Contact Us</h2>
                <p>Address:  Avenue Road, Bengaluru , India</p>
                <p>Phone: +123-456-7890</p>
                <p>Email: info@hotelparadise.com</p>
            </div>
        </div>
    </div>
</body>

