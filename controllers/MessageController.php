<?php
class MessageController {
    public function list() {
        include('includes/session.php');
        
        if ($_SESSION['id'] != 2) {
            header('Location: home.php');
            exit();
        }

        require 'views/messages.php';
    }
}
?>
