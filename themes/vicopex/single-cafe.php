<?php defined('ABSPATH') || exit; get_header(); ?>
<main id="main-content">
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('coffee-detail'); ?>>
        <h1><?php echo esc_html(get_the_title()); ?></h1>
        <?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?>
        <?php vicopex_coffee_attributes(); vicopex_link('Ver nuestros cafés', vicopex_page_url('nuestro-cafe') ?: get_post_type_archive_link('cafe')); ?>
    </article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
