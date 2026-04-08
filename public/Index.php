<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'accueil':
        require __DIR__ . '/../app/Controller/AccueilController.php';
        $controller = new \Controller\AccueilController();
        $controller->index();
        break;

    case 'connexion':
        require __DIR__ . '/../app/Controller/ConnexionController.php';
        $controller = new \Controller\ConnexionController();
        $controller->index();
        break;

    case 'menu':
        require __DIR__ . '/../app/Controller/MenuController.php';
        $controller = new \Controller\MenuController();
        $controller->index();
        break;

    default:
        require __DIR__ . '/home.php';
        break;
}