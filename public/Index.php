<?php
/**
 * Routeur principal de l'application.
 *
 * Récupère le paramètre GET `page` et charge le contrôleur
 * correspondant, ou la page d'accueil par défaut.
 *
 * @var string $page Identifiant de la page demandée (accueil|connexion|menu).
 */
$page = $_GET['page'] ?? 'home';

switch ($page) {
    /**
     * Page d'accueil du restaurant.
     *
     * @uses \Controller\AccueilController::index()
     */
    case 'accueil':
        require __DIR__ . '/../app/Controller/AccueilController.php';
        $controller = new \Controller\AccueilController();
        $controller->index();
        break;

    /**
     * Page de connexion utilisateur.
     *
     * @uses \Controller\ConnexionController::index()
     */
    case 'connexion':
        require __DIR__ . '/../app/Controller/ConnexionController.php';
        $controller = new \Controller\ConnexionController();
        $controller->index();
        break;

    /**
     * Page du menu avec la liste des plats.
     *
     * @uses \Controller\MenuController::index()
     */
    case 'menu':
        require __DIR__ . '/../app/Controller/MenuController.php';
        $controller = new \Controller\MenuController();
        $controller->index();
        break;

    /**
     * Page par défaut si aucune route ne correspond.
     *
     * @uses home.php
     */
    default:
        require __DIR__ . '/home.php';
        break;
}