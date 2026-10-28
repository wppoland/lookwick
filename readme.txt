=== Lookwick - Shoppable Lookbook for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, shoppable, hotspot, lookbook, product image
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 8.1
Requires Plugins: woocommerce
Stable tag: 1.3.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Turn any image into a shoppable lookbook: pin WooCommerce products as hotspots that reveal a product card with price and add to cart.

== Description ==

Lookwick turns a single image into a shoppable scene. Upload a photo, pin your
WooCommerce products to it as hotspots, and embed the result anywhere with a
shortcode. When a shopper activates a hotspot, a small product card appears with
the thumbnail, title, price and an add-to-cart link, so they can buy straight
from the image.

It is built for stores that sell the look: fashion outfits, room sets, gift
guides, recipe ingredient shots, anywhere several products live in one picture.

The code is developed in the open. Browse it or report a bug at
[github.com/wppoland/lookwick](https://github.com/wppoland/lookwick).

= Documentation and links =

* **Documentation**: [plogins.com/lookwick/docs/](https://plogins.com/lookwick/docs/)
* **Plugin page**: [plogins.com/lookwick/](https://plogins.com/lookwick/)
* **Source code**: [github.com/wppoland/lookwick](https://github.com/wppoland/lookwick)
* **Bug reports and feature requests**: [github.com/wppoland/lookwick/issues](https://github.com/wppoland/lookwick/issues)
* **Lookwick Pro**: [plogins.com/lookwick-pro/](https://plogins.com/lookwick-pro/)


= How it works =

1. Create a lookbook under the **Lookbooks** menu and set its image with the
   Featured image box.
2. Click the image where a product appears to add a hotspot there, drag the dot
   to fine-tune it, and search for the product to link.
3. Copy the shortcode from the Shortcode column of the Lookbooks list.
4. Embed it with `[lookbook id="123"]`.

= Features =

* Shoppable image: pin any number of products as hotspots on one image.
* Visual hotspot editor: click the image to add a hotspot, drag dots to move them, pick products with the WooCommerce product search. X/Y percentage fields stay available for keyboard users.
* Add to cart without leaving the page: simple products go into the cart from the hotspot card through WooCommerce's own AJAX add to cart, when it is enabled in WooCommerce. Variable products link to the product page.
* Accessible hotspot markers: real buttons, keyboard operable, with screen-reader labels.
* Product card popover with thumbnail, title, live price and an add-to-cart link.
* `[lookbook id="N"]` shortcode, shown ready to copy in the Lookbooks list, plus a Shoppable Lookbook widget for Elementor that takes the lookbook ID.
* Reads product data live from WooCommerce, so prices and stock are always current.
* Degrades cleanly: a lookbook with no image, no hotspots, or only deleted products renders nothing or just the image, never broken markup.
* CSS adapts to light and dark colour schemes and honours prefers-reduced-motion.
* No layout shift, no jQuery in the storefront script, assets load only where a lookbook appears.
* Translation ready (POT included) and clean uninstall.
* HPOS and cart/checkout blocks compatible.

== Lookwick Pro ==

Lookwick Pro is a separate paid plugin that extends Lookwick.

Included in Lookwick:

* Shoppable image
* Simple hotspot editor
* Accessible markers
* Product card popover
* Clean uninstall

Lookwick Pro adds:

* Marker accent colour
* Gallery in hotspot cards
* Multiple images per lookbook
* Video hotspots
* Click analytics

The free edition is not a trial and its features stay available without a time limit.

* **Lookwick Pro** - [plogins.com/lookwick-pro/](https://plogins.com/lookwick-pro/)
* **Compare editions and pricing** - [plogins.com/lookwick-pro/pricing/](https://plogins.com/lookwick-pro/pricing/)
* **PRO documentation** - [plogins.com/lookwick-pro/docs/](https://plogins.com/lookwick-pro/docs/)

== Installation ==

1. Upload the plugin to `/wp-content/plugins/lookwick`, or install via Plugins > Add New.
2. Activate it. WooCommerce must be installed and active.
3. Create your first lookbook under **Lookbooks > Add New**: set the Featured image, then add product hotspots.
4. Adjust global presentation under **WooCommerce > Lookwick**.
5. Embed a lookbook with `[lookbook id="123"]`.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Yes. Lookwick only runs when WooCommerce is active, and hotspots link to
WooCommerce products.

= How do I find a lookbook's ID? =

Open the Lookbooks list under the Lookbooks menu. The Shortcode column shows each
lookbook's `[lookbook id="123"]` shortcode, ready to copy and paste.

= How do I position a hotspot? =

Click the lookbook image in the Shoppable hotspots box where the product appears;
a hotspot is added at that point. Drag its dot to move it. Each hotspot also has
X and Y fields, both percentages from the top-left of the image (0-100), for
exact positioning from the keyboard.

= What happens if a pinned product is deleted? =

That hotspot is simply skipped. Lookwick never renders a marker for a product
that is gone or unpublished.

= Can I show the price and an add-to-cart button? =

Yes. Both are toggles under **WooCommerce > Lookwick**, and you can customise the
add-to-cart label.

= Will it slow my pages down or shift the layout? =

No. The stylesheet and script load only on pages that actually render a lookbook,
the script is deferred, and the image reserves its space, so there is no
Cumulative Layout Shift.


= Does this plugin work on WordPress Multisite? =

Yes. This plugin is compatible with WordPress Multisite. Network activate it or activate it on individual sites; each site keeps its own settings and data.

== Screenshots ==

1. A shoppable lookbook on the storefront with product hotspots and an open product card.
2. The hotspot editor: click the image to place a hotspot, drag to adjust, and search for the product.
3. The Lookwick settings screen under WooCommerce.

== External Services ==

Lookwick does not connect to any external service. It builds the shoppable image from data already on your site: the lookbook post itself (a `lookbook` custom post type), its Featured image from your Media Library, the hotspots stored in the `_lookbook_hotspots` post meta, and the presentation options saved in the `lookbook_settings` option. Product titles, prices, thumbnails and add-to-cart links are read live from your own WooCommerce store. Nothing about your products, shoppers or orders is sent off-site, and the plugin loads no third-party fonts, scripts or analytics.

== Translations ==

Lookwick is fully translatable and ships the `lookwick.pot` template. Translations are delivered by WordPress.org language packs from translate.wordpress.org, which is where Polish, German and Spanish are being contributed; the package itself carries no compiled translation files.

== Changelog ==

= 1.3.5 =
* Links point at the new plogins.com address and the renamed GitHub repository.

= 1.3.4 =
* The Upgrade to PRO links open the pricing page in the admin's language where plogins.com has one, and tell plogins.com which plugin the visit came from (utm_source, utm_medium and utm_campaign in the link). Nothing is sent from your site.
* Readme: the PRO section lists what the free plugin includes and what the paid edition adds as two lists, which WordPress.org can display (it does not display tables).

= 1.3.3 =
* Readme only: a PRO section with links to the paid edition.

= 1.3.2 =
* Fix: with Twenty Twenty-Five and other block themes the Add to cart button in a hotspot card collapsed into an underlined line over the price. The card now resets the line height it inherited from the image stage, and the button gets an outlined fallback style when the theme has no button styles of its own. Storefront and other classic themes keep their own button look.
* Fix: the product search fields in the hotspot editor rows now all have the same width instead of each sizing to its content.

= 1.3.1 =
* Fix: with a block theme (Twenty Twenty-Five and other site-editor themes) the lookbook loaded without its stylesheet and script, so the hotspots showed as a plain numbered list under the image. The assets now load whenever a lookbook renders.

= 1.3.0 =
* New: visual hotspot editor. The lookbook image is shown in the Shoppable hotspots box; click it to add a hotspot at that point and drag the dots to move them. The X/Y fields stay and follow every move.
* New: pick the hotspot product with the WooCommerce product search instead of typing its ID. Existing lookbooks keep working; the saved data is unchanged.
* New: the Add to cart button in a hotspot card adds simple products to the cart in place, using WooCommerce's AJAX add to cart when it is enabled under WooCommerce > Settings > Products. Without JavaScript the button still works as a normal link; variable products still open the product page.
* New: a Shortcode column on the Lookbooks list shows each lookbook's shortcode, ready to copy.

= 1.2.0 =
* New: a Shoppable Lookbook widget for Elementor. Drop it on a page and enter the lookbook ID; it renders the same markup as the `[lookbook]` shortcode. The widget loads only when Elementor is active.

= 1.1.4 =
* The upgrade notice's "Coming soon" and "Get notified" labels are English source strings for every language; Polish sites used to get their own Polish source text, which translators in other languages then saw untranslated.

= 1.1.3 =
* Hotspot rows are sanitised the moment they are read from the lookbook editor, before each field is validated.

= 1.1.2 =
* Renamed to Lookwick, a plain English name in place of the Esperanto one. The text domain and the plugin folder follow the name; the stored settings, options and every hook are unchanged.

= 1.1.1 =
* The sidebar upgrade promo now follows the same dismissal as the banner. Dismissing the banner used to leave a full-height advert on the settings screen for good, which is not what the WordPress.org guideline on upgrade prompts means by used with moderation.

= 1.1.0 =
* Renamed to Bildaro. The WordPress.org review team asks a plugin name to lead with a distinctive, coined identifier rather than a generic descriptive word. Bildaro is Esperanto for a set of images. The text domain follows the name; the stored data, the settings and every hook are unchanged.

= 1.0.12 =
* Security (low): the lookbook card image is escaped after the `lookbook/card_image_html` filter rather than before it. The default image was sanitised on the way into the filter, so whatever a callback returned went to the page unchecked.
* Fixed: escaping the image through the core post allowlist was stripping `srcset`, `sizes` and `decoding`, so the card served one fixed image size instead of the responsive set WooCommerce built. The allowlist now keeps them, and keeps the `video` attributes the paid edition's video hotspots use.

= 1.0.11 =
* Fixed: the PRO upgrade promo kept selling to people who had already bought the paid edition. Only the banner could be dismissed, so the sidebar promo and the locked feature cards followed a paying customer around for good. The promo now checks whether the paid edition is active and steps aside when it is.
* Fixed: arrow glyphs in the admin menu paths, and in the strings handed to translators. An arrow inside a translatable string makes the glyph every translator's problem and changes the layout in any locale that drops it.

= 1.0.10 =
* Fixed: deleting the plugin left the per-user "dismiss" flag from the PRO notice in the database. Uninstall now removes it for every user, not just the one who dismissed it.

= 1.0.9 =
* The translation template was regenerated. It still named an older version of the plugin and pointed at source lines that had since moved, which is what translation tools read to show a string in context.

= 1.0.8 =
* Renamed to Plogins Lookbook - Shoppable Lookbook for WooCommerce so the name leads with the brand rather than a generic word, which is what the WordPress.org plugin review team asks for. The plugin slug is unchanged.

= 1.0.7 =
* Tested against WordPress 7.1. Verified by activating this build on a clean 7.1 install with WooCommerce 11.1, not by editing the header.

= 1.0.6 =
* Fixed the PRO promo on the settings screen quoting a price in PLN. PRO is priced and charged in EUR, so an admin on a Polish site was shown a zloty amount and then billed in euro, and the zloty figure was a fixed conversion that drifted from the real charge as the rate moved. The promo now shows the euro price that is actually taken.

= 1.0.4 =
* Translations: completed Polish, German and Spanish for the PRO upgrade panel.

= 1.0.3 =
* Fixed low-contrast admin headings under an OS dark-mode preference.

= 1.0.2 =
* Added bundled Polish, German and Spanish translations for the plugin interface.

= 1.0.1 =
* First stable release.

= 0.1.5 =
* Renamed to Plogins Lookbook for WooCommerce for a more distinctive plugin name.

= 0.1.4 =
* Fire `lookbook/rendered` after a lookbook template renders and expose `data-lookbook-id` on the root element for add-on analytics.

= 0.1.3 =
* Add hotspot data attributes and a `lookbook:hotspot-opened` front-end event for privacy-safe add-on analytics.

= 0.1.2 =
* Add `lookbook/scene_media_html` filter and video scene support (`media_type`, `video_url`, `video_id`) via `lookbook/scenes`.
* Add `lookbook/sanitize_hotspot` filter and pass hotspot context to `lookbook/card_image_html` for add-on video markers.
* Add `lookbook/admin_hotspot_row_*` actions so Pro can extend the hotspot editor.

= 0.1.1 =
* Add `lookbook/card_image_html` filter to allow add-ons to customize product card gallery/thumbnail output.
* Add `lookbook/scenes` filter so add-ons can append additional shoppable images to a lookbook.

= 0.1.0 =
* Initial release: shoppable lookbooks with an image, product hotspots positioned by percentage, an accessible product-card popover, and a `[lookbook]` shortcode.

== Upgrade Notice ==

= 1.0.12 =
Security release. A default installation is not exposed: the image only becomes unsafe if another plugin hooks lookbook/card_image_html and returns unescaped HTML. Update, nothing else to do.
