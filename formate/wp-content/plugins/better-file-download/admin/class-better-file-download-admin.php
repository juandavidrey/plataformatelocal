<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/admin
 * @author     Nik Haddon <nik@nikhaddon.com>
 */
class Better_File_Download_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/better-file-download-admin.css', array(), $this->version, 'all' );
		// IRIS COLOUR PICKER STYLES.
		wp_enqueue_style( 'wp-color-picker' );
		// JQuery UI CSS for UI tabs
		wp_enqueue_style( 'googleapi-jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/better-file-download-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		// JQuery UI Tabs
		wp_enqueue_script ('jquery-ui-tabs');

		// Internationalise media loader text.
		$bfd_media_uploader_vars = array(
			'title' => __("Select file"),
			'text' => __('Select')
		);
		wp_localize_script( $this->plugin_name, 'bfdMediaUploaderVars', $bfd_media_uploader_vars );

		// Internationalise short code text.
		$bfd_shortcode_vars = array(
			'shortcode' => __('[download_category category="'),
		);
		wp_localize_script( $this->plugin_name, 'bfdShortCodeVars', $bfd_shortcode_vars );

	}

	/**
	* Register the download post type.
	*
	* @since  1.0.0
	*/
	public function bfd_create_download_post_type()
	{
		$bfd_labels = array(
			'name' => __( 'Downloads',  $this->plugin_name ),
			'menu_name' => __('Downloads', $this->plugin_name),
			'singular_name' => __('Download', $this->plugin_name),
			'add_new' => __('Add New', $this->plugin_name),
			'add_new_item' => __('Add New Download', $this->plugin_name),
			'edit' => __('Edit', $this->plugin_name),
			'edit_item' => __('Edit Download', $this->plugin_name),
			'new_item' => __('New Download', $this->plugin_name),
			'all_items' => __('All Downloads', $this->plugin_name),
			'view_item' => __('View Download', $this->plugin_name),
			'search_items' => __('Search Downloads', $this->plugin_name),
			'not_found' => __('No Downloads Found', $this->plugin_name),
			'not_found_in_trash' => __('No Downloads Found in Trash', $this->plugin_name),
			'menu_position'	=>	5
		);
		$bfd_options = get_option($this->plugin_name);
		register_post_type(
			'bfd_download',
			array(
			'description' => __('Offer downloads to users', $this->plugin_name),
			'has_archive' => TRUE,
			'rewrite' => array( 'slug' => __('bfd_download', $this->plugin_name) ), // The individual Slug.
			'supports' => array('title', 'thumbnail', 'custom-fields'),
			'menu_icon' => 'dashicons-download',
			'public' => TRUE,
			'show_ui' => TRUE,
			'exclude_from_search' => TRUE,
			'map_meta_cap' => TRUE,
			'capability_type' => 'post',
			'labels' => $bfd_labels
			)
		);
	}

	/**
	* Register the custom "DownLoad Categories" taxonomy.
	*
	* @since  1.0.0
	*/
	public function bfd_create_download_categories_taxonomy()
	{
		register_taxonomy(
			'download-categories',  // Taxonomy title.
			array('bfd_download'), // Object type - The post type to which we attach the taxonomy.
			array( // Arguments.
				'public' => TRUE,
				'show_admin_column' => true,
				'labels' => array(
					'name' => 'Download Categories',
					'singular_name' => 'Download Category'
				),
			'hierarchical' => TRUE,
				'rewrite' => array('slug' => 'download-types')
			)
		);
	}

	/**
	* Check the flush rewrite flag and flush the permalinks if necessary
	*
	* @since  1.0.0
	*/
	public function bfd_maybe_flush_rewrite_rules()
	{
		if ( get_option( 'bfd_do_flush_rewrite' ) )
		{
			flush_rewrite_rules();
			delete_option( 'bfd_do_flush_rewrite' );
		}
	}

	/**
	* Create the custom field to display the category short code.
	*
	* @var string $bfd_taxonomy The taxonomy term.
	* @since  1.0.0
	*/
	public function bfd_taxononmy_add_meta_fields( $bfd_taxonomy )
	{
		include_once 'partials/' . $this->plugin_name . '-create-taxonomy-custom-field.php';
	}

	/**
	* Save the taxonomy term meta data to the database.
	*
	* @var int $bfd_term_id
	* @var array $bfd_tax_term
	* @since  1.0.0
	*/
	public function bfd_save_category_meta( $bfd_term_id, $bfd_tax_term )
	{
		if (isset( $_POST['bfd-tax-shortcode'] ) && '' != $_POST['bfd-tax-shortcode']  ) {
				$bfd_category_code = esc_attr__( $_POST['bfd-tax-shortcode'], $this->plugin_name );
				add_term_meta( $bfd_term_id, 'bfd-tax-shortcode', $bfd_category_code, true );
			}
	}

	/**
	* Edit the custom taxonomy term page.
	*
	* @since  1.0.0
	*/
	public function bfd_taxonomy_edit_meta_fields( $bfd_term, $bfd_taxonomy )
	{
		global $bfd_show_category;
		$bfd_show_category = get_term_meta( $bfd_term->term_id, "bfd-tax-shortcode", true );
		include_once 'partials/' . $this->plugin_name . '-edit-taxonomy-custom-field.php';
	}

	/**
	* Save the edited taxonomy term meta data.
	*
	* @var int $bfd_term_id
	* @var array $bfd_tax_term
	* @since  1.0.0
	*/
	public function bfd_update_download_term_meta($bfd_term_id)
	{
		if ( isset( $_POST['bfd-tax-shortcode-update'] )  && '' != $_POST['bfd-tax-shortcode-update']  ) {
			$bfd_group = esc_attr__( $_POST['bfd-tax-shortcode-update'], $this->plugin_name );
			update_term_meta( $bfd_term_id, 'bfd-tax-shortcode', $bfd_group );
		}
	}

	/**
	* Render custom column content within the taxonomy list view for the CPT.
	*
	* @access public
	* @param  Array $bfd_taxonomy_columns The default columns.
	* @return  Array $bfd_taxonomy_columns The filtered columns.
	* @since  1.0.00
	*/
	public function bfd_custom_taxonomy_columns( $bfd_taxonomy_columns )
	{
		$bfd_taxonomy_columns['shortcode'] = __('Shortcode', $this->plugin_name);
		return $bfd_taxonomy_columns;
	}

	/**
	* Populate the taxonomy list view custom column.
	*
	* @param String $bfd_taxonomy_column The name of the column being acted upon.
	* @return  void
	* @since  1.0.00
	*/
	public function bfd_custom_taxonomy_column_content($bfd_value, $bfd_column_name, $bfd_term_id)
	{
		$bfd_shortcode = get_term_meta( $bfd_term_id, "bfd-tax-shortcode", true );
		if ( $bfd_column_name == 'shortcode' ) {
			$bfd_custom_tax_col = '<code><small>' .  $bfd_shortcode . '</small><code>';
			_e($bfd_custom_tax_col);
		}
	}

	/**
	* Add the download meta box for the download post type.
	*
	* @since  1.0.0
	*/
	public function bfd_meta_box_download()
	{
		add_meta_box(
			'bfd-meta-box-download',
			'Download Properties',
			array($this, 'bfd_meta_box_download_display'),
			'bfd_download',
			'normal',
			'high'
		);
	}

	/**
	* Display the download meta box.
	*
	* @var  array $bfd_object
	* @var  array $bfd_meta_box
	* @since  1.0.0
	*/
	public function bfd_meta_box_download_display($bfd_object, $bfd_meta_box)
	{
		// Set up some default values.
		$bfd_defaults = array(
			'file' => '',
			'version' => '1.0',
			'postid' => '',
			'shortcode' => ''
		);
		// Get the post meta.
		$bfd_download = get_post_meta( $bfd_object->ID, 'download', TRUE );

		// Merge the post meta with the defaults.
		$bfd_download = wp_parse_args( $bfd_download, $bfd_defaults );

		// Get the download count.
		$bfd_count = isset( $bfd_object->ID ) ? get_post_meta( $bfd_object->ID, 'download_count', true ) : 0;
		// Include the "Add New" markup partial.
		include_once 'partials/' . $this->plugin_name . '-add-new-cpt-item.php';

	}

	/**
	* Save the data relating to the download.
	*
	* @since  1.0.0
	* @var  int $bfd_post_id
	* @var  array $bfd_post
	*/
	function bfd_meta_box_download_save( $bfd_post_id, $bfd_post ) {
		// Verify that the post type supports the meta box and the nonce before preceding.
		if ( ! isset( $_POST['bfd_meta_box_download'] ) || ! wp_verify_nonce( $_POST['bfd_meta_box_download'], 'bfd_secure_form_data' ) ) {
			return $bfd_post_id;
		}

		// Don't save the data if?
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
		if ( defined( 'DOING_CRON' ) && DOING_CRON ) return;

		// Get the post type object.
		$bfd_post_type = get_post_type_object( $bfd_post->post_type );

		// Check if the current user has permission to edit the post.
		if ( ! current_user_can( $bfd_post_type->cap->edit_post, $bfd_post_id ) ) {
			return $bfd_post_id;
		}

		/*
		 * Add and sanitize the download meta.
		*/
		update_post_meta( $bfd_post_id, 'download', array(
			'file'    => esc_url_raw( $_POST['bfd-download-file'] ),
			'version' => strip_tags( $_POST['bfd-download-version'] ),
			'postid'  => absint( $_POST['bfd-download-custom-post-id'] ),
			'shortcode' => esc_attr__($_POST['bfd-download-post-shortcode'], $this->plugin_name ),

		) );

		// Separate the download count from the rest.
		update_post_meta( $bfd_post_id, 'download_count', absint( $_POST['bfd-download-count'] ) );

	}

	/**
	* Get the download count and update the post meta.
	* Forces a redirect instead of viewing the post as there is no actual post to view.
	*
	* @since  1.0.0
	*/
	public function bfd_count_and_redirect()
	{
		// Return if not a download.
		if ( !is_singular( 'bfd_download' ) )
		{
			return;
		}
		// Get the ID.
		$bfd_download_id = get_queried_object_id();
		// Get the post meta.
		$bfd_postmeta = get_post_meta( $bfd_download_id, 'download', TRUE );
		// Get the download count
		$bfd_count_meta = get_post_meta( $bfd_download_id, 'download_count', TRUE );
		$bfd_count = isset( $bfd_download_id ) ? $bfd_count_meta : 0;
		// Handle the redirect.
		$redirect = isset( $bfd_download_id ) ? $bfd_postmeta['file'] : '';
		if ( !empty( $redirect ) ) :
			wp_redirect( esc_url_raw( $redirect, 301 ) );
			// Update the count.
			update_post_meta( $bfd_download_id, 'download_count', $bfd_count +1 );
			exit;
		else:
			wp_redirect( home_url(), 302 );
			exit;
		endif;
	}

	/**
	* A filter to add custom columns and remove default columns for WP list views.
	*
	* @access public
	* @param  Array $bfd_columns The existing columns
	* @return  Array $bfd_filtered_columns The filtered columns
	* @since  1.0.00
	*/
	public function bfd_modify_columns( $bfd_columns )
	{
		// New columns to add to list.
		$bfd_new_columns = array(
			'file_type' => __('File Type', 'better-file-download'),
			'shortcode' => __('Shortcode', 'better-file-download')
		);

		// Remove unwanted columns.
		unset( $bfd_columns['date'] );

		// Combine existing columns with the newly added columns.
		$bfd_filtered_columns = array_merge( $bfd_columns, $bfd_new_columns );

		// Return the filtered array of columns.
		return $bfd_filtered_columns;
	}

	/**
	* Render custom column content within the list view for the CPT.
	*
	* @access public
	* @param String $bfd_column The name of the column being acted upon.
	* @return  void
	* @since  1.0.00
	*/
	public function bfd_custom_column_content( $bfd_column )
	{
		// Get the post object for this row so that the relevant data is output.
		global $bfd_post;

		// Check that $bfd_column matches the custom column names.
		switch ( $bfd_column ) {
			case 'file_type':
				// Retrieve the file extension.
				$bfd_meta = get_post_meta( get_the_id(), 'download', true );
				$bfd_filetype = isset( $bfd_meta['file'] ) ? pathinfo($bfd_meta['file'], PATHINFO_EXTENSION) : '';
				// Echo the output.
				echo strtoupper( ! empty( $bfd_filetype ) ? $bfd_filetype : __('Unknown file type', $this->plugin_name) );
				break;
			case 'shortcode':
				// Set the output.
				$bfd_shortcode = '<code>[download id="' .  get_the_id() . '"]</code>';
				_e($bfd_shortcode, $this->plugin_name);
			default:
				echo '';
				break;
		}
	}

	/**
	* Make the custom columns sortable.
	*
	* @access public
	* @param  Array $bfd_columns The default columns.
	* @return  Array $bfd_columns The filtered columns.
	* @since  1.0.00
	*/
	public function bfd_custom_columns_sortable( $bfd_columns )
	{
		// Add the columns to the array
		$bfd_columns['file_type'] = 'file_type';

		return $bfd_columns;
	}

	/**
	* Register the administration page for the plugin to the WP dashboard menu.
	*
	* @since  1.0.0
	*/
	public function bfd_add_plugin_admin_menu()
	{
		// Add settings page to the downloads menu.
		add_submenu_page( 'edit.php?post_type=bfd_download' , __('Download Settings', $this->plugin_name), __('Download Settings', $this->plugin_name), 'manage_options', $this->plugin_name, array($this, 'bfd_display_plugin_setup_page') );

	}

	/**
	* Add settings action link to the plugins page.
	*
	* @since  1.0.0
	*/
	public function bfd_add_action_links( $bfd_links )
	{
		$bfd_settings_link = array(
			'<a href="edit.php?post_type=bfd_download&page=better-file-download">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge( $bfd_settings_link, $bfd_links );
	}

	/**
	* Render the settings page for the plugin.
	*
	* @since 1.0.0
	*/
	public function bfd_display_plugin_setup_page()
	{
		include_once(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/' . $this->plugin_name . '-admin-display.php');
	}

	/**
	* Add custom post type to default archives.
	*
	* @since 1.0.0
	*/
	public function bfd_add_custom_post_type_to_archive( $bfd_query )
	{
		if ($bfd_query->is_date) {
			$bfd_query->set( 'post_type', array('post', 'bfd_download') );
		}

		if( is_category() || is_tag() && empty( $bfd_query->query_vars['suppress_filters'] ) ) {
	    $bfd_query->set( 'post_type', array(
	     'post', 'nav_menu_item', 'bfd_download'
			));

		}

		 return $bfd_query;
	}

	/**
	* Add custom post type to Archives widget.
	*
	* @since 1.0.0
	*/
	public function bfd_add_cpt_to_archive_widget( $bfd_where )
	{
		$bfd_where = str_replace( "post_type = 'post'" , "post_type IN ('post', 'bfd_download')", $bfd_where);
		return $bfd_where;
	}

	/**
	* Register the settings for the display options settings.
	*
	* @since  1.0.0
	*/
	public function bfd_register_display_settings()
	{
		//  Register the setting.
		 register_setting(
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings',
		 	array($this, 'bfd_sandbox_register_setting')
		 );

		 // Add a section for the styling settings.
		 add_settings_section(
		 	$this->plugin_name . '-display-settings-section-styling',
		 	__('Styling', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		  // Add a section for the meta settings.
		 add_settings_section(
		 	$this->plugin_name . '-display-settings-section-meta',
		 	__('Meta', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		 // Add a section for the download options settings.
		 add_settings_section(
		 	$this->plugin_name . '-display-settings-section-force',
		 	__('Force New Tab', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		 // Add a section for the archive settings.
		 add_settings_section(
		 	$this->plugin_name . '-display-settings-section-archive',
		 	__('Archives', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		 // Add a section for the search settings.
		 add_settings_section(
		 	$this->plugin_name . '-display-settings-section-search',
		 	__('Search Results', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		 // Add default css override field to the section.
		 add_settings_field(
		 	'bfd-default-css',
		 	__('Use the default CSS styling', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_css_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-styling',
		 	array(
		 		'label_for' => 'bfd-default-css',
		 		'description' => __('Choose whether to use the plugin\'s default styling. This does not affect layout, just the background, fonts and icon colours etc. Alternatively, override the basic styles using the colour selectors below. Further styling can be achieved by applying CSS in the style sheet of your child theme. ', $this->plugin_name)
		 	)
		 );

		 // Add the background colour picker field to the section.
		 add_settings_field(
		 	'bfd-background-colour-picker',
		 	__('Override the background colour', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_colour_picker'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-styling',
		 	array(
		 		'label_for' => 'bfd-background-colour-picker',
		 		'description' => __( 'Select a colour to override the background colour of the download feature box', $this->plugin_name)
		 	)
		 );

		 // Add the background colour picker field to the section.
		 add_settings_field(
			'bfd-font-colour-picker',
		 	__('Override the font and icon colours', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_colour_picker'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-styling',
		 	array(
		 		'label_for' => 'bfd-font-colour-picker',
		 		'description' => __( 'Select a colour to override the font and icon colour of the download feature box', $this->plugin_name)
		 	)
		 );

		 // Add the background colour picker field to the section.
		 add_settings_field(
			 'bfd-hover-colour-picker',
			__('Override the feature box text and icon hover colour', $this->plugin_name),
			array($this, 'bfd_add_settings_field_colour_picker'),
			$this->plugin_name . '-display-settings',
			$this->plugin_name . '-display-settings-section-styling',
			array(
			 	'label_for' => 'bfd-hover-colour-picker',
			 	'description' => __( 'Select a colour to override the text and icon hover event colour', $this->plugin_name)
		 	)
		 );

		 // Add the background colour picker field to the section.
		 add_settings_field(
			'bfd-file-icon-colour-picker',
			__('Override the file type icon colour', $this->plugin_name),
			array($this, 'bfd_add_settings_field_colour_picker'),
			$this->plugin_name . '-display-settings',
			$this->plugin_name . '-display-settings-section-styling',
			 array(
			 	'label_for' => 'bfd-file-icon-colour-picker',
			 	'description' => __( 'Select a colour to override file type icon colour', $this->plugin_name)
		 	)
		 );

		 // Add the file size field to the section.
		 add_settings_field(
		 	'bfd-file-size-display',
		 	__('Display the size of the file', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-meta',
		 	array(
		 		'label_for' => 'bfd-file-size-display',
		 		'description' => __('Choose whether to show the file size to users ', $this->plugin_name)
		 	)
		 );

		 // Add published date field to the section.
		 add_settings_field(
		 	'bfd-published-date-display',
		 	__('Display the published date of the file', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-meta',
		 	array(
		 		'label_for' => 'bfd-published-date-display',
		 		'description' => __('Choose whether to show the published date to users ', $this->plugin_name)
		 	)
		 );

		 // Add published date field to the section.
		 add_settings_field(
		 	'bfd-archive-display',
		 	__('Include downloads in site archives', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-archive',
		 	array(
		 		'label_for' => 'bfd-archive-display',
		 		'description' => __('Choose whether to include the downloads in the archives ', $this->plugin_name)
		 	)
		 );

		  // Add published date field to the section.
		 add_settings_field(
		 	'bfd-archive-widget-display',
		 	__('Include downloads in sidebar archive widget', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-archive',
		 	array(
		 		'label_for' => 'bfd-archive-widget-display',
		 		'description' => __('Choose whether to include the downloads in the sidebar archives widget ', $this->plugin_name)
		 	)
		 );

		 // Force new tab for PDF.
		 add_settings_field(
		 	'bfd-force-new-tab',
		 	__('Force PDF to open in a new tab', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-force',
		 	array(
		 		'label_for' => 'bfd-force-new-tab',
		 		'description' => __('Choose whether to open PDF files in a new tab (Causes a page refresh for all downloads when clicked) ', $this->plugin_name)
		 	)
		 );

		  // Add published date field to the section.
		 add_settings_field(
		 	'bfd-inline-search',
		 	__('Display search results as inline links', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_display_checkbox'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-display-settings-section-search',
		 	array(
		 		'label_for' => 'bfd-inline-search',
		 		'description' => __('Check this box to display the custom search form search results in the inline display format', $this->plugin_name)
		 	)
		 );

		 // Add a section for the settings.
		 add_settings_section(
		 	$this->plugin_name . '-text-settings-section',
		 	__('Replace the text displayed to the user', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-display-settings'
		 );

		 // Overwrite the word "Type" with your own text.
		 add_settings_field(
		 	'bfd_type_textfield',
		 	__('Replace the word "Type"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_type_textfield',
		 		'description' => __('Enter your own text to replace the word "Type". ', $this->plugin_name)
		 	)
		 );

		 // Overwrite the word "Size" with your own text.
		 add_settings_field(
		 	'bfd_size_textfield',
		 	__('Replace the word "Size"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_size_textfield',
		 		'description' => __('Enter your own text to replace the word "Size". ', $this->plugin_name)
		 	)
		 );

		 // Overwrite the word "Published" with your own text.
		 add_settings_field(
		 	'bfd_published_textfield',
		 	__('Replace the word "Published"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_published_textfield',
		 		'description' => __('Enter your own text to replace the word "Published". ', $this->plugin_name)
		 	)
		 );

		 // Overwrite the word "Download" with your own text.
		 add_settings_field(
		 	'bfd_download_textfield',
		 	__('Replace the word "Download"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_download_textfield',
		 		'description' => __('Enter your own text to replace the word "Download". ', $this->plugin_name)
		 	)
		 );

		// Overwrite the word "Downloaded" with your own text.
		 add_settings_field(
		 	'bfd_downloaded_textfield',
		 	__('Replace the word "Downloaded"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_downloaded_textfield',
		 		'description' => __('Enter your own text to replace the word "Downloaded". ', $this->plugin_name)
		 	)
		 );

		 // Overwrite the word "Time" with your own text.
		 add_settings_field(
		 	'bfd_time_textfield',
		 	__('Replace the word "Time"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_time_textfield',
		 		'description' => __('Enter your own text to replace the word "Time". Please note that both "Time" & "Times" must be set for this to work. ', $this->plugin_name)
		 	)
		 );

		 // Overwrite the word "Times" with your own text.
		 add_settings_field(
		 	'bfd_times_textfield',
		 	__('Replace the word "Times"', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_text_variable_field'),
		 	$this->plugin_name . '-display-settings',
		 	$this->plugin_name . '-text-settings-section',
		 	array(
		 		'label_for' => 'bfd_times_textfield',
		 		'description' => __('Enter your own text to replace the word "Times". Please note that both "Time" & "Times" must be set for this to work. ', $this->plugin_name)
		 	)
		 );
	}

	/**
	* Register the settings for the allowable file types.
	*
	* @since  1.0.0
	*/
	public function bfd_register_file_upload_settings()
	{
		//  Register the setting.
		 register_setting(
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings',
		 	array($this, 'bfd_sandbox_register_setting')
		 );

		 // Add a section for the settings.
		 add_settings_section(
		 	$this->plugin_name . '-upload-settings-section',
		 	__('Allow Additional File Types', $this->plugin_name),
		 	array($this, 'bfd_add_settings_section'),
		 	$this->plugin_name . '-upload-settings'
		 );

		 // Add .mts override field to the section.
		 add_settings_field(
		 	'bfd_mts_checkbox',
		 	__('.MTS', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_mts_checkbox',
		 		'description' => __('Allow .mts video files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .vob override field to the section.
		add_settings_field(
		 	'bfd_vob_checkbox',
		 	__('.VOB', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_vob_checkbox',
		 		'description' => __('Allow video object files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .ai override field to the section.
		add_settings_field(
		 	'bfd_ai_checkbox',
		 	__('.AI', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_ai_checkbox',
		 		'description' => __('Allow Adobe Illustrator files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .eps override field to the section.
		add_settings_field(
		 	'bfd_eps_checkbox',
		 	__('.EPS', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_eps_checkbox',
		 		'description' => __('Allow Encapsulated PostScript files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .aep override field to the section.
		add_settings_field(
		 	'bfd_aep_checkbox',
		 	__('.AEP', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_aep_checkbox',
		 		'description' => __('Allow Adobe After Effects files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .dwt override field to the section.
		add_settings_field(
		 	'bfd_dwt_checkbox',
		 	__('.DWT', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_dwt_checkbox',
		 		'description' => __('Allow Adobe Dreamweaver template files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .indd override field to the section.
		add_settings_field(
		 	'bfd_indd_checkbox',
		 	__('.INDD', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_indd_checkbox',
		 		'description' => __('Allow Adobe InDesign layout files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .csv override field to the section.
		add_settings_field(
		 	'bfd_csv_checkbox',
		 	__('.CSV', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_csv_checkbox',
		 		'description' => __('Allow Comma Separated Values files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .xml override field to the section.
		add_settings_field(
		 	'bfd_xml_checkbox',
		 	__('.XML', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_xml_checkbox',
		 		'description' => __('Allow Extensible Markup Language files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .svg override field to the section.
		add_settings_field(
		 	'bfd_svg_checkbox',
		 	__('.SVG', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_svg_checkbox',
		 		'description' => __('Allow Scalable Vector Graphics files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .rar override field to the section.
		add_settings_field(
		 	'bfd_rar_checkbox',
		 	__('.RAR', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_rar_checkbox',
		 		'description' => __('Allow .rar archive files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .gzip | .gz override field to the section.
		add_settings_field(
		 	'bfd_gzip_checkbox',
		 	__('.GZIP & .GZ', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_gzip_checkbox',
		 		'description' => __('Allow .gzip archive files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .iso | .img override field to the section.
		add_settings_field(
		 	'bfd_iso_checkbox',
		 	__('.ISO & .IMG', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_iso_checkbox',
		 		'description' => __('Allow Disk Image files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .ttf | .woff override field to the section.
		add_settings_field(
		 	'bfd_font_checkbox',
		 	__('.TTF & .WOFF', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_font_checkbox',
		 		'description' => __('Allow font files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );


		// Add .epub override field to the section.
		add_settings_field(
		 	'bfd_epub_checkbox',
		 	__('.EPUB', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_epub_checkbox',
		 		'description' => __('Allow ePub files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .azw override field to the section.
		add_settings_field(
		 	'bfd_azw_checkbox',
		 	__('.AZW', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_azw_checkbox',
		 		'description' => __('Allow Amazon Kindle files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );

		// Add .mobi override field to the section.
		add_settings_field(
		 	'bfd_mobi_checkbox',
		 	__('.MOBI', $this->plugin_name),
		 	array($this, 'bfd_add_settings_field_file_type_checkbox'),
		 	$this->plugin_name . '-upload-settings',
		 	$this->plugin_name . '-upload-settings-section',
		 	array(
		 		'label_for' => 'bfd_mobi_checkbox',
		 		'description' => __('Allow .mobi files to be uploaded to the media library. ', $this->plugin_name)
		 	)
		 );
	}


	/**
	* Sandbox and validate the display settings.
	*
	* @since  1.0.0.0
	*/
	public function bfd_sandbox_register_setting( $bfd_input )
	{
		$bfd_new_input = array();
		if ( isset( $bfd_input ) )
		{
			// Loop through the inputs and sanitise the values.
			foreach ( $bfd_input as $key => $value)
			{
				if ($key == 'bfd-background-colour-picker' || 'bfd-font-colour-picker' || 'bfd-hover-colour-picker' || 'bfd-file-icon-colour-picker' )
				{
					$bfd_new_input[$key] =  sanitize_text_field( $value );
				}
				else
				{
					$bfd_new_input[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
				}
			}
		}
		return $bfd_new_input;
	}

	/**
	* Sandbox the display settings section.
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_section()
	{
		return;
	}

	/**
	* Sandbox the check box for the display options.
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_field_css_checkbox( $bfd_args )
	{
		$bfd_field_id = $bfd_args['label_for'];
		$bfd_field_description = $bfd_args['description'];
		$bfd_options = get_option( $this->plugin_name . '-display-settings' );
		$bfd_option = 0;

		if ( ! empty( $bfd_options[$bfd_field_id] ) )
		{
		 	$bfd_option = $bfd_options[$bfd_field_id];
		 }
		 ?>
			<label for="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>">
				<input type="checkbox" name="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" value="1" <?php checked( $bfd_option, true, 1 ); ?> />
				<span class="description"><?php echo esc_html( $bfd_field_description ); ?></span>
			</label>
		 <?php
	}

	/**
	* Sandbox the check box for the display options.
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_field_display_checkbox( $bfd_args )
	{
		$bfd_field_id = $bfd_args['label_for'];
		$bfd_field_description = $bfd_args['description'];
		$bfd_options = get_option( $this->plugin_name . '-display-settings' );
		$bfd_option = 0;

		if ( ! empty( $bfd_options[$bfd_field_id] ) )
		{
		 	$bfd_option = $bfd_options[$bfd_field_id];
		 }
		 ?>
			<label for="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>">
				<input type="checkbox" name="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" value="1" <?php checked( $bfd_option, true, 1 ); ?> />
				<span class="description"><?php echo esc_html( $bfd_field_description ); ?></span>
			</label>
		 <?php
	}

	/**
	* Sandbox the check box for the display options.
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_field_file_type_checkbox( $bfd_args )
	{
		$bfd_field_id = $bfd_args['label_for'];
		$bfd_field_description = $bfd_args['description'];
		$bfd_options = get_option( $this->plugin_name . '-upload-settings' );
		$bfd_option = 0;

		if ( ! empty( $bfd_options[$bfd_field_id] ) )
		{
		 	$bfd_option = $bfd_options[$bfd_field_id];
		 }
		 ?>
			<label for="<?php echo $this->plugin_name . '-upload-settings[' . $bfd_field_id . ']'; ?>">
				<input type="checkbox" name="<?php echo $this->plugin_name . '-upload-settings[' . $bfd_field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-upload-settings[' . $bfd_field_id . ']'; ?>" <?php checked( $bfd_option, true, 1 ); ?> value="1" />
				<span class="description"><?php echo esc_html( $bfd_field_description ); ?></span>
			</label>
		 <?php
	}

	/**
	* Sandbox the text variable fields
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_field_text_variable_field($bfd_args)
	{
	   	$bfd_field_id = $bfd_args['label_for'];
	   	$bfd_field_description = $bfd_args['description'];
	   	$bfd_options = get_option($this->plugin_name . '-display-settings');

	   	if ( ! empty( $bfd_options[$bfd_field_id] ) )
		{
		 	$bfd_option = $bfd_options[$bfd_field_id];
		 }
		 ?>
		 <label for="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id .']'; ?>">
		 	<input type="text" id="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" class="" name="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" value="<?php echo $bfd_option; ?>" />
		 </label>
		 <span class="description"><?php echo esc_html( $bfd_field_description ); ?></span>
		 <?php
	}

	/**
	* Sandbox the colour picker display.
	*
	* @since  1.0.0
	*/
	public function bfd_add_settings_field_colour_picker($bfd_args)
	{
		$bfd_field_id = $bfd_args['label_for'];
		$bfd_field_description = $bfd_args['description'];
		$bfd_options = get_option( $this->plugin_name . '-display-settings' );
		$bfd_option = 'default';

		if ( ! empty( $bfd_options[$bfd_field_id] ) )
		{
		 	$bfd_option = $bfd_options[$bfd_field_id];
		 }
		 ?>
	        <label for="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>">
	            <input type="text" id="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" class="bfd-display-colour-picker" name="<?php echo $this->plugin_name . '-display-settings[' . $bfd_field_id . ']'; ?>" value="<?php echo $bfd_option; ?>" />
	        </label>
	         <span class="description"><?php echo esc_html( $bfd_field_description ); ?></span>
		 <?php
	}

		/**
	* Add file mime types to allowable upload types.
	*
	* @var $bfd_existing_mimes
	* @since  1.0.0
	*/
	function bfd_add_custom_upload_mimes($bfd_existing_mimes){
		$bfd_file_type_options = get_option($this->plugin_name . '-upload-settings');
	    	// Video.
	    	if ( ! empty($bfd_file_type_options['bfd_mts_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'mts' => 'model/vnd.mts' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['mts']);
	    	}
	    	if ( ! empty( $bfd_file_type_options['bfd_vob_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('vob' => 'video/dvd' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['vob']);
	    	}
	    	// Adobe.
	    	if ( ! empty( $bfd_file_type_options['bfd_ai_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('ai' => 'application/postscript' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['ai']);
	    	}
	    	if ( ! empty( $bfd_file_type_options['bfd_eps_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('eps' => 'application/postscript' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['eps']);
	    	}
	    	if ( ! empty($bfd_file_type_options['bfd_aep_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('aep' => ' application/octet-stream' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['aep']);
	    	}
	    	if ( ! empty( $bfd_file_type_options['bfd_dwt_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('dwt' => 'application/octet-stream' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['dwt']);
	    	}
	    	if ( ! empty($bfd_file_type_options['bfd_indd_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array('indd' => 'application/x-indesign' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['indd']);
	    	}
	    	// Spreadsheet.
	    	if ( ! empty($bfd_file_type_options['bfd_csv_checkbox'] ) )
	    	{
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'csv' => 'application/octet-stream' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['csv']);
	    	}
	        // CODE.
	        if ( ! empty($bfd_file_type_options['bfd_svg_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'svg' => 'image/svg+xml' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['svg']);
	    	}
	        if ( ! empty($bfd_file_type_options['bfd_xml_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'xml' => 'application/xml' ));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['xml']);
	    	}
	        // ARCHIVE.
	        if ( ! empty( $bfd_file_type_options['bfd_rar_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'rar' => 'application/x-rar'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['rar']);
	    	}
	        if ( ! empty($bfd_file_type_options['bfd_iso_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'iso' => 'application/x-iso9660-image', 'img' => 'application/octet-stream'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['img|iso']);
	    	}
	        if ( ! empty($bfd_file_type_options['bfd_gzip_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'gz|gzip' => 'application/x-gzip'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['gz|gzip']);
	    	}
	        if ( ! empty($bfd_file_type_options['bfd_font_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'ttf' => 'application/x-font-ttf', 'woff' => 'application/x-font-woff'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['ttf|woff']);
	    	}
	    	if ( ! empty($bfd_file_type_options['bfd_azw_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'azw' => 'application/vnd.amazon.ebook'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['azw']);
	    	}
	        if ( ! empty($bfd_file_type_options['bfd_epub_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'epub' => 'application/epub+zip'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['epub']);
	    	}
	    	if ( ! empty($bfd_file_type_options['bfd_mobi_checkbox'] ) )
	        {
	    		$bfd_existing_mimes = array_merge($bfd_existing_mimes, array( 'mobi' => 'application/x-mobipocket-ebook'));
	    	}
	    	else
	    	{
	    		unset($bfd_existing_mimes['mobi']);
	    	}
	    return $bfd_existing_mimes;
	}

}
