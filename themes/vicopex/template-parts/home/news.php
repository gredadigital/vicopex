<?php defined('ABSPATH') || exit; ?>
<article <?php post_class('flex flex-col gap-s16 overflow-hidden rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) bg-crema lg:flex-row lg:gap-s21 lg:rounded-tl-(--spacing-s38) lg:rounded-br-(--spacing-s38) lg:p-s28'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true" class="block h-[247px] min-w-0 lg:h-[345px] lg:flex-1 lg:overflow-hidden lg:rounded-tl-(--spacing-s12) lg:rounded-br-(--spacing-s12)"><?php the_post_thumbnail('large', array('class'=>'size-full object-cover','alt'=>'','sizes'=>'(min-width: 1024px) 40vw, 100vw')); ?></a>
    <?php endif; ?>
    <div class="flex min-w-0 flex-col items-start gap-s21 px-s16 pb-s16 lg:flex-1 lg:justify-between lg:p-0">
        <?php $terms = get_the_terms(get_the_ID(), 'categoria_noticia'); if ($terms && !is_wp_error($terms)) : ?>
        <ul aria-label="Categorías" class="flex flex-wrap gap-s9">
            <?php foreach ($terms as $term) : $url=get_term_link($term); if (is_wp_error($url)) { continue; } ?>
            <li><a class="block rounded-tl-(--spacing-s9) rounded-br-(--spacing-s9) bg-verde-azulado px-s16 py-s9 text-xsm-11 text-crema uppercase hover:underline lg:text-sm-13-5 lg:text-celeste" href="<?php echo esc_url($url); ?>"><?php echo esc_html($term->name); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="flex flex-col gap-s9">
            <h3 class="text-h4-21 lg:text-h2-38"><a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a></h3>
            <?php if ($summary=vicopex_meta('news_summary')) : ?><p class="text-p-16"><?php echo esc_html($summary); ?></p><?php endif; ?>
        </div>
        <div class="flex w-full justify-end"><?php get_template_part('template-parts/home/button', null, array('label'=>'Leer más','url'=>get_permalink(),'secondary'=>true)); ?></div>
    </div>
</article>
