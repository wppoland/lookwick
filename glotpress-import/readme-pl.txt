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

Zamień dowolny obraz w lookbook z możliwością zakupu: przypnij produkty WooCommerce jako punkty aktywne, które odsłaniają kartę produktu z ceną i przyciskiem dodania do koszyka.

== Description ==

Lookbook zamienia pojedynczy obraz w scenę z możliwością zakupu. Prześlij zdjęcie, przypnij
swoje produkty WooCommerce jako punkty aktywne i osadź wynik w dowolnym miejscu za pomocą
shortcode’u. Gdy kupujący aktywuje punkt aktywny, pojawia się mała karta produktu z
miniaturą, tytułem, ceną i linkiem dodania do koszyka, dzięki czemu może kupić prosto
z obrazu.

Powstał z myślą o sklepach, które sprzedają cały wygląd: stylizacje modowe, aranżacje wnętrz,
przewodniki prezentowe, zdjęcia składników przepisów — wszędzie tam, gdzie na jednym zdjęciu jest kilka produktów.

Kod jest rozwijany otwarcie (open source). Przeglądaj go lub zgłoś błąd na
https://github.com/wppoland/plogins-lookbook.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-lookbook/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-lookbook/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-lookbook
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-lookbook/issues


= How it works =

1. Utwórz lookbook w menu <strong>Lookbooks</strong> i ustaw jego obraz w polu
   Obrazek wyróżniający.
2. Dodaj punkt aktywny dla każdego produktu: ustaw jego pozycję w procentach X i Y oraz
   wpisz identyfikator produktu.
3. Osadź go za pomocą `[lookbook id="123"]`.

= Features =

* Obraz z możliwością zakupu: przypnij dowolną liczbę produktów jako punkty aktywne na jednym obrazie.
* Prosty edytor punktów aktywnych: ustaw pozycję każdego produktu w procentach X/Y.
* Dostępne znaczniki punktów aktywnych: prawdziwe przyciski, obsługa z klawiatury i etykiety dla czytników ekranu.
* Wyskakująca karta produktu z miniaturą, tytułem, aktualną ceną i linkiem dodania do koszyka.
* Shortcode `[lookbook id="N"]`.
* Odczytuje dane produktów na żywo z WooCommerce, więc ceny i stany magazynowe są zawsze aktualne.
* Płynne obniżanie funkcjonalności: lookbook bez obrazu, bez punktów aktywnych lub z samymi usuniętymi produktami nie renderuje niczego albo tylko obraz — nigdy uszkodzonego kodu.
* CSS dostosowuje się do jasnych i ciemnych schematów kolorów oraz respektuje prefers-reduced-motion.
* Bez przeskoków układu, bez jQuery; zasoby ładują się tylko tam, gdzie pojawia się lookbook.
* Gotowe do tłumaczenia (POT w zestawie) i czysta dezinstalacja.
* Zgodne z HPOS oraz blokami koszyka i kasy.

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/lookbook` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być zainstalowane i aktywne.
3. Utwórz swój pierwszy lookbook w <strong>Lookbooks → Dodaj nowy</strong>: ustaw obrazek wyróżniający, a następnie dodaj punkty aktywne produktów.
4. Dostosuj globalną prezentację w <strong>WooCommerce → Lookbook</strong>.
5. Osadź lookbook za pomocą `[lookbook id="123"]`.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Lookbook działa tylko wtedy, gdy WooCommerce jest aktywne, a punkty aktywne prowadzą do
produktów WooCommerce.

= How do I find a lookbook's ID? =

Otwórz listę lookbooków w menu Lookbooks; identyfikator jest widoczny podczas edycji
(post=123 w adresie URL). Użyj go w shortcode’u.

= How do I position a hotspot? =

Każdy punkt aktywny ma wartość X i Y, obie w procentach od lewego górnego rogu
obrazu (0–100), dzięki czemu dopasujesz znaczniki do produktów na zdjęciu.

= What happens if a pinned product is deleted? =

Ten punkt aktywny jest po prostu pomijany. Lookbook nigdy nie renderuje znacznika produktu,
który został usunięty lub cofnięty z publikacji.

= Can I show the price and an add-to-cart button? =

Tak. Oba są przełącznikami w <strong>WooCommerce → Lookbook</strong>, a etykietę
przycisku dodania do koszyka możesz dostosować.

= Will it slow my pages down or shift the layout? =

Nie. Arkusz stylów i skrypt ładują się tylko na stronach, które faktycznie renderują lookbook,
skrypt jest odroczony, a obraz rezerwuje swoje miejsce, więc nie występuje
skumulowane przesunięcie układu (CLS).


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest zgodna z WordPress Multisite. Włącz ją dla całej sieci lub w pojedynczych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Lookbook z możliwością zakupu w sklepie, z punktami aktywnymi produktów i otwartą kartą produktu.
2. Edytor punktów aktywnych na ekranie edycji lookbooka.
3. Ekran ustawień Lookbooka w WooCommerce.

== External Services ==

Lookbook nie łączy się z żadną usługą zewnętrzną. Buduje obraz z możliwością zakupu z danych już obecnych w Twojej witrynie: samego wpisu lookbooka (własny typ treści `lookbook`), jego obrazka wyróżniającego z Biblioteki mediów, punktów aktywnych zapisanych w metadanych wpisu `_lookbook_hotspots` oraz opcji prezentacji zapisanych w opcji `lookbook_settings`. Tytuły produktów, ceny, miniatury i linki dodania do koszyka są odczytywane na żywo z Twojego własnego sklepu WooCommerce. Żadne informacje o Twoich produktach, kupujących czy zamówieniach nie są wysyłane poza witrynę, a wtyczka nie ładuje żadnych czcionek, skryptów ani narzędzi analitycznych innych firm.

== Translations ==

Plogins Lookbook zawiera polskie, niemieckie i hiszpańskie tłumaczenie interfejsu wtyczki. Domena tekstowa to `plogins-lookbook`, dzięki czemu paczki językowe z WordPress.org mogą również nadpisywać lub rozszerzać dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.5 =
* Zmieniono nazwę na Plogins Lookbook for WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.4 =
* Wywołuje `lookbook/rendered` po wyrenderowaniu szablonu lookbooka i udostępnia `data-lookbook-id` w elemencie głównym na potrzeby analityki dodatków.

= 0.1.3 =
* Dodaje atrybuty danych punktów aktywnych oraz zdarzenie front-endowe `lookbook:hotspot-opened` na potrzeby analityki dodatków bez naruszania prywatności.

= 0.1.2 =
* Dodaje filtr `lookbook/scene_media_html` i obsługę scen wideo (`media_type`, `video_url`, `video_id`) przez `lookbook/scenes`.
* Dodaje filtr `lookbook/sanitize_hotspot` i przekazuje kontekst punktu aktywnego do `lookbook/card_image_html` na potrzeby wideo-znaczników dodatków.
* Dodaje akcje `lookbook/admin_hotspot_row_*`, aby Pro mógł rozszerzać edytor punktów aktywnych.

= 0.1.1 =
* Dodaje filtr `lookbook/card_image_html`, aby dodatki mogły dostosować galerię/miniaturę karty produktu.
* Dodaje filtr `lookbook/scenes`, aby dodatki mogły dołączać kolejne obrazy z możliwością zakupu do lookbooka.

= 0.1.0 =
* Pierwsze wydanie: lookbooki z możliwością zakupu z obrazem, punkty aktywne produktów rozmieszczone procentowo, dostępna wyskakująca karta produktu oraz shortcode `[lookbook]`.
