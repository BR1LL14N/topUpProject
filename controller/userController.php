<?php
session_start();
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
                $this->logout();
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

    public function reqLogin($email, $password) {
        $userModel = new userModel($this->conn);
        $user = $userModel->searchUserByEmail($email); // Pastikan ini menggunakan prepared statements.
    
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Regenerasi session ID untuk keamanan
                session_regenerate_id(true);
    
                // Atur sesi berdasarkan role
                $_SESSION['name'] = $user['username'];
                $_SESSION['login'] = true;
                $_SESSION['role'] = $user['role'];
                $_SESSION['id'] = $user['user_id'];
    
                // Redirect berdasarkan role
                if ($user['role'] == 'user') {
                    // echo "<script>alert('Login Berhasil selamat datang $user[username]')</script>";
                    header('Location: indexClient.php?modul=dashboard&fitur=display');
                } else {
                    header('Location: index.php?modul=dashboard&fitur=display');
                }
                exit();
            } else {
                // Flash message untuk password salah
                $_SESSION['error'] = "Password salah!";
                header('Location: loginForm.php');
                exit();
            }
        } else {
            // Flash message untuk email tidak terdaftar
            $_SESSION['error'] = "Email tidak terdaftar!";
            header('Location: loginForm.php');
            exit();
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

    public function logout() {
        // session_start();
        session_unset();
        session_destroy();
        header('Location: loginForm.php');
        exit();
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}


?>