<?php
defined('ABSPATH') || exit;
$step=$args['step'];
$index=(int)$args['index'];
$reverse=$index%2===1;
$layout=$reverse ? 'lg:flex-row-reverse lg:pl-s90 lg:pr-s21 lg:text-right' : 'lg:flex-row lg:pl-s21 lg:pr-s90';
$image_id=absint($step['vicopex_step_image'] ?? 0);
// The plant photograph has a specific crop in the reference; keep it with its media asset when reordered.
$crop=get_post_meta($image_id,'_vicopex_design_source',true)==='trazabilidad-figma-06' ? 'object-[center_17.065%] lg:object-[center_10.83%]' : '';
?>
<li class="group flex w-full flex-col items-center lg:max-w-[680px]">
    <?php if ($index>0) : ?>
    <div aria-hidden="true" class="flex h-[60px] items-center justify-center lg:h-[40px]">
        <img class="rotate-90 lg:hidden" src="<?php echo esc_url(vicopex_trace_asset('connector-mobile.svg')); ?>" width="60" height="3" alt="" loading="lazy">
        <img class="hidden rotate-90 lg:block" src="<?php echo esc_url(vicopex_trace_asset('connector-desktop.svg')); ?>" width="40" height="2" alt="" loading="lazy">
    </div>
    <?php endif; ?>
    <article class="<?php echo esc_attr($layout); ?> flex w-full flex-col items-center gap-s16 rounded-tl-(--spacing-s28) rounded-br-(--spacing-s28) inset-ring-2 inset-ring-celeste p-s21 lg:gap-s28 lg:rounded-tl-(--spacing-s38) lg:rounded-br-(--spacing-s38)">
        <?php echo wp_get_attachment_image($image_id, 'large', false, array('class'=>'h-[230px] w-full shrink-0 rounded-tl-(--spacing-s12) rounded-br-(--spacing-s12) object-cover lg:w-[230px] lg:rounded-tl-(--spacing-s16) lg:rounded-br-(--spacing-s16) '.$crop,'alt'=>'','sizes'=>'(min-width: 1024px) 230px, 100vw','loading'=>$index===0 ? 'eager' : 'lazy')); ?>
        <div class="flex w-full min-w-0 flex-col gap-s9 lg:flex-1">
            <div>
                <p class="text-sm-13-5"><?php echo esc_html($step['vicopex_step_number'] ?? sprintf('%02d',$index+1)); ?></p>
                <h2 class="text-h4-21 lg:text-h3-28"><?php echo esc_html($step['vicopex_step_title'] ?? ''); ?></h2>
            </div>
            <div class="text-p-16 [&_p+p]:mt-s16"><?php echo wp_kses_post(wpautop($step['vicopex_step_description'] ?? '')); ?></div>
        </div>
    </article>
</li>
