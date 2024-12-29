<?php
include './init.php';
$modul = $_GET['modul'] ?? 'dashboard';
$fitur = $_GET['fitur'] ?? 'display';

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
}
?>