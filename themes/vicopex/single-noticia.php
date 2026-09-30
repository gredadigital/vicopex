<?php defined('ABSPATH') || exit; get_header(); ?>
<main id="main-content">
<?php while (have_posts()) : the_post(); ?>
    <?php vicopex_link('Todas las noticias', get_post_type_archive_link('noticia')); ?>
    <article <?php post_class('news-detail'); ?>>
        <?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?>
        <header><?php vicopex_news_categories(); ?><h1><?php echo esc_html(get_the_title()); ?></h1></header>
        <?php vicopex_rich(vicopex_meta('news_lead')); vicopex_rich(vicopex_meta('news_body')); ?>
    </article>
    <?php
    $related = new WP_Query(array(
        'post_type' => 'noticia', 'post_status' => 'publish', 'posts_per_page' => 4,
        'post__not_in' => array(get_the_ID()), 'orderby' => array('date' => 'DESC', 'ID' => 'DESC'), 'no_found_rows' => true,
    ));
    if ($related->have_posts()) : ?>
    <aside aria-label="Más noticias">
        <h2>También podría interesarte</h2>
        <?php while ($related->have_posts()) : $related->the_post(); get_template_part('template-parts/card', 'noticia'); endwhile; ?>
    </aside>
    <?php endif; wp_reset_postdata(); ?>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
