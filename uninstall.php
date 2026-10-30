<?php
/**
 * Uninstall cleanup for Lookbook.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the global options
 * Lookbook creates and deletes the lookbook posts (with their hotspot meta).
 *
 * @package Lookbook
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

// An add-on keeps its own settings inside lookbook_settings. While it is
// installed, active or not, that option is the add-on's to remove when it is
// uninstalled; with no add-on on disk it is ours. Matched on the text domain,
// so a renamed folder still counts. The plugin list is cached per request and
// a bulk delete runs both uninstalls in one request, so drop the cache first.
if (! function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
wp_cache_delete('plugins', 'plugins');
$lookbook_addon_installed = in_array('lookwick-pro', array_column(get_plugins(), 'TextDomain'), true);

if (! $lookbook_addon_installed) {
    delete_option('lookbook_settings');
}
delete_option('lookbook_db_version');

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'lookbook_pro_banner_dismissed', '', true);

// Remove lookbook posts and their meta.
$lookbook_posts = get_posts([
    'post_type'      => 'lookbook',
    'post_status'    => 'any',
    'numberposts'    => -1,
    'fields'         => 'ids',
    'no_found_rows'  => true,
]);

foreach ($lookbook_posts as $lookbook_post_id) {
    wp_delete_post((int) $lookbook_post_id, true);
}
