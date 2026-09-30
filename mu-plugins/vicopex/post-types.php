<?php
defined('ABSPATH') || exit;
function vicopex_register_post_types() {
    foreach (array('noticia' => array('Noticias', 'Noticia', 'noticias', 'dashicons-megaphone'), 'cafe' => array('Cafés', 'Café', 'cafes', 'dashicons-coffee')) as $type => $config) {
        register_post_type($type, array(
            'labels' => array('name' => $config[0], 'singular_name' => $config[1], 'add_new_item' => 'Añadir ' . $config[1], 'edit_item' => 'Editar ' . $config[1], 'all_items' => 'Todos: ' . $config[0]),
            'public' => true,
            'has_archive' => $config[2],
            'rewrite' => array('slug' => $config[2], 'with_front' => false),
            'show_in_rest' => true,
            'menu_icon' => $config[3],
            'supports' => array('title', 'thumbnail'),
        ));
    }
}
add_action('init', 'vicopex_register_post_types');
