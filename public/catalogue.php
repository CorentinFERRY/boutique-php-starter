<?php

declare(strict_types=1);
// starter-project/public/catalogue.php
require_once __DIR__ . '/../app/data.php';
// $products est maintenant disponible
require_once __DIR__ . '/../app/helpers.php';
// Les fonction de helpers sont maintenant disponible

//Compteurs pour les stats
$inStock = 0;
$onSale = 0;
$outOfStock = 0;

foreach ($products as $product) {
    if ($product["stock"] === 0) $outOfStock++;
    if ($product["discount"] > 0)  $onSale++;
    if ($product["stock"] > 0) $inStock++;
}

$categories = $_GET["categories"] ?? [];
$sort = $_GET["sort"] ?? "name_asc";
$page = $_GET["page"] ?? 1;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - MaBoutique</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="header">
        <div class="container header__container">
            <a href="index.html" class="header__logo">🛍️ MaBoutique</a>
            <nav class="header__nav">
                <a href="index.html" class="header__nav-link">Accueil</a>
                <a href="catalogue.html" class="header__nav-link header__nav-link--active">Catalogue</a>
                <a href="contact.html" class="header__nav-link">Contact</a>
            </nav>
            <div class="header__actions">
                <a href="panier.html" class="header__cart">🛒<span class="header__cart-badge">3</span></a>
                <a href="connexion.html" class="btn btn--primary btn--sm">Connexion</a>
            </div>
            <button class="header__menu-toggle">☰</button>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Notre Catalogue</h1>
                <p class="page-subtitle">Découvrez tous nos produits</p>
            </div>

            <div class="catalog-layout">

                <!-- ============================================
                 SIDEBAR FILTRES
                 JOUR 6 : Formulaire GET + conservation valeurs
                 ============================================ -->
                <aside class="catalog-sidebar">
                    <form action="catalogue.php" method="GET">
                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Recherche</h3>
                            <input type="text" name="q" class="form-input" placeholder="Rechercher..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Catégories</h3>
                            <div class="catalog-sidebar__categories">
                                <?= displayCategoryOptions($products,$categories)?>
                            </div>
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Prix</h3>
                            <div class="catalog-sidebar__price-inputs">
                                <div class="form-group">
                                    <label class="form-label">Min</label>
                                    <input type="number" name="price_min" class="form-input" placeholder="0 €" min="0" value="<?= htmlspecialchars($_GET['price_min'] ?? "") ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Max</label>
                                    <input type="number" name="price_max" class="form-input" placeholder="100 €" min="0"value="<?= htmlspecialchars($_GET['price_max'] ?? "") ?>">
                                </div>
                            </div>
                        </div>

                        <div class="catalog-sidebar__section">
                            <h3 class="catalog-sidebar__title">Disponibilité</h3>
                            <label class="form-checkbox">
                                <input type="checkbox" name="in_stock" value="1" <?= (htmlspecialchars($_GET['in_stock'] ?? "") === "1") ? "checked" : "" ?>>
                                <span>En stock uniquement</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn--primary btn--block">Appliquer</button>
                        <a href="catalogue.php" class="btn btn--secondary btn--block mt-sm">Réinitialiser</a>
                    </form>
                </aside>

                <div class="catalog-main">
                    <div class="catalog-header">
                        <p><strong><?= count(applyFilters($products)) ?></strong> produits trouvés</p>
                        <div class="catalog-header__sort">
                            <label>Trier :</label>
                            <select class="form-select" style="width:auto">
                                <option>Nom A-Z</option>
                                <option>Nom Z-A</option>
                                <option>Prix ↑</option>
                                <option>Prix ↓</option>
                            </select>
                        </div>
                    </div>

                    <!-- ============================================
                     8 PRODUITS
                     JOUR 3 : foreach
                     JOUR 4 : Badges conditionnels
                     ============================================ -->
                    <div class="products-grid">
                        <?php foreach (applyFilters($products) as $product): ?>
                            <article class="product-card">
                                <div class="product-card__image-wrapper">
                                    <img src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>" class="product-card__image">
                                    <div class="product-card__badges">
                                        <?= displayBadge($product) ?>
                                    </div>
                                </div>
                                <div class="product-card__content">
                                    <span class="product-card__category"><?= $product["category"] ?></span>
                                    <a href="produit.html?id=1" class="product-card__title"><?= $product["name"] ?></a>
                                    <div class="product-card__price">
                                        <?= displayPrice($product["price"], $product["discount"]) ?>
                                    </div>
                                    <?= displayStockStatus($product["stock"]) ?>
                                    <div class="product-card__actions">
                                        <?= displayButton($product["stock"]) ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <!-- ============================================
                     PAGINATION
                     JOUR 6 : Générer dynamiquement
                     ============================================ -->
                    <nav class="pagination">
                        <a class="pagination__item pagination__item--disabled">←</a>
                        <a class="pagination__item pagination__item--active">1</a>
                        <a class="pagination__item">2</a>
                        <a class="pagination__item">3</a>
                        <a class="pagination__item">→</a>
                    </nav>
                </div>
            </div>
        </div>
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
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="catalogue.html">Catalogue</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h4>Compte</h4>
                    <ul>
                        <li><a href="connexion.html">Connexion</a></li>
                        <li><a href="inscription.html">Inscription</a></li>
                        <li><a href="panier.html">Panier</a></li>
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