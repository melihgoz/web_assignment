<?php include 'includes\server.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>
<body>
  <div class="header">
    <h2>Login</h2>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<p>Logged in as: $username</p>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "<a href='login.php'>Login</a>";
    }
    ?>
    <ul>
      <li><a href="home.php">Main Page</a></li>
      <li><a href="recipe.php">Recipes</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="register.php">Register</a></li>
    </ul>
  </div>
  
  <div class="form-container">
    <form method="post" action="process_login.php">
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
      </div>
      <p>
        Not yet a member? <a href="register.php">Sign up</a>
      </p>
    </form>
    <?php if (isset($_GET['alert'])) { ?>
      <p class="alert"><?php echo $_GET['alert']; ?></p>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4Agps3IMLvK/gZbV7PzzjNY5hb5YLPvYllyWcdtKJlJ6Kq4Kdgv3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIp4xT/QFzNfVWvdxLbb8PI9a3UeI/4Eml4lgI5t24rB+ABB3K+ym" crossorigin="anonymous"></script>
</body>
</html>
