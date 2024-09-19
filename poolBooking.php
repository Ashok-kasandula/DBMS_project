<?php 
session_start();
include("connection.php");


$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : null;

if (!$price) {
    echo "<p>Error: Price not specified. Please try again.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Party Hall</title>
    <style>
     body {
  font-family: Arial, sans-serif;
  background: url('hotel.jpg') no-repeat center center fixed;
  background-size: cover;
  margin: 0;
  display: flex;
  flex-direction: column;
  height: 100vh;
  justify-content: center;
  align-items: center;
}

.top-image {
  width: 100%;
  max-height: 400px;
  margin-bottom: -5px;
}

main {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-grow: 1;
}

.container {
  background: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 500px;
  width: 100%;
}

h2, h3 {
  margin: 10px 0;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  margin-top: 10px;
  font-weight: bold;
}

input[type="number"],
input[type="date"],
input[type="text"] {
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
  max-width: 300px;
}

input[type="submit"] {
  margin-top: 20px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

  </style>
</head>
<body>
    <main>
        <div class="container">
            <h2>Book Your Swimming Pool</h2>
            <?php
            echo "<h3>Price: Rs $price/-</h3>";
            ?>
            <form action="insert_pool.php" method="post">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <div>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div>
                    <label for="num_pools">Number of pools:</label>
                    <input type="number" id="num_pools" name="num_pools" required min="1">
                </div>
                <input type="submit" value="Book Now">
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Hotel Management</p>
    </footer>
</body>
</html>
