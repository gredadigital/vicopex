<?php defined('ABSPATH') || exit; ?>
<article <?php post_class('news-card'); ?>>
    <?php if (has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a><?php endif; ?>
    <?php vicopex_news_categories(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
    <?php vicopex_text(vicopex_meta('news_summary')); ?>
    <a href="<?php the_permalink(); ?>">Leer más</a>
</article>
