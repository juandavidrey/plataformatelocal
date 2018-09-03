<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

	<div class="entry-content title-404">
		<h2><i class="fa fa-ban"></i>404</h2>
		<p><?php _e( 'Lo sentimos, no pudimos encontrar la página solicitada.', 'melos' ); ?><br/><?php _e( 'Intenta usar la función de búsqueda.', 'melos' ) ?></p>
		<?php echo get_search_form(); ?>
	</div>

<?php get_footer(); ?>