<?php
/*
Template Name: Me contacter
*/
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <?php component('global.decoration.decoration', [
        'id' => 'greece_decoration'
    ]); ?>

    <main>
        <?= get_the_content(); ?>

        <section id="mail_contact" class="section">

            <?php component('global.titles.second_title', [
                    'class' => '',
                    'text' => 'Par mail'
            ]); ?>

            <form action="#" method="POST" id="mail_contact_form">

                <fieldset>

                    <legend>Formulaire de contact par mail</legend>
                    <p>Les champs dot&eacute;s d'une &laquo;&ast;&raquo; sont requis.</p>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'firstname',
                        'label_text' => 'Votre prénom *',
                        'input_name' => 'firstname',
                        'input_placeholder' => 'Exemple: Jules',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'lastname',
                        'label_text' => 'Votre nom *',
                        'input_name' => 'lastname',
                        'input_placeholder' => 'Exemple: César',
                        'required' => 'required',
                    ]); ?>

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
                        'label_text' => 'Votre adresse mail *',
                        'input_name' => 'mail',
                        'input_placeholder' => 'Exemple: julescesar@mail.com',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.forms.textarea', [
                        'link' => 'subject',
                        'label_text' => 'Pourquoi souhaitez-vous me contacter ? *',
                        'textarea_name' => 'subject',
                        'textarea_placeholder' => 'Exemple: Je souhaite vous contacter pour avoir des informations sur un potentiel futur projet.',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.forms.labels_and_inputs.submit_input', [
                        'input_text' => 'Envoyer le formulaire'
                    ]); ?>

                </fieldset>

            </form>

        </section>

    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>