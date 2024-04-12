<?php
$home_page = get_page_by_path('Acceuil');
$home_page_link = get_permalink($home_page);
?>
<footer id="footer">
    <nav id="footer_container">

        <ul id="footer_container_pages_container">
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="footer_container_pages_container_item">
                    <a class="no-text-decoration" href="<?= $link->url ?>"
                       title="<?= $link->label ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul id="footer_container_socials_container">
            <?php foreach (dw_get_navigation_links('socials') as $link): ?>
                <li class="footer_container_socials_container_item">
                    <a class="no-text-decoration" id="<?= $link->label ?>" href="<?= $link->url ?>"
                       title="<?= $link->label ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</footer>
</body>
</html
