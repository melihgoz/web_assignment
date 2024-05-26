<?php
class LogoutController {
    public function logout() {
        // Logout logic here
        session_destroy();
        header('Location: home.php');
    }
}
?>
