<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_cafe() {
    Container::make('post_meta', 'VICOPEX — Café')
        ->where('post_type', '=', 'cafe')
        
        ->add_fields(array(
            Field::make('text', 'vicopex_coffee_aroma', 'Aroma'),
            Field::make('text', 'vicopex_coffee_flavor', 'Sabor'),
            Field::make('text', 'vicopex_coffee_acidity', 'Acidez'),
            Field::make('text', 'vicopex_coffee_body', 'Cuerpo'),
            Field::make('textarea', 'vicopex_coffee_aftertaste', 'Resabio')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_cafe');
