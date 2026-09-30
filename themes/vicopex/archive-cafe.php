<?php defined('ABSPATH') || exit; get_header(); ?>
<main id="main-content" class="coffee-archive">
    <h1>Cafés</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); get_template_part('template-parts/card', 'cafe'); endwhile;
    global $wp_query; vicopex_pagination($wp_query);
    else : ?><p>Próximamente encontrarás aquí nuestros cafés.</p><?php endif; ?>
</main>
<?php get_footer(); ?>
