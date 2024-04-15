<?php get_header(); ?>

<h1 class="main_title">Accueil</h1>

<div class="decoration" id="rome_decoration"></div>

    <main>

        <section id="introduction">

            <h2 class="hidden">Introduction</h2>

            <div id="introduction_presentation">

                <img src="<?= dw_get_image('http://site.test/wp-content/uploads/2024/04/photo_moi-1.png'); ?>" alt="Photo de Marvin Pagnoul">

                <div id="introduction_presentation_text" class="red_background">
                    <p class="align_left_text">Salut&nbsp;! Moi, c&rsquo;est Marvin Pagnoul. Voici mon portfolio&nbsp;! Dans celui-ci, je vous partage plein d&rsquo;informations sur moi et mon m&eacute;tier de web developer tout en vous faisant plonger dans ma plus grande passion&nbsp;: l&rsquo;Histoire antique&nbsp;!</p>

                    <p class="align_left_text">Pour commencer en savoir plus sur moi, plongez dans la Perse antique&nbsp;:</p>

                    <a id="introduction_presentation_text_link" class="pages_button no_text_decoration" title="Se diriger vers la page À propos de moi" href="<?= dw_get_page_path('À propos de moi'); ?>">&Agrave; propos de moi</a>

                </div>

            </div>

        </section>

        <section id="go_to_other_pages" class="section">

            <h2 class="second_title">Pour les impatiens ...</h2>

            <?php
            component('home.div', [
                'text' => 'Je suis une personne aux nombreux talents. Si vous êtes plus intéressés par mes compétences, je vous invite à découvrir l’Egypte antique :',
                'link_href' => '',
                'link_id' => 'skills_button',
                'link_title' => 'Aller voir mes compétences',
                'link_text' => 'Mes compétences'
            ]);

            component('home.div', [
                'text' => 'Au cours de mes nombreuses années d’études, j’ai réalisé de nombreux projets dont je vous invite à y jeter un oeil à travers la Gaule :',
                'link_href' => '',
                'link_id' => 'projects_button',
                'link_title' => 'Aller voir mes projets',
                'link_text' => 'Mes projets'
            ]);

            component('home.div', [
                'text' => 'À l’époque de l’antiquité c’était si long pour pouvoir contacter une personne lointaine, ici il vous suffit d’appuyer sur petit bouton qui vous fera voyager vers la Grèce antique :',
                'link_href' => '',
                'link_id' => 'contact_button',
                'link_title' => 'Me contacter',
                'link_text' => 'Me contacter'
            ]);
            ?>

        </section>

        <section id="more_over" class="section">

            <h2 class="second_title">Aller voir aussi ...</h2>

            <?php
            component('home.div', [
                'text' => 'Si vous êtes intéressé, je dispose aussi d’un site où se trouve mon CV.',
                'link_href' => '',
                'link_id' => 'cv',
                'link_title' => 'Aller visiter mon CV',
                'link_text' => 'Visiter le site de mon CV'
            ]);
            ?>

        </section>

    </main>

<?php get_footer(); ?>


