<?php
/*
Template Name: Accueil
*/
?>

<?php get_header(); ?>

<main>

    <?php component('global.no_js_banner.banner') ?>

    <?php component('global.toggle_input.toggle_input', [
        'input_id' => 'toggle',
        'label_class' => 'pages_button no_text_decoration',
        'label_text' => 'Aller vers la page Accueil'
    ]) ?>

    <?php component('global.decoration.decoration', [
        'id' => 'rome_decoration',
        'title_text' => 'Bienvenue à Rome !'
    ]) ?>

    <section id="introduction">

        <?php component('global.titles.second_title', [
            'class' => 'hidden',
            'text' => 'Introduction'
        ]); ?>

        <div id="introduction_presentation">

            <img src="<?= dw_get_image('http://site.test/wp-content/uploads/2024/04/photo_moi-1.png'); ?>"
                 alt="Photo de Marvin Pagnoul">

            <div id="introduction_presentation_text">
                <p class="align_left_text">Salut&nbsp;! Moi, c&rsquo;est Marvin Pagnoul. Voici mon portfolio&nbsp;! Dans
                    celui&hyphen;ci, je vous partage plein d&rsquo;informations sur moi et mon m&eacute;tier de Web
                    Developer tout en vous faisant plonger dans ma plus grande passion&nbsp;: l&rsquo;Histoire antique&nbsp;!</p>

                <p class="align_left_text">Pour commencer &agrave; en savoir plus sur moi, je vous invite &agrave;
                    plonger dans l&rsquo;Egypte antique&nbsp;:</p>

                <a id="introduction_presentation_text_link" class="pages_button no_text_decoration"
                   title="Se diriger vers la page À propos de moi" href="<?= go_to_other_pages(9) ?>">&Agrave; propos de
                    moi</a>

            </div>

        </div>

    </section>

    <section id="go_to_other_pages" class="section">

        <?php component('global.titles.second_title', [
            'class' => '',
            'text' => 'Pour les impatiens ...'
        ]);
        ?>

        <?php
        component('home.div', [
            'text' => 'Je suis une personne aux nombreux talents. Si vous êtes plus intéressés par mes compétences, je vous invite à découvrir la Perse antique :',
            'link_href' => go_to_other_pages(11),
            'link_id' => 'skills_button',
            'link_title' => 'Aller vers la page Mes compétences',
            'link_text' => 'Mes compétences',
            'link_class' => ''
        ]);

        component('home.div', [
            'text' => 'Au cours de mes nombreuses années d’études, j’ai réalisé de nombreux projets dont je vous invite à y jeter un oeil à travers la Gaule antique :',
            'link_href' => go_to_other_pages(13),
            'link_id' => 'projects_button',
            'link_title' => 'Aller vers la page Mes projets',
            'link_text' => 'Mes projets/expériences',
            'link_class' => ''
        ]);

        component('home.div', [
            'text' => 'À l’époque de l’antiquité c’était si long pour pouvoir contacter une personne lointaine, ici il vous suffit d’appuyer sur petit bouton qui vous fera voyager vers la Grèce antique :',
            'link_href' => go_to_other_pages(15),
            'link_id' => 'contact_button',
            'link_title' => 'Aller vers la page Me contacter',
            'link_text' => 'Me contacter',
            'link_class' => ''
        ]);
        ?>

    </section>

    <section id="more_over" class="section">

        <?php component('global.titles.second_title', [
            'class' => '',
            'text' => 'Aller voir aussi ...'
        ]);
        ?>

        <?php
        component('home.div', [
            'text' => 'Si vous êtes intéressé, je dispose aussi d’un site où se trouve mon CV.',
            'link_href' => 'https://marvinpagnoul.be',
            'link_id' => 'cv',
            'link_title' => 'Aller visiter mon CV',
            'link_text' => 'Visiter le site de mon CV',
            'link_class' => ''
        ]);
        ?>

    </section>

</main>

<?php get_footer(); ?>


