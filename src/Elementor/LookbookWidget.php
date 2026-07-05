<?php
/**
 * Elementor widget: Shoppable Lookbook.
 *
 * A thin wrapper around the [lookbook] shortcode so a lookbook can be placed
 * with the Elementor editor. Kept deliberately minimal (renders the shortcode)
 * so a future migration to Elementor v4 atomic widgets stays localized to this
 * class. Loaded only from the `elementor/widgets/register` hook, so the
 * `\Elementor\Widget_Base` base class is guaranteed to exist here. Works on
 * Elementor 3.x and 4.0 (the classic Widget_Base API is retained in v4).
 *
 * @package Lookbook\Elementor
 */

declare(strict_types=1);

namespace Lookbook\Elementor;

defined('ABSPATH') || exit;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Shoppable Lookbook Elementor widget.
 */
final class LookbookWidget extends Widget_Base
{
    /**
     * Widget machine name (matches the [lookbook] shortcode tag).
     */
    public function get_name(): string
    {
        return 'lookbook';
    }

    /**
     * Widget label shown in the editor.
     */
    public function get_title(): string
    {
        return esc_html__('Shoppable Lookbook', 'plogins-lookbook');
    }

    /**
     * Editor panel icon.
     */
    public function get_icon(): string
    {
        return 'eicon-gallery-grid';
    }

    /**
     * Editor panel categories.
     *
     * @return string[]
     */
    public function get_categories(): array
    {
        return ['woocommerce-elements', 'general'];
    }

    /**
     * Search keywords in the editor.
     *
     * @return string[]
     */
    public function get_keywords(): array
    {
        return ['lookbook', 'shoppable', 'hotspot', 'gallery', 'product', 'woocommerce'];
    }

    /**
     * Register the editor controls.
     */
    protected function register_controls(): void
    {
        $this->start_controls_section(
            'content',
            ['label' => esc_html__('Lookbook', 'plogins-lookbook')]
        );

        $this->add_control(
            'id',
            [
                'label'       => esc_html__('Lookbook ID', 'plogins-lookbook'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 0,
                'min'         => 0,
                'description' => esc_html__('The ID of the lookbook to display.', 'plogins-lookbook'),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget on the front end and in the editor preview.
     */
    protected function render(): void
    {
        $settings = $this->get_settings_for_display();
        $id       = isset($settings['id']) ? absint($settings['id']) : 0;

        echo do_shortcode(sprintf('[lookbook id="%d"]', $id));
    }
}
