<?php
defined('ABSPATH') || exit;
$attributes=array('aroma'=>'Aroma','flavor'=>'Sabor','acidity'=>'Acidez','body'=>'Cuerpo','aftertaste'=>'Resabio');
$values=array();
foreach ($attributes as $key=>$label) { $value=vicopex_meta('coffee_'.$key); if ($value!=='') { $values[]=array($label,$value); } }
?>
<article <?php post_class('flex min-w-0 flex-col gap-[6px]'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <a class="block focus-visible:outline-2 focus-visible:outline-verde-azulado" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr('Ver café '.get_the_title()); ?>">
        <?php the_post_thumbnail('large',array('class'=>'h-[264px] w-full rounded-tl-(--spacing-s21) rounded-br-(--spacing-s21) object-cover sm:aspect-square sm:h-auto','sizes'=>'(min-width: 1440px) 288px, (min-width: 1024px) calc((100vw - 288px) / 4), (min-width: 640px) 50vw, 100vw')); ?>
    </a>
    <?php endif; ?>
    <div class="flex flex-col gap-s9">
        <h2 class="text-h4-21"><a class="hover:underline focus-visible:outline-2 focus-visible:outline-verde-azulado" href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
        <dl class="flex flex-col gap-[12px] text-sm-13-5">
        <?php foreach ($values as $index=>$attribute) : ?>
            <div class="relative flex gap-s12">
                <?php if ($index) : ?><span aria-hidden="true" class="absolute -top-[6px] right-0 left-0 h-px overflow-hidden"><img class="max-w-none lg:hidden" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/productos/line-mobile.svg'); ?>" alt=""><img class="hidden max-w-none lg:block" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/productos/line-desktop.svg'); ?>" alt=""></span><?php endif; ?>
                <dt class="w-[45px] shrink-0"><?php echo esc_html($attribute[0]); ?></dt>
                <dd class="min-w-0 flex-1"><?php echo esc_html($attribute[1]); ?></dd>
            </div>
        <?php endforeach; ?>
        </dl>
    </div>
</article>
