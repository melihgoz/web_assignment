<?php
include('includes/server.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<p class='logged-in'>Logged in as: $username</p>";
    echo "<a href='logout.php' class='btn btn-sm btn-outline-secondary'>Logout</a>";
} else {
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
  <title>Meal Recipes</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <header class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Meal Recipes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Main Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="recipe.php">Recipes</a>
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

  <main id="tariflerListesi" class="container">
      <h2>Share Your Recipe</h2>
      <form action="process_recipe.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
          <label for="recipe_title" class="form-label">Title:</label>
          <input type="text" name="recipe_title" required class="form-control">
        </div>
        <div class="mb-3">
          <label for="recipe_content" class="form-label">Content:</label>
          <textarea name="recipe_content" rows="5" cols="50" required class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Share</button>
      </form>
  </main>

  <?php
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  if ($id !== '0') {

  $conn = getDB();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT user.username, meal_recipes.recipe_title, meal_recipes.recipe_content, meal_recipes.created_at
                            FROM user
                            INNER JOIN meal_recipes ON user.id = meal_recipes.user_id
                            ORDER BY meal_recipes.created_at DESC");

    if ($result->num_rows > 0) {
      echo "<div class='recipes-list row'>";

      while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 col-sm-6 mb-3'>";
        echo "<div class='recipe card'>";
        echo "<div class='card-header'>" . htmlspecialchars($row['username']) . "</div>";
        echo "<div class='card-body'>";
        echo "<h2>" . htmlspecialchars($row['recipe_title']) . "</h2>";
        echo "<div class='card-text'>";
        echo "<p>" . htmlspecialchars($row['recipe_content']) . "</p>";
        echo "<p class='created-at'>Posted on: " . htmlspecialchars($row['created_at']) . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }

      echo "</div>";
    } else {
      echo "<p>No recipes found.</p>";
    }
    $conn->close();
  }
}
?>
<script src="script.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4Agps3IMLvK/gZbV7PzzjNY5hb5YLPvYllyWcdtKJlJ6Kq4Kdgv3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIp4xT/QFzNfVWvdxLbb8PI9a3UeI/4Eml4lgI5t24rB+ABB3K+ym" crossorigin="anonymous"></script>
</body>
</html>
