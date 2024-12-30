<?php
include './init.php';
$modul = $_GET['modul'] ?? 'dashboard';
$fitur = $_GET['fitur'] ?? 'display';
$gameID = $_GET['gameID'] ?? null;
$itemID = $_GET['itemID'] ?? null;
$paymentID = $_GET['paymentID'] ?? null;


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo '<pre>';
//     print_r($_POST);
//     print_r($_FILES);
//     echo '</pre>';
//     exit;
// }

switch ($modul) {
    case 'dashboard':
        include './views/dashboard.php';
        break;
    case 'gameAndItem':
        $controller = new gameController();
        $controller->handleRequest($fitur);
        break;
    case 'manageUsers':
        include './views/displayUserAdmin.php';
        break;
    case 'newAdmin':
        include './views/newAdmin.php';
        break;
    case 'itemGame':
        $controller = new itemController();
        $controller->handleRequest($fitur,$gameID,$itemID); ;
        break;
    case 'paymentMethod':
        $controller = new paymentMethodController();
        $controller->handleRequest($fitur);
        break;
    case 'auth':
        $controller = new userController();
        $controller->handleRequest($fitur);
        break;
    default:
        include './views/dashboard.php';
        break;
}
?>