<?php
/*
Template Name: Me contacter
*/
?>

<?php
if (file_exists('database/database.php')) {
    require_once 'database/database.php';
} else {
    die('Un problème est survenu');
    //renvoyer à une page qui permet de contacter l'admin
}
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <?php component('global.no_js_banner.banner') ?>

        <input type="checkbox" id="toggle" class="<?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
        <label for="toggle"
               class="pages_button no_text_decoration <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">Aller vers
            la page Me contacter</label>

        <section id="decoration"
                 class="decoration <?= give_decoration_class(); ?> <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
            <h2>Bienvenue en Gr&egrave;ce&nbsp;!</h2>
            <div id="greece_decoration" class="decorate"></div>
        </section>

        <?= get_the_content(); ?>

        <section id="mail_contact" class="section">

            <?php component('global.titles.second_title', [
                'class' => '',
                'text' => 'Par mail'
            ]); ?>

            <form action="http://site.test/me_contacter/" method="POST" id="mail_contact_form">

                <?php
                $firstname_input_value = '';
                $lastname_input_value = '';
                $mail_input_value = '';
                $message_textarea_value = '';
                if (isset($errors['firstname'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['lastname'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['mail'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['message'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                ?>

                <fieldset>

                    <legend>Formulaire de contact par mail</legend>
                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'firstname',
                        'label_text' => 'Votre pr&eacute;nom * <small>3 caract&egrave;res minimum sont requis.</small>',
                        'input_name' => 'firstname',
                        'input_placeholder' => 'Exemple: Jules',
                        'required' => 'required',
                        'input_value' => $firstname_input_value
                    ]); ?>

                    <?php if (isset($errors['firstname'])) { ?>
                        <p class="validation_errors"><?= $errors['firstname'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'lastname',
                        'label_text' => 'Votre nom * <small>3 caract&egrave;res minimum sont requis.</small>',
                        'input_name' => 'lastname',
                        'input_placeholder' => 'Exemple: César',
                        'required' => 'required',
                        'input_value' => $lastname_input_value
                    ]); ?>

                    <?php if (isset($errors['lastname'])) { ?>
                        <p class="validation_errors"><?= $errors['lastname'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.select_and_options', [
                        'link' => 'gender',
                        'label_text' => 'Votre genre',
                        'select_name' => 'gender',
                        'options' => array(
                            '' => 'Choisissez votre genre',
                            'male' => 'Homme',
                            'female' => 'Femme',
                            'other' => 'Autre',
                        )
                    ]);
                    ?>

                    <?php component('global.forms.labels_and_inputs.email_input', [
                        'link' => 'mail',
                        'label_text' => 'Votre adresse mail * <small>Le caract&egrave;re &laquo;&commat;&raquo; est requis.</small>',
                        'input_name' => 'mail',
                        'input_placeholder' => 'Exemple: julescesar@mail.com',
                        'required' => 'required',
                        'input_value' => $mail_input_value
                    ]); ?>

                    <?php if (isset($errors['email'])) { ?>
                        <p class="validation_errors"><?= $errors['email'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.textarea', [
                        'link' => 'message',
                        'label_text' => 'Pourquoi souhaitez-vous me contacter ? *',
                        'textarea_name' => 'message',
                        'textarea_placeholder' => 'Exemple: Je souhaite vous contacter pour avoir des informations sur un potentiel futur projet.',
                        'required' => 'required',
                        'message_text_if_error' => $message_textarea_value
                    ]); ?>

                    <?php if (isset($errors['message'])) { ?>
                        <p class="validation_errors"><?= $errors['message'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.labels_and_inputs.submit_input', [
                        'input_text' => 'Envoyer le formulaire'
                    ]); ?>

                </fieldset>

            </form>

        </section>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) { ?>
            <div id="validate">
                <p>Votre mail a bien &eacute;t&eacute; envoy&eacute;&nbsp;! Je vous recontacterai dans le plus bref
                    délais.</p>
            </div>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) { ?>
            <div id="not_validate">
                <p>Votre mail n&rsquo;a pas &eacute;t&eacute; envoy&eacute;&nbsp;! Un ou plusieurs champ(s) ne
                    respecte(nt) pas les r&egrave;gles.</p>
            </div>
        <?php } ?>

    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>