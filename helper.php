<?php
include './init.php';


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo '<pre>';
//     print_r($_POST);
//     print_r($_FILES);
//     echo '</pre>';
//     exit;
// }


$controller = new userController();
$controller->reqLogin($_POST['email'], $_POST['password']);




?>