<?php defined('ABSPATH') || exit; ?>
<header class="flex flex-col items-start gap-[5px] px-s21 py-s9 text-verde-azulado lg:gap-s12 lg:px-0">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-[2px] text-sm-13-5 hover:underline lg:gap-[3px] lg:text-lead-18">
        <img class="lg:hidden" src="<?php echo esc_url(vicopex_history_asset('back-mobile.svg')); ?>" width="12" height="12" alt="">
        <img class="hidden lg:block" src="<?php echo esc_url(vicopex_history_asset('back-desktop.svg')); ?>" width="16" height="16" alt="">
        Regresar
    </a>
    <h1 class="font-display text-h3d-26 uppercase lg:text-h2d-38"><?php echo esc_html($args['title']); ?></h1>
</header>
