<div class="bfd-single-download" id="bfd-single-download-<?php echo intval( $bfd_args['id'] ) ?>">
	<?php
		// FEATURED IMAGE OPTION, NOT IMPLEMENTED IN THIS RELEASE
		if ( ! empty($bfd_img_cover ))
			{
				?>
				<div class="bfd-tax-row">
				<img src=" <?php _e($bfd_img_cover); ?> " class="bfd-download-thumbnail">
				</div>
				<?php
			}
	 ?>
	<div class="bfd-single-row">

		<?php
		 // Get the title, either from the short code or from the title of the download.
		 $bfd_title = ( $bfd_args['title'] ) ? $bfd_args['title'] : __('Download ') . $bfd_download->post_title;
		 $bfd_current_theme = wp_get_theme();
		 // Show the download count.
		 $bfd_count = sprintf( __('%s', esc_html($bfd_current_theme)), number_format_i18n( (float) $bfd_count_meta ) );
		 $bfd_plural =  _n( 'time', 'times', $bfd_count, $this->plugin_name );

		 ?>
		 <div class="bfd-column bfd-single-button-container">
		 		<a href="<?php echo get_permalink( $bfd_args['id'] ); ?>" title="<?php echo esc_attr( $bfd_title ); ?>" class="bfd-svg-container bfd-single-download-btn" download>
				 	<svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-6.000000, -5.000000)" fill="currentColor"><path d="M26.7 21.7L21.7 21.7 21.7 5 18.3 5 18.3 21.7 13.3 21.7 20 28.3 26.7 21.7 26.7 21.7ZM6.7 31.7L6.7 35 33.3 35 33.3 31.7 6.7 31.7 6.7 31.7Z"/></g></g></svg>
				</a>
		 </div>
		 <div class="bfd-column">
		 	<a href="<?php echo get_permalink( $bfd_args['id'] ); ?>" title="<?php echo esc_attr( $bfd_title ); ?>" class="bfd-download-meta" download>
			 	<p class="bfd-download-title"><strong><?php _e( $bfd_download->post_title); ?></strong></p>
			 	<?php
				 	 if ( ! empty($bfd_options['bfd-published-date-display']) ) {
					 	?>
						 	<p class="bfd-bottom-zero">
						 		<small>
						 			<?php
						 			if( ! empty( $bfd_options['bfd_published_textfield'] ) )
						 			{
						 				echo $bfd_options['bfd_published_textfield'] . ': ';
						 			}
						 			else
						 			{
						 				echo 'Published: ';
						 			}
						 			echo $bfd_published_date; // Use WP user defined date format
						 			// Force date format
						 			//_e( date_i18n( 'F j, Y', $bfd_published_date ) ) ?>
						 		</small>
						 	</p>
					 	<?php
					 }
				 ?>
			 	<p class="bfd-bottom-zero">
			 		<small>
			 			<?php
			 			if( ! empty( $bfd_options['bfd_type_textfield'] ) )
			 			{
			 				echo ' ' . $bfd_options['bfd_type_textfield'] . ':';
			 			}
			 			else
			 			{
			 				echo 'Type: ';
			 			}
			 			_e( $bfd_filetype, $this->plugin_name );
			 			if ( ! empty( $bfd_options['bfd-file-size-display'] ) ) {
			 				if( ! empty($bfd_options['bfd_size_textfield']) )
			 				{
			 					echo ' ' . $bfd_options['bfd_size_textfield'] . ':';
			 				}
			 				else
			 				{
			 					echo ' Size: ';
			 				}
				 			echo $bfd_filesize;
				 		}
			 			echo $bfd_args['show_count'] == "true" ? __(' | ' . $bfd_options['bfd_downloaded_textfield'] .' ') . " " . $bfd_count . " " . $bfd_plural : '';
			 			?>
			 		</small>
			 	</p>
			 </a>
		</div>
		 <div class="bfd-column bfd-mime-col">
		 	<object data="<?php echo plugins_url( '../../colour-svg-file-types/' . $bfd_ext, __FILE__ ) ?>" type="image/svg+xml" class="bfd-svg bfd-icon-img bfd-icon-single"></object>

		</div>
	</div>
</div> <!-- /.single-download -->
<br/>
