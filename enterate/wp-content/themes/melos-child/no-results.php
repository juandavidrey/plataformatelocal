<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package ThinkUpThemes
 */
?>

				<article id="no-results">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nada encontrado', 'melos' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( __( '¿Listo para realizar su primera publicación? <a href="%1$s">Comience aquí.</a>.', 'melos' ), admin_url( 'post-new.php' ) ); ?></p>

						<?php elseif ( is_search() ) : ?>

							<p><?php _e( 'Lo sentimos, pero nada coincide con sus términos de búsqueda. Por favor, inténtelo de nuevo con algunas palabras clave diferentes.', 'melos' ); ?></p>
							<?php get_search_form(); ?>

						<?php else : ?>

							<p><?php _e( 'Parece que no podermos encontrar lo que busca. Quizás buscar pueda ayudar.', 'melos' ); ?></p>
							<?php get_search_form(); ?>

						<?php endif; ?>
					</div><!-- .entry-content -->
				</article><!-- #no-results -->