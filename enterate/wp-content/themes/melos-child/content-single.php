<?php
/**
 * The Single Post content template file.
 *
 * @package ThinkUpThemes
 */
?>



		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php thinkup_input_postmedia(); ?>
		<?php thinkup_input_postmeta(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			ESTE ES EL ARCHIVO CONTENT-SINGLE.PHP DE ENTERATE
		</div><!-- .entry-content -->

		</article>

		<div class="clearboth"></div>