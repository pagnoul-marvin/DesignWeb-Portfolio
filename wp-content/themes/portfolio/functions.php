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



