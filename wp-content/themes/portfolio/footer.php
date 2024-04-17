<footer class="<?php echo give_page_footer_class(); ?>" id="footer">
    <nav id="footer_container">
        <?php component('global.second_title', [
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
    </nav>
</footer>
</body>
</html
