<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nikhaddon.com
 * @since             1.0.0
 * @package           Better_File_Download
 *
 * @wordpress-plugin
 * Plugin Name:       Better File Download
 * Plugin URI:        https://nikhaddon.com/better-file-download
 * Description:        Better File Download allows you to offer various file types for your users to download, track the popularity of your files and present them in a highly configurable way. For detailed instructions and configuration options, please visit the settings link or the Download Settings link in the side bar.
 *
 * Version:           1.0.6
 * Author:            Nik Haddon
 * Author URI:        https://nikhaddon.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       better-file-download
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-better-file-download-activator.php
 */
function activate_better_file_download() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-better-file-download-activator.php';
	Better_File_Download_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-better-file-download-deactivator.php
 */
function deactivate_better_file_download() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-better-file-download-deactivator.php';
	Better_File_Download_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_better_file_download' );
register_deactivation_hook( __FILE__, 'deactivate_better_file_download' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-better-file-download.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_better_file_download() {

	$plugin = new Better_File_Download();
	$plugin->run();

}
run_better_file_download();
