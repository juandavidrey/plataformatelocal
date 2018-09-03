<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Initialization function
add_action('init', 'wp_tsas_cpt_init');
function wp_tsas_cpt_init() {
  // Create new News custom post type
    $wp_tsas_labels = array(
    'name'                 => _x('Team Showcase', 'wp-team-showcase-and-slider'),
    'singular_name'        => _x('Team Showcase', 'wp-team-showcase-and-slider'),
    'add_new'              => _x('Add New Member', 'wp-team-showcase-and-slider'),
    'add_new_item'         => __('Add New Member', 'wp-team-showcase-and-slider'),
    'edit_item'            => __('Edit Member', 'wp-team-showcase-and-slider'),
    'new_item'             => __('New Member', 'wp-team-showcase-and-slider'),
    'view_item'            => __('View Member', 'wp-team-showcase-and-slider'),
    'search_items'         => __('Search Members','wp-team-showcase-and-slider'),
    'not_found'            =>  __('No Member found', 'wp-team-showcase-and-slider'),
    'not_found_in_trash'   => __('No Members found in Trash', 'wp-team-showcase-and-slider'), 
    '_builtin'             =>  false, 
    'parent_item_colon'    => '',
    'menu_name'          => _x( 'Team Showcase', 'admin menu', 'wp-team-showcase-and-slider' )
  );
  $wp_tsas_args = array(
    'labels'              => $wp_tsas_labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_ui'             => true,
    'show_in_menu'        => true, 
    'query_var'           => true,
    'rewrite'             => array( 
							'slug' => 'team-showcase',
							'with_front' => false
							),
    'capability_type'     => 'post',
    'has_archive'         => true,
    'hierarchical'        => false,   
	'menu_icon'   		  => 'dashicons-feedback',
    'supports'            => array('title','editor','thumbnail','excerpt')
  );
  register_post_type('team_showcase_post',$wp_tsas_args);
}

add_action( 'init', 'wp_tsas_taxonomies');
function wp_tsas_taxonomies() {
	$labels = array(
		'name'              => _x( 'Category', 'wp-team-showcase-and-slider' ),
		'singular_name'     => _x( 'Category', 'wp-team-showcase-and-slider' ),
		'search_items'      => __( 'Search Category', 'wp-team-showcase-and-slider' ),
		'all_items'         => __( 'All Category', 'wp-team-showcase-and-slider' ),
		'parent_item'       => __( 'Parent Category', 'wp-team-showcase-and-slider' ),
		'parent_item_colon' => __( 'Parent Category', 'wp-team-showcase-and-slider' ),
		'edit_item'         => __( 'Edit Category', 'wp-team-showcase-and-slider' ),
		'update_item'       => __( 'Update Category', 'wp-team-showcase-and-slider' ),
		'add_new_item'      => __( 'Add New Category', 'wp-team-showcase-and-slider' ),
		'new_item_name'     => __( 'New Category Name', 'wp-team-showcase-and-slider' ),
		'menu_name'         => __( 'Category', 'wp-team-showcase-and-slider' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tsas-category' ),
	);

	register_taxonomy( 'tsas-category', array( 'team_showcase_post' ), $args );
}
function wp_tsas_rewrite_flush() {  
		wp_tsas_cpt_init();  
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wp_tsas_rewrite_flush' );
