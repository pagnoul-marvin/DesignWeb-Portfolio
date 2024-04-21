<?php
/*
Template Name: Project and experience item
*/
?>

<?php get_header(); ?>

<?php component('global.decoration', [
    'id' => 'celtic_decoration'
]); ?>

    <main>
        <?php get_the_content(); ?>
    </main>
<?php get_footer(); ?>