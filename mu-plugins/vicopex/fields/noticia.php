<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_noticia() {
    Container::make('post_meta', 'VICOPEX — Noticia')
        ->where('post_type', '=', 'noticia')
        
        ->add_fields(array(
            Field::make('textarea', 'vicopex_news_summary', 'Resumen para listados'),
            Field::make('rich_text', 'vicopex_news_lead', 'Bajada de la noticia'),
            Field::make('rich_text', 'vicopex_news_body', 'Contenido completo')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_noticia');
