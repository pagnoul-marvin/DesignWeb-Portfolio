<?php
/*
Template Name: Mes projets
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <?php component('global.decoration.decoration', [
        'id' => 'celtic_decoration'
    ]); ?>

    <main>
        <?= get_the_content(); ?>
    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>
