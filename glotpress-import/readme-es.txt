=== Plogins Lookbook - Shoppable Lookbook for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, shoppable, hotspot, lookbook, product image
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requires Plugins: woocommerce
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Convierte cualquier imagen en un lookbook que se puede comprar: fija productos de WooCommerce como puntos de acceso que muestran una tarjeta de producto con precio y botón de añadir al carrito.

== Description ==

Lookbook convierte una sola imagen en una escena que se puede comprar. Sube una foto, fija tus
productos de WooCommerce como puntos de acceso y luego incrusta el resultado donde quieras con un
shortcode. Cuando alguien activa un punto de acceso, aparece una pequeña tarjeta de producto con
la miniatura, el título, el precio y un enlace para añadir al carrito, para que pueda comprar directamente
desde la imagen.

Está pensado para tiendas que venden el look completo: conjuntos de moda, ambientes de habitación,
guías de regalos, fotos de ingredientes de recetas... allí donde varios productos conviven en una misma imagen.

El código se desarrolla de forma abierta (código abierto). Explóralo o informa de un error en
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-lookbook/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-lookbook/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-lookbook
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Crea un lookbook en el menú <strong>Lookbooks</strong> y define su imagen con el
   cuadro de imagen destacada.
2. Añade un punto de acceso para cada producto: colócalo con un porcentaje X e Y e
   introduce el ID del producto.
3. Incrústalo con `[lookbook id="123"]`.

= Features =

* Imagen que se puede comprar: fija tantos productos como quieras como puntos de acceso en una imagen.
* Editor de puntos de acceso sencillo: coloca cada producto por porcentaje X/Y.
* Marcadores de puntos de acceso accesibles: botones reales, manejables con el teclado y con etiquetas para lectores de pantalla.
* Ventana emergente de tarjeta de producto con miniatura, título, precio en directo y un enlace para añadir al carrito.
* Shortcode `[lookbook id="N"]`.
* Lee los datos del producto en directo desde WooCommerce, así que los precios y el stock están siempre actualizados.
* Degradación limpia: un lookbook sin imagen, sin puntos de acceso o solo con productos eliminados no muestra nada o solo la imagen, nunca marcado roto.
* El CSS se adapta a los esquemas de color claro y oscuro y respeta prefers-reduced-motion.
* Sin saltos de diseño, sin jQuery; los recursos se cargan solo donde aparece un lookbook.
* Listo para traducir (POT incluido) y desinstalación limpia.
* Compatible con HPOS y con los bloques de carrito y pago.

== Installation ==

1. Sube el plugin a `/wp-content/plugins/lookbook` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Crea tu primer lookbook en <strong>Lookbooks → Añadir nuevo</strong>: define la imagen destacada y luego añade los puntos de acceso de productos.
4. Ajusta la presentación global en <strong>WooCommerce → Lookbook</strong>.
5. Incrusta un lookbook con `[lookbook id="123"]`.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Lookbook solo funciona cuando WooCommerce está activo, y los puntos de acceso enlazan con
productos de WooCommerce.

= How do I find a lookbook's ID? =

Abre la lista de Lookbooks en el menú Lookbooks; el ID se muestra al editar
(post=123 en la URL). Úsalo en el shortcode.

= How do I position a hotspot? =

Cada punto de acceso tiene un valor X y un valor Y, ambos porcentajes desde la esquina superior izquierda de la
imagen (0–100), para que puedas alinear los marcadores con los productos de la foto.

= What happens if a pinned product is deleted? =

Ese punto de acceso simplemente se omite. Lookbook nunca muestra un marcador para un producto
que se ha eliminado o no está publicado.

= Can I show the price and an add-to-cart button? =

Sí. Ambos son interruptores en <strong>WooCommerce → Lookbook</strong>, y puedes personalizar la
etiqueta de añadir al carrito.

= Will it slow my pages down or shift the layout? =

No. La hoja de estilos y el script se cargan solo en las páginas que realmente muestran un lookbook,
el script se difiere y la imagen reserva su espacio, así que no hay
salto de diseño acumulado (CLS).


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo para toda la red o en sitios concretos; cada sitio conserva sus propios ajustes y datos.

== Screenshots ==

1. Un lookbook que se puede comprar en la tienda, con puntos de acceso de productos y una tarjeta de producto abierta.
2. El editor de puntos de acceso en la pantalla Editar lookbook.
3. La pantalla de ajustes de Lookbook en WooCommerce.

== External Services ==

Lookbook no se conecta a ningún servicio externo. Construye la imagen que se puede comprar a partir de datos que ya están en tu sitio: la propia entrada del lookbook (un tipo de contenido personalizado `lookbook`), su imagen destacada de tu biblioteca de medios, los puntos de acceso guardados en el metadato de entrada `_lookbook_hotspots` y las opciones de presentación guardadas en la opción `lookbook_settings`. Los títulos de los productos, los precios, las miniaturas y los enlaces de añadir al carrito se leen en directo desde tu propia tienda WooCommerce. No se envía fuera del sitio nada sobre tus productos, compradores o pedidos, y el plugin no carga fuentes, scripts ni analíticas de terceros.

== Translations ==

Plogins Lookbook incluye traducciones al polaco, al alemán y al español para la interfaz del plugin. El dominio de texto es `plogins-lookbook`, por lo que los paquetes de idioma de WordPress.org también pueden sustituir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Se añadieron traducciones incluidas al polaco, al alemán y al español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.1.5 =
* Renombrado a Plogins Lookbook for WooCommerce para un nombre de plugin más distintivo.

= 0.1.4 =
* Dispara `lookbook/rendered` después de renderizar una plantilla de lookbook y expone `data-lookbook-id` en el elemento raíz para las analíticas de complementos.

= 0.1.3 =
* Añade atributos de datos de puntos de acceso y un evento de front-end `lookbook:hotspot-opened` para analíticas de complementos que respetan la privacidad.

= 0.1.2 =
* Añade el filtro `lookbook/scene_media_html` y compatibilidad con escenas de vídeo (`media_type`, `video_url`, `video_id`) mediante `lookbook/scenes`.
* Añade el filtro `lookbook/sanitize_hotspot` y pasa el contexto del punto de acceso a `lookbook/card_image_html` para los marcadores de vídeo de los complementos.
* Añade las acciones `lookbook/admin_hotspot_row_*` para que Pro pueda ampliar el editor de puntos de acceso.

= 0.1.1 =
* Añade el filtro `lookbook/card_image_html` para permitir que los complementos personalicen la salida de la galería/miniatura de la tarjeta de producto.
* Añade el filtro `lookbook/scenes` para que los complementos puedan añadir más imágenes que se pueden comprar a un lookbook.

= 0.1.0 =
* Lanzamiento inicial: lookbooks que se pueden comprar con una imagen, puntos de acceso de productos colocados por porcentaje, una ventana emergente de tarjeta de producto accesible y un shortcode `[lookbook]`.
