<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Marvin Pagnoul">
    <meta name="description" content="La page d'accueil de mon portfolio">
    <meta name="keywords" content="Portfolio, Marvin Pagnoul, Marvin, Pagnoul, Accueil">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marvin Pagnoul&ndash;Portfolio</title>
    <link rel="stylesheet" href="<?= dw_asset('css/reset.css'); ?>">
    <link rel="stylesheet" href="<?= dw_asset('css/index.css'); ?>">
    <script type="module" src="<?= dw_asset('js/main.js'); ?>"></script>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav id="main_nav">
            <h2 class="hidden">Navigation principale</h2>

            <a id="logo" href="<?= dw_get_page_path('Accueil'); ?>">Accueil</a>

            <input type="checkbox" id="burger_menu">
            <label for="burger_menu">
                <span class="line"></span>
            </label>

            <ul id="main_nav_container">
                <?php foreach (dw_get_navigation_links('main') as $link): ?>
                    <li class="main_nav_container_item">
                        <a class="nav_icon no_text_decoration" href="<?= $link->url ?>"
                           title="<?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>