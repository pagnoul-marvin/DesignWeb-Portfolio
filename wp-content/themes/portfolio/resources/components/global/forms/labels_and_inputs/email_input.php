<?php
/** @var string $link */
/** @var string $label_text */
/** @var string $input_name */
/** @var string $input_placeholder */
/** @var string $required */
?>

<label for="<?= $link ?>"><?= $label_text ?></label>
<input required="<?= $required ?>" name="<?= $input_name ?>" id="<?= $link ?>" placeholder="<?= $input_placeholder ?>" type="email">
<?php if (isset($errors['firstname'])) { ?>
    <p class="validation_errors"><?= $errors['firstname'] ?></p>
<?php } ?>

