<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Better_File_Download
 * @subpackage Better_File_Download/includes
 * @author     Nik Haddon <nik@nikhaddon.com>
 */
class Better_File_Download {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Better_File_Download_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'better-file-download';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Better_File_Download_Loader. Orchestrates the hooks of the plugin.
	 * - Better_File_Download_i18n. Defines internationalization functionality.
	 * - Better_File_Download_Admin. Defines all hooks for the admin area.
	 * - Better_File_Download_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-better-file-download-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-better-file-download-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-better-file-download-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-better-file-download-public.php';

		$this->loader = new Better_File_Download_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Better_File_Download_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Better_File_Download_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Better_File_Download_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// CREATE CUSTOM POST TYPE.
		$this->loader->add_action( 'init', $plugin_admin, 'bfd_create_download_post_type', 10 );
		// CREATE CUSTOM TAXONOMY.
		$this->loader->add_action( 'init', $plugin_admin, 'bfd_create_download_categories_taxonomy', 10 );
		// CONDITIONALLY FLUSH THE REWRITE RULES
		$this->loader->add_action( 'init', $plugin_admin, 'bfd_maybe_flush_rewrite_rules', 20 );
		// ADD THE METABOX.
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'bfd_meta_box_download' );
		// SAVE THE METABOX DATA.
		$this->loader->add_action( 'save_post', $plugin_admin, 'bfd_meta_box_download_save', 10, 2 );		
		// SET THE DOWNLOAD COUNTER.
		$this->loader->add_action( 'template_redirect', $plugin_admin, 'bfd_count_and_redirect' );
		// ADD FORM META FIELDS TO CATEGORIES.
		$this->loader->add_action( 'download-categories_add_form_fields', $plugin_admin, 'bfd_taxononmy_add_meta_fields', 10, 2 );
		// ADD CATEGORY FORM FIELDS TO EDIT CATEGORIES PAGE.
		$this->loader->add_action( 'download-categories_edit_form_fields', $plugin_admin, 'bfd_taxonomy_edit_meta_fields', 10, 2 );
		// ADD/REMOVE LIST VIEW COLUMNS.
		$this->loader->add_filter( 'manage_bfd_download_posts_columns', $plugin_admin, 'bfd_modify_columns' );
		// RENDER THE CUSTOM POST TYPE COLUMNS.
		$this->loader->add_action( 'manage_bfd_download_posts_custom_column', $plugin_admin, 'bfd_custom_column_content' );
		// MAKE CUSTOM COLUMNS SORATBLE.
		$this->loader->add_action( 'manage_edit-bfd_download_sortable_columns', $plugin_admin, 'bfd_custom_columns_sortable' );
		// RENDER THE CUSTOM TAXONOMY LIST COLUMNS.
		$this->loader->add_filter( 'manage_edit-download-categories_columns', $plugin_admin, 'bfd_custom_taxonomy_columns', 10 );
		// POPULATE THE CUSTOM TAXONOMY LIST COLUMNS.
		$this->loader->add_action( 'manage_download-categories_custom_column', $plugin_admin, 'bfd_custom_taxonomy_column_content', 10, 3 );
		// SAVE THE CUSTOM TAXONOMY META DATA.
		$this->loader->add_action( 'created_download-categories', $plugin_admin, 'bfd_save_category_meta', 10, 2 );
		// UPDATE THE CUSTOM TAXONOMY META DATA.
		$this->loader->add_action( 'edited_download-categories', $plugin_admin, 'bfd_update_download_term_meta', 10, 2 );		
		// ADD MENU ITEM.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'bfd_add_plugin_admin_menu' );
		// SAVE/UPDATE THE PLUGIN OPTIONS.
		$this->loader->add_action( 'admin_init', $plugin_admin, 'bfd_register_display_settings', 9 );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'bfd_register_file_upload_settings', 9 );		
		// ADD SETTINGS LINK TO THE PLUGIN.
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' .  $plugin_basename, $plugin_admin, 'bfd_add_action_links');
		// INCLUDE CPT IN ARCHIVE.
		$bfd_options = get_option($this->plugin_name . '-display-settings');
		if ( ! empty( $bfd_options['bfd-archive-display'] )  ) {
			$this->loader->add_filter( 'pre_get_posts', $plugin_admin, 'bfd_add_custom_post_type_to_archive', 99 );
		}
		// INCLUDE CPT IN ARCHIVE SIDEBAR WIDGET.
		if ( ! empty( $bfd_options['bfd-archive-widget-display'] ) ) {
			$this->loader->add_action( 'getarchives_where', $plugin_admin, 'bfd_add_cpt_to_archive_widget' );
		}
		// ALLOW FILE TYPES
		$this->loader->add_filter('upload_mimes', $plugin_admin, 'bfd_add_custom_upload_mimes', 1, 1);
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Better_File_Download_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
				
		// REGISTER SHORTCODE FOR CPT.
		$this->loader->add_shortcode( __('download', $this->plugin_name), $plugin_public, 'bfd_single_download_shortcode', $priority = 10, $accepted_args = 2 );
		// REGISTER THE SHORTCODE FOR CPT TAXONOMIES.
		$this->loader->add_shortcode( __('download_category', $this->plugin_name), $plugin_public,  'bfd_taxonomy_download_shortcode', $priority = 10, $accepted_args = 2  );
		// OPTIONAL USER DEFINED STYLE OVERRIDES
		$this->loader->add_action( 'wp_head', $plugin_public, 'bfd_user_defined_colour_scheme' );
		// CPT SEARCH FORM SHORTCODE
		$this->loader->add_shortcode( __('bfd_download_search', $this->plugin_name), $plugin_public,  'bfd_cpt_search_shortcode', $priority = 10, $accepted_args = 2  );
		// AJAX-IFY THE CUSTOM SEARCH FORM
		$this->loader->add_action( 'wp_ajax_bfd_ajax_download_search', $plugin_public,  'bfd_ajax_download_search' );
		$this->loader->add_action( 'wp_ajax_nopriv_bfd_ajax_download_search', $plugin_public,  'bfd_ajax_download_search' );		

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Better_File_Download_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
