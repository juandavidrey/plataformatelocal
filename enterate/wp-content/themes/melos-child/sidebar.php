<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ThinkUpThemes
 */
?>

		<div id="sidebar">
		<div id="sidebar-core">

			<?php do_action( 'before_sidebar' ); ?>

			<?php if ( ! dynamic_sidebar( thinkup_input_sidebars() ) ) : ?>

				<aside class="widget widget_text">
					<h3 class="widget-title"><?php _e( 'Por favor agregue Widgets', 'melos' ); ?></h3>
					<div class="textwidget"><div class="error-icon">
						<p><?php _e( 'Elimine este mensaje agregando widgets a la barra lateral desde la sección Widgets del área de administración de Wordpress.', 'melos' ); ?></p>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" title="<?php _e( 'Sin widgets seleccionados', 'melos' ); ?>"><?php _e( 'Haga clic aquí para ir al área de widgets.', 'melos' ); ?></a>
					</div></div>
				</aside>

			<?php endif; ?>

		</div>
		</div><!-- #sidebar -->
				