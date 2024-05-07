<?php
/** @var string $link */
/** @var string $label_text */
/** @var string $textarea_name */
/** @var string $textarea_placeholder */
/** @var string $required */
/** @var string $message_text_if_error */
?>

<label for="<?= $link ?>"><?= $label_text ?></label>
<textarea required="<?= $required ?>" name="<?= $textarea_name ?>" id="<?= $link ?>" rows="10" placeholder="<?= $textarea_placeholder ?>"><?= $message_text_if_error ?></textarea>