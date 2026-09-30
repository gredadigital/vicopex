<?php defined('ABSPATH') || exit; if (empty($args['vicopex_principle_title'])) { return; } ?>
<li class="flex min-h-20 items-center justify-between gap-s12 rounded-tl-(--spacing-s21) rounded-br-(--spacing-s21) bg-crema py-s12 pr-s12 pl-s21 text-lead-18-bold text-negro lg:pl-s28">
    <span><?php echo esc_html($args['vicopex_principle_title']); ?></span>
    <?php echo wp_get_attachment_image(absint($args['vicopex_principle_icon'] ?? 0), 'thumbnail', false, array('class'=>'size-14 shrink-0 object-contain','alt'=>'')); ?>
</li>
