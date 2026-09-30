<?php
/**
 * Template Name: Nuestra historia
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header('inicio', array('interior'=>true));
?>
<main id="main-content" class="mx-auto max-w-[1440px] bg-crema pt-[110px] text-negro lg:bg-celeste lg:px-s120 lg:pt-[124px] lg:pb-[110px]">
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('template-parts/shared/page-heading', null, array('title'=>get_the_title())); ?>
    <div class="flex flex-col gap-s51 pt-s28 lg:gap-0 lg:pt-s38">
        <section aria-labelledby="history-intro-title" class="flex flex-col lg:flex-row lg:items-center lg:gap-s16 lg:rounded-tl-(--spacing-s38) lg:bg-crema lg:p-s21">
            <div class="relative isolate flex min-h-[434px] flex-col justify-end gap-s9 overflow-hidden rounded-b-(--spacing-s16) bg-verde-oliva p-s21 text-blanco lg:min-h-[379px] lg:w-[40.59%] lg:shrink-0 lg:gap-s16 lg:rounded-none lg:rounded-tl-(--spacing-s12) lg:rounded-br-(--spacing-s12)">
                <?php echo wp_get_attachment_image(absint(vicopex_meta('history_image')), 'large', false, array('class'=>'absolute inset-0 -z-20 size-full object-cover lg:object-[center_31.85%]','alt'=>'','loading'=>'eager','fetchpriority'=>'high','sizes'=>'(min-width: 1024px) 40vw, 100vw')); ?>
                <div aria-hidden="true" class="absolute inset-0 -z-10 bg-linear-to-b from-verde-suave/0 to-verde-oliva/80"></div>
                <img src="<?php echo esc_url(vicopex_history_asset('laurel.svg')); ?>" width="38.7931" height="50" alt="">
                <h2 id="history-intro-title" class="max-w-[300px] text-h4-21 lg:max-w-none lg:text-h3-28"><?php echo esc_html(vicopex_meta('history_intro_title')); ?></h2>
            </div>
            <div class="min-w-0 px-s21 py-s28 text-p-16 [&_p+p]:mt-s16 lg:flex-1 lg:px-s38"><?php echo wp_kses_post(wpautop(vicopex_meta('history_intro'))); ?></div>
        </section>
        <div aria-hidden="true" class="flex justify-center lg:bg-crema lg:py-s51">
            <img class="lg:hidden" src="<?php echo esc_url(vicopex_history_asset('granos-mobile.svg')); ?>" width="45.4424" height="38" alt="" loading="lazy">
            <img class="hidden lg:block" src="<?php echo esc_url(vicopex_history_asset('granos-desktop.svg')); ?>" width="57.401" height="48" alt="" loading="lazy">
        </div>
        <section aria-labelledby="history-origin-title" class="flex flex-col lg:flex-row lg:items-start lg:gap-[35px] lg:bg-crema lg:px-s21 lg:pt-s21 lg:pb-s38">
            <div class="flex min-w-0 flex-col gap-[10px] p-s21 lg:flex-1 lg:px-0 lg:py-s51">
                <h2 id="history-origin-title" class="text-center font-display text-h3d-26 text-verde-azulado uppercase lg:text-left"><?php echo esc_html(vicopex_meta('history_origin_title')); ?></h2>
                <div class="text-p-16">
                    <div class="[&_p+p]:mt-s16"><?php echo wp_kses_post(wpautop(vicopex_meta('history_origin_description'))); ?></div>
                    <dl class="mt-s16">
                    <?php foreach (array('address'=>'Ubicación','origin_distance'=>'Distancia','origin_altitude'=>'Altitud','origin_coordinates'=>'Coordenadas') as $key=>$label) : $value=vicopex_option($key); if (!$value) { continue; } ?>
                        <div><dt class="inline font-bold"><?php echo esc_html($label); ?>:</dt> <dd class="inline"><?php echo esc_html($value); ?></dd></div>
                    <?php endforeach; ?>
                    </dl>
                </div>
            </div>
            <div class="px-s21 py-s9 lg:w-[49.31%] lg:shrink-0 lg:p-0">
                <div class="relative h-[370px] overflow-hidden rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) lg:rounded-tl-(--spacing-s12) lg:rounded-br-(--spacing-s12)">
                    <?php echo wp_get_attachment_image(absint(vicopex_meta('history_origin_image')), 'large', false, array('class'=>'size-full object-cover','sizes'=>'(min-width: 1024px) 45vw, 100vw')); ?>
                    <?php get_template_part('template-parts/shared/location-map'); ?>
                </div>
            </div>
        </section>
        <?php $principles=vicopex_meta('history_principles'); if ($principles) : ?>
        <section aria-labelledby="history-principles-title" class="flex flex-col items-center gap-s38 bg-verde-azulado px-s21 pt-s51 pb-s120 lg:flex-row lg:items-end lg:gap-[10px] lg:rounded-br-(--spacing-s38) lg:pt-s120 lg:pb-s68">
            <div class="flex w-full justify-center lg:min-w-0 lg:flex-1 lg:justify-start">
                <h2 id="history-principles-title" class="max-w-[280px] text-center font-display text-h3d-26 text-crema uppercase lg:max-w-[160px] lg:text-left"><?php $title_parts = explode(' ', trim((string) vicopex_meta('history_principles_title')), 2); ?><span class="block lg:inline"><?php echo esc_html($title_parts[0]); ?></span> <?php echo esc_html($title_parts[1] ?? ''); ?></h2>
            </div>
            <ul class="grid w-full grid-cols-1 gap-s9 sm:grid-cols-2 lg:w-[58.03%] lg:shrink-0 lg:gap-s12">
                <?php foreach ($principles as $principle) { get_template_part('template-parts/shared/principle', null, $principle); } ?>
            </ul>
        </section>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
</main>
<?php get_footer('inicio'); ?>
