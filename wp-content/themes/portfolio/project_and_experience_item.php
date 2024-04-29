<?php
/*
Template Name: Project and experience item
*/
?>

<?php get_header(); ?>

<?php component('global.decoration.decoration', [
    'id' => 'celtic_decoration'
]); ?>

    <main>
        <?php component('global.navigations.go_back_nav', [
            'second_title_text' => 'Revenir en arrière',
            'page' => 13,
            'link_text' => 'Retourner aux projets/expériences',
            'link_title' => 'Retourner à la page Mes projets/expériences'
        ]); ?>
        <?= get_the_content(); ?>
        <?php component('global.contact_me.contact_me'); ?>
    </main>
<?php get_footer(); ?>