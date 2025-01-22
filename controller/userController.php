<?php
session_start();
require_once './model/userModel.php';

class userController extends userModel {

    public function __construct() {
        parent::__construct(mysqli_connect("localhost", "root", "", "webgame"));
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function handleRequest($fitur) {
        switch ($fitur) {
            case 'register':
                $this->addUser($_POST);
                break;
            case 'reqLogin':
                $this->reqLogin($_POST['email'], $_POST['password']);
                break;
            case 'profile':
                $this->profile();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'edit':
                $this->editProfile();
                break;
            case 'admins':
                $this->getAlladminsController();
                break;
            default:
                echo "Fitur tidak valid";
                break;
        }
    }

    public function addUser($data) {
        $defaultIcon = $data['defaultIcon'];
        $role = $data['role'];
        $username = $this->verifyUsernames($data['username']);
        $email = $data['email'];
        $password = $this->hashPassword($data['password'], $data['verifyPassword']);

        if ($username && $password) {
            $result = $this->addUserToDb($username, $email, $password, $role, $defaultIcon);
            if ($result['success']) {
                echo "<script>alert('Registrasi berhasil, silakan login');
                window.location.href = 'loginForm.php';</script>";
            } else {
                echo "<script>alert('Registrasi Gagal')</script>";
            }
        }
    }

    public function hashPassword($passwordRill, $passwordVerify) {
        if ($passwordRill === $passwordVerify) {
            return password_hash($passwordRill, PASSWORD_DEFAULT);
        } else {
            echo "<script>alert('Password tidak sama');
            window.location.href = 'register.php';</script>";
            return false;
        }
    }

    public function reqLogin($email, $password) {
        $user = $this->searchUserByEmail($email);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // die();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['name'] = $user['username'];
                $_SESSION['login'] = true;
                $_SESSION['role'] = $user['role'];
                $_SESSION['id'] = $user['user_id'];

                if ($user['role'] == 'user') {
                    header('Location: indexClient.php?modul=dashboard&fitur=display');
                } else if ($user['role'] == 'admin') {
                    header('Location: index.php?modul=dashboard&fitur=display');
                }else {
                    header('Location: index.php?modul=dashboard&fitur=display');
                }
                exit();
            } else {
                $_SESSION['error'] = "Password salah!";
                header('Location: loginForm.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Email tidak terdaftar!";
            header('Location: loginForm.php');
            exit();
        }
    }

    public function verifyUsernames($username) {
        $user = $this->searchUserByUsername($username);
        return !$user ? $username : false;
    }

    public function profile() {
        $user = $this->searchUserByUsername($_SESSION['name']);
        include './views/profileUser.php';
    }

    public function editProfile() {
        $user = $this->searchUserByUsername($_SESSION['name']);
        include './views/editProfile.php';
    }

    public function getAlladminsController(){
        $admins = $this->getAllAdmins();
        // echo "<pre>";
        // print_r($admins);
        // echo "</pre>";
        // die();
        include './views/displayAllAdmins.php';
    }

    public function logout() {
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
