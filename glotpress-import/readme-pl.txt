=== Plogins Lookbook - Shoppable Lookbook for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, shoppable, hotspot, lookbook, product image
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Wymaga wtyczek: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Zamień dowolny obraz w lookbook z możliwością zakupu: przypnij produkty WooCommerce jako punkty aktywne, które wyświetlają kartę produktu z ceną i dodaj do koszyka.

== Description ==

Lookbook zamienia pojedynczy obraz w scenę, którą można kupić. Prześlij zdjęcie, przypnij swoje
produkty WooCommerce do niego jako hotspoty i osadzaj wynik w dowolnym miejscu za pomocą pliku
krótki kod. Gdy kupujący aktywuje hotspot, pojawia się mała karta produktu z ikoną
miniaturę, tytuł, cenę i link do koszyka, dzięki czemu mogą bezpośrednio dokonać zakupu
z obrazu.

Jest przeznaczony dla sklepów sprzedających wygląd: modne stroje, zestawy do pokoju, prezenty
przewodniki, zdjęcia składników przepisów, wszędzie tam, gdzie na jednym zdjęciu znajduje się kilka produktów.

Kod jest opracowywany w sposób otwarty. Przeglądaj lub zgłoś błąd na stronie
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-lookbook/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-lookbook/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-lookbook
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Utwórz lookbook w menu <strong>Lookbooki</strong> i ustaw jego obraz za pomocą
   Polecane zdjęcie.
2. Dodaj punkt aktywny dla każdego produktu: umieść go w procentach X i Y oraz
   wprowadź identyfikator produktu.
3. Osadź go za pomocą `[lookbook id="123"]`.

= Features =

* Obraz z możliwością zakupu: przypnij dowolną liczbę produktów jako punkty aktywne na jednym obrazie.
* Prosty edytor hotspotów: pozycjonuj każdy produkt według procentu X/Y.
* Dostępne znaczniki hotspotów: prawdziwe przyciski, obsługa klawiatury, etykiety czytnika ekranu.
* Wyskakujące okienko karty produktu z miniaturą, tytułem, aktualną ceną i linkiem do dodania do koszyka.
* `[lookbook id="N"]` krótki kod.
* Odczytuje dane produktów na żywo z WooCommerce, więc ceny i stany magazynowe są zawsze aktualne.
* Pogorsza się w sposób wyraźny: lookbook bez obrazu, bez hotspotów lub tylko usuniętych produktów nie renderuje niczego lub tylko obraz, bez żadnych zepsutych znaczników.
* CSS dostosowuje się do jasnych i ciemnych schematów kolorów i preferuje ograniczony ruch.
* Bez zmiany układu, bez jQuery, zasoby ładują się tylko tam, gdzie pojawia się lookbook.
* Gotowe do tłumaczenia (w tym POT) i czystej dezinstalacji.
* Kompatybilny z HPOS i blokami koszyka/kasy.

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/lookbook` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być zainstalowany i aktywny.
3. Utwórz swój pierwszy lookbook w sekcji <strong>Lookbooki → Dodaj nowy<strong>: ustaw Polecany obraz, a następnie dodaj hotspoty produktów. 4. Dostosuj globalną prezentację w </strong>WooCommerce → Lookbook</strong>.
5. Umieść lookbook z `[lookbook id="123"]`.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Lookbook działa tylko wtedy, gdy WooCommerce jest aktywny, a hotspoty prowadzą do
Produkty WooCommerce.

= How do I find a lookbook's ID? =

Otwórz listę Lookbooków w menu Lookbooks; identyfikator jest wyświetlany podczas edycji
(post=123 w adresie URL). Użyj go w krótkim kodzie.

= How do I position a hotspot? =

Każdy punkt aktywny ma wartość X i Y, obie wartości procentowe od lewego górnego rogu
obraz (0–100), dzięki czemu możesz dopasować znaczniki do produktów na zdjęciu.

= What happens if a pinned product is deleted? =

Ten punkt dostępu jest po prostu pomijany. Lookbook nigdy nie renderuje znacznika produktu
które zniknęły lub nie zostały opublikowane.

= Can I show the price and an add-to-cart button? =

Tak. Obydwa można przełączać w obszarze <strong>WooCommerce → Lookbook</strong> i można je dostosować
etykieta „dodaj do koszyka”.

= Will it slow my pages down or shift the layout? =

Nie. Arkusz stylów i skrypt ładują się tylko na stronach, które faktycznie renderują lookbook,
skrypt jest odroczony, a obraz rezerwuje swoje miejsce, więc nie ma
Łączne przesunięcie układu.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Lookbook z możliwością zakupów w witrynie sklepu z hotspotami produktów i otwartą kartą produktu.
2. Edytor hotspotów na ekranie Edytuj Lookbook.
3. Ekran ustawień Lookbooka w WooCommerce.

== External Services ==

Lookbook nie łączy się z żadną usługą zewnętrzną. Tworzy obraz, który można kupić, z danych już znajdujących się na Twojej witrynie: samego postu z lookbooka (niestandardowy typ postu „lookbook”), jego wyróżnionego obrazu z Twojej Biblioteki multimediów, hotspotów przechowywanych w meta postu `_lookbook_hotspots` oraz opcji prezentacji zapisanych w opcji `lookbook_settings`. Tytuły produktów, ceny, miniatury i linki do dodania do koszyka są odczytywane na żywo z Twojego własnego sklepu WooCommerce. Nic na temat Twoich produktów, klientów ani zamówień nie jest wysyłane poza witrynę, a wtyczka nie ładuje czcionek, skryptów ani analiz innych firm.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.5 =
* Zmieniono nazwę na Plogins Lookbook dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.4 =
* Uruchom `lookbook/rendered` po wyrenderowaniu szablonu lookbooka i ujawnij `data-lookbook-id` w elemencie głównym w celu analizy dodatków.

= 0.1.3 =
* Dodaj atrybuty danych hotspotów i zdarzenie front-endowe „lookbook:hotspot-opened”, aby zapewnić dodatkową analitykę zapewniającą ochronę prywatności.

= 0.1.2 =
* Dodano filtr `lookbook/scene_media_html` i obsługę scen wideo (`media_type`, `video_url`, `video_id`) poprzez `lookbook/scenes`.
* Dodaj filtr `lookbook/sanitize_hotspot` i przekaż kontekst hotspotu do `lookbook/card_image_html` w celu uzyskania dodatkowych znaczników wideo.
* Dodaj akcje `lookbook/admin_hotspot_row_*`, aby Pro mógł rozszerzyć edytor hotspotów.

= 0.1.1 =
* Dodaj filtr `lookbook/card_image_html`, aby umożliwić dodatkom dostosowywanie galerii/miniatur kart produktów.
* Dodaj filtr „lookbook/sceny”, aby dodatki mogły dołączać do lookbooka dodatkowe obrazy, które można kupić.

= 0.1.0 =
* Pierwsza wersja: lookbooki z możliwością zakupu ze zdjęciem, punkty aktywne produktów rozmieszczone procentowo, dostępna wyskakująca karta produktu i krótki kod `[lookbook]`.
