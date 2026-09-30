<?php
defined('ABSPATH') || exit;
/** Local WOFF2 faces: Daguin 400 and Bahnschrift SemiCondensed 300/400/700. */
function vicopex_enqueue_fonts() {
    $path = get_template_directory() . '/assets/css/fonts.css';
    wp_enqueue_style(
        'vicopex-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        array(),
        file_exists($path) ? filemtime($path) : null
    );
}
add_action('wp_enqueue_scripts', 'vicopex_enqueue_fonts', 5);
