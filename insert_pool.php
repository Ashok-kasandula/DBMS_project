<?php
session_start();
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        $poolLink_id= $_SESSION['user_id'];
    } else {
        die("User not logged in.");
    }

    $date = $_POST['date'];
    $num_pools = $_POST['num_pools'];
    $price = $_POST['price'];
   
    $price = str_replace(',', '', $price);
    $price = (float)$price;

    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
    if ($dateTime && $dateTime->format('Y-m-d') === $date) {
        
        $stmt = $conn->prepare("INSERT INTO swimming_pool (poolLink_id, date, num_pools, price) VALUES (?, ?, ?,?)");
        $stmt->bind_param("isid", $poolLink_id, $date, $num_pools, $price);
        if ($stmt->execute()) {
            header("Location: HotelCart.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid date format. Please use YYYY-MM-DD.";
    }
}
$conn->close();
?>
