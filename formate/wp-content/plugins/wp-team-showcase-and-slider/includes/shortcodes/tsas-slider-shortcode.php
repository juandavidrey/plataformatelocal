<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
function get_wp_tsas_showcase_slider( $atts, $content = null ){
    // setup the query
            extract(shortcode_atts(array(
		"limit" => '',	
		"category" => '',		
		"design" => '',
		"slides_column" => '',
		"slides_scroll" => '',
		"dots" => '',
		"arrows" => '',
		"autoplay" => '',
		"autoplay_interval" => '',
		"speed" => '',
		"popup" => '',
	), $atts));
	
	$shortcode_designs 	= tsas_designs();
	$limit 				= !empty($limit) 					? $limit 						: '-1';	
	$category 			= (!empty($category)) 				? explode(',', $category) 		: '';	
	$design 			= ($design && (array_key_exists(trim($design), $shortcode_designs))) ? trim($design) : 'design-1';	
	$gridcol 			= !empty($grid) 					? $grid 						: '3';	
	$teampopup 			= ( $popup == 'false' ) 			? 'false' 						: 'true';
	$dots 				= ( $dots == 'false' ) 				? 'false' 						: 'true';
	$arrows 			= ( $arrows == 'false' ) 			? 'false' 						: 'true';
	$autoplay 			= ( $autoplay == 'false' ) 			? 'false' 						: 'true';
	$autoplay_interval 	= (!empty($autoplay_interval)) 		? $autoplay_interval 			: 3000;
	$speed 				= (!empty($speed)) 					? $speed 						: 300;	
	$slides_column 		= !empty($slides_column) 			? $slides_column 						: 3;
	$slides_scroll 		= !empty($slides_scroll) 			? $slides_scroll 						: 1;

	$popup_class		= ($teampopup == "true") 	? 'tsas-enable-popup' : '';	
	
	$popup_id = wp_tsas_get_unique();
	// Popup Configuration
	$slider_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed'  );	
	
	// Shortcode file
	$design_file_path 	= WP_TSAS_DIR . '/templates/designs/' . $design . '.php';
	$design_file 		= (file_exists($design_file_path)) ? $design_file_path : '';
	
	
	// Enqueus required script
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'wpos-magnific-popup-jquery' );
	wp_enqueue_script( 'tsas-public-script' );		
	
	$popup_html		= '';
	
	ob_start();	
	
	$post_type 		= 'team_showcase_post';
	$orderby 		= 'post_date';
	$order 			= 'DESC';
	$popup_html		= '';

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
	if ( $query->have_posts() ) {		?>
		<div class="wp-tsas-slider-wrap">
			  <div id="wp-tsas-slider-<?php echo $popup_id; ?>" class="wp_teamshowcase_slider <?php echo $popup_class; ?> <?php echo $design; ?>">		  
				<?php  		  
				while ( $query->have_posts() ) : $query->the_post();            	
					$count++;              	
					$css_class="team-slider";               
					$class = '';			
					
					// Include shortcode html file
							if( $design_file ) {						
								include( $design_file );
							}	
						
						if($teampopup == "true") {	
							ob_start();
							include(WP_TSAS_DIR. '/templates/popup/popup-design-1.php');
							$popup_html .= ob_get_clean();	
												
						}
				
				$i++;
				endwhile; 
				 ?>
				 </div>
				 <?php echo $popup_html; // Print Popup HTML ?>			
				<div class="slider-conf-data" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>	
			</div>	
             <?php  
			  wp_reset_query(); 
             return ob_get_clean();
	}
}	

add_shortcode( 'wp-team-slider', 'get_wp_tsas_showcase_slider' );