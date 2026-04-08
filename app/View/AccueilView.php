<?php
/**
 * Vue de la page d'accueil authentifiée.
 *
 * Affiche un message de bienvenue personnalisé avec le prénom et le nom
 * de l'utilisateur connecté, ainsi que les sections de présentation du restaurant.
 *
 * @var array $user Données de l'utilisateur connecté (clés : 'prenom', 'nom').
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../public/assets/CSS/pageAccueil.css" />
    <link rel="stylesheet" href="./assets/CSS/theme.css" />
    <link rel="stylesheet" href="./assets/CSS/header.css" />
    <link rel="stylesheet" href="./assets/CSS/footer.css" />
    <title>Acceuil</title>
</head>
<body>
<header>
    <div class="Header-div">
        <img src="/public/assets/IMAGE/logo.png" class="logo-header" alt="le logo du site" />
        <div class="header-right">
            <a href="/public/index.php?page=menu"><button class="boutton-menu">Menu</button></a>
            <a href="?logout=1"><button class="boutton-deconnexion">Se déconnecter</button></a>
        </div>
    </div>
</header>

<div class="image-resto">
    <img src="/public/assets/IMAGE/restaurant.jpeg" alt="facade du restaurant" />
</div>
<div class="top">
    <h1 class="titre-index">Bienvenue à OH MY BURGER !</h1>
    <h1 class="Bonjour">Bonjour <?php echo $user['prenom'] . " " . $user['nom']; ?></h1>
</div>
<h1 class="Bonjour">Que voulez vous manger ? </h1>
<div class="presentation">
    <div class="texte-groupe">
        <p class="titre-presentation">Le temple du burger, version cosy</p>
        <p class="texte-presentation">Installez-vous dans nos banquettes, profitez de la lumière tamisée et laissez-vous tenter par le vrai goût d'un bon burger.
            Chez nous, on mise sur le réconfort : du bœuf fondant, des options 100 % vegan qui n'ont rien à envier aux classiques, et des nuggets ultra-croustillants.
            Une ambiance chaleureuse pour des moments simples et gourmands.</p>
    </div>
    <img src="/public/assets/IMAGE/pile-burger.jpg" class="image-presentation" alt="facade du restaurant" />
</div>
<div class="presentation">
    <img src="/public/assets/IMAGE/vegan.jpg" class="image-presentation" alt="facade du restaurant" />
    <div class="texte-groupe">
        <p class="titre-presentation">Le végétal n’a jamais eu aussi bon goût</p>
        <p class="texte-presentation">Qui a dit qu’un burger vegan manquait de caractère ?
            Découvrez nos recettes exclusives où le fondant rencontre le croquant. Des steaks végétaux savoureux,
            des sauces maison onctueuses et des produits frais, le tout dans un pain artisanal. Une explosion de saveurs,
            garantie sans compromis. </p>
    </div>
</div>
<div class="presentation">
    <div class="texte-groupe">
        <p class="titre-presentation">Notre carte rien que pour vous</p>
        <p class="texte-presentation">Que vous soyez amateur de viande ou adepte du vegan, notre carte est pensée pour rassembler.
            Venez partager une assiette de nuggets entre amis ou dévorer notre burger signature dans une atmosphère décontractée et
            chaleureuse. Ici, on prend le temps de bien manger.
        </p>
    </div>
    <img src="/public/assets/IMAGE/menu.png" class="image-presentation" alt="facade du restaurant" />
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
            <p class="footer-texte">123 Rue du Burger, BurgerVille</p>
            <p class="footer-texte">contact@ohmyburger.fr</p>
            <p class="footer-texte">04 12 34 56 78</p>
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