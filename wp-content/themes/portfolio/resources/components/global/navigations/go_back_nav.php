<?php
/** @var string $second_title_text */
/** @var number $page */
/** @var string $link_text */
/** @var string $link_title */
?>
<nav id="go_back" class="green_background">
    <h2 class="hidden"><?= $second_title_text; ?></h2>
    <a id="go_back_button" class="pages_button no_text_decoration" title="<?= $link_title ?>" hreflang="fr" href="<?= go_to_other_pages($page); ?>"><?= $link_text ?></a>
</nav>
