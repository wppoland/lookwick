<?php

declare(strict_types=1);

namespace Lookbook;

use Lookbook\Contract\HasHooks;

defined('ABSPATH') || exit;

/**
 * Registers the `lookbook` custom post type that stores each shoppable image.
 *
 * A lookbook is admin-only content: it is not publicly queryable on its own
 * (no front-end archive or single template). Merchants create one, set its
 * featured image and pin product hotspots, then embed it anywhere with the
 * [lookbook id="N"] shortcode.
 *
 * The post title is the admin-facing name; the featured image is the canvas;
 * the hotspots live in the `_lookbook_hotspots` meta (see {@see Admin\MetaBox}).
 */
final class PostType implements HasHooks
{
    public const POST_TYPE = 'lookbook';

    public function registerHooks(): void
    {
        add_action('init', [$this, 'register']);
        add_filter('manage_' . self::POST_TYPE . '_posts_columns', [$this, 'addShortcodeColumn']);
        add_action('manage_' . self::POST_TYPE . '_posts_custom_column', [$this, 'renderShortcodeColumn'], 10, 2);
    }

    /**
     * Add a Shortcode column right after the title on the Lookbooks list.
     *
     * @param array<string, string> $columns
     * @return array<string, string>
     */
    public function addShortcodeColumn(array $columns): array
    {
        $out = [];

        foreach ($columns as $key => $label) {
            $out[$key] = $label;

            if ($key === 'title') {
                $out['lookbook_shortcode'] = __('Shortcode', 'lookwick');
            }
        }

        if (! isset($out['lookbook_shortcode'])) {
            $out['lookbook_shortcode'] = __('Shortcode', 'lookwick');
        }

        return $out;
    }

    /**
     * Print the lookbook's shortcode as a read-only field, ready to copy.
     */
    public function renderShortcodeColumn(string $column, int $postId): void
    {
        if ($column !== 'lookbook_shortcode') {
            return;
        }

        $shortcode = sprintf('[lookbook id="%d"]', $postId);

        printf(
            '<input type="text" readonly class="code" style="width:100%%;max-width:16em" value="%1$s" aria-label="%2$s" />',
            esc_attr($shortcode),
            esc_attr(sprintf(/* translators: %s: lookbook title. */ __('Shortcode for %s', 'lookwick'), get_the_title($postId))),
        );
    }

    public function register(): void
    {
        $labels = [
            'name'                  => _x('Lookbooks', 'post type general name', 'lookwick'),
            'singular_name'         => _x('Lookbook', 'post type singular name', 'lookwick'),
            'menu_name'             => _x('Lookbooks', 'admin menu', 'lookwick'),
            'add_new'               => __('Add New', 'lookwick'),
            'add_new_item'          => __('Add New Lookbook', 'lookwick'),
            'edit_item'             => __('Edit Lookbook', 'lookwick'),
            'new_item'              => __('New Lookbook', 'lookwick'),
            'view_item'             => __('View Lookbook', 'lookwick'),
            'search_items'          => __('Search Lookbooks', 'lookwick'),
            'not_found'             => __('No lookbooks found.', 'lookwick'),
            'not_found_in_trash'    => __('No lookbooks found in Trash.', 'lookwick'),
            'all_items'             => __('All Lookbooks', 'lookwick'),
            'featured_image'        => __('Lookbook image', 'lookwick'),
            'set_featured_image'    => __('Set lookbook image', 'lookwick'),
            'remove_featured_image' => __('Remove lookbook image', 'lookwick'),
            'use_featured_image'    => __('Use as lookbook image', 'lookwick'),
        ];

        register_post_type(self::POST_TYPE, [
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => false,
            'menu_position'      => 58,
            'menu_icon'          => 'dashicons-format-image',
            'capability_type'    => 'post',
            'map_meta_cap'       => true,
            'hierarchical'       => false,
            'has_archive'        => false,
            'rewrite'            => false,
            'query_var'          => false,
            'supports'           => ['title', 'thumbnail'],
        ]);
    }
}
