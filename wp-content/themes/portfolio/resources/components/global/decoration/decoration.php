<?php
/** @var string $id */
/** @var string $title_text */
/** @var string $display_class */
?>
<section id="decoration" class="decoration <?= give_decoration_class(); ?> <?= $display_class ?>">
    <h2><?= $title_text ?></h2>
    <div id="<?= $id ?>" class="decorate"></div>
</section>