<?php
defined('ABSPATH') || exit;
$fields=array(
    array('name','Nombre completo*','text','name',true,'col-span-2'),
    array('city','Ciudad*','text','address-level2',true,''),
    array('country','País*','text','country-name',true,''),
    array('email','Correo electrónico*','email','email',true,'col-span-2'),
    array('phone','Celular','tel','tel',false,'col-span-2'),
);
?>
<form aria-describedby="contact-form-status" class="flex flex-col gap-s12">
    <fieldset disabled class="grid min-w-0 grid-cols-2 gap-[5px]">
        <legend class="sr-only">Datos de consulta</legend>
        <?php foreach ($fields as $field) : ?>
        <div class="min-w-0 <?php echo esc_attr($field[5]); ?>">
            <label class="sr-only" for="contact-<?php echo esc_attr($field[0]); ?>"><?php echo esc_html($field[1]); ?></label>
            <input class="block w-full min-w-0 rounded-(--spacing-s9) border-0 bg-celeste px-s12 py-s16 text-p-16 text-verde-azulado opacity-100 placeholder:text-verde-azulado" id="contact-<?php echo esc_attr($field[0]); ?>" name="<?php echo esc_attr($field[0]); ?>" type="<?php echo esc_attr($field[2]); ?>" autocomplete="<?php echo esc_attr($field[3]); ?>" placeholder="<?php echo esc_attr($field[1]); ?>" <?php echo $field[4] ? 'required' : ''; ?>>
        </div>
        <?php endforeach; ?>
        <div class="col-span-2">
            <label class="sr-only" for="contact-message">Mensaje</label>
            <textarea class="block h-[134px] w-full resize-y rounded-(--spacing-s9) border-0 bg-celeste px-s12 py-s16 text-p-16 text-verde-azulado opacity-100 placeholder:text-verde-azulado" id="contact-message" name="message" placeholder="Mensaje"></textarea>
        </div>
    </fieldset>
    <button type="button" disabled class="mx-auto w-full cursor-not-allowed rounded-tl-(--spacing-s16) rounded-br-(--spacing-s16) bg-verde-azulado py-s16 text-lead-18-bold text-white lg:max-w-[350px]">Enviar</button>
    <p id="contact-form-status" class="text-center text-sm-13-5">El envío del formulario aún no está habilitado. Puedes contactarnos por teléfono o correo electrónico.</p>
</form>
