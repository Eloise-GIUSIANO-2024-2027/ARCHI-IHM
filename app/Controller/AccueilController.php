<?php

namespace Controller;
class AccueilController {
    public function index(): void {
        session_start();

        if (!isset($_SESSION['utilisateur'])) {
            header('Location: /public/connexion.php');
            exit();
        }

        if (isset($_GET['logout'])) {
            session_destroy();
            header('Location: /public/connexion.php');
            exit();
        }

        $user = $_SESSION['utilisateur'];
        require '../app/View/AccueilView.php';
    }
}