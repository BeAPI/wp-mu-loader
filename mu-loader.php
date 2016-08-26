<?php

/**
 * Get mu plugins directories plugins
 *
 * @return array
 */
function mu_loader_plugins_files() {
	if ( defined( 'WP_INSTALLING' ) && true === WP_INSTALLING ) {
		// Do nothing during installation
 		return array();
	}
	
	if ( ! function_exists( 'get_plugins' ) ) {
		// get_plugins is not included by default
		require ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugins = array();
	foreach ( get_plugins( '/../mu-plugins' ) as $plugin_file => $data ) {
		if ( dirname( $plugin_file ) != '.' && dirname( $plugin_file ) != 'mu-loader' ) {
			// skip files directly at root
			$plugins[] = $plugin_file;
		}
	}

	return $plugins;
}

/**
 * Directly load them
 */
foreach ( mu_loader_plugins_files() as $plugin_file ) {
	require_once WPMU_PLUGIN_DIR . '/' . $plugin_file;
}

/**
 * Add rows for each subplugin under this plugin when listing mu-plugins in wp-admin
 */
add_action( 'admin_init', function () {

	add_action( 'after_plugin_row_mu-require.php', function () {
		$table = new WP_Plugins_List_Table;

		foreach ( mu_loader_plugins_files() as $plugin_file ) {
			$plugin_data = get_plugin_data( WPMU_PLUGIN_DIR . '/' . $plugin_file, false );

			if ( empty( $plugin_data['Name'] ) ) {
				$plugin_data['Name'] = $plugin_file;
			}
			$plugin_data['Name'] = "&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;" . $plugin_data['Name'];

			$table->single_row( array( $plugin_file, $plugin_data ) );
		}
	} );
} );
