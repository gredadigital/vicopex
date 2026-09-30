<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_default_page() {
    Container::make('post_meta', 'VICOPEX — Contenido de página')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'default')
        ->add_fields(array(Field::make('rich_text', 'vicopex_page_body', 'Contenido')));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_default_page');
