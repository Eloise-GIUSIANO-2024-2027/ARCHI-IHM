<?php

namespace Controller;

use Model\MenuModel;
use Model\PlatModel;

/**
 * Contrôleur de la page menu.
 *
 * Vérifie l'authentification, gère la déconnexion,
 * récupère les plats via le modèle et charge la vue correspondante.
 */
class MenuController {

    /**
     * Point d'entrée de la page menu.
     *
     * Redirige vers la connexion si l'utilisateur n'est pas authentifié.
     * Détruit la session et redirige si le paramètre GET `logout` est présent.
     * Récupère les plats et expose les variables à la vue.
     *
     * @return void
     */
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