<?php
/**
 * Elementor integration service.
 *
 * Registers the Lookbook Elementor widget(s). The `elementor/widgets/register`
 * action only fires when Elementor is active, so this service is self-guarding:
 * nothing loads unless Elementor is present.
 *
 * @package Lookbook\Service
 */

declare(strict_types=1);

namespace Lookbook\Service;

defined('ABSPATH') || exit;

use Lookbook\Contract\HasHooks;
use Lookbook\Elementor\LookbookWidget;

/**
 * Wires the Lookbook widgets into the Elementor editor.
 */
final class ElementorWidgets implements HasHooks
{
    /**
     * Register WordPress hooks.
     */
    public function registerHooks(): void
    {
        add_action('elementor/widgets/register', [$this, 'register']);
    }

    /**
     * Register widget instances with Elementor's widgets manager.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register($widgets_manager): void
    {
        // Loaded here (not autoloaded) so \Elementor\Widget_Base always exists.
        require_once __DIR__ . '/../Elementor/LookbookWidget.php';
        $widgets_manager->register(new LookbookWidget());
    }
}
