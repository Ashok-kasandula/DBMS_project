<?php
session_start();
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user_id from session
    if (isset($_SESSION['user_id'])) {
        $room_id= $_SESSION['user_id'];
    } else {
        die("User not logged in.");
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $num_rooms = $_POST['num_rooms'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $customer_name = $_POST['customer_name'];

    // Validate the date format
    $check_in_date = DateTime::createFromFormat('Y-m-d', $check_in);
    $check_out_date = DateTime::createFromFormat('Y-m-d', $check_out);

    if ($check_in_date && $check_in_date->format('Y-m-d') === $check_in &&
        $check_out_date && $check_out_date->format('Y-m-d') === $check_out) {
        // Dates are valid
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO rooms (room_type,room_id, price, num_rooms, check_in, check_out, customer_name) 
                                VALUES (?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sdissss", $room_type,$room_id, $price, $num_rooms, $check_in, $check_out, $customer_name);

        if ($stmt->execute()) {
            header("Location: HotelCart.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
    }
        $stmt->close();
    } else {
        echo "Invalid date format. Please use YYYY-MM-DD.";
    }
  
    // Close connection
    $conn->close();
}
?>
