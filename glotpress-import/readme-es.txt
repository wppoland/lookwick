=== Plogins Lookbook - Shoppable Lookbook for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, shoppable, hotspot, lookbook, product image
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requiere complementos: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Convierta cualquier imagen en un lookbook que se pueda comprar: fije los productos WooCommerce como puntos de acceso que revelan una tarjeta de producto con el precio y los añade al carrito.

== Description ==

Lookbook convierte una sola imagen en una escena que se puede comprar. Sube una foto, fija tu
productos WooCommerce como puntos de acceso e incruste el resultado en cualquier lugar con un
código corto. Cuando un comprador activa un punto de acceso, aparece una pequeña tarjeta de producto con
la miniatura, el título, el precio y un enlace para añadir al carrito, para que puedan comprar directamente
de la imagen.

Está diseñado para tiendas que venden el look: conjuntos de moda, juegos de habitación, regalos.
guías, fotografías de ingredientes de recetas, en cualquier lugar donde varios productos convivan en una imagen.

El código se desarrolla al aire libre. Explorarlo o informar un error en
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-lookbook/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-lookbook/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-lookbook
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Cree un lookbook en el menú <strong>Lookbooks</strong> y configure su imagen con el
   Cuadro de imagen destacada.
2. Añade un hotspot para cada producto: colócalo con un porcentaje X e Y y
   ingrese el ID del producto.
3. Incrustarlo con `[lookbook id="123"]`.

= Features =

* Imagen que se puede comprar: fije cualquier cantidad de productos como puntos de acceso en una imagen.
* Editor de puntos de acceso simple: posicione cada producto por porcentaje X/Y.
* Marcadores de puntos de acceso accesibles: botones reales, operables por teclado, con etiquetas de lector de pantalla.
* Ventana emergente de tarjeta de producto con miniatura, título, precio en vivo y un enlace para añadir al carrito.
* Código corto `[lookbook id="N"]`.
* Lee datos de productos en vivo desde WooCommerce, por lo que los precios y el stock están siempre actualizados.
* Se degrada limpiamente: un lookbook sin imagen, sin puntos de acceso o solo productos eliminados no muestra nada o solo la imagen, nunca el marcado roto.
* CSS se adapta a esquemas de colores claros y oscuros y respeta el movimiento reducido.
* Sin cambio de diseño, sin jQuery, los activos se cargan solo donde aparece un lookbook.
* Traducción lista (POT incluida) y desinstalación limpia.
* Compatible con HPOS y bloques de carrito/pago.

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/lookbook`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Cree su primer lookbook en <strong>Lookbooks → Añadir nuevo<strong>: configure la imagen destacada y luego añade puntos destacados del producto. 4. Ajuste la presentación global en </strong>WooCommerce → Lookbook</strong>.
5. Incruste un lookbook con `[lookbook id="123"]`.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Lookbook solo se ejecuta cuando WooCommerce está activo y los puntos de acceso se vinculan a
Productos WooCommerce.

= How do I find a lookbook's ID? =

Abra la lista Lookbooks en el menú Lookbooks; el ID se muestra al editar
(publicación = 123 en la URL). Úselo en el código corto.

= How do I position a hotspot? =

Cada punto de acceso tiene un valor X e Y, ambos porcentajes desde la parte superior izquierda del
imagen (0–100), para que pueda alinear los marcadores con los productos de la foto.

= What happens if a pinned product is deleted? =

Ese punto de acceso simplemente se omite. Lookbook nunca muestra un marcador para un producto
que ya no existe o no está publicado.

= Can I show the price and an add-to-cart button? =

Sí. Ambos se alternan en <strong>WooCommerce → Lookbook</strong> y puedes personalizar el
etiqueta de añadir al carrito.

= Will it slow my pages down or shift the layout? =

No. La hoja de estilo y el script se cargan sólo en páginas que realmente representan un lookbook.
el guión se aplaza y la imagen reserva su espacio, por lo que no hay
Cambio de diseño acumulativo.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. Un lookbook que se puede comprar en el escaparate con puntos de acceso a productos y una tarjeta de producto abierta.
2. El editor de puntos de acceso en la pantalla Editar Lookbook.
3. La pantalla de configuración de Lookbook en WooCommerce.

== External Services ==

Lookbook no se conecta a ningún servicio externo. Crea la imagen que se puede comprar a partir de los datos que ya están en tu sitio: la publicación del lookbook en sí (un tipo de publicación personalizada `lookbook`), su imagen destacada de su biblioteca multimedia, los puntos de acceso almacenados en el meta de la publicación `_lookbook_hotspots` y las opciones de presentación guardadas en la opción `lookbook_settings`. Los títulos de productos, precios, miniaturas y enlaces para añadir al carrito se leen en vivo desde su propia tienda WooCommerce. Nada sobre sus productos, compradores o pedidos se envía fuera del sitio y el complemento no carga fuentes, scripts ni análisis de terceros.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.1.5 =
* Renombrado a Plogins Lookbook para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.1.4 =
* Active `lookbook/rendered` después de que se renderice una plantilla de lookbook y exponga `data-lookbook-id` en el elemento raíz para análisis complementarios.

= 0.1.3 =
* Añade atributos de datos de hotspot y un evento de front-end `lookbook:hotspot-opened` para análisis complementarios seguros para la privacidad.

= 0.1.2 =
* Añade el filtro `lookbook/scene_media_html` y compatibilidad con escenas de video (`media_type`, `video_url`, `video_id`) a través de `lookbook/scenes`.
* Añade el filtro `lookbook/sanitize_hotspot` y pase el contexto del punto de acceso a `lookbook/card_image_html` para marcadores de video adicionales.
* Añade acciones `lookbook/admin_hotspot_row_*` para que Pro pueda ampliar el editor de puntos de acceso.

= 0.1.1 =
* Añade el filtro `lookbook/card_image_html` para permitir que los complementos personalicen la galería de tarjetas de productos/la salida de miniaturas.
* Añade el filtro `lookbook/escenas` para que los complementos puedan añadir imágenes adicionales que se pueden comprar a un lookbook.

= 0.1.0 =
* Lanzamiento inicial: lookbooks que se pueden comprar con una imagen, puntos de interés de productos posicionados por porcentaje, una ventana emergente de tarjeta de producto accesible y un código corto `[lookbook]`.
