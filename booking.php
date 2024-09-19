<?php 
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Room</title>
  <link rel="stylesheet" href="room_book.css">
</head>
<body>
  <header>
    <img src="HOTEL PARADISE.png" alt="Hotel Logo" class="top-image">
  </header>
  <main>
    <div class="container">
      <h2>Book Your Room</h2>
      <?php
      $room_type = $_GET['room_type'];
      $price = $_GET['price'];
      echo "<h3>Room Type: $room_type</h3>";
      echo "<h3>Price: Rs $price/-</h3>";
      ?>
      <form action="book_room.php" method="post">
        <input type="hidden" name="room_type" value="<?php echo $room_type; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <label for="num_rooms">Number of Rooms:</label>
        <input type="number" id="num_rooms" name="num_rooms" required><br>
        <label for="check_in">Check-in Date:</label>
        <input type="date" id="check_in" name="check_in" required><br>
        <label for="check_out">Check-out Date:</label>
        <input type="date" id="check_out" name="check_out" required><br>
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>
        <input type="submit" value="Book Now">
      </form>
    </div>
  </main>
</body>
</html>
