<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 * @author     Nik Haddon <nik@nikhaddon.com>
 */
class Better_File_Download_Deactivator {

	/**
	 * Functions to run on plugin deactivation
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
