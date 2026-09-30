# Inicio — Figma → WordPress

Referencias: `Desktop - Inicio` (108:3076, 1440 px) y `mobile - inicio` (28:447, 412 px), archivo `y1VOKjdHPFAurHaadl9Yqp`. Las barras de Chrome de los mockups no forman parte de la web.

## Presentación

`templates/page-inicio.php` compone hero, destacados y última noticia. Todas las clases de presentación están en los PHP. Se usan utilidades nativas de Tailwind 4 generadas desde CSS `@theme`: colores (`bg-celeste`, `text-verde-azulado`), tipografía (`font-display`, `text-h2d-38`, `lg:text-h1d-51`) y espacios (`px-s21`, `lg:px-s120`, `gap-s9`). No se añadieron plugins de Tailwind, configuración JavaScript de tokens ni nuevas reglas `@utility`.

`assets/css/spacing.css` expone la escala existente como `--spacing-s*`. Los aliases `--s*` se conservan por compatibilidad. Los radios reutilizan esa misma escala mediante `rounded-tl-(--spacing-s21)`. Las dimensiones propias de una composición (hero, fotografía, ancho de botón) usan valores arbitrarios nativos, sin crear variables para cada elemento.

## Reutilización y datos

- `template-parts/home/button.php`: botón primario/secundario.
- `template-parts/home/section-heading.php`: antetítulo y título de sección.
- `template-parts/home/highlight.php`: una tarjeta por registro del Complex de destacados.
- `template-parts/home/news.php`: noticia real consultada mediante WP_Query, con título, imagen destacada, resumen y categorías.
- `template-parts/home/social.php`: lista de contactos desde Datos Vicopex; se omiten destinos vacíos.
- `header-inicio.php` y `footer-inicio.php`: composición responsive de Inicio. Las plantillas de otras páginas conservan su presentación anterior.
- `inc/home.php`: menús nativos WordPress (incluyen recorrido recursivo de submenús). Sin menú asignado, se generan enlaces desde las páginas por template.
- `assets/js/home.js`: diálogo móvil con Escape, foco nativo y bloqueo del desplazamiento. Cierra al navegar o al pasar a escritorio.

El usuario autorizó cargar los textos y fotografías del diseño en Carbon Fields y crear su noticia. Se preservaron valores previamente existentes. Las fotografías se importaron a la biblioteca de medios y se imprimen con las funciones de imagen de WordPress, incluyendo srcset. Los SVG originales se sirven desde `assets/images/inicio/`; no hay URL temporales de Figma en la página.

Los enlaces de Instagram, WhatsApp y correo requieren datos reales en Datos Vicopex. No se deducen del dibujo de sus iconos. El diseño de Inicio solo proporciona el resumen de la noticia; el cuerpo completo se mantiene pendiente de contenido editorial.

## Mantenimiento

Ejecutar `npm run build` tras editar clases PHP o CSS; `npm run dev` mantiene la compilación activa. No editar `tw.build.css`. Referencia: https://tailwindcss.com/docs/theme

Validación: sintaxis PHP y JS, compilación Tailwind, render en escritorio/móvil y 320 px sin desbordamiento horizontal, dimensiones y carga de imágenes, tamaños tipográficos, menú con Escape y retorno de foco.
