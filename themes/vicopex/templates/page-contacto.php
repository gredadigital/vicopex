<?php
/**
 * Template Name: Contacto
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header('inicio',array('interior'=>true));
$asset=get_template_directory_uri().'/assets/images/contacto/';
?>
<main id="main-content" class="mx-auto max-w-[1440px] pt-[110px] pb-s68 text-verde-azulado lg:pt-[124px] lg:pb-s160">
<?php while (have_posts()) : the_post(); ?>
    <div class="lg:px-s120"><?php get_template_part('template-parts/shared/page-heading',null,array('title'=>get_the_title())); ?></div>
    <div class="grid grid-cols-1 px-s21 pt-s28 lg:grid-cols-2 lg:px-s120 lg:pt-s38">
        <section aria-label="Datos de contacto" class="relative flex min-h-[596px] flex-col justify-end gap-s21 overflow-hidden rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) bg-verde-oliva p-s21 text-crema lg:rounded-tl-(--spacing-s21) lg:rounded-br-none lg:p-s28">
            <?php echo wp_get_attachment_image(absint(vicopex_meta('contact_image')),'large',false,array('class'=>'absolute inset-0 h-full w-full object-cover','alt'=>'','sizes'=>'(min-width: 1440px) 600px, (min-width: 1024px) 50vw, 100vw','loading'=>'eager')); ?>
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-linear-to-b from-verde-oliva/0 from-[42.308%] to-verde-oliva/80"></div>
            <img class="relative" src="<?php echo esc_url($asset.'moledora.svg'); ?>" alt="" width="54.31" height="70">
            <?php
            $address=trim(vicopex_option('address').' '.vicopex_option('origin_altitude'));
            $email=vicopex_option('email'); $phone=vicopex_option('phone');
            $details=array(
                array('marker',$address,vicopex_option('maps_url')),
                array('mail',$email,$email ? 'mailto:'.sanitize_email($email) : ''),
                array('phone',$phone,$phone ? 'tel:'.preg_replace('/[^0-9+]/','',$phone) : ''),
            );
            ?>
            <address class="relative flex flex-col gap-s9 text-sm-13-5 not-italic lg:text-lead-18">
            <?php foreach ($details as $detail) : if (!$detail[1]) { continue; } ?>
                <div class="flex items-center gap-s12 lg:gap-s16">
                    <span aria-hidden="true" class="flex size-[20px] shrink-0 items-center justify-center lg:size-[24px]">
                        <img class="max-w-none lg:hidden" src="<?php echo esc_url($asset.$detail[0].'-mobile.svg'); ?>" alt="">
                        <img class="hidden max-w-none lg:block" src="<?php echo esc_url($asset.$detail[0].'-desktop.svg'); ?>" alt="">
                    </span>
                    <?php if ($detail[2]) : ?><a class="min-w-0 flex-1 break-words hover:underline lg:max-w-[357px]" href="<?php echo esc_url($detail[2]); ?>"><?php echo esc_html($detail[1]); ?></a>
                    <?php else : ?><p class="min-w-0 flex-1 lg:max-w-[357px]"><?php echo esc_html($detail[1]); ?></p><?php endif; ?>
                </div>
            <?php endforeach; ?>
            </address>
        </section>
        <section aria-labelledby="contact-form-title" class="flex min-w-0 flex-col gap-s38 rounded-br-(--spacing-s21) bg-crema py-s38 lg:gap-s28 lg:p-s38">
            <div aria-hidden="true" class="flex justify-center lg:justify-end">
                <img class="lg:hidden" src="<?php echo esc_url($asset.'bean-mobile.svg'); ?>" alt="">
                <img class="hidden lg:block" src="<?php echo esc_url($asset.'bean-desktop.svg'); ?>" alt="">
            </div>
            <div class="flex flex-col gap-s21">
                <h2 id="contact-form-title" class="mx-auto max-w-[260px] text-balance text-center font-display text-h3d-26 uppercase lg:mx-0 lg:max-w-none lg:text-left"><?php echo esc_html(vicopex_meta('contact_form_title') ?: 'Formulario de contacto'); ?></h2>
                <?php if (has_action('vicopex_contact_form')) : do_action('vicopex_contact_form'); else : get_template_part('template-parts/shared/contact-form'); endif; ?>
            </div>
        </section>
    </div>
<?php endwhile; ?>
</main>
<?php get_footer('inicio'); ?>
