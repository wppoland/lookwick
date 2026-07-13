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

Verwandle jedes Bild in ein kaufbares Lookbook: Pinne WooCommerce-Produkte als Hotspots, die eine Produktkarte mit Preis und Warenkorb-Button einblenden.

== Description ==

Lookbook verwandelt ein einzelnes Bild in eine kaufbare Szene. Lade ein Foto hoch, pinne
deine WooCommerce-Produkte als Hotspots darauf und bette das Ergebnis mit einem
Shortcode überall ein. Aktiviert jemand einen Hotspot, erscheint eine kleine Produktkarte mit
Miniaturbild, Titel, Preis und einem Link zum Hinzufügen zum Warenkorb, sodass direkt aus
dem Bild gekauft werden kann.

Es ist für Shops gemacht, die den ganzen Look verkaufen: Mode-Outfits, Raum-Sets,
Geschenkeguides, Aufnahmen von Rezeptzutaten – überall dort, wo mehrere Produkte auf einem Bild sind.

Der Code wird quelloffen entwickelt. Durchstöbere ihn oder melde einen Fehler unter
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-lookbook/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-lookbook/
* <strong>Quellcode</strong> - https://github.com/wppoland/plogins-lookbook
* <strong>Fehlerberichte und Funktionswünsche</strong> - https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Erstelle im Menü <strong>Lookbooks</strong> ein Lookbook und lege sein Bild über das
   Feld „Beitragsbild“ fest.
2. Füge für jedes Produkt einen Hotspot hinzu: Positioniere ihn per X- und Y-Prozentwert und
   gib die Produkt-ID ein.
3. Bette es mit `[lookbook id="123"]` ein.

= Features =

* Kaufbares Bild: Pinne beliebig viele Produkte als Hotspots auf ein Bild.
* Einfacher Hotspot-Editor: Positioniere jedes Produkt per X/Y-Prozentwert.
* Barrierefreie Hotspot-Markierungen: echte Buttons, per Tastatur bedienbar, mit Screenreader-Beschriftungen.
* Produktkarten-Popover mit Miniaturbild, Titel, Live-Preis und einem Link zum Hinzufügen zum Warenkorb.
* Shortcode `[lookbook id="N"]`.
* Liest Produktdaten live aus WooCommerce, sodass Preise und Lagerbestand immer aktuell sind.
* Sauberes Fallback-Verhalten: Ein Lookbook ohne Bild, ohne Hotspots oder nur mit gelöschten Produkten rendert nichts oder nur das Bild, nie beschädigtes Markup.
* CSS passt sich an helle und dunkle Farbschemata an und berücksichtigt prefers-reduced-motion.
* Keine Layout-Verschiebung, kein jQuery; Assets werden nur dort geladen, wo ein Lookbook erscheint.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS sowie Warenkorb-/Kassenblöcken.

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/lookbook` hoch oder installiere es über Plugins → Installieren.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Erstelle dein erstes Lookbook unter <strong>Lookbooks → Neu hinzufügen</strong>: Lege das Beitragsbild fest und füge dann Produkt-Hotspots hinzu.
4. Passe die globale Darstellung unter <strong>WooCommerce → Lookbook</strong> an.
5. Bette ein Lookbook mit `[lookbook id="123"]` ein.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Lookbook läuft nur, wenn WooCommerce aktiv ist, und Hotspots verlinken auf
WooCommerce-Produkte.

= How do I find a lookbook's ID? =

Öffne die Lookbooks-Liste im Menü „Lookbooks“; die ID wird beim Bearbeiten angezeigt
(post=123 in der URL). Verwende sie im Shortcode.

= How do I position a hotspot? =

Jeder Hotspot hat einen X- und einen Y-Wert, beide als Prozentwert von der oberen linken Ecke des
Bildes (0–100), sodass du die Markierungen an den Produkten im Foto ausrichten kannst.

= What happens if a pinned product is deleted? =

Dieser Hotspot wird einfach übersprungen. Lookbook rendert nie eine Markierung für ein Produkt,
das gelöscht oder nicht veröffentlicht ist.

= Can I show the price and an add-to-cart button? =

Ja. Beides sind Schalter unter <strong>WooCommerce → Lookbook</strong>, und du kannst die
Beschriftung des Warenkorb-Buttons anpassen.

= Will it slow my pages down or shift the layout? =

Nein. Stylesheet und Skript werden nur auf Seiten geladen, die tatsächlich ein Lookbook rendern,
das Skript wird verzögert geladen und das Bild reserviert seinen Platz, sodass es keine
kumulative Layout-Verschiebung (CLS) gibt.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es netzwerkweit oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Ein kaufbares Lookbook im Shop mit Produkt-Hotspots und einer geöffneten Produktkarte.
2. Der Hotspot-Editor im Bildschirm „Lookbook bearbeiten“.
3. Der Lookbook-Einstellungsbildschirm unter WooCommerce.

== External Services ==

Lookbook stellt keine Verbindung zu externen Diensten her. Es baut das kaufbare Bild aus Daten, die bereits auf deiner Website liegen: dem Lookbook-Beitrag selbst (ein eigener Inhaltstyp `lookbook`), seinem Beitragsbild aus deiner Mediathek, den im Beitrags-Meta `_lookbook_hotspots` gespeicherten Hotspots und den in der Option `lookbook_settings` gespeicherten Darstellungsoptionen. Produkttitel, Preise, Miniaturbilder und Links zum Hinzufügen zum Warenkorb werden live aus deinem eigenen WooCommerce-Shop gelesen. Nichts über deine Produkte, Käuferinnen und Käufer oder Bestellungen wird nach außen gesendet, und das Plugin lädt keine Schriftarten, Skripte oder Analyse-Tools von Drittanbietern.

== Translations ==

Plogins Lookbook enthält polnische, deutsche und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-lookbook`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Mitgelieferte polnische, deutsche und spanische Übersetzungen für die Plugin-Oberfläche hinzugefügt.

= 1.0.1 =
* Erste stabile Version.

= 0.1.5 =
* Umbenannt in Plogins Lookbook for WooCommerce für einen unverwechselbaren Plugin-Namen.

= 0.1.4 =
* Löst `lookbook/rendered` aus, nachdem eine Lookbook-Vorlage gerendert wurde, und stellt `data-lookbook-id` am Wurzelelement für Add-on-Analysen bereit.

= 0.1.3 =
* Fügt Hotspot-Datenattribute und ein Frontend-Ereignis `lookbook:hotspot-opened` für datenschutzfreundliche Add-on-Analysen hinzu.

= 0.1.2 =
* Fügt den Filter `lookbook/scene_media_html` und Unterstützung für Videoszenen (`media_type`, `video_url`, `video_id`) über `lookbook/scenes` hinzu.
* Fügt den Filter `lookbook/sanitize_hotspot` hinzu und übergibt den Hotspot-Kontext an `lookbook/card_image_html` für Video-Marker von Add-ons.
* Fügt die Aktionen `lookbook/admin_hotspot_row_*` hinzu, damit Pro den Hotspot-Editor erweitern kann.

= 0.1.1 =
* Fügt den Filter `lookbook/card_image_html` hinzu, damit Add-ons die Galerie-/Miniaturbild-Ausgabe der Produktkarte anpassen können.
* Fügt den Filter `lookbook/scenes` hinzu, damit Add-ons einem Lookbook weitere kaufbare Bilder anhängen können.

= 0.1.0 =
* Erstveröffentlichung: kaufbare Lookbooks mit einem Bild, prozentual positionierte Produkt-Hotspots, ein barrierefreies Produktkarten-Popover und ein `[lookbook]`-Shortcode.
