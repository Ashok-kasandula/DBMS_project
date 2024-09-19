<?php 
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Swimming Pool Gallery</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="pStyles.css">
  <script>
    function redirectToBookingPage(price) {
        window.location.href = `poolBooking.php?price=${encodeURIComponent(price)}`;
    }

    function openLightbox(imageSrc) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = lightbox.querySelector('img');
        lightboxImage.src = imageSrc;
        lightbox.style.display = 'block';
    }

    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
    }
  </script>
</head>
<body>
  <header>
    <img src="HOTEL PARADISE.png" alt="Hotel Logo" class="top-image">
  </header>
  <main>
    <center><h1>Swimming Pool Gallery</h1></center>
    <div class="gallery">
      <div class="image" onclick="openLightbox('sp5.jpg')">
        <img src="sp5.jpg" alt="Party Hall 1">
        <center>
          <p>Price: Rs 20,000/-</p>
          <h3 onclick="redirectToBookingPage('20,000')">Book Now</h3>
        </center>
      </div>
      <div class="image" onclick="openLightbox('sp2.jpg')">
        <img src="sp2.jpg" alt="Party Hall 2">
        <center>
          <p>Price: Rs 30,000/-</p>
          <h3 onclick="redirectToBookingPage('30,000')">Book Now</h3>
        </center>
      </div>
      <div class="image" onclick="openLightbox('sp3.jpg')">
        <img src="sp3.jpg" alt="Party Hall 3">
        <center>
          <p>Price: Rs 25,000/-</p>
          <h3 onclick="redirectToBookingPage('25,000')">Book Now</h3>
        </center>
      </div>
      <div class="image" onclick="openLightbox('sp4.jpg')">
        <img src="sp4.jpg" alt="Party Hall 4">
        <center>
          <p>Price: Rs 40,000/-</p>
          <h3 onclick="redirectToBookingPage('40,000')">Book Now</h3>
        </center>
      </div>
      <div class="image" onclick="openLightbox('sp1.png')">
        <img src="sp1.png" alt="Party Hall 5">
        <center>
          <p>Price: Rs 45,000/-</p>
          <h3 onclick="redirectToBookingPage('45,000')">Book Now</h3>
        </center>
      </div>
      <div class="image" onclick="openLightbox('sp6.jpg')">
        <img src="sp6.jpg" alt="Party Hall 6">
        <center>
          <p>Price: Rs 50,000/-</p>
          <h3 onclick="redirectToBookingPage('50,000')">Book Now</h3>
        </center>
      </div>
    </div>
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
      <span class="close">&times;</span>
      <img src="" alt="Lightbox Image">
    </div>
    <div class="contact-text">
      <p>Contact us<br><br>Phone: 6362657543<br>Email: ashokspace003@gmail.com<br>Address: KR Circle, Ambedkar Road, Bangalore-56001</p>
    </div>
  </main>
  <footer>
    <p>&copy; 2024 Hotel Management</p>
  </footer>
</body>
</html>