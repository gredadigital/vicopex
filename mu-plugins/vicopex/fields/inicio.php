<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_inicio() {
    Container::make('post_meta', 'VICOPEX — Inicio')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-inicio.php')
        ->add_fields(array(
            Field::make('text', 'vicopex_home_hero_title', 'Título del hero'),
            Field::make('textarea', 'vicopex_home_hero_description', 'Descripción del hero'),
            Field::make('image', 'vicopex_home_hero_image', 'Imagen del hero'),
            Field::make('text', 'vicopex_home_hero_button_label', 'Texto del botón'),
            Field::make('text', 'vicopex_home_hero_button_url', 'Destino del botón')->set_attribute('type', 'url'),
            Field::make('text', 'vicopex_home_highlights_eyebrow', 'Antetítulo de destacados'),
            Field::make('text', 'vicopex_home_highlights_title', 'Título de destacados'),
            Field::make('complex', 'vicopex_home_highlights', 'Bloques destacados')->set_layout('tabbed-horizontal')->add_fields(array(
Field::make('association', 'vicopex_highlight_page', 'Página de destino')->set_types(array(array('type' => 'post', 'post_type' => 'page')))->set_max(1),
Field::make('image', 'vicopex_highlight_image', 'Imagen')
))->set_help_text('El título y enlace se obtienen de la página seleccionada.'),
            Field::make('text', 'vicopex_home_news_eyebrow', 'Antetítulo de noticias'),
            Field::make('text', 'vicopex_home_news_title', 'Título de últimas noticias')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_inicio');
