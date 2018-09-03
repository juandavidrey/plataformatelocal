<?php
/**
 * Plugin Name: WP Team Showcase and Slider
 * Plugin URI: http://www.wponlinesupport.com/
 * Text Domain: wp-team-showcase-and-slider
 * Domain Path: /languages/
 * Description: Easy to add and display your employees, team members in Grid view, Slider view and in widget. 
 * Author: WP Online Support
 * Version: 1.5.2
 * Author URI: http://www.wponlinesupport.com/
 *
 * @package WordPress
 * @author WP Online Support
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if( !defined( 'WP_TSAS_VERSION' ) ) {
	define( 'WP_TSAS_VERSION', '1.5.2' ); // Version of plugin
}
if( !defined( 'WP_TSAS_DIR' ) ) {
    define( 'WP_TSAS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if(!defined( 'WP_TSAS_POST_TYPE' ) ) {
	define('WP_TSAS_POST_TYPE', 'team_showcase_post'); // Plugin post type
}
if( !defined( 'WP_TSAS_URL' ) ) {
    define( 'WP_TSAS_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}


add_action('plugins_loaded', 'wp_tsas_load_textdomain');
function wp_tsas_load_textdomain() {
	load_plugin_textdomain( 'wp-team-showcase-and-slider', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_tsas_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_tsas_uninstall');

/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
function wp_tsas_install() {

    // Deactivate free version
    if( is_plugin_active('wp-team-showcase-and-slider-pro/wp-team-showcase-and-slider.php') ) {
        add_action('update_option_active_plugins', 'wp_tsas_deactivate_premium_version');
    }
}

/**
 * Deactivate free plugin
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
function wp_tsas_deactivate_premium_version() {
    deactivate_plugins('wp-team-showcase-and-slider-pro/wp-team-showcase-and-slider.php', true);
}

/**
 * Plugin Deactivation Function
 * Delete  plugin options
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
function wp_tsas_uninstall() {
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.0
 */
function wp_tsas_admin_notice() {

    global $pagenow;

    // If PRO plugin is active and free plugin exist
    $dir                = WP_PLUGIN_DIR . '/wp-team-showcase-and-slider-pro/wp-team-showcase-and-slider.php';
    $notice_link        = add_query_arg( array('message' => 'tsas-plugin-notice'), admin_url('plugins.php') );
    $notice_transient   = get_transient( 'tsas_install_notice' );

    if ( $notice_transient == false &&  $pagenow == 'plugins.php' && file_exists($dir) && current_user_can( 'install_plugins' ) ) {
        echo '<div class="updated notice" style="position:relative;">
                <p>
                    <strong>'.sprintf( __('Thank you for activating %s', 'wp-team-showcase-and-slider'), 'WP Team Showcase and Slider').'</strong>.<br/>
                    '.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'wp-team-showcase-and-slider'), '<strong>(<em>WP Team Showcase and Slider PRO</em>)</strong>' ).'
                </p>
                <a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
            </div>';      
    }
}

add_action( 'admin_notices', 'wp_tsas_admin_notice');

/**
 * Function to get unique number value
 * 
 * @package WP Team Showcase and Slider
 * @since 1.0.1
 */
function wp_tsas_get_unique() {
  	static $unique = 0;
	$unique++;

  	return $unique;
}
require_once( 'includes/class-tsas-script.php' );
require_once( 'includes/tsas-functions.php' );
require_once( 'includes/tsas-post-type.php' );
require_once( 'includes/shortcodes/tsas-shortcode.php' );
require_once( 'includes/shortcodes/tsas-slider-shortcode.php' );

// Admin file Free Vs Pro
require_once( 'includes/admin/class-tsas-admin.php' );

// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( WP_TSAS_DIR . '/includes/admin/wp_tsas-how-it-work.php' );
}

/* Plugin Wpos Analytics Data Starts */
function wpos_analytics_anl26_load() {

    require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

    $wpos_analytics =  wpos_anylc_init_module( array(
                            'id'            => 26,
                            'file'          => plugin_basename( __FILE__ ),
                            'name'          => 'WP Team Showcase and Slider',
                            'slug'          => 'wp-team-showcase-and-slider',
                            'type'          => 'plugin',
                            'menu'          => 'edit.php?post_type=team_showcase_post',
                            'text_domain'   => 'wp-team-showcase-and-slider',
                            'offers'        => array(
                                                    'trial_premium' => array(
                                                                'button'    => 'TRY FREE FOR 30 DAYS',
                                                                'image'     => 'http://analytics.wponlinesupport.com/?anylc_img=26',
                                                                'link'      => 'https://www.wponlinesupport.com/plugins-plus-themes-powerpack-combo-offer/?ref=blogeditor'
                                                        ),
                                                    ),
                        ));

    return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl26_load();
/* Plugin Wpos Analytics Data Ends */