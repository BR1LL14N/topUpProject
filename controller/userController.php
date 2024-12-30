<?php
require_once './model/userModel.php';

class userController{

    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "webgame");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function handleRequest($fitur){
        switch($fitur){
            case 'register':
                $this->addUser($_POST);
                break;
            case 'reqLogin':
                $this->reqLogin($_POST['email'], $_POST['password']);
                break;
            case 'login':
                // $this->login($_POST['email'], $_POST['password']);
                break;
            case 'logout':
                // $this->logout();
                break;
            case 'verifyUsernames':
                // $this->verifyUsernames($_POST['username']);
                break;
            default:
                echo "Fitur tidak valid";
                break;
        }
    }

    public function addUser($data){
        $userModel = new userModel($this->conn);
        $defaultIcon = $data['defaultIcon'];
        $role = $data['role'];
        $username = $this->verifyUsernames($data['username']);
        $email = $data['email'];
        $password = $this->hashPassword($data['password'], $data['verifyPassword']);

        if($username && $password){
            $result = $userModel->addUserToDb($username, $email, $password, $role, $defaultIcon);
            if($result){
                echo"<script>alert('Registrasi berhasil silahkan login');
                window.location.href = 'loginForm.php'
                </script>";
            }else{
                echo"<script>alert('Registrasi Gagal')</script>";
            }
        }


    }

    public function hashPassword($passwordRill, $passwordVerify){
        $passwordRill = $passwordRill;
        $passwordVerify = $passwordVerify;

        if($passwordRill == $passwordVerify){
            $hash = password_hash($passwordRill, PASSWORD_DEFAULT);
            return $hash;
        }else{
            echo"<script>alert('Password tidak sama')
            window.location.href = 'register.php'
            </script>";
            return false;
        }
    }

    public function reqLogin($email,$password){
        $userModel = new userModel($this->conn);
        $user = $userModel->searchUserByEmail($email);
        if($user){
            if(password_verify($password, $user['password'])){
                // $_SESSION['user'] = $user;
                echo"<script>alert('Login Berhasil selamat datang $user[username]')
                window.location.href = 'indexClient.php?modul=dashboard&fitur=display';
                </script>";
            }else{
                echo"<script>alert('Password Salah')
                window.location.href = 'loginForm.php';
                </script>";
            }
        }else{
            echo"<script>alert('Email tidak terdaftar')
            window.location.href = 'loginForm.php';
            </script>";
        }
        
    }

    public function verifyUsernames($username){
        $userModel = new userModel($this->conn);
        $user = $userModel->searchUserByUsername($username);
        if(!$user){
            return $username;
        }else{
            return false;
        }
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}


?>