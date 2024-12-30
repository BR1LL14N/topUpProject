<?php
include './init.php';
$modul = $_GET['modul'] ?? 'dashboard';
$fitur = $_GET['fitur'] ?? 'display';


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo '<pre>';
//     print_r($_POST);
//     print_r($_FILES);
//     echo '</pre>';
//     exit;
// }

switch ($modul) {
    case 'dashboard':
        // $controller = new clientController();
        // $controller->handleRequest($fitur);
        include './client.php';
        break;
    case 'itemGame':
        $controller = new clientController();
        $controller->handleRequest($fitur);
        break;
    case 'auth':
        $controller = new userController();
        $controller->handleRequest($fitur);
        break;
}
?>