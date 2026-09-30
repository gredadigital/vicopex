<?php
defined('ABSPATH') || exit;
function vicopex_disable_editors() {
    foreach (array('page', 'noticia', 'cafe') as $type) {
        remove_post_type_support($type, 'editor');
    }
}
add_action('init', 'vicopex_disable_editors', 100);
function vicopex_use_block_editor($enabled, $post_type) {
    return in_array($post_type, array('page', 'noticia', 'cafe'), true) ? false : $enabled;
}
add_filter('use_block_editor_for_post_type', 'vicopex_use_block_editor', 100, 2);
function vicopex_carbon_notice() {
    if (!function_exists('carbon_get_post_meta')) {
        echo '<div class="notice notice-error"><p>VICOPEX requiere la instalación existente de Carbon Fields. Comprueba carbon-loader.php.</p></div>';
    }
}
add_action('admin_notices', 'vicopex_carbon_notice');
