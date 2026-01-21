<?php
    $flash =getFlash();
?>

<!-- views/layout.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Ma Boutique' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header class="header">
        <div class="container header__container">
            <a href="/" class="header__logo">🛍️ MaBoutique</a>
            <nav class="header__nav">
                <a href="/" class="header__nav-link">Accueil</a>
                <a href="/produits" class="header__nav-link header__nav-link--active">Catalogue</a>
                <a href="/contact" class="header__nav-link">Contact</a>
            </nav>
            <div class="header__actions">
                <a href="/panier" class="header__cart">🛒<span class="header__cart-badge"><?= session('itemCart',0) ?></span></a>
                <a href="connexion.html" class="btn btn--primary btn--sm">Connexion</a>
            </div>
            <button class="header__menu-toggle">☰</button>
        </div>
    </header>
    <main>
        <?php if (isset($flash)): ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php endif; ?>

        <?= $content ?>
    </main>

  <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__section">
                    <h4>À propos</h4>
                    <p>MaBoutique - Shopping en ligne.</p>
                </div>
                <div class="footer__section">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/produits">Catalogue</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h4>Compte</h4>
                    <ul>
                        <li><a href="connexion.html">Connexion</a></li>
                        <li><a href="inscription.html">Inscription</a></li>
                        <li><a href="/panier">Panier</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h4>Formation</h4>
                    <ul>
                        <li><a href="#">Jour 1-5</a></li>
                        <li><a href="#">Jour 6-10</a></li>
                        <li><a href="#">Jour 11-14</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <p>&copy; <?= date('Y') ?> MaBoutique</p>
            </div>
        </div>
    </footer>
</body>

</html>