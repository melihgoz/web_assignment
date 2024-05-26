<?php
include('session.php');
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['recipe_title'];
    $content = $_POST['recipe_content'];

    $conn = getDB();

    $stmt = $conn->prepare("INSERT INTO meal_recipes (user_id, recipe_title, recipe_content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $_SESSION['id'], $title, $content);

    if ($stmt->execute()) {
        header('Location: recipe.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
