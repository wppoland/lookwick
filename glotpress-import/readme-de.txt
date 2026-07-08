=== Plogins Lookbook - Shoppable Lookbook for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, shoppable, hotspot, lookbook, product image
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Erfordert Plugins: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Verwandeln Sie jedes Bild in ein kaufbares Lookbook: Pinne WooCommerce-Produkte als Hotspots, die eine Produktkarte mit Preis anzeigen und in den Warenkorb legen.

== Description ==

Lookbook verwandelt ein einzelnes Bild in eine kaufbare Szene. Lade ein Foto hoch und pinne es an
WooCommerce-Produkte als Hotspots hinzufügen und das Ergebnis überall mit einbetten
Shortcode. Wenn ein Käufer einen Hotspot aktiviert, erscheint eine kleine Produktkarte mit
das Miniaturbild, den Titel, den Preis und einen Link zum Hinzufügen zum Warenkorb, damit sie direkt kaufen können
aus dem Bild.

Es wurde für Geschäfte entwickelt, die folgende Looks verkaufen: Mode-Outfits, Raumsets, Geschenke
Anleitungen, Aufnahmen von Rezeptzutaten, überall dort, wo mehrere Produkte auf einem Bild leben.

Der Code wird offen entwickelt. Durchsuche es oder melde einen Fehler unter
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-lookbook/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-lookbook/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-lookbook
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Erstelle im Menü <strong>Lookbooks</strong> ein Lookbook und lege dessen Bild mit fest
   Ausgewählte Bildbox.
2. Füge für jedes Produkt einen Hotspot hinzu: Positioniere es mit einem X- und Y-Prozentsatz und
   Gib die Produkt-ID ein.
3. Bette es mit „[lookbook id="123"]“ ein.

= Features =

* Kaufbares Bild: Beliebig viele Produkte als Hotspots auf einem Bild anpinnen.
* Einfacher Hotspot-Editor: Positioniere jedes Produkt nach X/Y-Prozentsatz.
* Zugängliche Hotspot-Markierungen: echte Tasten, bedienbar über die Tastatur, mit Beschriftung für den Bildschirmleser.
* Produktkarten-Popover mit Miniaturansicht, Titel, Live-Preis und einem Link zum Hinzufügen zum Warenkorb.
* Shortcode „[lookbook id="N"]“.
* Liest Produktdaten live aus WooCommerce, sodass Preise und Lagerbestände immer aktuell sind.
* Saubere Degradierung: Ein Lookbook ohne Bild, ohne Hotspots oder nur gelöschte Produkte rendert nichts oder nur das Bild, niemals beschädigtes Markup.
* CSS passt sich an helle und dunkle Farbschemata an und berücksichtigt Prefered-Reduced-Motion.
* Keine Layoutverschiebung, kein jQuery, Assets werden nur dort geladen, wo ein Lookbook erscheint.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS und Warenkorb-/Kassenblöcken.

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/lookbook“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Erstelle dein erstes Lookbook unter <strong>Lookbooks → Neu hinzufügen<strong>: Lege das vorgestellte Bild fest und füge dann Produkt-Hotspots hinzu. 4. Passe die globale Darstellung unter </strong>WooCommerce → Lookbook</strong> an.
5. Bette ein Lookbook mit „[lookbook id="123"]“ ein.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Lookbook läuft nur, wenn WooCommerce aktiv ist und Hotspots darauf verlinken
WooCommerce-Produkte.

= How do I find a lookbook's ID? =

Öffne die Lookbooks-Liste im Lookbooks-Menü. Die ID wird beim Bearbeiten angezeigt
(Beitrag=123 in der URL). Verwende es im Shortcode.

= How do I position a hotspot? =

Jeder Hotspot hat einen X- und einen Y-Wert, beide Prozentsätze von der oberen linken Seite
Bild (0–100), sodass du Markierungen an den Produkten auf dem Foto ausrichten können.

= What happens if a pinned product is deleted? =

Dieser Hotspot wird einfach übersprungen. Lookbook rendert niemals eine Markierung für ein Produkt
das ist weg oder unveröffentlicht.

= Can I show the price and an add-to-cart button? =

Ja. Beides sind Schalter unter <strong>WooCommerce → Lookbook</strong>, die du anpassen können
Etikett zum Hinzufügen zum Warenkorb.

= Will it slow my pages down or shift the layout? =

Nein. Das Stylesheet und das Skript werden nur auf Seiten geladen, die tatsächlich ein Lookbook rendern.
Das Skript wird zurückgestellt und das Bild reserviert seinen Platz, also gibt es keinen
Kumulative Layoutverschiebung.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Ein kaufbares Lookbook im Schaufenster mit Produkt-Hotspots und einer offenen Produktkarte.
2. Der Hotspot-Editor auf dem Bildschirm „Lookbook bearbeiten“.
3. Der Lookbook-Einstellungsbildschirm unter WooCommerce.

== External Services ==

Lookbook stellt keine Verbindung zu externen Diensten her. Es erstellt das kaufbare Bild aus Daten, die sich bereits auf deiner Website befinden: dem Lookbook-Beitrag selbst (ein benutzerdefinierter Beitragstyp „Lookbook“), seinem hervorgehobenen Bild aus deiner Medienbibliothek, den im Beitrags-Meta „_lookbook_hotspots“ gespeicherten Hotspots und den in der Option „lookbook_settings“ gespeicherten Präsentationsoptionen. Produkttitel, Preise, Miniaturansichten und Links zum Hinzufügen zum Warenkorb werden live aus deinem eigenen WooCommerce-Shop gelesen. Nichts über deine Produkte, Käufer oder Bestellungen wird an eine externe Website gesendet und das Plugin lädt keine Schriftarten, Skripte oder Analysen von Drittanbietern.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.1.5 =
* Umbenannt in „Plogins Lookbook für WooCommerce“, um einen eindeutigeren Plugin-Namen zu erhalten.

= 0.1.4 =
* Löse „lookbook/rendered“ aus, nachdem eine Lookbook-Vorlage gerendert wurde, und stelle „data-lookbook-id“ im Stammelement für Add-on-Analysen bereit.

= 0.1.3 =
* Füge Hotspot-Datenattribute und ein „lookbook:hotspot-opened“-Frontend-Ereignis für datenschutzsichere Add-on-Analysen hinzu.

= 0.1.2 =
* Füge den Filter „lookbook/scene_media_html“ und die Unterstützung für Videoszenen („media_type“, „video_url“, „video_id“) über „lookbook/scenes“ hinzu.
* Füge den Filter „lookbook/sanitize_hotspot“ hinzu und übergebe den Hotspot-Kontext an „lookbook/card_image_html“ für zusätzliche Videomarkierungen.
* Füge „lookbook/admin_hotspot_row_*“-Aktionen hinzu, damit Pro den Hotspot-Editor erweitern kann.

= 0.1.1 =
* Füge den Filter „lookbook/card_image_html“ hinzu, damit Add-ons die Ausgabe der Produktkartengalerie/Miniaturansicht anpassen können.
* Füge den Filter „Lookbook/Szenen“ hinzu, damit Add-ons zusätzliche kaufbare Bilder an ein Lookbook anhängen können.

= 0.1.0 =
* Erstveröffentlichung: kaufbare Lookbooks mit einem Bild, prozentual positionierten Produkt-Hotspots, einem zugänglichen Produktkarten-Popover und einem „[lookbook]“-Shortcode.
