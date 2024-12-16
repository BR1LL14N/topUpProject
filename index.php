<?php
include './init.php';
$modul = $_GET['modul'] ?? 'dashboard';
$fitur = $_GET['fitur'] ?? 'display';


switch ($modul) {
    case 'dashboard':
        include './views/dashboard.php';
        break;
    case 'gameAndItem':
        $controller = new gameController();
        $controller->handleRequest($fitur);
        break;
    case 'transaction':
        include './views/displayTransactionAdmin.php';
        break;
    case 'manageUsers':
        include './views/displayUserAdmin.php';
        break;
    // case 'product':
    //     include './views/product.php';
    //     break;
    case 'newAdmin':
        include './views/newAdmin.php';
        break;
    case 'itemGame':
        $controller = new itemController();
        $controller->handleRequest($fitur);
        break;
    default:
        include './views/dashboard.php';
        break;
}
?>