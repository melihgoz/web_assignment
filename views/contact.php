<?php
include('includes/session.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<p class='logged-in'>Logged in as: $username</p>";
    echo "<a href='logout.php' class='btn btn-sm btn-outline-secondary'>Logout</a>";
} else {
    echo "<a href='login.php' class='btn btn-sm btn-outline-secondary'>Login</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>
<body>
  <header class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Send a message!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Main Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recipe.php">Recipes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="contact.php">Contact Us</a>
          </li>
          <?php if ($id == 2): ?>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">Messages</a>
        </li>
        <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2>Contact Form</h2>
        <?php if (isset($_SESSION['errors'])) : ?>
          <div class="error">
            <?php foreach ($_SESSION['errors'] as $error) : ?>
              <p><?php echo $error ?></p>
            <?php endforeach ?>
          </div>
          <?php unset($_SESSION['errors']);?>
        <?php endif; ?>
        
        <form action="includes\process_contact.php" method="post" class="form-group">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4Agps3IMLvK/gZbV7PzzjNY5hb5YLPvYllyWcdtKJlJ6Kq4Kdgv3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIp4xT/QFzNfVWvdxLbb8PI9a3UeI/4Eml4lgI5t24rB+ABB3K+ym" crossorigin="anonymous"></script>
</body>
</html>
