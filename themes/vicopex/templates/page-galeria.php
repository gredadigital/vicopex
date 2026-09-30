<?php
/**
 * Template Name: Galería
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header();
?>
<main id="main-content" class="page-galeria">
<?php while (have_posts()) : the_post(); ?>
<?php
vicopex_page_heading();
$categories = array_values(array_filter((array) vicopex_meta('gallery_categories'), function ($category) { return !empty($category['vicopex_gallery_category_name']); }));
if ($categories) : ?>
<nav aria-label="Categorías de galería"><ul>
    <li><a href="#gallery-all">Ver todo</a></li>
    <?php foreach ($categories as $index => $category) :
        $anchor = 'gallery-' . ($index + 1) . '-' . sanitize_title($category['vicopex_gallery_category_name']); ?>
        <li><a href="#<?php echo esc_attr($anchor); ?>"><?php echo esc_html($category['vicopex_gallery_category_name']); ?></a></li>
    <?php endforeach; ?>
</ul></nav>
<div id="gallery-all">
<?php foreach ($categories as $index => $category) :
    $anchor = 'gallery-' . ($index + 1) . '-' . sanitize_title($category['vicopex_gallery_category_name']); ?>
    <section id="<?php echo esc_attr($anchor); ?>" class="gallery-category">
        <h2><?php echo esc_html($category['vicopex_gallery_category_name']); ?></h2>
        <?php foreach ((array) ($category['vicopex_gallery_category_images'] ?? array()) as $image_id) :
            if (!wp_attachment_is_image(absint($image_id))) { continue; } ?>
            <figure>
                <?php vicopex_image($image_id); $caption = wp_get_attachment_caption($image_id); ?>
                <?php if ($caption) : ?><figcaption><?php echo wp_kses_post($caption); ?></figcaption><?php endif; ?>
            </figure>
        <?php endforeach; ?>
    </section>
<?php endforeach; ?>
</div>
<?php endif; ?>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
