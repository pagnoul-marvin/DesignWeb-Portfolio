<?php
/*
Template Name: Mes compétences
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <?php component('global.toggle_input.toggle_input', [
            'label_text' => 'Aller vers la page Mes compétences'
        ]) ?>

        <?php component('global.decoration.decoration', [
            'id' => 'persian_decoration',
            'title_text' => 'Bienvenue en Perse !'
        ]) ?>

        <?= get_the_content(); ?>
    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>