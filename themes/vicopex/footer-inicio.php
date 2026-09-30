<footer class="flex flex-col gap-[3px] bg-celeste text-crema">
    <div class="flex justify-center rounded-b-(--spacing-s28) bg-verde-azulado px-s21 py-s51 lg:rounded-b-(--spacing-s21)">
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="Vicopex, inicio">
            <img class="lg:hidden" src="<?php echo esc_url(vicopex_home_asset('logo-footer-mobile.svg')); ?>" width="199" height="37" alt="Vicopex" loading="lazy">
            <img class="hidden lg:block" src="<?php echo esc_url(vicopex_home_asset('logo-footer-desktop.svg')); ?>" width="323.165" height="60" alt="Vicopex" loading="lazy">
        </a>
    </div>
    <div class="flex flex-col items-center gap-s51 rounded-tl-(--spacing-s28) rounded-tr-(--spacing-s38) bg-verde-azulado px-s21 pt-s16 pb-s28 lg:gap-s68 lg:rounded-t-(--spacing-s21) lg:py-s21">
        <nav aria-label="Navegación del pie" class="py-s16"><?php vicopex_home_menu('footer','flex flex-col items-center gap-s16 text-center text-lead-18-bold lg:flex-row lg:gap-s38 [&_a:hover]:underline [&_ul]:flex [&_ul]:flex-col [&_ul]:gap-s16 [&_ul]:pt-s16'); ?></nav>
        <?php get_template_part('template-parts/home/social'); ?>
        <div class="flex max-w-[475px] flex-col gap-s9 text-center text-p-16">
            <?php if ($address=vicopex_option('address')) : ?><address class="not-italic"><?php echo nl2br(esc_html($address)); ?></address><?php endif; ?>
            <p>&copy; <?php echo esc_html(wp_date('Y')); ?> Vicopex. <?php echo esc_html(vicopex_option('footer_legal') ?: 'Todos los derechos reservados.'); ?></p>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
