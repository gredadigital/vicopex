<?php
defined('ABSPATH') || exit;
function vicopex_meta($key, $post_id = 0) {
    return function_exists('carbon_get_post_meta') ? carbon_get_post_meta($post_id ?: get_the_ID(), 'vicopex_' . $key) : '';
}
function vicopex_option($key) {
    return function_exists('carbon_get_theme_option') ? carbon_get_theme_option('vicopex_' . $key) : '';
}
function vicopex_text($value, $tag = 'p') {
    if (!is_scalar($value) || trim((string) $value) === '') { return; }
    $tag = in_array($tag, array('p', 'h1', 'h2', 'h3', 'span'), true) ? $tag : 'p';
    echo '<' . $tag . '>' . esc_html($value) . '</' . $tag . '>';
}
function vicopex_rich($value) {
    if (is_string($value) && trim($value) !== '') {
        echo '<div class="rich-content">' . wp_kses_post(wpautop($value)) . '</div>';
    }
}
function vicopex_image($id, $size = 'large') {
    if ($id && wp_attachment_is_image(absint($id))) {
        echo wp_get_attachment_image(absint($id), $size);
    }
}
function vicopex_link($label, $url) {
    $url = is_string($url) ? esc_url($url) : '';
    if ($label && $url) { echo '<a href="' . $url . '">' . esc_html($label) . '</a>'; }
}
function vicopex_page_url($template) {
    $pages = get_posts(array(
        'post_type' => 'page', 'post_status' => 'publish', 'numberposts' => 1,
        'meta_key' => '_wp_page_template', 'meta_value' => 'templates/page-' . $template . '.php',
        'orderby' => 'ID', 'order' => 'ASC',
    ));
    return $pages ? get_permalink($pages[0]) : '';
}
function vicopex_page_heading() {
    echo '<header class="page-heading">';
    vicopex_link('Inicio', home_url('/'));
    vicopex_text(get_the_title(), 'h1');
    echo '</header>';
}
function vicopex_contact_details() {
    $address = vicopex_option('address');
    if ($address) { echo '<address>' . nl2br(esc_html($address)) . '</address>'; }
    $phone = vicopex_option('phone');
    if ($phone) { vicopex_link($phone, 'tel:' . preg_replace('/[^0-9+]/', '', $phone)); }
    $email = sanitize_email(vicopex_option('email'));
    if ($email) { vicopex_link($email, 'mailto:' . $email); }
    vicopex_link('Ver ubicación', vicopex_option('maps_url'));
}
function vicopex_social_links() {
    echo '<ul class="social-links">';
    foreach (array('facebook' => 'Facebook', 'instagram' => 'Instagram', 'tiktok' => 'TikTok', 'linkedin' => 'LinkedIn', 'youtube' => 'YouTube') as $key => $label) {
        $url = esc_url(vicopex_option($key));
        if ($url) { echo '<li>'; vicopex_link($label, $url); echo '</li>'; }
    }
    $whatsapp = preg_replace('/[^0-9]/', '', (string) vicopex_option('whatsapp'));
    if ($whatsapp) { echo '<li>'; vicopex_link('WhatsApp', 'https://wa.me/' . $whatsapp); echo '</li>'; }
    echo '</ul>';
}
function vicopex_news_categories() {
    $terms = get_the_terms(get_the_ID(), 'categoria_noticia');
    if ($terms && !is_wp_error($terms)) {
        echo '<ul class="news-categories">';
        foreach ($terms as $term) {
            $url = get_term_link($term);
            if (!is_wp_error($url)) { echo '<li>'; vicopex_link($term->name, $url); echo '</li>'; }
        }
        echo '</ul>';
    }
}
function vicopex_news_navigation() {
    $terms = get_terms(array('taxonomy' => 'categoria_noticia', 'hide_empty' => true));
    echo '<nav aria-label="Categorías de noticias"><ul><li>';
    vicopex_link('Ver todo', get_post_type_archive_link('noticia'));
    echo '</li>';
    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            $url = get_term_link($term);
            if (!is_wp_error($url)) { echo '<li>'; vicopex_link($term->name, $url); echo '</li>'; }
        }
    }
    echo '</ul></nav>';
}
function vicopex_coffee_attributes() {
    $values = array();
    foreach (array('aroma' => 'Aroma', 'flavor' => 'Sabor', 'acidity' => 'Acidez', 'body' => 'Cuerpo', 'aftertaste' => 'Resabio') as $key => $label) {
        $value = vicopex_meta('coffee_' . $key);
        if (is_scalar($value) && trim((string) $value) !== '') { $values[$label] = $value; }
    }
    if ($values) {
        echo '<dl class="coffee-attributes">';
        foreach ($values as $label => $value) { echo '<dt>' . esc_html($label) . '</dt><dd>' . esc_html($value) . '</dd>'; }
        echo '</dl>';
    }
}
function vicopex_pagination($query) {
    if ($query->max_num_pages > 1) {
        echo '<nav aria-label="Paginación">' . wp_kses_post(paginate_links(array(
            'current' => max(1, (int) get_query_var('paged'), (int) get_query_var('page')),
            'total' => $query->max_num_pages, 'prev_text' => 'Anterior', 'next_text' => 'Siguiente',
        ))) . '</nav>';
    }
}
function vicopex_default_menu() {
    echo '<ul>';
    foreach (array('inicio', 'nuestra-historia', 'trazabilidad', 'galeria', 'nuestro-cafe', 'contacto') as $slug) {
        $pages = get_posts(array('post_type' => 'page', 'post_status' => 'publish', 'numberposts' => 1, 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/page-' . $slug . '.php'));
        if ($pages) { echo '<li>'; vicopex_link(get_the_title($pages[0]), get_permalink($pages[0])); echo '</li>'; }
    }
    echo '<li>'; vicopex_link('Noticias', get_post_type_archive_link('noticia')); echo '</li></ul>';
}
