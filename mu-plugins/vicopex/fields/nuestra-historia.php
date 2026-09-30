<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_nuestra_historia() {
    Container::make('post_meta', 'VICOPEX — Nuestra historia')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-nuestra-historia.php')
        ->add_fields(array(
            Field::make('text', 'vicopex_history_intro_title', 'Título de presentación'),
            Field::make('rich_text', 'vicopex_history_intro', 'Historia de VICOPEX'),
            Field::make('image', 'vicopex_history_image', 'Imagen de la historia'),
            Field::make('text', 'vicopex_history_origin_title', 'Título del origen'),
            Field::make('rich_text', 'vicopex_history_origin_description', 'Descripción del origen'),
            Field::make('image', 'vicopex_history_origin_image', 'Imagen de la finca'),
            Field::make('text', 'vicopex_history_principles_title', 'Título de principios'),
            Field::make('complex', 'vicopex_history_principles', 'Principios')->set_layout('tabbed-horizontal')->add_fields(array(Field::make('text', 'vicopex_principle_title', 'Nombre'), Field::make('image', 'vicopex_principle_icon', 'Imagen o icono')))
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_nuestra_historia');
