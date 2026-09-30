<?php defined('ABSPATH') || exit; get_header(); ?>
<main id="main-content" class="news-archive">
    <h1><?php echo is_tax('categoria_noticia') ? esc_html(single_term_title('', false)) : 'Noticias'; ?></h1>
    <?php vicopex_news_navigation(); ?>
    <?php if (have_posts()) : ?>
        <?php $vicopex_index = 0; while (have_posts()) : the_post(); ?>
            <?php if ($vicopex_index === 1) { echo '<h2>Otras novedades</h2>'; } ?>
            <?php get_template_part('template-parts/card', 'noticia'); $vicopex_index++; ?>
        <?php endwhile; global $wp_query; vicopex_pagination($wp_query); ?>
    <?php else : ?><p>No hay noticias publicadas en esta selección.</p><?php endif; ?>
</main>
<?php get_footer(); ?>
