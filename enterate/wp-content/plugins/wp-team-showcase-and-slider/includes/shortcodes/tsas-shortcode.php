<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

function get_wp_tsas_showcase( $atts, $content = null ) {
       // setup the query
            extract(shortcode_atts(array(
		"limit" => '',	
		"category" => '',		
		"design" => '',
		"grid" => '',
		"popup" => '',
		
	), $atts));
	
	
	$shortcode_designs 	= tsas_designs();
	$limit 				= !empty($limit) 					? $limit 						: '-1';	
	$category 			= (!empty($category)) 				? explode(',', $category) 		: '';	
	$design 			= ($design && (array_key_exists(trim($design), $shortcode_designs))) ? trim($design) : 'design-1';	
	$gridcol 			= !empty($grid) 					? $grid 						: '3';	
	$teampopup 			= ( $popup == 'false' ) 			? 'false' 						: 'true';	
	
	$popup_class		= ($teampopup == "true") 	? 'tsas-enable-popup' : '';	
	
	$popup_id = wp_tsas_get_unique();
	// Popup Configuration
	$popup_conf = compact('teampopup');	
	
	// Shortcode file
	$design_file_path 	= WP_TSAS_DIR . '/templates/designs/' . $design . '.php';
	$design_file 		= (file_exists($design_file_path)) ? $design_file_path : '';
	
	
	// Enqueus required script
	wp_enqueue_script( 'wpos-magnific-popup-jquery' );
	wp_enqueue_script( 'tsas-public-script' );
	
	
	ob_start();
	
	$post_type 		= 'team_showcase_post';
	$orderby 		= 'post_date';
	$order 			= 'DESC';
				 
        $args = array ( 
            'post_type'      => $post_type, 
            'orderby'        => $orderby, 
            'order'          => $order,
            'posts_per_page' => $limit,  
          
            );
	if($category != ""){
            	$args['tax_query'] = array( array( 'taxonomy' => 'tsas-category', 'field' => 'term_id', 'terms' => $category) );
            }        
      $query = new WP_Query($args);
	  global $post;
      $post_count = $query->post_count;
          $count = 0;		 
		  $i = 1;
		if ( $query->have_posts() ) { ?> 
		  
		  <div class="wp-tsas-wrp <?php echo $popup_class; ?>" id="tsas-wrp-<?php echo $popup_id; ?>">
		  	<div class="wp_teamshowcase_grid <?php echo $design; ?>">
		<?php  				  
             while ( $query->have_posts() ) : $query->the_post();            	
            	$count++;              
                $css_class="team-grid";
                if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == ($count - 1) % $grid ) ) || 1 == $count ) { $css_class .= ' first'; }
                if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == $count % $grid ) ) || $post_count == $count ) { $css_class .= ' last'; }
				if ( is_numeric( $gridcol ) ) {					
					if($gridcol == 1){
						$per_row = 12;
					}
					else if($gridcol == 2){
						$per_row = 6;
					}
					else if($gridcol == 3){
						$per_row = 4;	
					}
					else if($gridcol == 4){
						$per_row = 3;
					}
					 else{
                        $per_row = $gridcol;
                    }
					$class = 'wp-tsas-medium-'.$per_row.' wp-tsas-columns';
				}
				
				// Include shortcode html file
						if( $design_file ) {						
							include( $design_file );
						}	
					
					if($teampopup == "true") {						
						include(WP_TSAS_DIR. '/templates/popup/popup-design-1.php');				
											
					}
			
			$i++;
            endwhile; 
			?>
			</div><!-- end .wp_teamshowcase_grid -->						
		</div><!-- end .wp-tsas-wrp -->
<?php	}        
        wp_reset_query(); 		
		return ob_get_clean();	
}
add_shortcode('wp-team','get_wp_tsas_showcase');