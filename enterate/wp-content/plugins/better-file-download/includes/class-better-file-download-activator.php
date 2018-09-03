<?php

/**
 * Fired during plugin activation
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 * @author     Nik Haddon <nik@nikhaddon.com>
 */
class Better_File_Download_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Register the default CSS setting on activation
		if ( ! get_option( 'better-file-download-display-settings' ) )
		{
		 	add_option( 'better-file-download-display-settings', array( 'bfd-default-css' => true ) );
		}
		// Check and create a flag for flushing the permalinks
		if ( ! get_option( 'bfd_do_flush_rewrite' ) ) 
		{
			add_option( 'bfd_do_flush_rewrite', true );
		}
			   
	}

}
