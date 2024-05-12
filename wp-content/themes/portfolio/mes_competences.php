<?php
/*
Template Name: Mes compétences
*/
?>
<?php
session_start();
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <?php component('global.no_js_banner.banner') ?>

        <?php
        $displayClass = isset($_SESSION['persian_decoration_activated']) ? 'no_display' : '';

        component('global.toggle_input.toggle_input', [
            'input_id' => 'toggle',
            'label_class' => 'pages_button no_text_decoration',
            'label_text' => 'Aller vers la page Mes compétences',
            'display_class' => $displayClass
        ]);

        component('global.decoration.decoration', [
            'id' => 'persian_decoration',
            'title_text' => 'Bienvenue en Perse !',
            'display_class' => $displayClass
        ]);

        $_SESSION['persian_decoration_activated'] = true;

        ?>

        <?= get_the_content(); ?>
    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>