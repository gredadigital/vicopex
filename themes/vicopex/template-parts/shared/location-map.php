<?php
defined('ABSPATH') || exit;
$image=vicopex_option('location_map_image');
if (!$image) { return; }
$url=vicopex_option('maps_url');
$tag=$url ? 'a' : 'figure';
?>
<<?php echo $tag; ?> <?php if ($url) : ?>href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr(vicopex_option('location_label') ?: 'Ver ubicación'); ?>"<?php endif; ?> class="absolute right-[10px] bottom-[10px] isolate flex size-[130px] items-end gap-[3px] overflow-hidden rounded-(--spacing-s9) border-2 border-crema p-s9 text-crema">
    <?php echo wp_get_attachment_image(absint($image), 'medium', false, array('class'=>'absolute inset-0 -z-20 size-full object-cover','alt'=>'')); ?>
    <span aria-hidden="true" class="absolute inset-0 -z-10 bg-linear-to-b from-verde-oliva/0 from-[43.667%] to-verde-oliva/76"></span>
    <img class="absolute top-[55.5px] left-[87.5px]" src="<?php echo esc_url(vicopex_history_asset('pin-desktop.svg')); ?>" width="17" height="17" alt="" loading="lazy">
    <img class="shrink-0" src="<?php echo esc_url(vicopex_history_asset('gps.svg')); ?>" width="12" height="12" alt="" loading="lazy">
    <span class="text-sm-13-5 whitespace-nowrap"><?php echo esc_html(vicopex_option('location_label') ?: 'Caranavi, Bolivia'); ?></span>
</<?php echo $tag; ?>>
