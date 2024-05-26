<?php

session_start();

require 'router.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = explode("/", $path);
$len = count($path);

$router = new Router();
$router->route($path[$len - 1]);
?>
