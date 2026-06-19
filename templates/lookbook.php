<?php
/**
 * Front-end lookbook template: one or more shoppable images with hotspot markers.
 *
 * @package Lookbook
 *
 * @var int   $lookbookId Lookbook post id.
 * @var string $title     Lookbook title.
 * @var array<int, array{image_id: int, label: string, hotspots: array<int, array{x: float, y: float, product_id: int, product: \WC_Product}>}> $scenes
 * @var array<string, mixed> $settings Resolved plugin settings.
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

if ($scenes === []) {
    return;
}

$multi = count($scenes) > 1;
$rootId = 'lookbook-' . $lookbookId;
?>
<div
    class="lookbook<?php echo $multi ? ' lookbook--multi' : ''; ?>"
    id="<?php echo esc_attr($rootId); ?>"
    data-lookbook
>
    <?php if ($multi) : ?>
        <div class="lookbook__nav" role="tablist" aria-label="<?php esc_attr_e('Lookbook images', 'lookbook'); ?>">
            <?php foreach ($scenes as $sceneIndex => $scene) :
                $label = trim((string) ($scene['label'] ?? ''));
                if ($label === '') {
                    $label = sprintf(
                        /* translators: %d: image number */
                        __('Image %d', 'lookbook'),
                        $sceneIndex + 1,
                    );
                }
                ?>
                <button
                    type="button"
                    class="lookbook__nav-btn<?php echo $sceneIndex === 0 ? ' is-active' : ''; ?>"
                    role="tab"
                    id="<?php echo esc_attr($rootId . '-tab-' . $sceneIndex); ?>"
                    aria-controls="<?php echo esc_attr($rootId . '-scene-' . $sceneIndex); ?>"
                    aria-selected="<?php echo $sceneIndex === 0 ? 'true' : 'false'; ?>"
                    data-lookbook-tab
                    data-scene-index="<?php echo esc_attr((string) $sceneIndex); ?>"
                >
                    <?php echo esc_html($label); ?>
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="lookbook__scenes">
        <?php
        foreach ($scenes as $sceneIndex => $scene) {
            $partial = LOOKBOOK_DIR . 'templates/partials/lookbook-stage.php';
            if (! is_readable($partial)) {
                continue;
            }

            $imageId    = (int) ($scene['image_id'] ?? 0);
            $sceneLabel = trim((string) ($scene['label'] ?? ''));
            $hotspots   = is_array($scene['hotspots'] ?? null) ? $scene['hotspots'] : [];

            if ($imageId <= 0) {
                continue;
            }

            require $partial;
        }
        ?>
    </div>
</div>
