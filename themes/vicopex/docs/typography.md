# Tipografía VICOPEX

Origen: [Figma / DISEÑO](https://www.figma.com/design/y1VOKjdHPFAurHaadl9Yqp/DISE%C3%91O-SITIO-VICOPEX?node-id=28-69). Extraído el 30/09/2026, 14 estilos locales. El JSON adjunto conserva IDs y keys para identificar cada estilo en futuras sincronizaciones; no es sincronización automática.

## Familias

- `font-display`: Daguin Regular, peso 400, ancho 100%; fallback genérico serif.
- `font-body`: Bahnschrift SemiCondensed, pesos 300 (Light), 400 (Regular) y 700 (Bold), ancho 87.5%; fallback genérico sans-serif.
- Se sirven cuatro WOFF2 locales mediante `assets/css/fonts.css`, con `font-display: swap`. No hay solicitudes a proveedores externos ni dependencia de fuentes instaladas.
- Las 15 copias de Bahnschrift eran idénticas. Se generaron tres instancias estáticas con `wght` 300/400/700 y `wdth` 87.5, eliminando los ejes y pesos no utilizados. Daguin se convirtió desde el TTF original.
- Se conservan todos los caracteres y metadatos de licencia de las fuentes originales. Los nombres de familia tipográfica son Daguin y Bahnschrift; las subfamilias identifican su peso y ancho. Los originales se archivaron fuera del tema.
- `docs/fonts.json` registra nombres, pesos, ancho, tamaño, cobertura y hash de origen. No añadir otros pesos sin actualizar este mapa y Figma.

## Mapa Figma → Tailwind

| Estilo Figma | Clase completa | Tamaño real | Peso | Interlínea | Tracking |
|---|---|---|---|---|---|
| p-16 | `type-p-16` | 16 px | 300 | 120% | 0% |
| lead-18 | `type-lead-18` | 18 px | 300 | 100% | 0% |
| h1-51 | `type-h1-51` | 51 px | 700 | normal | 0% |
| h1d-51 | `type-h1d-51` | 44 px | 400 | 110% | 2% |
| h2-38 | `type-h2-38` | 36 px | 700 | 110% | 0% |
| h2d-38 | `type-h2d-38` | 38 px | 400 | 110% | 2% |
| h3-28 | `type-h3-28` | 28 px | 700 | 110% | 0% |
| h3d-26 | `type-h3d-26` | 26 px | 400 | 110% | 2% |
| h4-21 | `type-h4-21` | 21 px | 700 | 110% | 0% |
| sm-13.5 | `type-sm-13-5` | 13.5 px | 400 | 110% | 0% |
| xsm-11 | `type-xsm-11` | 11 px | 400 | 110% | 0% |
| xxsm-7 | `type-xxsm-7` | 7 px | 400 | normal | 0% |
| pbold-16 | `type-pbold-16` | 16 px | 700 | 120% | 0% |
| lead-18-bold | `type-lead-18-bold` | 18 px | 700 | 100% | 0% |

Los tamaños se guardan en rem (16 px de referencia), sin forzar el tamaño raíz del navegador. h1d-51 conserva 44 px; h2-38 conserva 36 px. sm-13.5 se normaliza como sm-13-5 para los identificadores CSS.

Cada `--text-NOMBRE` incluye `--line-height`, `--font-weight` y `--letter-spacing`; Tailwind genera `text-NOMBRE`. La utilidad `type-NOMBRE` agrega familia, ancho, estilo y mayúsculas para representar el estilo Figma completo. El 2% de Figma se convierte en 0.02em, no 2px. AUTO se conserva como normal. El espacio de 16 px entre párrafos de p-16 se aplica solo a párrafos consecutivos dentro del contenedor type-p-16.

## Uso

```html
<h1 class="type-h2d-38 md:type-h1d-51">Café de especialidad boliviano</h1>
<div class="type-p-16"><p>Primer párrafo.</p><p>Segundo párrafo.</p></div>
<a class="type-lead-18-bold" href="/contacto/">Contacto</a>
<span class="type-sm-13-5">COMPETENCIAS</span>
<!-- Composición parcial: el tamaño por sí solo no cambia familia ni mayúsculas. -->
<p class="font-body text-pbold-16">Texto destacado</p>
```

El cuerpo del sitio utiliza type-p-16 como base. Los estilos de título quedan disponibles para aplicarlos por sección durante la maquetación. No se asigna automáticamente h1/h2/etc. por el nombre del estilo Figma, ni se cambia el layout.

## Archivos y mantenimiento

- assets/css/typography.css: fuente de los tokens y utilidades, importada por tw.css.
- docs/figma-typography.json: trazabilidad de valores e identidad del estilo de Figma.
- inc/fonts.php: carga de assets/css/fonts.css como dependencia del CSS del tema.
- assets/fonts/: únicamente los cuatro WOFF2 necesarios; no editar tw.build.css para cambiar fuentes.
- docs/typography.html: muestra de los 14 estilos para comprobación visual.
- Cambiar los valores en typography.css y registrar el cambio de referencia en el JSON cuando cambie Figma. Ejecutar npm run build o mantener npm run dev.
- No editar tw.build.css manualmente.

Referencias: [Tailwind / font-size](https://tailwindcss.com/docs/font-size).
