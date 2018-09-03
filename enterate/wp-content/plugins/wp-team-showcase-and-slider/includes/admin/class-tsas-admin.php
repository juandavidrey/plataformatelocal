<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Tsas_Admin {

	function __construct() {		

		// Action to add admin menu
		add_action( 'admin_menu', array($this, 'tsas_register_menu'), 12 );
		
		// Admin init process
		add_action( 'admin_init', array($this, 'tsas_admin_init_process') );
	}

	/**
	 * Function to add menu
	 * 
	 * @package  WP Team Showcase and Slider
	 * @since 1.0.0
	 */
	function tsas_register_menu() {
		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.WP_TSAS_POST_TYPE, __('Upgrade to PRO -  WP Team Showcase and Slider', 'wp-team-showcase-and-slider'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'wp-team-showcase-and-slider').'</span>', 'manage_options', 'tsas-premium', array($this, 'tsas_premium_page') );
		
		// Register plugin hire us page
		add_submenu_page( 'edit.php?post_type='.WP_TSAS_POST_TYPE, __('Hire Us', 'wp-team-showcase-and-slider'), '<span style="color:#2ECC71">'.__('Hire Us', 'wp-team-showcase-and-slider').'</span>', 'manage_options', 'tsas-hireus', array($this, 'tsas_hireus_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @package  WP Team Showcase and Slider
	 * @since 1.0.0
	 */
	function tsas_premium_page() {
		include_once( WP_TSAS_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Hire Us Page Html
	 * 
	 * @package  WP Team Showcase and Slider
	 * @since 1.0.0
	 */
	function tsas_hireus_page() {		
		include_once( WP_TSAS_DIR . '/includes/admin/settings/hire-us.php' );
	}

	/**
	 * Function to notification transient
	 * 
	 * @package WP Team Showcase and Slider
	 * @since 1.5.2
	 */
	function tsas_admin_init_process() {
		// If plugin notice is dismissed
	    if( isset($_GET['message']) && $_GET['message'] == 'tsas-plugin-notice' ) {
	    	set_transient( 'tsas_install_notice', true, 604800 );
	    }
	}
}

$tsas_Admin = new Tsas_Admin();