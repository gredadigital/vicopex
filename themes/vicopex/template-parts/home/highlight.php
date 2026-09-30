<?php
defined('ABSPATH') || exit;
$page_id = absint($args['page_id']);
$position = get_page_template_slug($page_id) === 'templates/page-contacto.php' ? 'object-[center_28%] lg:object-center' : 'object-center';
?>
<a href="<?php echo esc_url(get_permalink($page_id)); ?>" class="group relative isolate flex min-h-[207.333px] items-end justify-between gap-s16 overflow-hidden rounded-tl-(--spacing-s21) rounded-br-(--spacing-s21) bg-verde-azulado p-s16 text-crema focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-verde-azulado lg:min-h-[306px] lg:rounded-tl-(--spacing-s28) lg:rounded-br-(--spacing-s28)">
    <?php echo wp_get_attachment_image(absint($args['image']), 'large', false, array('class'=>'absolute inset-0 -z-20 size-full object-cover '.$position,'alt'=>'','sizes'=>'(min-width: 1024px) 30vw, (min-width: 768px) 33vw, 100vw')); ?>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-linear-to-b from-transparent to-black/40 group-hover:to-black/60"></div>
    <h3 class="text-h4-21 lg:text-h3-28"><?php echo esc_html(get_the_title($page_id)); ?></h3>
    <span class="flex size-6 shrink-0 items-center justify-center"><img src="<?php echo esc_url(vicopex_home_asset('next.svg')); ?>" width="22" height="22" alt="" loading="lazy"></span>
</a>
