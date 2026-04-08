<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../public/assets/CSS/pageAccueil.css" />
    <link rel="stylesheet" href="./assets/CSS/theme.css" />
    <link rel="stylesheet" href="./assets/CSS/menu.css" />
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
    <h1 class="titre-index">Voici le menu de OH MY BURGER !</h1>
</div>
<h1>LE MENU</h1>

<div class="plats-grid">
    <?php foreach ($plats as $plat): ?>
        <div class="plat-carte">
            <p class="plat-nom"><?php echo htmlspecialchars($plat['nom']); ?></p>
            <p class="plat-desc"><?php echo htmlspecialchars($plat['description']); ?></p>
            <p class="plat-prix"><?php echo number_format($plat['prix'], 2, ',', ' '); ?> €</p>
        </div>
    <?php endforeach; ?>
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