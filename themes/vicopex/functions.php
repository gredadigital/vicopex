<?php
add_action('wp_enqueue_scripts', function () {
    $css_path = get_template_directory() . '/assets/css/tw.build.css';
    wp_enqueue_style(
        'vicopex-style',
        get_template_directory_uri() . '/assets/css/tw.build.css',
        array('vicopex-fonts'),
        file_exists($css_path) ? filemtime($css_path) : null
    );
});
require_once __DIR__ . '/inc/content.php';
require_once __DIR__ . '/inc/fonts.php';
function vicopex_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array('primary' => 'Navegación principal', 'footer' => 'Navegación del pie'));
}
add_action('after_setup_theme', 'vicopex_theme_setup');
function vicopex_archive_query($query) {
    if (!is_admin() && $query->is_main_query() && ($query->is_post_type_archive(array('noticia', 'cafe')) || $query->is_tax('categoria_noticia'))) {
        $query->set('posts_per_page', $query->is_post_type_archive('cafe') ? 12 : 9);
        $query->set('orderby', array('date' => 'DESC', 'ID' => 'DESC'));
    }
}
add_action('pre_get_posts', 'vicopex_archive_query');

require_once __DIR__ . '/inc/home.php';
