<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test');

// define('DB_SERVER', 'sql204.infinityfree.com');
// define('DB_USERNAME', 'if0_36571260');
// define('DB_PASSWORD', 'VDoMqCmcjj2L');
// define('DB_DATABASE', 'if0_36571260_test');

function getDB() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
