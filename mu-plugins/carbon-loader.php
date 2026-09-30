<?php
/**
 * Plugin Name: Carbon (MU Loader)
 * Description: Carga la instalación existente de Carbon Fields como MU-plugin.
 */
require_once __DIR__ . '/carbon/vendor/autoload.php';
add_action('after_setup_theme', function () {
    if (class_exists('\\Carbon_Fields\\Carbon_Fields')) {
        \Carbon_Fields\Carbon_Fields::boot();
    }
});
// Los containers del sitio se cargan desde vicopex-loader.php.
// carbon/carbon-plug.php se conserva intacto, pero su ejemplo por ID ya no se registra.
