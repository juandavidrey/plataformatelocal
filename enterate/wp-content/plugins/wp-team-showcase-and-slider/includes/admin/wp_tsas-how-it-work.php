<?php
/**
 * Designs and Plugins Feed
 *
 * @package  Team showcase
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'tsas_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package  Team showcase
 * @since 1.0.0
 */
function tsas_register_design_page() {
	add_submenu_page( 'edit.php?post_type=team_showcase_post', __('How it works, our plugins and offers', 'wp-team-showcase-and-slider'), __('How It Works', 'wp-team-showcase-and-slider'), 'manage_options', 'tsas-designs', 'tsas_designs_page' );	
}

/**
 * Function to display plugin design HTML
 * 
 * @package  Slider and Carousel Plus Widget Instagram
 * @since 1.0.0
 */
function tsas_designs_page() {

	$wpos_feed_tabs = tsas_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>
		
	<div class="wrap pap-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'page' => 'tsas-designs', 'tab' => $tab_key), admin_url('admin.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="pap-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				tsas_howitwork_page();
			}
			else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo tsas_get_plugin_design( 'plugins-feed' );
			} else {
				echo tsas_get_plugin_design( 'offers-feed' );
			}
		?>
		</div><!-- end .pap-tab-cnt-wrp -->

	</div><!-- end .pap-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package Slider and Carousel Plus Widget Instagram
 * @since 1.0.0
 */
function tsas_get_plugin_design( $feed_type = '' ) {
	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';
	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = tsas_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'pap_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'wp-team-showcase-and-slider' ) . '</div>';
		}
	}
	return $cache;	
}

/**
 * Function to get plugin feed tabs
 *
 * @package Slider and Carousel Plus Widget Instagram
 * @since 1.0.0
 */
function tsas_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'wp-team-showcase-and-slider'),
												),
						'plugins-feed' 	=> array(
													'name' 				=> __('Our Plugins', 'wp-team-showcase-and-slider'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/plugins-data.php',
													'transient_key'		=> 'wpos_plugins_feed',
													'transient_time'	=> 172800
												),
						'offers-feed' 	=> array(
													'name'				=> __('Hire Us', 'wp-team-showcase-and-slider'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/wpos-offers.php',
													'transient_key'		=> 'wpos_offers_feed',
													'transient_time'	=> 86400,
												)
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package Slider and Carousel Plus Widget Instagram
 * @since 1.0.0
 */
function tsas_howitwork_page() { ?>
	
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.pap-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.pap-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'wp-team-showcase-and-slider' ); ?></span>
								</h3>
								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Getting Started with WP Team Showcase and Slider', 'wp-team-showcase-and-slider'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1: This plugin create a Team Showcase tab in WordPress menu section', 'wp-team-showcase-and-slider'); ?></li>
														<li><?php _e('Step-2: Now, paste below shortcode in any post or page and your WP Team Showcase and Slider is ready !!!', 'wp-team-showcase-and-slider'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'wp-team-showcase-and-slider'); ?>:</label>
												</th>
												<td>
													<span class="pap-shortcode-preview">[wp-team]</span> – <?php _e('Team Showcase Grid', 'wp-team-showcase-and-slider'); ?> <br />
													<span class="pap-shortcode-preview">[wp-team-slider]</span> – <?php _e('Team Showcase Slider', 'wp-team-showcase-and-slider'); ?> <br />
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('Need Support?', 'wp-team-showcase-and-slider'); ?></label>
												</th>
												<td>
													<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wp-team-showcase-and-slider'); ?></p> <br/>
													<a class="button button-primary" href="https://www.wponlinesupport.com/plugins-documentation/documentwp-team-showcase-slider/" target="_blank"><?php _e('Documentation', 'wp-team-showcase-and-slider'); ?></a>									
													<a class="button button-primary" href="http://demo.wponlinesupport.com/team-showcase-and-slider-demo/" target="_blank"><?php _e('Demo for Designs', 'wp-team-showcase-and-slider'); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
				
				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">
					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									
								<h3 class="hndle">
									<span><?php _e( 'Upgrate to Pro', 'wp-team-showcase-and-slider' ); ?></span>
								</h3>
								<div class="inside">										
									<ul class="wpos-list">
										<li>Added 2 shortcodes with various parameters. [wp-team] – Grid Shortcode [wp-team-slider] – Slider Shortcode</li>
										<li>25 stunning and cool designs.</li>
										<li>Display team member in a grid view.</li>
										<li>Display team member in a slider view.</li>
										<li>Display team member details in a popup.</li>
										<li>2 popup designs for team members.</li>
										<li>2 popup theme (Light – Dark) for team members.</li>
										<li>Slider RTL support.</li>
										<li>Display team showcase categories wise.</li>
										<li>Drag & Drop team members to display in your desired order.</li>
										<li>Strong shortcode parameters.</li>
										<li>Fully Responsive.</li>
										<li>100% Multilanguage.</li>
									</ul>
									<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wp-plugin/wp-team-showcase-slider/" target="_blank"><?php _e('Go Premium ', 'wp-team-showcase-and-slider'); ?></a>	
									<p><a class="button button-primary wpos-button-full" href="http://demo.wponlinesupport.com/prodemo/wp-team-showcase-and-slider/" target="_blank"><?php _e('View PRO Demo ', 'wp-team-showcase-and-slider'); ?></a>			</p>								
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'wp-team-showcase-and-slider' ); ?></span>
									</h3>									
									<div class="inside">										
										<p>Enjoyed this plugin? You can help by rate this plugin <a href="https://wordpress.org/support/plugin/wp-team-showcase-and-slider/reviews/" target="_blank">5 stars!</a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->
				

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }