<?php
/** @var string $link */
/** @var string $label_text */
/** @var string $input_name */
/** @var string $input_value */
/** @var string $required */
?>

<label for="<?= $link ?>"><?= $label_text ?></label>
<input required="<?= $required ?>" value="<?= $input_value ?>" name="<?= $input_name ?>" id="<?= $link ?>" type="radio">
