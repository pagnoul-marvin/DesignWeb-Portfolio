<footer class="<?php echo give_page_footer_class(); ?>" id="footer">
    <nav id="footer_container">
        <?php component('global.titles.second_title', [
                'class' => 'hidden',
                'text' => 'Navigation de pied de page'
        ]); ?>
        <ul id="footer_container_pages_container">
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="footer_container_pages_container_item">
                    <a class="nav_icon no_text_decoration" href="<?= $link->url ?>"
                       title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul id="footer_container_socials_container">
            <?php foreach (dw_get_navigation_links('socials') as $link): ?>
                <li class="footer_container_socials_container_item">
                    <a id="<?= $link->label ?>" href="<?= $link->url ?>"
                       title="Se diriger vers mon <?= $link->label ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div id="legal_notices" class="<?= give_legal_notices_class(); ?>">
            <p>&copy; Marvin Pagnoul. Tout droits r&eacute;serv&eacute;s. Cr&eacute;&eacute; par Marvin Pagnoul.</p>
            <a class="pages_button no_text_decoration" href="<?= go_to_other_pages(22); ?>" hreflang="fr" title="Aller vers la page des mentions légales">Mentions l&eacute;gales</a>
        </div>

    </nav>

</footer>

</body>

</html
