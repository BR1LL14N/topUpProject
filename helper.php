<?php
include './init.php';
$modul = $_GET['modul'];
$fitur = $_GET['fitur'];


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo '<pre>';
//     print_r($_POST);
//     print_r($_FILES);
//     echo '</pre>';
//     exit;
// }

switch ($modul) {
    case 'auth':
        $controller = new userController();
        $controller->handleRequest($fitur);
        break;
}




?>