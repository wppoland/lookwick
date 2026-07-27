<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-lookbook-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Lookbook Pro',
    'url'        => 'https://plogins.com/plogins-lookbook-pro/pricing/',
    'sellable'   => true,
    'price_from' => 19,
    'currency'   => 'EUR',
    'price_pln'  => 85,
    'lead'       => [
        'en' => 'Marker accent colour, gallery hotspots in cards, multiple scenes, video hotspots and click analytics are available now.',
        'pl' => 'Kolor akcentu, galeria w kartach, wiele scen, hotspoty wideo i analityka kliknięć są już dostępne.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Marker accent colour', 'desc' => 'Custom colour for hotspot markers and the product-card add-to-cart button.'],
            'pl' => ['title' => 'Galeria w kartach hotspotów', 'desc' => 'Wyświetlanie galerii zdjęć produktu jako karuzeli w kartach hotspotów (scroll-snap).'],
        ],
        [
            'en' => ['title' => 'Gallery in hotspot cards', 'desc' => 'Display the WooCommerce product gallery as a swipeable slideshow (scroll-snap) inside hotspot cards.'],
            'pl' => ['title' => 'Wiele scen zakupowych', 'desc' => 'Dodatkowe obrazy lookbooka z nawigacją zakładkami i hotspotami per obraz na sklepie.'],
        ],
        [
            'en' => ['title' => 'Multiple images per lookbook', 'desc' => 'Add extra shoppable images with tab navigation and per-image hotspots on the storefront.'],
            'pl' => ['title' => 'Kolor akcentu znaczników', 'desc' => 'Własny kolor markerów i przycisku koszyka w hotspotach.'],
        ],
        [
            'en' => ['title' => 'Video hotspots', 'desc' => 'Pin products onto a video frame, not just a still image (shipped).'],
            'pl' => ['title' => 'Hotspoty na wideo', 'desc' => 'Przypięcie produktów do klatki wideo, nie tylko do nieruchomego obrazu (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Animation styles (planned)', 'desc' => 'Extra marker and popover animations beyond the three free marker styles.'],
            'pl' => ['title' => 'Style animacji (planowane)', 'desc' => 'Dodatkowe animacje znaczników i popoverów poza trzema darmowymi stylami.'],
        ],
        [
            'en' => ['title' => 'Click analytics', 'desc' => 'Report on hotspot opens, product-card clicks and image-to-cart conversion (shipped).'],
            'pl' => ['title' => 'Analityka kliknięć', 'desc' => 'Raporty o otwarciach hotspotów, kliknięciach produktów i konwersji obrazu do koszyka (wdrożone).'],
        ],
    ],
];
