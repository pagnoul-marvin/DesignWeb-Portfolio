<?php
/** @var string $link */
/** @var string $label_text */
/** @var string $input_name */
/** @var string $input_placeholder */
/** @var string $required */
/** @var string $input_value */
?>

<label for="<?= $link ?>"><?= $label_text ?></label>
<input value="<?= $input_value ?>" required="<?= $required ?>" name="<?= $input_name ?>" id="<?= $link ?>" placeholder="<?= $input_placeholder ?>"
       type="text">