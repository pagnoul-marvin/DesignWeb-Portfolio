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
        <?= get_the_content(); ?>
        <?php component('global.contact_me'); ?>
    </main>
<?php get_footer(); ?>