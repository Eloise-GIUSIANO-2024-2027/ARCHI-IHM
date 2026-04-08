<?php

namespace Controller;

use Model\MenuModel;
use Model\PlatModel;

class MenuController {
    public function index(): void {
        session_start();

        if (!isset($_SESSION['utilisateur'])) {
            header('Location: /public/index.php?page=connexion');
            exit();
        }

        if (isset($_GET['logout'])) {
            session_destroy();
            header('Location: /public/index.php?page=connexion');
            exit();
        }

        require __DIR__ . '/../Model/MenuModel.php';

        $platModel = new MenuModel();
        $plats = $platModel->getTousLesPlats();

        $user = $_SESSION['utilisateur'];
        require __DIR__ . '/../View/MenuView.php';
    }
}