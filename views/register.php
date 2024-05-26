<?php include('includes\server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="error">
          <?php foreach ($_SESSION['errors'] as $error) : ?>
            <p><?php echo $error ?></p>
          <?php endforeach ?>
        </div>
        <?php unset($_SESSION['errors']);?>
      <?php endif; ?>


      <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<p>Logged in as: $username</p>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "<a href='login.php'>Login</a>";
    }
    ?>
    <header class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sign Up</a>
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
  </div>

  <form method="post" action="process_register.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4Agps3IMLvK/gZbV7PzzjNY5hb5YLPvYllyWcdtKJlJ6Kq4Kdgv3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIp4xT/QFzNfVWvdxLbb8PI9a3UeI/4Eml4lgI5t24rB+ABB3K+ym" crossorigin="anonymous"></script>
</body>
</html>
