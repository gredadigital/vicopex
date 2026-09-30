<?php
defined('ABSPATH') || exit;
function vicopex_home_asset($file) {
    return get_template_directory_uri() . '/assets/images/inicio/' . $file;
}
/** WordPress renders nested menu items recursively; preserve native menu editing. */
function vicopex_home_menu($location, $class) {
    wp_nav_menu(array('theme_location'=>$location,'container'=>false,'menu_class'=>$class,'fallback_cb'=>'vicopex_home_menu_fallback','depth'=>0));
}
function vicopex_home_menu_fallback($args) {
    echo '<ul class="'.esc_attr($args['menu_class']).'">';
    $items = array('inicio'=>'Inicio','nuestra-historia'=>'Nuestra Historia','trazabilidad'=>'Trazabilidad','galeria'=>'Galería','nuestro-cafe'=>'Nuestro café','noticias'=>'Noticias','contacto'=>'Contacto');
    foreach ($items as $template=>$label) {
        if ($template==='inicio' && $args['theme_location']==='primary') { continue; }
        $url = $template==='noticias' ? get_post_type_archive_link('noticia') : vicopex_page_url($template);
        if (!$url) { continue; }
        echo '<li><a href="'.esc_url($url).'"'.(untrailingslashit($url) === untrailingslashit(get_permalink(get_queried_object_id())) ? ' aria-current="page"' : '').'>'.esc_html($label).'</a></li>';
    }
    echo '</ul>';
}
add_action('wp_enqueue_scripts', function () {
    if (!is_page_template(array('templates/page-inicio.php', 'templates/page-nuestra-historia.php', 'templates/page-trazabilidad.php', 'templates/page-nuestro-cafe.php', 'templates/page-contacto.php'))) { return; }
    $path = get_template_directory().'/assets/js/home.js';
    wp_enqueue_script('vicopex-home', get_template_directory_uri().'/assets/js/home.js', array(), filemtime($path), true);
});

function vicopex_history_asset($file) {
    return get_template_directory_uri() . '/assets/images/historia/' . $file;
}

function vicopex_trace_asset($file) {
    return get_template_directory_uri() . '/assets/images/trazabilidad/' . $file;
}
