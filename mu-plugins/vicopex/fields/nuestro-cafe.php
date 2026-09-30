<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_nuestro_cafe() {
    Container::make('post_meta', 'VICOPEX — Nuestro café')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-nuestro-cafe.php')
        ->add_fields(array(
            Field::make('text', 'vicopex_coffee_button_label', 'Texto del botón de compra'),
            Field::make('text', 'vicopex_coffee_button_url', 'Destino del botón de compra')->set_attribute('type', 'url')->set_help_text('Página de contacto o enlace de consulta. Los cafés se administran en Cafés.')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_nuestro_cafe');
