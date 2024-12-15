<?php
include './init.php';
$modul = $_GET['modul'] ?? 'dashboard';
$fitur = $_GET['fitur'] ?? 'display';

switch ($modul) {
    case 'dashboard':
        include './client.php';
        break;
}


?>