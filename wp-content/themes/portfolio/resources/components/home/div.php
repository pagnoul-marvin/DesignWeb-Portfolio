<?php
/** @var string $text */
/** @var string $link_href */
/** @var string $link_id */
/** @var string $link_title */
/** @var string $link_text */
/** @var string $link_class */
?>

<div>
    <p class="align_left_text"><?= $text ?></p>
    <a href="<?= $link_href ?>" id="<?= $link_id ?>" class="<?= $link_class; ?> pages_button no_text_decoration" title="<?= $link_title ?>"><?= $link_text ?></a>
</div>


