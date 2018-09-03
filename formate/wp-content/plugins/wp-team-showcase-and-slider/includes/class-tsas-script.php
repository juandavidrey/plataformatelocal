<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Tsas_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'tsas_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'tsas_front_script') );	
		
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package WP Team Showcase and Slider
	 * @since 1.0.0
	 */
	function tsas_front_style() {

		wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), WP_TSAS_VERSION );
		wp_enqueue_style( 'fontawesome' );
		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', WP_TSAS_URL.'assets/css/slick.css', array(), WP_TSAS_VERSION );
			wp_enqueue_style( 'wpos-slick-style' );
		}
		
		// Registring and enqueing wpos-magnific-popup-style css
		if( !wp_style_is( 'wpos-magnific-popup-style', 'registered' ) ) {
			wp_register_style( 'wpos-magnific-popup-style', WP_TSAS_URL.'assets/css/magnific-popup.css', array(), WP_TSAS_VERSION );
			wp_enqueue_style( 'wpos-magnific-popup-style' );
		}
		
		// Registring and enqueing public css
		wp_register_style( 'tsas-public-style', WP_TSAS_URL.'assets/css/teamshowcase-style.css', array(), WP_TSAS_VERSION );
		wp_enqueue_style( 'tsas-public-style' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package WP Team Showcase and Slider
	 * @since 1.0.0
	 */
	function tsas_front_script() {		
		// Registring slick slider script
			if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
				wp_register_script( 'wpos-slick-jquery', WP_TSAS_URL.'assets/js/slick.min.js', array('jquery'), WP_TSAS_VERSION, true );		
			}
			
			// Registring slick slider script
			if( !wp_script_is( 'wpos-magnific-popup-jquery', 'registered' ) ) {
				wp_register_script( 'wpos-magnific-popup-jquery', WP_TSAS_URL.'assets/js/jquery.magnific-popup.min.js', array('jquery'), WP_TSAS_VERSION, true );		
			}
			
			// Registring and enqueing public script
			wp_register_script( 'tsas-public-script', WP_TSAS_URL.'assets/js/tsas-public.js', array('jquery'), WP_TSAS_VERSION, true );		
	}	
}

$tsas_script = new Tsas_Script();