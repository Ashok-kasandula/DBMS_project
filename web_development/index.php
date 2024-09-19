<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Food Catalog</title>
  <link rel="stylesheet" href="foodStyle.css">
</head>
<body>
  <header>
    <img src="Hotel_logo.png" alt="Hotel Logo" class="top-image">
    <nav>
      <ul>
        <li><a href="#northIndian">North Indian</a></li>
        <li><a href="#southIndian">South Indian</a></li>
        <li><a href="#desserts">Desserts</a></li>
        <li><a href="#beverages">Beverages</a></li>
      </ul>
    </nav>
  </header>
  
  <?php
  $conn = new mysqli("localhost", "root", "", "login",3307);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  function displayItems($category) {
    global $conn;
    $sql = "SELECT name, price FROM foods WHERE category='$category'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<div class="scroll-container">';
        while($row = $result->fetch_assoc()) {
            $image = strtolower(str_replace(' ', '', $row["name"])) . '.jpg'; // Assuming image names are based on the food names
            echo '<div class="menu-item">';
            echo '<a href="foodDetails.html?name='.urlencode($row["name"]).'&price='.$row["price"].'"><img src="'.$image.'" alt="'.$row["name"].'"></a>';
            echo '<h3>'.$row["name"].'</h3>';
            echo '<p>Price: Rs '.$row["price"].'</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "0 results";
    }
  }
  ?>

  <section id="northIndian">
    <h2>North Indian Dishes</h2>
    <?php displayItems('northIndian'); ?>
  </section>

  <section id="southIndian">
    <h2>South Indian</h2>
    <?php displayItems('southIndian'); ?>
  </section>

  <section id="desserts">
    <h2>Desserts</h2>
    <?php displayItems('desserts'); ?>
  </section>

  <section id="beverages">
    <h2>Beverages</h2>
    <?php displayItems('beverages'); ?>
  </section>

  <footer>
    <p>&copy; 2024 Hotel Management</p>
  </footer>
</body>
</html>
