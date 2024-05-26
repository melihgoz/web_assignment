<?php
class RecipeController {
    public function recipe() {
        include('includes/session.php');
        require 'views/recipe.php';
    }

    public function process() {
        include('includes\process_recipe.php');
    }
}
?>
