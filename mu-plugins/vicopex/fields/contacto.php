<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_contacto() {
    Container::make('post_meta', 'VICOPEX — Contacto')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-contacto.php')
        ->add_fields(array(
            Field::make('image', 'vicopex_contact_image', 'Imagen de contacto'),
            Field::make('text', 'vicopex_contact_form_title', 'Título del formulario')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_contacto');
