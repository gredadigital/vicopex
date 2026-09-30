<?php $interior = !empty($args['interior']); $dark_header = !empty($args['dark_header']); ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(($dark_header ? 'bg-crema' : ($interior ? 'bg-crema lg:bg-celeste' : 'bg-celeste')) . ' font-body font-stretch-semi-condensed text-p-16'); ?>>
<?php wp_body_open(); ?>
<a class="sr-only focus:not-sr-only focus:fixed focus:top-0 focus:left-0 focus:z-50 focus:bg-crema focus:p-s16 focus:text-verde-azulado" href="#main-content">Saltar al contenido</a>
<div class="relative">
<header class="absolute inset-x-0 top-0 z-20 px-s21 lg:top-s16 lg:px-0">
    <div class="flex items-center justify-between py-s21 lg:hidden">
        <span class="size-6" aria-hidden="true"></span>
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="Vicopex, inicio"><img src="<?php echo esc_url(($interior ? vicopex_history_asset('logo-mobile.svg') : vicopex_home_asset('logo-mobile.svg'))); ?>" width="54.1532" height="40" alt="Vicopex"></a>
        <button type="button" data-menu-open aria-label="Abrir menú" aria-haspopup="dialog" aria-controls="home-menu" aria-expanded="false" class="flex size-6 cursor-pointer items-center justify-center focus-visible:outline-2 focus-visible:outline-crema"><img src="<?php echo esc_url(($interior ? vicopex_history_asset('menu.svg') : vicopex_home_asset('menu.svg'))); ?>" width="24" height="24" alt=""></button>
    </div>
    <div class="mx-auto hidden w-fit max-w-[calc(100%-42px)] items-center gap-s68 rounded-tl-(--spacing-s28) rounded-br-(--spacing-s28) <?php echo $dark_header ? 'bg-verde-azulado' : 'bg-crema'; ?> py-s16 pr-s16 pl-s38 lg:flex">
        <a class="shrink-0" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Vicopex, inicio"><img src="<?php echo esc_url(($dark_header ? vicopex_trace_asset('logo-desktop.svg') : vicopex_home_asset('logo-desktop.svg'))); ?>" width="188.513" height="35" alt="Vicopex"></a>
        <nav aria-label="Navegación principal">
            <?php vicopex_home_menu('primary',($dark_header ? 'text-crema [&>li:last-child>a]:bg-crema [&>li:last-child>a]:text-verde-azulado' : 'text-verde-azulado [&>li:last-child>a]:bg-verde-azulado [&>li:last-child>a]:text-blanco') . ' flex items-center gap-s21 text-lead-18-bold [&_a]:block [&_a]:py-s9 [&_a:hover]:underline [&_a[aria-current=page]]:underline [&>li:last-child>a]:rounded-tl-(--spacing-s16) [&>li:last-child>a]:rounded-br-(--spacing-s16) [&>li:last-child>a]:px-s28 [&_li]:relative [&_ul]:absolute [&_ul]:top-full [&_ul]:left-0 [&_ul]:hidden [&_ul]:min-w-48 [&_ul]:bg-crema [&_ul]:text-verde-azulado [&_ul]:p-s16 [&_li:hover>ul]:block [&_li:focus-within>ul]:block'); ?>
        </nav>
    </div>
</header>
<dialog id="home-menu" aria-label="Menú de navegación" class="fixed inset-0 m-0 h-dvh max-h-none w-full max-w-none overflow-y-auto border-0 bg-crema p-s21 text-verde-azulado backdrop:bg-black/40">
    <div class="flex justify-end"><button type="button" data-menu-close class="cursor-pointer p-s12 text-lead-18-bold" aria-label="Cerrar menú">Cerrar ×</button></div>
    <nav aria-label="Navegación móvil" class="py-s38"><?php vicopex_home_menu('primary','flex flex-col gap-s21 font-display text-h3d-26 uppercase [&_a]:block [&_a]:py-s9 [&_a:hover]:underline [&_a[aria-current=page]]:underline [&_ul]:pl-s21 [&_ul]:text-lead-18'); ?></nav>
</dialog>
