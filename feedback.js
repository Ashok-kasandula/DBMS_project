document.addEventListener("DOMContentLoaded", function() {
  const stars = document.querySelectorAll(".star");

  stars.forEach(function(star) {
      star.addEventListener("click", function() {
          const value = parseInt(star.getAttribute("data-value"));
          document.getElementById("ratingValue").value = value;

          // Highlight selected star and dim stars to the right
          stars.forEach(function(s, index) {
              if (index < value) {
                  s.classList.add("active");
              } else {
                  s.classList.remove("active");
              }
          });
      });
  });

  document.getElementById("feedbackForm").addEventListener("submit", function(event) {
      event.preventDefault();
      const feedback = document.getElementById("feedback").value;
      const rating = document.getElementById("ratingValue").value;
      
      // You can send this feedback and rating to the server for further processing
      console.log("Feedback:", feedback);
      console.log("Rating:", rating);
      alert("Thank you for your feedback!");
      // You can redirect the user to another page or perform any other action here
  });
});
