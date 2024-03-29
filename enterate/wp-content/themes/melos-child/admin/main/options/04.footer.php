<?php
/**
 * Footer functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	FOOTER WIDGETS LAYOUT
---------------------------------------------------------------------------------- */

/* Assign function for widget area 1 */
function thinkup_input_footerw1() {
	echo	'<div id="footer-col1" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w1' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 1 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Assign function for widget area 2 */
function thinkup_input_footerw2() {
	echo	'<div id="footer-col2" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w2' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 2 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};
	echo	'</div>';
}

/* Assign function for widget area 3 */
function thinkup_input_footerw3() {
	echo	'<div id="footer-col3" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w3' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 3 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 4 */
function thinkup_input_footerw4() {
	echo	'<div id="footer-col4" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w4' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 4 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 5 */
function thinkup_input_footerw5() {
	echo	'<div id="footer-col5" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w5' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 5 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}

/* Assign function for widget area 6 */
function thinkup_input_footerw6() {
	echo	'<div id="footer-col6" class="widget-area">';
	if ( ! dynamic_sidebar( 'footer-w6' ) ) {
	echo	'<h3 class="widget-title">' . __( 'Por favor agregue Widgets', 'melos') . '</h3>',
			'<div class="error-icon">',
			'<p>' . __( 'Remueva este mensaje agregando elementos al área del widget 6 del pie de página.', 'melos') . '</p>',
			'<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" title="' . __( 'No Widgets Selected', 'melos' ) . '">' . __( 'Click here to go to Widget area.', 'melos') . '</a>',
			'</div>';
	};	
	echo	'</div>';
}


/* Add Custom Footer Layout */
function thinkup_input_footerlayout() {	
global $thinkup_footer_layout;
global $thinkup_footer_widgetswitch;
					
	if ( $thinkup_footer_widgetswitch !== "1" and ! empty( $thinkup_footer_layout )  ) {
		echo	'<div >';
			if ( $thinkup_footer_layout == "option1" ) {
				echo	'<div  class="option1">';
						thinkup_input_footerw1();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option2" ) {
				echo	'<div  class="option2">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option3" ) {
				echo	'<div  class="option3">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option4" ) {
				echo	'<div  class="option4">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option5" ) {
				echo	'<div  class="option5">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
						thinkup_input_footerw5();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option6" ) {
				echo	'<div  class="option6">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
						thinkup_input_footerw5();
						thinkup_input_footerw6();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option7" ) {
				echo	'<div  class="option7">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option8" ) {
				echo	'<div  class="option8">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option9" ) {
				echo	'<div  class="option9">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option10" ) {
				echo	'<div  class="option10">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option11" ) {
				echo	'<div  class="option11">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option12" ) {
				echo	'<div id="footer-core" class="option12">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option13" ) {
				echo	'<div id="footer-core" class="option13">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option14" ) {
				echo	'<div id="footer-core" class="option14">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option15" ) {
				echo	'<div id="footer-core" class="option15">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option16" ) {
				echo	'<div id="footer-core" class="option16">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option17" ) {
				echo	'<div id="footer-core" class="option17">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
						thinkup_input_footerw5();
				echo	'</div>';
			} else if ( $thinkup_footer_layout == "option18" ) {
				echo	'<div id="footer-core" class="option18">';
						thinkup_input_footerw1();
						thinkup_input_footerw2();
						thinkup_input_footerw3();
						thinkup_input_footerw4();
						thinkup_input_footerw5();

				echo	'</div>';
			}
		echo	'</div>';
	}
}


/* ----------------------------------------------------------------------------------
	SCROLL TO TOP
---------------------------------------------------------------------------------- */
function thinkup_input_footerscroll( $classes ) {
global $thinkup_footer_scroll;

	if ( $thinkup_footer_scroll == '1' ) {
		$classes[] = 'scrollup-on';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_footerscroll');


/* ----------------------------------------------------------------------------------
	COPYRIGHT TEXT
---------------------------------------------------------------------------------- */

function thinkup_input_copyright() {
	echo ('<center> Secretaría Social Del Meta</center>');
//	printf( __( 'Developed by %1$s. Powered by %2$s.', 'melos' ) , '<a href="//www.thinkupthemes.com/" target="_blank">Think Up Themes Ltd</a>', '<a href="//www.wordpress.org/" target="_blank">Wordpress</a>'); 
}


?>