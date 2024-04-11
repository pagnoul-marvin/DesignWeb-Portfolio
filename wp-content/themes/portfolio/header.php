<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marvin Pagnoul&ndash;Portfolio</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= dw_asset('css/reset.css'); ?>">
    <link rel="stylesheet" href="<?= dw_asset('css/index.css'); ?>">
    <script type="module" src="<?= dw_asset('js/main.js'); ?>"></script>
</head>
<body>
    <h1 class="hidden">Acceuil de mon portfolio</h1>
    <header>
        <nav id="main_nav">
            <h2 class="hidden">Navigation principale</h2>
            <ul class="nav__container">
                <?php foreach(dw_get_navigation_links('main') as $link): ?>
                   <li class="main_nav_item"><a href="<?= $link->url ?>" title="<?= $link->label ?>" class="nav__link"><?= $link->label ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
</body>
</html>