<?php defined('ABSPATH') || exit; get_header(); ?>
<main id="main-content">
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <?php vicopex_page_heading(); vicopex_rich(vicopex_meta('page_body')); ?>
    </article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
