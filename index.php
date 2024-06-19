<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'router.php';
require 'config.php';
require 'includes/server.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$router = new Router();
ob_start();
$router->route($page);
$content = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <?php
                if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<p>Logged in as: $username</p>";
                }
                foreach ($pages as $url => $pageData) {
                    $activeClass = ($url == $page) ? ' active' : '';
                    echo "<li class='nav-item{$activeClass}'><a class='nav-link' href=\"index.php?page={$url}\">{$pageData['text']}</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>
</body>
</html>
