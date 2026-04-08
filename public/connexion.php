<?php
/**
 * Page de connexion du site Oh My Burger.
 *
 * Démarre la session, traite le formulaire POST en vérifiant
 * l'adresse mail contre l'API REST locale, puis redirige
 * l'utilisateur ou affiche un message d'erreur.
 *
 * @var string $erreur  Message d'erreur affiché si l'email est introuvable.
 */
session_start();

$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /**
     * Adresse mail saisie par l'utilisateur, nettoyée des espaces.
     *
     * @var string $adresse_mail_saisie
     */
    $adresse_mail_saisie = trim($_POST['mail']);

    /**
     * Récupère la liste de tous les utilisateurs depuis l'API REST.
     *
     * @var resource $ch      Handle cURL pointant vers l'endpoint /utilisateurs.
     * @var string   $json    Réponse brute JSON de l'API.
     * @var array    $utilisateurs Liste des utilisateurs désérialisés.
     */
    $ch = curl_init('http://localhost:3003/utilisateurs');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    $json = curl_exec($ch);
    curl_close($ch);

    $utilisateurs = json_decode($json, true);

    /**
     * Indique si un utilisateur correspondant à l'email a été trouvé.
     *
     * @var bool $trouve
     */
    $trouve = false;
    foreach ($utilisateurs as $utilisateur) {
        if (strtolower($utilisateur['email']) === strtolower($adresse_mail_saisie)) {
            $trouve = true;
            $_SESSION['utilisateur'] = $utilisateur;
            break;
        }
    }

    if ($trouve) {
        header('Location: /public/index.php?page=accueil');
        exit();
    } else {
        $erreur = "Adresse mail introuvable, accès refusé.";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Connexion/Oh My Burger</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/CSS/theme.css" />
    <link rel="stylesheet" href="./assets/CSS/header.css" />
    <link rel="stylesheet" href="./assets/CSS/footer.css" />
    <link rel="stylesheet" href="./assets/CSS/connexion.css" />
</head>
<body>

<header>
    <div class="Header-div">
        <img src="/public/assets/IMAGE/logo.png" class="logo-header" alt="le logo du site" />
        <div class="header-right">
            <a href="connexion.php"><button class="boutton-connexion">Connexion</button></a>
        </div>
    </div>
</header>

<div class="connexion-wrapper">
    <div class="connexion-card">
        <p class="connexion-titre">Connexion</p>
        <p class="connexion-sous-titre">Entrez votre adresse mail pour accéder à votre espace.</p>

        <?php if ($erreur): ?>
            <p class="connexion-erreur"><?php echo $erreur; ?></p>
        <?php endif; ?>

        <form method="POST" action="connexion.php">
            <label class="connexion-label" for="mail">Votre adresse mail</label>
            <input
                    class="connexion-input"
                    type="text"
                    id="mail"
                    name="mail"
                    placeholder="monadressemail@gmail.com"
            />
            <button class="connexion-btn" type="submit">Se connecter</button>
        </form>
    </div>
</div>

<footer>
    <div class="footer-div">
        <div class="footer-col">
            <img src="/public/assets/IMAGE/logo.png" class="logo-footer" alt="logo Oh My Burger" />
        </div>
        <div class="footer-col">
            <p class="footer-titre">Navigation</p>
            <a href="menu.php" class="footer-lien">Menu</a>
            <a href="connexion.php" class="footer-lien">Connexion</a>
        </div>
        <div class="footer-col">
            <p class="footer-titre">Contact</p>
            <p class="footer-texte">123 Rue du Burger, Marseille</p>
            <p class="footer-texte">contact@ohmyburger.fr</p>
            <p class="footer-texte">04 91 00 00 00</p>
        </div>
        <div class="footer-col">
            <p class="footer-titre">Horaires</p>
            <p class="footer-texte">Lun – Ven : 11h – 22h</p>
            <p class="footer-texte">Sam – Dim : 11h – 23h</p>
        </div>
    </div>
    <div class="footer-bas">
        <p>© 2026 Oh My Burger — Tous droits réservés</p>
    </div>
</footer>

</body>
</html>