<?php
/**
 * Template Name: Nuestro café
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header('inicio', array('interior'=>true,'dark_header'=>true));
?>
<main id="main-content" class="mx-auto max-w-[1440px] bg-crema pt-[110px] pb-s90 text-negro lg:pt-[124px]">
<?php while (have_posts()) : the_post();
    $button_label=vicopex_meta('coffee_button_label');
    $button_url=vicopex_meta('coffee_button_url');
    $coffees=new WP_Query(array('post_type'=>'cafe','post_status'=>'publish','posts_per_page'=>12,'paged'=>max(1,(int)get_query_var('paged'),(int)get_query_var('page')),'orderby'=>array('menu_order'=>'ASC','date'=>'DESC','ID'=>'DESC')));
?>
    <div class="grid grid-cols-1 gap-y-s28 lg:grid-cols-[1fr_auto] lg:items-center lg:gap-y-s38 lg:px-s120">
        <?php get_template_part('template-parts/shared/page-heading',null,array('title'=>get_the_title())); ?>
        <section aria-label="Nuestros cafés" class="grid grid-cols-1 gap-x-s16 gap-y-s51 px-s21 sm:grid-cols-2 lg:col-span-2 lg:row-start-2 lg:grid-cols-4 lg:gap-y-s38 lg:px-0">
        <?php if ($coffees->have_posts()) : while ($coffees->have_posts()) : $coffees->the_post();
            get_template_part('template-parts/shared/product-card');
        endwhile; else : ?>
            <p class="text-p-16">Próximamente encontrarás aquí nuestros cafés.</p>
        <?php endif; wp_reset_postdata(); ?>
        </section>
        <?php if ($button_label && $button_url) : ?>
        <a class="mx-auto mt-[calc(var(--spacing-s51)-var(--spacing-s28))] inline-flex w-[200px] items-center justify-center rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) bg-verde-azulado py-s16 text-lead-18-bold text-white hover:bg-verde-oliva focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-verde-azulado lg:col-start-2 lg:row-start-1 lg:mt-0" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_label); ?></a>
        <?php endif; ?>
        <?php if ($coffees->max_num_pages>1) : ?><div class="px-s21 text-lead-18 lg:col-span-2 lg:px-0"><?php vicopex_pagination($coffees); ?></div><?php endif; ?>
    </div>
<?php endwhile; ?>
</main>
<?php get_footer('inicio'); ?>
