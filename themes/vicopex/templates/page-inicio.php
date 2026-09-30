<?php
/**
 * Template Name: Inicio
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header('inicio');
?>
<main id="main-content" class="bg-celeste text-negro">
<?php while (have_posts()) : the_post();
    $highlights = vicopex_meta('home_highlights');
?>
<section aria-labelledby="home-title" class="relative isolate flex min-h-[756px] flex-col justify-end bg-verde-azulado lg:min-h-[787px]">
    <?php echo wp_get_attachment_image(absint(vicopex_meta('home_hero_image')), 'full', false, array('class' => 'absolute inset-0 -z-20 size-full object-cover', 'alt' => '', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '100vw')); ?>
    <div aria-hidden="true" class="absolute inset-0 -z-10 bg-linear-[265deg,transparent_3%,rgba(0,0,0,0.4)_78%] lg:bg-linear-[241deg,transparent_14%,rgba(0,0,0,0.4)_110%]"></div>
    <div class="mx-auto flex w-full max-w-[1440px] flex-col items-center gap-s28 px-s21 py-s28 lg:gap-s21 lg:px-s120 lg:py-s16">
        <div class="flex w-full flex-col items-start gap-s28 lg:gap-s21">
            <div class="flex flex-col gap-s9 text-crema lg:max-w-[536px] lg:gap-0">
                <h1 id="home-title" class="font-display text-h2d-38 uppercase lg:text-h1d-51"><?php echo esc_html(vicopex_meta('home_hero_title') ?: get_the_title()); ?></h1>
                <?php if ($description = vicopex_meta('home_hero_description')) : ?><p class="text-h4-21"><?php echo esc_html($description); ?></p><?php endif; ?>
            </div>
            <?php get_template_part('template-parts/home/button', null, array('label'=>vicopex_meta('home_hero_button_label'),'url'=>vicopex_meta('home_hero_button_url'))); ?>
        </div>
        <?php if ($highlights) : ?><a href="#destacados" aria-label="Ver lo más destacado" class="flex size-6 items-center justify-center focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-crema"><img src="<?php echo esc_url(vicopex_home_asset('down.svg')); ?>" width="24" height="24" alt=""></a><?php endif; ?>
    </div>
</section>
<div class="mx-auto flex max-w-[1440px] flex-col gap-s51 pb-[79px] pt-s51 lg:gap-s120 lg:pb-s90 lg:pt-s120">
    <?php if ($highlights) : ?>
    <section id="destacados" aria-labelledby="highlights-title" class="flex scroll-mt-s21 flex-col gap-s16 px-s21 py-s21 lg:gap-s38 lg:px-s120 lg:py-0">
        <?php get_template_part('template-parts/home/section-heading', null, array('id'=>'highlights-title','eyebrow'=>vicopex_meta('home_highlights_eyebrow'),'title'=>vicopex_meta('home_highlights_title'))); ?>
        <div class="grid grid-cols-1 gap-s9 md:grid-cols-3 lg:gap-s16">
        <?php foreach ($highlights as $highlight) :
            $page_id = absint($highlight['vicopex_highlight_page'][0]['id'] ?? 0);
            if (!$page_id || get_post_status($page_id) !== 'publish' || get_post_type($page_id) !== 'page') { continue; }
            get_template_part('template-parts/home/highlight', null, array('page_id'=>$page_id,'image'=>$highlight['vicopex_highlight_image'] ?? 0));
        endforeach; ?>
        </div>
    </section>
    <?php endif;
    $news = new WP_Query(array('post_type'=>'noticia','post_status'=>'publish','posts_per_page'=>1,'orderby'=>array('date'=>'DESC','ID'=>'DESC'),'no_found_rows'=>true));
    if ($news->have_posts()) : ?>
    <section aria-labelledby="news-title" class="flex flex-col gap-s28 px-s21 lg:px-s120">
        <?php get_template_part('template-parts/home/section-heading', null, array('id'=>'news-title','eyebrow'=>vicopex_meta('home_news_eyebrow'),'title'=>vicopex_meta('home_news_title') ?: 'Últimas noticias')); ?>
        <?php while ($news->have_posts()) : $news->the_post(); get_template_part('template-parts/home/news'); endwhile; ?>
    </section>
    <?php endif; wp_reset_postdata(); ?>
</div>
<?php endwhile; ?>
</main>
<?php get_footer('inicio'); ?>
