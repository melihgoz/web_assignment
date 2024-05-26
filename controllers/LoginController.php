<?php
class LoginController {
    public function login() {
        include 'views/login.php';

    }
    public function process() {
        include 'includes/server.php';

        $conn = getDB();

        if (isset($_POST['login_user'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
          
          
            if (empty($username)) {
                array_push($errors, "Username is required");
            }
            if (empty($password)) {
                array_push($errors, "Password is required");
            }
          
            if (count($errors) == 0) {
                $password = md5($password);
                $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
                $results = mysqli_query($conn, $query);
              $checkarray = $results -> fetch_array();
                if($checkarray){
          
                $_SESSION['id']   = $checkarray['id']; 
                $_SESSION['username'] = $checkarray['username'];
                $_SESSION['password'] = $checkarray['password'];
                header('Location: home.php');
                }else {
                    array_push($errors, "Wrong username/password combination");
                }
            }
          
        }
    }
}
?>
