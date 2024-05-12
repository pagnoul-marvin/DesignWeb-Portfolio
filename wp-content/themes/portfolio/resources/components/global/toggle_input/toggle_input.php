<?php
/** @var string $input_id */
/** @var string $label_class */
/** @var string $label_text */
/** @var string $display_class */
?>

<input type="checkbox" id="<?= $input_id ?>" class="<?= $display_class ?>">
<label for="<?= $input_id ?>" class="<?= $label_class ?> <?= $display_class ?>"><?= $label_text ?></label>