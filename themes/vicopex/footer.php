<footer class="site-footer">
    <?php if (has_custom_logo()) { the_custom_logo(); } ?>
    <nav aria-label="Navegación del pie"><?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => 'vicopex_default_menu')); ?></nav>
    <?php vicopex_social_links(); vicopex_contact_details(); ?>
    <p>&copy; <?php echo esc_html(wp_date('Y') . ' ' . get_bloginfo('name')); ?>. <?php echo esc_html(vicopex_option('footer_legal') ?: 'Todos los derechos reservados.'); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
