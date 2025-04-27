<?php
require_once 'models/user.php';

class UsersController{
    public function index(){
        echo 'controlador usuario';
    }

    public function register(){
        require_once 'views/user/register.php';
    }

    public function save(){
        if (isset($_POST)) {

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if (!empty($name)  && !is_numeric($name) && !preg_match("/[0-9]/", $name) &&
                !empty($lastname)  && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname) &&
                !empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL) && 
                !empty($password)) {
                $user = new User();
                $user->setName($name);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($password);

                $save = $user->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else{
                    $_SESSION['register'] = "failed";
                }
            } else{
                $_SESSION['register'] = "failed";
            }
        } else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url."users/register");
    }

    public function login(){
        if(isset($_POST)){
            $usuario = new User();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();
            

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            } else{
                $_SESSION['error_login'] = 'Ha fallado la identificación';
            }
        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }

}


?>
