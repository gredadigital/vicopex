<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_trazabilidad() {
    Container::make('post_meta', 'VICOPEX — Trazabilidad')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-trazabilidad.php')
        ->add_fields(array(
            Field::make('complex', 'vicopex_traceability_steps', 'Etapas de trazabilidad')->set_layout('tabbed-horizontal')->add_fields(array(
Field::make('text', 'vicopex_step_number', 'Número'), Field::make('text', 'vicopex_step_title', 'Título'),
Field::make('rich_text', 'vicopex_step_description', 'Descripción'), Field::make('image', 'vicopex_step_image', 'Imagen')
)),
            Field::make('text', 'vicopex_traceability_producer_role', 'Rol de la productora'),
            Field::make('text', 'vicopex_traceability_producer_name', 'Nombre de la productora'),
            Field::make('rich_text', 'vicopex_traceability_producer_bio', 'Biografía'),
            Field::make('image', 'vicopex_traceability_producer_image', 'Retrato')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_trazabilidad');
