<?php
/*
Template Name: Me contacter
*/
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <?php component('global.decoration', [
        'id' => 'greece_decoration'
    ]); ?>

    <main>
        <?= get_the_content(); ?>

        <section id="mail_contact" class="section">

            <h2 class="contact_second_title_class">Par mail</h2>

            <form action="#" method="POST" id="mail_contact_form">

                <fieldset>

                    <legend>Formulaire de contact par email</legend>

                    <?php component('global.labels_and_inputs.text_input', [
                        'link' => 'firstname',
                        'label_text' => 'Votre prénom *',
                        'input_name' => 'firstname',
                        'input_placeholder' => 'Exemple : Jules',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.labels_and_inputs.text_input', [
                        'link' => 'lastname',
                        'label_text' => 'Votre nom *',
                        'input_name' => 'lastname',
                        'input_placeholder' => 'Exemple : César',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.labels_and_inputs.radio_input', [
                        'link' => 'gender',
                        'label_text' => 'Votre genre',
                        'input_name' => 'firstname',
                        'input_placeholder' => '',
                        'required' => '',
                    ]); ?>

                    <?php component('global.labels_and_inputs.email_input', [
                        'link' => 'mail',
                        'label_text' => 'Votre adresse mail *',
                        'input_name' => 'mail',
                        'input_placeholder' => 'Exemple : julescesar@mail.com',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.labels_and_inputs.textarea', [
                        'link' => 'subject',
                        'label_text' => 'Pourquoi voulez-vous me contacter ? *',
                        'textarea_name' => 'subject',
                        'textarea_placeholder' => 'Je souhaite vous contacter pour avoir des informations sur un potentiel futur projet.',
                        'required' => 'required',
                    ]); ?>

                    <?php component('global.labels_and_inputs.submit_input', [
                        'input_text' => 'Envoyer le formulaire'
                    ]); ?>

                </fieldset>

            </form>

        </section>

    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>