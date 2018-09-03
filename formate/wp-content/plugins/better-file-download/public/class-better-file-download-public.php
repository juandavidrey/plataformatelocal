<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/public
 * @author     Nik Haddon <nik@nikhaddon.com>
 */
class Better_File_Download_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// OPTIONALLY INCLUDE ALL PLUGIN CSS.
		$bfd_options = get_option($this->plugin_name . '-display-settings');
		if ( ! empty( $bfd_options['bfd-default-css'])) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/better-file-download-public.css', array(), $this->version, 'all' );
		} else {
			// OR JUST THE CORE CSS
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/better-file-download-public-core.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/better-file-download-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script(
			$this->plugin_name,
			'bfd_js', // The name that prefixes the ajaxurl in the js file.
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' )
			)
		);
	}

	/**
	* Set the file icon.
	*
	* @var $bfd_file_type
	* @since  1.0.0
	*/
	public function bfd_set_file_icon($bfd_file_type)
	{
		// List of file extension types and returned icons.
		$bfd_icon_classes = array(
			// Media.
			'avi' => 'avi.svg',
			'm4v' => 'm4v.svg',
			'mov' => 'mov.svg',
			'mkv' => 'mkv.svg',
			'mpg' => 'mpg.svg',
			'mpeg' => 'mpeg.svg',
			'mts' => 'mts.svg',
			'ogv' => 'ogv.svg',
			'wmv' => 'wmv.svg',
			'vob' => 'vob.svg',
		    'jpeg' => 'jpeg.svg',
		    'jpg' => 'jpg.svg',
		    'gif' => 'gif.svg',
		    'ico' => 'ico.svg',
		    'png' => 'png.svg',
		    'mp3' => 'mp3.svg',
		    'mp4' => 'mp4.svg',
		    'm4a' => 'm4a.svg',
		    'ogg' => 'ogg.svg',
		    '3g2' => '3g2.svg',
		    '3gp' => '3gp.svg',
		    'wav' => 'wav.svg',
		    // Adobe file formats.
		    'ai' => 'ai.svg',
		    'eps' => 'eps.svg',
		    'aep' => 'aep.svg',
		    'dwt' => 'dwt.svg',
		    'indd' => 'id.svg',
		    'psd' => 'psd.svg',
		    // Documents.
		    'pdf' => 'pdf.svg',
		    'docx' => 'docx.svg',
		    'doc' => 'doc.svg',
		    'rtf' => 'rtf.svg',
		    'odt' => 'odt.svg',
		    'csv' => 'csv.svg',
		    'xlsx' => 'xlsx.svg',
		    'xls' => 'xls.svg',
		    'pptx' => 'pptx.svg',
		    'ppsx' => 'ppsx.svg',
		    'pps' => 'pps.svg',
		    'ppt' => 'ppt.svg',
		    'txt' => 'txt.svg',
		    // Ebooks
		    'azw' => 'azw.svg',
		    'epub' => 'epub.svg',
		    'mobi' => 'mobi.svg',
		    // Fonts
		    'ttf' => 'ttf.svg',
		    'woff' => 'woff.svg',
		    // Code
		    'css' => 'css.svg',
		    'html' => 'html.svg',
		    'xml' => 'xml.svg',
		    'svg' => 'svg.svg',
		    // Archives.
		    'dmg' => 'dmg.svg',
		    'exe' => 'exe.svg',
		    'iso' => 'iso.svg',
		    'img' => 'img.svg',
		    'gz' => 'gzip.svg',
		    'gzip' => 'gzip.svg',
		    'zip' => 'zip.svg',
		    '7z' => 'zip.svg',
		    'rar' => 'rar.svg',
		);
		// Loop through the array to return the mime type icon
		foreach ($bfd_icon_classes as $bfd_text => $bfd_icon) {
			if (strpos($bfd_file_type, $bfd_text) === 0) {
		      return $bfd_icon;
		    }
		}
		// If the mime type is not in the array return the generic file icon
		return 'file.svg';
	}


	/**
	* Add user defined colour schemes.
	*
	* @var  $bfd_bg_colour The user defined background colour.
	* @var  $bfd_font_colour The user defined font colour.
	* @since  1.0.0
	*/
	public function bfd_user_defined_colour_scheme()
	{
		// Get the options
		$bfd_options = get_option($this->plugin_name . '-display-settings');
		// Check if the user has entered a value for the background colour.
		if (isset( $bfd_options['bfd-background-colour-picker'] ) && $bfd_options['bfd-background-colour-picker'] != 'default' ) {
			// Get the entered value.
			$bfd_bg_colour = $bfd_options['bfd-background-colour-picker'];
			// Echo out the CSS override rule.
			echo '<style> .bfd-download-block, .bfd-single-download{background:' . $bfd_bg_colour .' ;} </style>';
		}
		// Check if the user has entered a value for the font colour.
		if (isset( $bfd_options['bfd-font-colour-picker'] ) && $bfd_options['bfd-font-colour-picker'] != 'default' ) {
			// Get the entered value.
			$bfd_font_colour = $bfd_options['bfd-font-colour-picker'];
			// Echo out the CSS override rule.
			echo '<style> .bfd-download-btn, .bfd-single-download-btn, .bfd-download-meta p, .bfd-single-download-title{color:' . $bfd_font_colour .' !important;} .bfd-download-btn{border: 1px solid ' . $bfd_font_colour . ' !important;} .bfd-single-download-btn{color:' . $bfd_font_colour .' !important;}</style>';
		}
		// Check if the user has entered a value for the file icon colour.
		if (isset( $bfd_options['bfd-file-icon-colour-picker'] ) && $bfd_options['bfd-file-icon-colour-picker'] != 'default' ) {
			// Get the entered value.
			$bfd_file_icon_colour = $bfd_options['bfd-file-icon-colour-picker'];
			// Echo out the JS override rule.
			echo '<script>
				// wait until all the resources are loaded
				window.addEventListener("load", findSVGElements, false);

				// fetches the document for the given embedding_element
				function getSubDocument(embedding_element)
				{
					if (embedding_element.contentDocument)
					{
						return embedding_element.contentDocument;
					}
					else
					{
						var subdoc = null;
						try {
							subdoc = embedding_element.getSVGDocument();
						} catch(e) {}
						return subdoc;
					}
				}

				function findSVGElements()
				{
					var elms = document.querySelectorAll(".bfd-svg");
					for (var i = 0; i < elms.length; i++)
					{
						var subdoc = getSubDocument(elms[i])
						if (subdoc)
							subdoc.getElementById("bfd-svg-color").setAttribute("fill", "' . $bfd_file_icon_colour .'");
					}
				}
			</script>';
		}
		// Check if the user has entered a value for the hover colour.
		if (isset( $bfd_options['bfd-hover-colour-picker'] ) && $bfd_options['bfd-hover-colour-picker'] != 'default' ) {
			// Get the entered value.
			$bfd_hover_colour = $bfd_options['bfd-hover-colour-picker'];
			// Echo out the CSS override rule.
			echo '<style> .bfd-download-btn:hover, .bfd-download-meta:hover > p{color:' . $bfd_hover_colour .'!important;} .bfd-download-btn:hover{border: 1px solid ' . $bfd_hover_colour . ' !important;} .bfd-single-download-btn:hover{color:' . $bfd_hover_colour .' !important;} ';
		}
	}

	/**
	* Create single Download short code.
	*
	* @var  $bfd_atts The short code attributes.
	* @since  1.0.0
	*/
	public function bfd_single_download_shortcode($bfd_atts)
	{
		// Set the default values.
		$bfd_args =  shortcode_atts(
			array(
				__('id', $this->plugin_name) => '',
				__('format', $this->plugin_name) => 'box', // Default value is box, can be set to inline.
				__('title', $this->plugin_name) => '',
				__('show_count', $this->plugin_name) => FALSE,
				__('thumbnail', $this->plugin_name) => FALSE
			),
			$bfd_atts
		) ;

		// If there is no ID, return an error message.
		if (empty( $bfd_args['id'] ))
		{
			return '<em> ' . __("Oops, I cant find that download file", $this->plugin_name) . ' </em>';
		}

		// Get the Download.
		$bfd_download = get_post( $bfd_args['id'] );
		$bfd_post_type = get_post_type($bfd_download );

		// Get the options
		$bfd_options = get_option( $this->plugin_name . '-display-settings' );

		// If the ID doesn't belong to a Download, return an error message.
		if ( $bfd_post_type != 'bfd_download' )
		{
			return '<em> ' . __("Oh no!... That's not a valid download file", $this->plugin_name) . ' </em>';
		}

		/*
		 * FORMAT: box.
		 */
		if ( 'box' == $bfd_args['format'] ) :

			// GEt the meta
			$bfd_meta = get_post_meta( $bfd_args['id'], 'download', TRUE );
			$bfd_count_meta = get_post_meta( $bfd_args['id'], 'download_count', TRUE );

			// Set thumbnail background cover, Use featured image.
			$bfd_image_url = get_the_post_thumbnail_url( $bfd_args['id'] );
				$bfd_img_cover = '';
				if ( get_the_post_thumbnail($bfd_args['id']) != '' )
				{
					if ( ! empty( $bfd_image_url ) )
					{
						$bfd_img_cover = $bfd_image_url;
					}
				}

			// GET FILE EXTENSION.
			$bfd_filetype = pathinfo($bfd_meta['file'], PATHINFO_EXTENSION);
			$bfd_ext = $this->bfd_set_file_icon($bfd_filetype);

			// GET FILE SIZE.
			$bfd_attachment_id = attachment_url_to_postid( $bfd_meta['file'] );
			$bfd_filesize = size_format(filesize( get_attached_file( $bfd_attachment_id ) ), 2 );

			// GET THE DATE.
			$bfd_published_date =  get_the_date() ;

			// Start content.
			ob_start();

			// Include the box format partial.
			include 'partials/' . $this->plugin_name . '-public-box-display.php';

			// Return the content.
			return ob_get_clean();

		endif; // END 'box' == $bfd_args['format']

		/*
		 * Format: inline.
		 */
		if ( 'inline' == $bfd_args['format'] ) :

			// Get the meta
			$bfd_meta = get_post_meta( $bfd_args['id'], 'download', TRUE );
			$bfd_count_meta = get_post_meta( $bfd_args['id'], 'download_count', TRUE );

			// GET FILE EXTENSION.
			$bfd_filetype = pathinfo($bfd_meta['file'], PATHINFO_EXTENSION);

			// Get the title, either from the short code or the title of the download.
			$bfd_title = ( $bfd_args['title'] ) ? $bfd_args['title'] :  $bfd_download->post_title ;

			// Pluralise the meta output.
			 $bfd_plural =  _n( 'time', 'times', $bfd_count_meta, $this->plugin_name );

			 // Append the download count to the title.
			 if ( $bfd_args['show_count'] == 'true' ) {
			 	$bfd_title .= __(' | Downloaded', $this->plugin_name) . ' ' . number_format_i18n( $bfd_count_meta ) . ' ' .  $bfd_plural;
			 }

			 // Get the permalink
			 $bfd_download_id =  get_permalink( $bfd_args['id'] );

			 // Get the title
			 $bfd_download_title = esc_attr__( $bfd_title );

			// Return the data to the user
			 return '<a href=" ' . esc_url($bfd_download_id ) . ' " class="bfd-inline-download" title=" ' . esc_attr__( $bfd_download_title, $this->plugin_name ) .' "> ' . esc_attr__( $bfd_download_title, $this->plugin_name ) .' <em class="bfd-inline-filetype"> - ' . esc_attr__( $bfd_filetype, $this->plugin_name ) . '</em> </a>';

		endif; // END 'inline' == $bfd_args['format'].

		return;
	}

	/**
	* Create the taxonomy shortcode.
	*
	* @return mixed
	* @since  1.0.0
	*/
	public function bfd_taxonomy_download_shortcode($bfd_atts)
	{
		// Set the short code attributes.
		$bfd_atts = shortcode_atts(
			array(
				'category' => '',
				'show_count' => FALSE
			),
			$bfd_atts
		);

		// Collect all the available terms.
		$bfd_terms = get_terms( 'download-categories' );

		// Build the custom query.
		$bfd_args = array(
			'post_type' => 'bfd_download',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			// Add taxonomy query.
			'tax_query' => array( array(
				'taxonomy' => 'download-categories', // Set the taxonomy
				'field' => 'slug',
				'terms' => array( sanitize_title( $bfd_atts['category'] ) )
			))
		);

		// Create the query.
		$bfd_posts = new WP_Query($bfd_args);

		// Prepare posts.
		$bfd_result = array();
		// The loop.
		if ( $bfd_posts->have_posts() )
		{
			while ( $bfd_posts->have_posts() )
			{
				$bfd_posts->the_post();
				// Get the file size.
				$bfd_meta = get_post_meta( get_the_id(), 'download', TRUE );
				$bfd_attachment_id = isset( $bfd_meta['file'] ) ? attachment_url_to_postid( $bfd_meta['file'] ) : '';
				$bfd_filesize = size_format(filesize( get_attached_file( $bfd_attachment_id ) ), 2 );
				// Get the download count.
				$bfd_count_meta = get_post_meta( get_the_id(), 'download_count', TRUE );
				// Pluralise the meta output.
				 $bfd_plural =  _n( 'time', 'times', $bfd_count_meta, $this->plugin_name );
				// Get all items from the taxonomy term.
				$bfd_categories = get_the_terms( get_the_id(), 'download-categories' );
				if ( ! $bfd_categories )
				{
					continue;
				}
				// Loop through the category terms and get the relevant data
				foreach ($bfd_categories as $bfd_key => $bfd_category)
				{
					$bfd_term_name = $bfd_category->name;
					$bfd_term_slug = $bfd_category->slug;
					$bfd_term_id = $bfd_category->term_id;
				}
				// Include the public facing display
				include 'partials/' . $this->plugin_name . '-public-taxonomy-box-display.php';
			}
		}
		// Reset the post data.
		wp_reset_postdata();

		// Check existing output.
		if ( ! $bfd_result )
		{
			return;
		}

		// Output loop.
		$bfd_output = '';
		foreach ($bfd_result as $bfd_slug => $bfd_data)
		{
			$bfd_count = count( $bfd_data );

			for ($bfd_i=0; $bfd_i < $bfd_count; $bfd_i++)
			{
				// Set data as object.
				$bfd_post = ( object ) array_map( 'trim', $bfd_data[$bfd_i] );

				if ( 0 == $bfd_i )
				{
					// Set category id and name.
					$bfd_output .= '<div class="bfd-master-block" id="term-category-' . absint( $bfd_post->term_id ) . '">';
                	$bfd_output .= '<h3>' . esc_html( $bfd_post->term_name ) . '</h3>';
				}

				// Set post id and content.
				 $bfd_output .= '<div id="post-' . absint( $bfd_post->post_id ) . '">' . $bfd_post->post_content . '</div>';
			}
			$bfd_output .= '</div>';
		}
		return $bfd_output;
	}

	/**
	* Create the shortcode for the CPT search form
	*
	* @since  1.0.0
	*/
	public function bfd_cpt_search_shortcode(){
	    ob_start();
	    // Include the public facing display
		include 'partials/' . $this->plugin_name . '-public-search-form-display.php';
		$bfd_cpt_search = ob_get_clean();
		return $bfd_cpt_search;
	}

	/**
	* Build the query and loop through the results of the search form
	*
	* @var   $bfd_search The user input
	* @var   $bfd_query SQL
	* @since 1.0.0
	*/
	public function bfd_ajax_download_search()
	{
			/* Get the search terms entered into the search box. */
		$bfd_search = sanitize_text_field( $_POST[ 'search' ] );

		/* Run a new query including the search string. */
		$bfd_query = new WP_Query(
			array(
				'post_type'	=> 'bfd_download',
				'posts_per_page' => 50,
				's'	=> $bfd_search
			)
			);

			$bfd_options = get_option($this->plugin_name . '-display-settings');
			if ( ! empty($bfd_options['bfd-inline-search']))
			{
				$bfd_format = 'inline';
			}
			else
			{
				$bfd_format = 'box';
			}
			/* Check whether any search results are found. */
			if( $bfd_query->have_posts() )
			{
				/* Loop through each result. */
				while( $bfd_query->have_posts() ) : $bfd_query->the_post();

					/* Add result and link to post to output. */
					echo do_shortcode('[download id="' . get_the_ID() .'" format="'. $bfd_format .'"]<br>');

				/* End loop. */
				endwhile;

			/* No search results found. */
			}
			else
			{
				/* Add no results message to output. */
				echo 'error';

			}

			/* Reset the query. */
			wp_reset_query();

			die();
		}
	}
