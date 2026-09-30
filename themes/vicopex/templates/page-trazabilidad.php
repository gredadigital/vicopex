<?php
/**
 * Template Name: Trazabilidad
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header('inicio', array('interior'=>true,'dark_header'=>true));
?>
<main id="main-content" class="mx-auto max-w-[1440px] bg-crema pt-[110px] pb-[82px] text-negro lg:pt-[124px] lg:pb-s90">
<?php while (have_posts()) : the_post(); ?>
    <div class="lg:px-s120"><?php get_template_part('template-parts/shared/page-heading', null, array('title'=>get_the_title())); ?></div>
    <?php $steps = vicopex_meta('traceability_steps'); if ($steps) : ?>
    <ol aria-label="Etapas de trazabilidad" class="flex flex-col items-center px-s21 pt-s28 pb-s90 lg:px-s120 lg:pt-s38">
        <?php foreach (array_values($steps) as $index=>$step) { get_template_part('template-parts/shared/traceability-step', null, array('step'=>$step,'index'=>$index)); } ?>
    </ol>
    <?php endif;
    if (vicopex_meta('traceability_producer_name') || vicopex_meta('traceability_producer_bio') || vicopex_meta('traceability_producer_image')) : ?>
    <section aria-labelledby="producer-title" class="px-s21 pt-s28 lg:px-s120 lg:py-s51">
        <div class="flex flex-col items-center gap-s38 rounded-tl-(--spacing-s38) rounded-br-(--spacing-s28) bg-verde-azulado px-s21 py-s51 text-crema lg:flex-row lg:py-s68 lg:pr-s160 lg:pl-s90">
            <?php echo wp_get_attachment_image(absint(vicopex_meta('traceability_producer_image')), 'large', false, array('class'=>'aspect-square w-[280px] max-w-full shrink-0 -scale-x-100 rounded-full object-cover lg:w-[304px]','sizes'=>'(min-width: 1024px) 304px, 280px')); ?>
            <div class="flex min-w-0 flex-col gap-s16 lg:flex-1 lg:gap-s28">
                <div class="flex flex-col gap-[5px]">
                    <?php if ($role=vicopex_meta('traceability_producer_role')) : ?><p class="text-lead-18-bold"><?php echo esc_html($role); ?></p><?php endif; ?>
                    <h2 id="producer-title" class="font-display text-h3d-26 uppercase"><?php echo esc_html(vicopex_meta('traceability_producer_name')); ?></h2>
                </div>
                <div class="text-p-16 [&_p+p]:mt-s16"><?php echo wp_kses_post(wpautop(vicopex_meta('traceability_producer_bio'))); ?></div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php endwhile; ?>
</main>
<?php get_footer('inicio'); ?>
