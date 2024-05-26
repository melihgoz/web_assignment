<?php
include('includes/session.php');

if (isset($_SESSION['username'])) {
    // User is logged in
    $username = $_SESSION['username'];
    echo "<p class='logged-in'>Logged in as: $username</p>";
    echo "<a href='logout.php' class='btn btn-sm btn-outline-secondary'>Logout</a>";
} else {
    // User is not logged in
    echo "<a href='login.php' class='btn btn-sm btn-outline-secondary'>Login</a>";
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    $id = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

</head>
<body>

<style>
h1 {
  text-align: center;
}

#map {
  width: 100%;
  background-color: grey;
  height: 400px;
}
</style>

<header class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Delicious Recipes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="home.php">Main Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recipe.php">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <?php if ($id == 2) : ?>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">Messages</a>
        </li>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>

<h1>Welcome to Cook'n Share</h1>
<h2>Discover the joy of cooking with us! At Cook'n Share, we believe that cooking is an art that brings people together. Whether you’re a seasoned chef or just starting out in the kitchen, our website is designed to inspire and guide you every step of the way.</h2>
<br>
<br>
<h1>What we offer?</h1>
<h2>Delicious Recipes: From quick weeknight dinners to elaborate holiday feasts, explore our collection of recipes that cater to all tastes and skill levels. Each recipe is carefully crafted with easy-to-follow instructions and stunning photos.

Cooking Tips & Tricks: Learn the secrets of the culinary world with our expert tips and tricks. From knife skills to perfecting your baking techniques, we’ve got you covered.

Ingredient Guides: Get to know your ingredients! Our comprehensive guides will help you understand the best ways to select, store, and use various ingredients to enhance your cooking.

Video Tutorials: Watch and learn from our video tutorials, where our chefs demonstrate step-by-step how to prepare your favorite dishes. Perfect for visual learners!

Community & Support: Join our vibrant community of food lovers! Share your culinary creations, ask questions, and get feedback from fellow cooking enthusiasts and our team of experts.</h2>

  <main>
    <div class="video-container">
      <iframe width="500" height="360" src="https://www.youtube.com/embed/O3wyuoEyEJ8"> </iframe>
      <iframe width="500" height="380" src="giphy.gif" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  <h2>Why Choose Us?</h2>
  <h2>At Culinary Creations, we are passionate about making cooking accessible and enjoyable for everyone. We provide high-quality content, reliable recipes, and a supportive community to help you succeed in the kitchen. Our goal is to inspire you to create delicious meals and make lasting memories with your loved ones.

Start your culinary adventure with us today. Happy cooking!</h2>

    <h2>Where are we located?</h2>
  </main>
  <div id="map"></div>
  <script src="script.js" defer></script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh7WjmZh7L1X85UFDCymeNMBV4IM_0OJo&callback=initMap">
    </script>
    <script>
        function initMap() {
    var dumbo = {lat: 46.90745, lng: 19.69175};
    var mapOptions = {
        center: dumbo,
        zoom: 10
    };
    var googlemap = new google.maps.Map(document.getElementById("map"), mapOptions);
    
    var marker = new google.maps.Marker({
        position: dumbo,
        map: googlemap
    });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4Agps3IMLvK/gZbV7PzzjNY5hb5YLPvYllyWcdtKJlJ6Kq4Kdgv3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIp4xT/QFzNfVWvdxLbb8PI9a3UeI/4Eml4lgI5t24rB+ABB3K+ym" crossorigin="anonymous"></script>
</body>
</html>
