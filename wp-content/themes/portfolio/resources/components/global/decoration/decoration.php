<?php
/** @var string $id */
/** @var string $title_text */
?>
<section class="decoration <?= give_decoration_class(); ?>">
    <h2><?= $title_text ?></h2>
    <div id="<?= $id ?>" class="decorate"></div>
    <p class="pages_button no_text_decoration">Passer</p>
</section>