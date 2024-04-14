<?php
$about_me_page = get_page_by_path('À propos de moi');
$about_me_page_link = get_permalink($about_me_page);


$media_id = attachment_url_to_postid('http://site.test/wp-content/uploads/2024/04/photo_moi-1.png');

$image_info = wp_get_attachment_image_src($media_id, 'full');

$image_url = $image_info[0];

?>

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

                    <a id="introduction_presentation_text_link" class="pages_button no_text_decoration" title="Se diriger vers la page À propos de moi" href="<?= $about_me_page_link; ?>">&Agrave; propos de moi</a>

                </div>

            </div>

        </section>

        <section id="go_to_other_pages" class="section">

            <h2 class="second_title">Pour les impatiens ...</h2>

            <div class="red_background">
                <p class="align_left_text">Je suis une personne aux nombreux talents. Si vous &ecirc;tes plus int&eacute;ress&eacute;s par mes comp&eacute;tences, je vous invite &agrave; d&eacute;couvrir l&rsquo;Egypte antique&nbsp;:</p>
                <a href="" id="skills_button" title="Aller voir mes compétences" class="pages_button no_text_decoration">Mes comp&eacute;tences</a>
            </div>

            <div class="red_background">
                <p class="align_left_text">Au cours de mes nombreuses ann&eacute;es d&rsquo;&eacute;tudes, j&rsquo;ai r&eacute;alis&eacute; de nombreux projets dont je vous invite &eacute; y jeter un oeil &eacute; travers la Gaule&nbsp;:</p>
                <a href="" id="projects_button" title="Aller voir mes projets" class="pages_button no_text_decoration">Mes projets</a>
            </div>

            <div class="red_background">
                <p class="align_left_text">&Agrave; l&rsquo;&eacute;poque de l&rsquo;antiquit&eacute; c&rsquo;&eacute;tait si long pour pouvoir contacter une personne lointaine, ici il vous suffit d&rsquo;appuyer sur petit bouton qui vous fera voyager vers la Gr&egrave;ce antique&nbsp;:</p>
                <a href="" id="contact_button" title="Me contacter" class="pages_button no_text_decoration">Me contacter</a>
            </div>

        </section>

        <section id="more_over" class="section">

            <h2 class="second_title">Aller voir aussi ...</h2>

            <div class="red_background">
                <p class="align_left_text">Si vous &ecirc;tes int&eacute;ress&eacute;, je dispose aussi d&rsquo;un site o&ugrave; se trouve mon CV.</p>
                <a href="marvinpagnoul.be" id="cv" class="no_text_decoration" title="Visiter mon CV">Visiter le site de mon CV</a>
            </div>

        </section>

    </main>

<?php get_footer(); ?>


