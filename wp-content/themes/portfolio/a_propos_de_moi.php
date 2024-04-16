<?php
/*
Template Name: À propos de moi
*/
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <?php component('global.main_title', [
            'text' => get_the_title()
    ]); ?>

    <?php component('global.decoration', [
            'id' => 'greece_decoration'
    ]); ?>

        <main>
            <?= get_the_content(); ?>
        </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>
