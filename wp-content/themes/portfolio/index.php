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

                <img src="<?= $image_url; ?>" alt="Photo de Marvin Pagnoul">

                <div id="introduction_presentation_text">
                    <p>Salut&nbsp;! Moi, c&rsquo;est Marvin Pagnoul. Voici mon portfolio&nbsp;! Dans celui-ci, je vous partage plein d&rsquo;informations sur moi et mon m&eacute;tier de web developer tout en vous faisant plonger dans ma plus grande passion&nbsp;: l&rsquo;Histoire antique&nbsp;!</p>

                    <p>Pour commencer en savoir plus sur moi, plongez dans la Perse antique&nbsp;:</p>

                    <a id="introduction_presentation_text_link" class="pages_button no-text-decoration" title="Se diriger vers la page À propos de moi" href="<?= $about_me_page_link; ?>">&Agrave; propos de moi</a>

                </div>

            </div>

        </section>

    </main>

<?php get_footer(); ?>


