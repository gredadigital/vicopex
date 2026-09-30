<?php
defined('ABSPATH') || exit;
function vicopex_register_taxonomies() {
    register_taxonomy('categoria_noticia', array('noticia'), array(
        'labels' => array('name' => 'Categorías de noticias', 'singular_name' => 'Categoría de noticia'),
        'public' => true, 'hierarchical' => true, 'show_admin_column' => true,
        'show_in_rest' => true, 'show_ui' => true,
        'rewrite' => array('slug' => 'categoria-noticia', 'with_front' => false),
    ));
}
add_action('init', 'vicopex_register_taxonomies');
