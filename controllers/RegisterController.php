<?php
class RegisterController {
    public function showRegisterForm() {
        include('includes/session.php');
        require 'views/register.php';
    }

    public function register() {
        include('includes\process_register.php');
    }
}
?>
