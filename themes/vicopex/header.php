<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <?php if (has_custom_logo()) { the_custom_logo(); } else { vicopex_link(get_bloginfo('name'), home_url('/')); } ?>
    <nav aria-label="Navegación principal"><?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'vicopex_default_menu')); ?></nav>
</header>
