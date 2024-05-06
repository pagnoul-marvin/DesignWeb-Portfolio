<?php
/*
Template Name: Mes projets
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <?php component('global.no_js_banner.banner') ?>

        <?php component('global.toggle_input.toggle_input', [
            'input_id' => 'toggle',
            'label_class' => 'pages_button no_text_decoration',
            'label_text' => 'Aller vers la page Mes projets/expériences'
        ]) ?>

        <?php component('global.decoration.decoration', [
            'id' => 'celtic_decoration',
            'title_text' => 'Bienvenue en Gaule !'
        ]) ?>

        <?= get_the_content(); ?>
    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>
