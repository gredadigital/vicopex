<?php
add_action('wp_enqueue_scripts', function () {
    $css_path = get_template_directory() . '/assets/css/tw.build.css';
    wp_enqueue_style(
        'vicopex-style',
        get_template_directory_uri() . '/assets/css/tw.build.css',
        [],
        file_exists($css_path) ? filemtime($css_path) : null
    );
});
