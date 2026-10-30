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

/**
 * Remove this plugin's options and lookbook posts from the current site.
 *
 * @param bool $addon_installed True while the add-on, which keeps its settings in lookbook_settings, is on disk.
 */
function lookbook_uninstall_site(bool $addon_installed): void
{
    if (! $addon_installed) {
        delete_option('lookbook_settings');
    }
    delete_option('lookbook_db_version');

    // Remove lookbook posts and their meta.
    $posts = get_posts([
        'post_type'      => 'lookbook',
        'post_status'    => 'any',
        'numberposts'    => -1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ]);

    foreach ($posts as $post_id) {
        wp_delete_post((int) $post_id, true);
    }
}

// Options are per site, so a network uninstall has to visit every site. The
// add-on check above is about the plugin folders, which are shared by the whole
// network, so it is read once.
if (is_multisite()) {
    foreach (get_sites(['fields' => 'ids', 'number' => 0]) as $lookbook_site_id) {
        switch_to_blog((int) $lookbook_site_id);
        lookbook_uninstall_site($lookbook_addon_installed);
        restore_current_blog();
    }
    unset($lookbook_site_id);
} else {
    lookbook_uninstall_site($lookbook_addon_installed);
}

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'lookbook_pro_banner_dismissed', '', true);
