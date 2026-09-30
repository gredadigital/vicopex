<?php
defined('ABSPATH') || exit;
$whatsapp=preg_replace('/[^0-9]/','',(string)vicopex_option('whatsapp'));
$email=sanitize_email(vicopex_option('email'));
$links=array(
    array('Instagram',vicopex_option('instagram'),'instagram.svg'),
    array('WhatsApp',$whatsapp ? 'https://wa.me/'.$whatsapp : '','whatsapp.svg'),
    array('Correo electrónico',$email ? 'mailto:'.$email : '','mail.svg'),
);
?>
<ul aria-label="Contacto y redes sociales" class="flex min-h-6 items-center gap-s16">
<?php foreach ($links as list($label,$url,$icon)) : if (!$url) { continue; } ?>
    <li><a href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($label); ?>" class="flex size-6 items-center justify-center focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-crema"><img src="<?php echo esc_url(vicopex_home_asset($icon)); ?>" alt="" loading="lazy"></a></li>
<?php endforeach; ?>
</ul>
