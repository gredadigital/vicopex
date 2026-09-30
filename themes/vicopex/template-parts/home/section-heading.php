<?php defined('ABSPATH') || exit; ?>
<header class="flex flex-col items-center gap-s9 text-center text-verde-azulado">
    <?php if (!empty($args['eyebrow'])) : ?><p class="text-pbold-16"><?php echo esc_html($args['eyebrow']); ?></p><?php endif; ?>
    <h2 id="<?php echo esc_attr($args['id']); ?>" class="font-display text-h3d-26 uppercase"><?php echo esc_html($args['title']); ?></h2>
</header>
