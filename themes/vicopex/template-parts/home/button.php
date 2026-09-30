<?php
defined('ABSPATH') || exit;
$label = $args['label'] ?? '';
$url = $args['url'] ?? '';
if (!$label || !$url) { return; }
$color = !empty($args['secondary']) ? 'bg-verde-suave' : 'bg-verde-azulado';
?>
<a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($color); ?> inline-flex min-h-[50px] w-full items-center justify-center rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) px-s16 py-s16 text-center text-lead-18-bold text-blanco hover:brightness-110 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-verde-azulado lg:w-[250px]"><?php echo esc_html($label); ?></a>
