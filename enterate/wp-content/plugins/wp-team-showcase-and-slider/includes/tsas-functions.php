<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Function to get shortcode designs
 * 
 * @package WP Team Showcase and Slider
 * @since 1.2.5
 */
function tsas_designs() {
    $design_arr = array(
        'design-1'  	=> __('Design 1', 'wp-team-showcase-and-slider'),
        'design-2'  	=> __('Design 2', 'wp-team-showcase-and-slider'),
        'design-3'  	=> __('Design 3', 'wp-team-showcase-and-slider'),        
	);
	return apply_filters('tsas_designs', $design_arr );
}

add_filter( 'manage_edit-team_showcase_post_columns',  'wp_tsas_register_custom_column_headings' );
add_action( 'manage_posts_custom_column',  'wp_tsas_register_custom_columns' );
function wp_tsas_register_custom_columns ( $column_name ) {
		global $wpdb, $post;	

		switch ( $column_name ) {

			case 'image_team':
				$value = '';

				$value = wp_tsas_get_image( get_the_ID(), 40 ,'square');

				echo $value;
			break;

			default:
			break;

		}
	}
	function wp_tsas_register_custom_column_headings ( $defaults ) {
		$new_columns = array( 'image_team' => __( 'Image', 'wp-team-showcase-and-slider' ) );

		$last_item = '';

		if ( isset( $defaults['date'] ) ) { unset( $defaults['date'] ); }

		if ( count( $defaults ) > 2 ) {
			$last_item = array_slice( $defaults, -1 );

			array_pop( $defaults );
		}
		$defaults = array_merge( $defaults, $new_columns );

		if ( $last_item != '' ) {
			foreach ( $last_item as $k => $v ) {
				$defaults[$k] = $v;
				break;
			}
		}

		return $defaults;
	}
	function wp_tsas_get_image ( $id, $size, $style = "circle" ) {
		$response = '';
		if ( has_post_thumbnail( $id ) ) {
			// If not a string or an array, and not an integer, default to 150x9999.
			if ( ( is_int( $size ) || ( 0 < intval( $size ) ) ) && ! is_array( $size ) ) {
				$size = array( intval( $size ), intval( $size ) );
			} elseif ( ! is_string( $size ) && ! is_array( $size ) ) {
				$size = array( 100, 100 );
			}
			$response = get_the_post_thumbnail( intval( $id ), $size, array( 'class' => $style ) );
		} else {
			$testimonial_email = get_post_meta( $id, '_testimonial_email', true );
			if ( '' != $testimonial_email && is_email( $testimonial_email ) ) {
				$response = get_avatar( $testimonial_email, $size );
			}
		}

		return $response;
	}


// Manage Category Shortcode Columns

add_filter("manage_tsas-category_custom_column", 'tsas_category_columns', 10, 3);
add_filter("manage_edit-tsas-category_columns", 'tsas_category_manage_columns'); 
function tsas_category_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'teamshocase_shortcode' => __( 'Team Showcase Category Shortcode', 'wp-team-showcase-and-slider' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
			);
    return $new_columns;
}

function tsas_category_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'tsas_category');
    switch ($column_name) {      

        case 'title':
            echo get_the_title();
        break;
        case 'teamshocase_shortcode':
		echo '[wp-team category="' . $theme_id. '"]<br />';
		echo '[wp-team-slider category="' . $theme_id. '"]';
        break;

        default:
            break;
    }
    return $out;   

}
	
	
	
add_action( 'admin_menu', 'wp_tsas_meta_box_setup');
add_action( 'save_post','wp_tsas_meta_box_save');
	function wp_tsas_meta_box_setup () {
		add_meta_box( 'team-details', __( 'Team Details', 'wp-team-showcase-and-slider' ), 'wp_tsas_meta_box_content' , 'team_showcase_post', 'normal', 'high' );
	}
	function wp_tsas_meta_box_content () {

		global $post_id;
		$fields = get_post_custom( $post_id );
		$field_data = tsas_get_custom_fields_settings();

		$html = '';
		$html .= wp_nonce_field( 'wp_tsas_meta_box_save', 'wp_tsas_noonce' );
		if ( 0 < count( $field_data ) ) {
			$html .= '<table class="form-table">' . "\n";
			$html .= '<tbody>' . "\n";

			foreach ( $field_data as $k => $v ) {
				$data = $v['default'];
				if ( isset( $fields['_' . $k] ) && isset( $fields['_' . $k][0] ) ) {
					$data = $fields['_' . $k][0];

				}

				$html .= '<tr valign="top"><th scope="row"><label for="' . esc_attr( $k ) . '">' . $v['name'] . '</label></th><td><input name="' . esc_attr( $k ) . '" type="text" id="' . esc_attr( $k ) . '" class="regular-text" value="' . esc_attr( $data ) . '" />' . "\n";
				$html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$html .= '</td><tr/>' . "\n";
			}

			$html .= '</tbody>' . "\n";
			$html .= '</table>' . "\n";
		}

		echo $html;
	}
	function wp_tsas_meta_box_save ( $post_id ) {

		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'team_showcase_post' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['wp_tsas_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['wp_tsas_noonce'], 'wp_tsas_meta_box_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}

		$field_data = tsas_get_custom_fields_settings();
		$fields = array_keys( $field_data );

		foreach ( $fields as $f ) {

			${$f} = strip_tags(trim($_POST[$f]));
			
			if ( 'url' == $field_data[$f]['type'] ) {

				${$f} = esc_url( ${$f} );
			}

			if ( get_post_meta( $post_id, '_' . $f ) == '' ) {
				

				add_post_meta( $post_id, '_' . $f, ${$f}, true );
			} elseif( ${$f} != get_post_meta( $post_id, '_' . $f, true ) ) {
				update_post_meta( $post_id, '_' . $f, ${$f} );
			} elseif ( ${$f} == '' ) {
				delete_post_meta( $post_id, '_' . $f, get_post_meta( $post_id, '_' . $f, true ) );
			}
		}
	}
	function tsas_get_custom_fields_settings () {
		$fields = array();

		$fields['member_department'] = array(
		    'name' => __( 'Member Department', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		
		$fields['member_designation'] = array(
		    'name' => __( 'Member Designation', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['skills'] = array(
		    'name' => __( 'Skills', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['member_experience'] = array(
		    'name' => __( 'Member Experience', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		return $fields;
	}
	add_action( 'admin_menu', 'wp_tsas_meta_box_setup_social');
	add_action( 'save_post','wp_tsas_meta_box_social_save');
	function wp_tsas_meta_box_setup_social () {
		add_meta_box( 'team-details-social', __( 'Social Details', 'wp-team-showcase-and-slider' ), 'wp_tsas_meta_box_content_social' , 'team_showcase_post', 'normal', 'high' );
	}
	function wp_tsas_meta_box_content_social () {

		global $post_id;
		$fields = get_post_custom( $post_id );
		$field_data = get_custom_fields_settings_social();

		$html = '';
		$html .= wp_nonce_field( 'wp_tsas_meta_box_social_save', 'wp_tsas_social_noonce' );
		if ( 0 < count( $field_data ) ) {
			$html .= '<table class="form-table">' . "\n";
			$html .= '<tbody>' . "\n";

			foreach ( $field_data as $k => $v ) {
				$data = $v['default'];
				if ( isset( $fields['_' . $k] ) && isset( $fields['_' . $k][0] ) ) {
					$data = $fields['_' . $k][0];

				}

				$html .= '<tr valign="top"><th scope="row"><label for="' . esc_attr( $k ) . '">' . $v['name'] . '</label></th><td><input name="' . esc_attr( $k ) . '" type="URL" id="' . esc_attr( $k ) . '" class="regular-text" value="' . esc_attr( $data ) . '" />' . "\n";
				$html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$html .= '</td><tr/>' . "\n";
			}

			$html .= '</tbody>' . "\n";
			$html .= '</table>' . "\n";
		}

		echo $html;
	}
	function wp_tsas_meta_box_social_save ( $post_id ) {
		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'team_showcase_post' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['wp_tsas_social_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['wp_tsas_social_noonce'], 'wp_tsas_meta_box_social_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}

		$field_data = get_custom_fields_settings_social();
		$fields = array_keys( $field_data );

		foreach ( $fields as $f ) {

			${$f} = strip_tags(trim($_POST[$f]));
			
			if ( 'url' == $field_data[$f]['type'] ) {

				${$f} = esc_url( ${$f} );
			}

			if ( get_post_meta( $post_id, '_' . $f ) == '' ) {
				

				add_post_meta( $post_id, '_' . $f, ${$f}, true );
			} elseif( ${$f} != get_post_meta( $post_id, '_' . $f, true ) ) {
				update_post_meta( $post_id, '_' . $f, ${$f} );
			} elseif ( ${$f} == '' ) {
				delete_post_meta( $post_id, '_' . $f, get_post_meta( $post_id, '_' . $f, true ) );
			}
		}
	}
	function get_custom_fields_settings_social () {
		$fields = array();
		
		$fields['facebook_link'] = array(
		    'name' => __( 'Facebook Link', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['google_link'] = array(
		    'name' => __( 'Google Link', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		$fields['likdin_link'] = array(
		    'name' => __( 'Linkedin Link', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$fields['twitter_link'] = array(
		    'name' => __( 'Twitter Link', 'wp-team-showcase-and-slider' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);

		return $fields;
	}
	