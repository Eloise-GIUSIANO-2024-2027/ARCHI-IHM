<?php

namespace Controller;

/**
 * Contrôleur de la page d'accueil authentifiée.
 *
 * Vérifie l'authentification, gère la déconnexion
 * et charge la vue d'accueil avec les données de l'utilisateur.
 */
class AccueilController {

    /**
     * Point d'entrée de la page d'accueil.
     *
     * Redirige vers la connexion si l'utilisateur n'est pas authentifié.
     * Détruit la session et redirige si le paramètre GET `logout` est présent.
     * Expose la variable `$user` à la vue.
     *
     * @return void
     */
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