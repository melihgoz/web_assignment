<?php
class Router {
    public function route($path) {
        switch ($path) {
            case 'home.php':
                $this->loadController('HomeController', 'home');
                break;
            case 'recipe.php':
                $this->loadController('RecipeController', 'recipe');
                break;
            case 'contact.php':
                $this->loadController('ContactController', 'form');
                break;
            case 'process_contact.php':
                $this->loadController('ContactController', 'process');
                break;
            case 'login.php':
                $this->loadController('LoginController', 'login');
                break;
            case 'process_login.php':
                $this->loadController('LoginController', 'process');
                break;    
            case 'logout.php':
                $this->loadController('LogoutController', 'logout');
                break;
            case 'messages.php':
                $this->loadController('MessageController', 'list');
                break;
            case 'register.php':
                $this->loadController('RegisterController', 'showRegisterForm');
                break;
            case 'process_register.php':
                $this->loadController('RegisterController', 'register');
                break;
            case 'process_recipe.php':
                $this->loadController('RecipeController', 'process');
                break;
            // Add more routes as needed
            default:
            echo $path;
                //$this->loadController('ErrorController', 'notFound');
        }
    }

    private function loadController($controllerName, $action) {
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName();
        $controller->$action();
    }
}
?>
