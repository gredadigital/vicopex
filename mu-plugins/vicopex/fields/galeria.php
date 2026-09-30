<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_fields_galeria() {
    Container::make('post_meta', 'VICOPEX — Galería')
        ->where('post_type', '=', 'page')
        ->where('post_template', '=', 'templates/page-galeria.php')
        ->add_fields(array(
            Field::make('complex', 'vicopex_gallery_categories', 'Categorías de galería')->set_layout('tabbed-horizontal')->add_fields(array(
Field::make('text', 'vicopex_gallery_category_name', 'Nombre')->set_required(true),
Field::make('media_gallery', 'vicopex_gallery_category_images', 'Imágenes')->set_type(array('image'))
))->set_help_text('El menú se genera automáticamente. Los identificadores se derivan del nombre y la posición; no es necesario repetirlos.')
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_fields_galeria');
