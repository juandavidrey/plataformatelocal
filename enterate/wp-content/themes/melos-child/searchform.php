<?php
/**
 * The template for displaying search forms.
 *
 * @package ThinkUpThemes
 */
?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" class="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Buscar', 'melos' ) . ' &hellip;'; ?>" />
		<input type="submit" class="searchsubmit" name="submit" value="<?php _e( 'Buscar', 'melos' ); ?>" />
	</form>