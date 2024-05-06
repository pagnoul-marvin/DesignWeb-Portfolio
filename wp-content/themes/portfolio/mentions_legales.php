<?php
/*
Template Name: Mentions Légales
*/
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main class="legal_notices_main_class">
        <?php component('global.no_js_banner.banner') ?>

        <?= get_the_content(); ?>
    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>
