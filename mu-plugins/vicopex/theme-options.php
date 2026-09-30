<?php
defined('ABSPATH') || exit;
use Carbon_Fields\Container;
use Carbon_Fields\Field;
function vicopex_register_theme_options() {
    Container::make('theme_options', 'Datos Vicopex')
        ->set_page_file('vicopex-datos')->set_page_menu_title('Datos Vicopex')
        ->add_tab('Contacto', array(
            Field::make('textarea', 'vicopex_address', 'Dirección'),
            Field::make('text', 'vicopex_phone', 'Teléfono'),
            Field::make('text', 'vicopex_whatsapp', 'WhatsApp')->set_help_text('Número internacional con código de país; ejemplo: +591…'),
            Field::make('text', 'vicopex_email', 'Correo electrónico')->set_attribute('type', 'email'),
            Field::make('text', 'vicopex_maps_url', 'Google Maps / ubicación')->set_attribute('type', 'url'),
        ))
        ->add_tab('Redes sociales', array(
            Field::make('text', 'vicopex_facebook', 'Facebook')->set_attribute('type', 'url'),
            Field::make('text', 'vicopex_instagram', 'Instagram')->set_attribute('type', 'url'),
            Field::make('text', 'vicopex_tiktok', 'TikTok')->set_attribute('type', 'url'),
            Field::make('text', 'vicopex_linkedin', 'LinkedIn')->set_attribute('type', 'url'),
            Field::make('text', 'vicopex_youtube', 'YouTube')->set_attribute('type', 'url'),
        ))
        ->add_tab('Origen y pie de página', array(
            Field::make('text', 'vicopex_location_label', 'Nombre corto de ubicación'),
            Field::make('text', 'vicopex_origin_distance', 'Distancia desde Caranavi'),
            Field::make('text', 'vicopex_origin_altitude', 'Altitud'),
            Field::make('text', 'vicopex_origin_coordinates', 'Coordenadas'),
            Field::make('image', 'vicopex_location_map_image', 'Imagen del mapa de ubicación'),
            Field::make('text', 'vicopex_footer_legal', 'Texto de derechos')->set_help_text('El año y nombre del sitio se obtienen de WordPress.'),
        ));
}
add_action('carbon_fields_register_fields', 'vicopex_register_theme_options');
