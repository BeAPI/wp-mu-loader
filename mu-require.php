<?php
/**
 * Plugin Name:       MU Plugins Subdirectory Loader
 * Plugin URI:        https://github.com/BeAPI/wp-mu-loader/
 * Description:       Loads must-use plugins from subdirectories under mu-plugins, not only single PHP files at the root. Uses the core get_plugins() API for discovery.
 * Version:           1.0.4
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            BeAPI
 * Previous Author:   WeMakeCustom (https://github.com/wemakecustom/wp-mu-loader)
 * Author URI:        https://beapi.fr/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package BeAPI\WP_Mu_Loader
 */

$wp_mu_loader = WPMU_PLUGIN_DIR . '/mu-loader/mu-loader.php';

if ( is_file( $wp_mu_loader ) ) {
	require_once $wp_mu_loader;
} else {
	add_action(
		'admin_notices',
		function () use ( $wp_mu_loader ) {
			echo '<div class="error"><p><code>' . esc_html( substr( $wp_mu_loader, strlen( ABSPATH ) ) ) . '</code> is missing. Consider running <code>composer install</code>.</p></div>';
		}
	);
}

unset( $wp_mu_loader );
