<?php

require_once 'View.php';

register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');
register_nav_menu('socials', 'Navigation de réseaux sociaux');
const BASE_PATH = __DIR__;

function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}

function dw_get_image(string $file)
{
    $media_id = attachment_url_to_postid($file);

    $image_info = wp_get_attachment_image_src($media_id, 'full');

    return $image_info[0];
}

function base_path(string $path = ''): string
{
    return BASE_PATH . "/{$path}";
}

function component(string $path, array $data = []): void
{
    View::component($path, $data);
}

function go_to_other_pages($page_id): string
{
    $page_url = get_permalink($page_id);
    return esc_url($page_url);
}

function give_page_header_class() : string
{
    $page_id = get_the_ID();

    $header_class = '';

    if ($page_id === 9) {
        $header_class .= 'about_me_header_class';
    } elseif ($page_id === 15) {
        $header_class .= 'contact_header_class';
    } elseif ($page_id === 13 || $page_id === 248 || $page_id === 240 || $page_id === 250 || $page_id === 252) {
        $header_class .= 'projects_header_class';
    } elseif ($page_id === 11) {
        $header_class .= 'skills_header_class';
    }
    return $header_class;
}

function give_page_footer_class() :string
{
    $page_id = get_the_ID();

    $footer_class = '';

    if ($page_id === 9) {
        $footer_class .= 'about_me_footer_class';
    } elseif ($page_id === 15) {
        $footer_class .= 'contact_footer_class';
    } elseif ($page_id === 13 || $page_id === 248 || $page_id === 240 || $page_id === 250 || $page_id === 252) {
        $footer_class .= 'projects_footer_class';
    } elseif ($page_id === 11) {
        $footer_class .= 'skills_footer_class';
    }

    return $footer_class;
}
function give_page_main_title_class() :string
{
    $page_id = get_the_ID();

    $main_title_class = '';

    if ($page_id === 9) {
        $main_title_class .= 'about_me_main_title_class';
    } elseif ($page_id === 15) {
        $main_title_class .= 'contact_main_title_class';
    } elseif ($page_id === 13 || $page_id === 248 || $page_id === 240 || $page_id === 250 || $page_id === 252) {
        $main_title_class .= 'projects_main_title_class';
    } elseif ($page_id === 11) {
        $main_title_class .= 'skills_main_title_class';
    } elseif ($page_id === 6) {
        $main_title_class .= 'main_title_class';
    }

    return $main_title_class;
}
function give_page_second_title_class() :string
{
    $page_id = get_the_ID();

    $second_title_class = '';

    if ($page_id === 9) {
        $second_title_class .= 'about_me_second_title_class';
    } elseif ($page_id === 15) {
        $second_title_class .= 'contact_second_title_class';
    } elseif ($page_id === 13 || $page_id === 248 || $page_id === 240 || $page_id === 250 || $page_id === 252) {
        $second_title_class .= 'projects_second_title_class';
    } elseif ($page_id === 11) {
        $second_title_class .= 'skills_second_title_class';
    } elseif ($page_id === 6) {
        $second_title_class .= 'second_title_class';
    }

    return $second_title_class;
}

function give_page_main_nav_container_class() :string
{
    $page_id = get_the_ID();

    $main_nav_container_class = '';

    if ($page_id === 9) {
        $main_nav_container_class .= 'about_me_main_nav_container_class';
    } elseif ($page_id === 15) {
        $main_nav_container_class .= 'contact_main_nav_container_class';
    } elseif ($page_id === 13 || $page_id === 248 || $page_id === 240 || $page_id === 250 || $page_id === 252) {
        $main_nav_container_class .= 'projects_main_nav_container_class';
    } elseif ($page_id === 11) {
        $main_nav_container_class .= 'skills_main_nav_container_class';
    }

    return $main_nav_container_class;
}
