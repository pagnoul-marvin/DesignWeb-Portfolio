<?php
/** @var string $link */
/** @var string $label_text */
/** @var string $select_name */
/** @var array $options */
?>

<label for="<?= $link ?>"><?= $label_text ?></label>
<select name="<?= $select_name ?>" id="<?= $link ?>">
    <?php foreach ($options as $optionValue => $optionLabel): ?>
        <option value="<?= $optionValue ?>"><?= $optionLabel ?></option>
    <?php endforeach; ?>
</select>
