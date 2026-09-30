# Nuestra historia

Referencia Figma: `Desktop - Nuestra Historia` (108:3425) y `mobile - nuestra historia` (49:286). Barras del navegador excluidas de la implementación.

La plantilla `templates/page-nuestra-historia.php` utiliza clases nativas de Tailwind 4 directamente en PHP, con las variables existentes de color, tipografía y espaciado en `@theme`. Sin nuevas utilidades personalizadas ni configuración de tokens en JavaScript.

La cabecera `header-inicio.php` recibe `interior: true` para usar los SVG de marca y menú sobre fondo claro. Se comparte el pie de página y el diálogo móvil. El menú detecta la página activa también cuando se generan automáticamente sus enlaces.

Componentes reutilizables en `template-parts/shared/`:

- `page-heading.php`: enlace Regresar a Inicio y título nativo de la página.
- `principle.php`: una tarjeta por elemento del Complex `history_principles`, con icono administrable.
- `location-map.php`: mapa y marcador, con enlace opcional desde Datos Vicopex.

Se cargaron fotografías, textos y cuatro principios de Figma en los campos Carbon existentes, preservando los valores ya guardados. Las imágenes editoriales pertenecen a la biblioteca de medios; los adornos SVG están en `assets/images/historia/`. Los iconos de principios son exportaciones de sus nodos gráficos originales (365:4745, 365:4749, 365:4756, 365:4760), incluidos sus fondos.

La dirección utiliza el dato global ya existente; no se duplicó para adaptar su redacción al frame. Las coordenadas conservan el texto del diseño. El mapa se muestra como imagen hasta configurar su URL; los enlaces sociales siguen dependiendo de los datos globales pendientes.

Comprobaciones: PHP, compilación Tailwind, carga de recursos y geometría, comparación desktop/móvil, pantallas de 320 px, navegación móvil y ausencia de errores de consola. Mantener `npm run dev` o ejecutar `npm run build` tras cambiar clases PHP.
