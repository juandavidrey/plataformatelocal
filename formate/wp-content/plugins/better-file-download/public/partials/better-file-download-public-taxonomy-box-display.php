<?php

				// Set thumbnail background cover, Use featured image.
				$bfd_img_cover = '';
				if ( get_the_post_thumbnail() != '' )
				{
					$bfd_image_url = get_the_post_thumbnail_url( get_the_id() );
					if ( ! empty( $bfd_image_url ) )
					{
						$bfd_img_cover = $bfd_image_url;
					}
				}

				// Get the options
				$bfd_options = get_option($this->plugin_name . '-display-settings');

				// Set the text variables optionally
				if( ! empty($bfd_options['bfd_published_textfield']) )
				{
					$bfd_published_text = $bfd_options['bfd_published_textfield'];
				}
				else
				{
					$bfd_published_text = 'Published ';
				}

				if( ! empty($bfd_options['bfd_type_textfield']) )
				{
					$bfd_type_text = $bfd_options['bfd_type_textfield'];
				}
				else
				{
					$bfd_type_text = 'Type ';
				}

				if( ! empty($bfd_options['bfd_size_textfield']) )
				{
					$bfd_size_text = $bfd_options['bfd_size_textfield'];
				}
				else
				{
					$bfd_size_text = 'Size ';
				}

				if( ! empty($bfd_options['bfd_download_textfield']) )
				{
					$bfd_download_text = $bfd_options['bfd_download_textfield'];
				}
				else
				{
					$bfd_download_text = 'Download ';
				}

				if( ! empty($bfd_options['bfd_download_textfield']) )
				{
					$bfd_downloaded_text = $bfd_options['bfd_downloaded_textfield'];
				}
				else
				{
					$bfd_downloaded_text = 'Downloaded ';
				}


				// Format HTML content.
				$bfd_format = '<div class="bfd-download-block">';

				if ( ! empty($bfd_img_cover ))
				{
					$bfd_format .= '<div class="bfd-tax-row">';
					$bfd_format .= '<img src=" ' . '%4$s' .' " class="bfd-download-thumbnail">';
					$bfd_format .= '</div>';
				}
				$bfd_format .= '<div class="bfd-tax-row">';
				$bfd_format .= '</div>';
				$bfd_format .= '<div class="bfd-tax-row">';
				$bfd_format .= '<div class="bfd-column bfd-mime-col">';
				$bfd_format .= '<object data="' .  plugins_url( '../../colour-svg-file-types/%6$s', __FILE__ ) .'" type="image/svg+xml" class="bfd-icon-img bfd-svg"></object>';
				$bfd_format .= '</div>';
				$bfd_format .= '<div class="bfd-column">';
				if ( ! empty( $bfd_options['bfd-force-new-tab'] )) {
					$bfd_format .= '<a href="%1$s" title="%2$s" class="post-%3$s bfd-download-meta" target="_blank">';
				}
				else
				{
					$bfd_format .= '<a href="%1$s" title="%2$s" class="post-%3$s bfd-download-meta" download>';
				}
				// $bfd_format .= '<a href="%1$s" title="%2$s" class="post-%3$s bfd-download-meta">';
				$bfd_format .= '<p class="bfd-download-title"><strong>%2$s</strong></p>';
				// $bfd_format .= '</a>';
				if ( ! empty( $bfd_options['bfd-published-date-display'] ) ) {
					$bfd_format .= '<p class="bfd-bottom-zero"><small> %11$s: %9$s </small></p>';
				}
				$bfd_format .= '<p class="bfd-bottom-zero"><small> ';
				$bfd_format .= '%12$s: %10$s ';
				if ( ! empty( $bfd_options['bfd-file-size-display'] ) ) {
					$bfd_format .= '%13$s: %8$s';
				}
				$bfd_format .= '</small></p>';
				if ($bfd_atts['show_count'] == "true" && $bfd_count_meta > 0) {
					$bfd_format .= '<p class="bfd-bottom-zero"><small> ';
					$bfd_format .= ' %15$s %7$s '. $bfd_plural;
					$bfd_format .= '</small></p>';
				}
				$bfd_format .= '</a>';
				$bfd_format .= '</div>';
				$bfd_format .= '<div class="bfd-column bfd-button-container">';
				$bfd_format .= '<a href="%1$s" title="%2$s" class="post-%3$s  bfd-download-btn ">
					<span class="more post-%3$s">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="22" viewBox="0 0 32 22" version="1.1" class="bfd-icon">
						  <g id="Page-1" stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
						    <g id="Artboard-1" transform="translate(-179.000000, -176.000000)" stroke="currentColor">
						      <path d="M204.19 184.68C203.34 180.29 199.55 177 195 177 191.39 177 188.25 179.09 186.69 182.14 182.93 182.55 180 185.79 180 189.72 180 193.93 183.36 197.35 187.5 197.35L203.75 197.35C207.2 197.35 210 194.5 210 190.99 210 187.63 207.44 184.91 204.19 184.68L204.19 184.68 204.19 184.68ZM201.25 188.45L195 194.81 188.75 188.45 192.5 188.45 192.5 183.36 197.5 183.36 197.5 188.45 201.25 188.45 201.25 188.45 201.25 188.45Z" id="Shape"/>
						    </g>
						  </g>
						</svg>
						%14$s
					</span>
					</a>';
				$bfd_format .= '</div>';
				$bfd_format .= '</div>';
				$bfd_format .= '</div>';

				$bfd_post_meta = get_post_meta( get_the_id(), 'download', true);
				$bfd_filetype = isset( $bfd_post_meta['file'] ) ? $bfd_filetype = pathinfo($bfd_post_meta['file'], PATHINFO_EXTENSION) : '';

				$bfd_published_date = get_the_date() ; //strtotime( get_the_date( "Y-m-d" ) );

				// Formatted string post content.
				$bfd_content = sprintf(
					$bfd_format,
					get_permalink(),
					__(get_the_title()),
					get_the_id(),
					$bfd_img_cover,
					// get_the_excerpt(),
					__('Download', 'text-domain'),
					$this->bfd_set_file_icon($bfd_filetype),
					number_format_i18n( (float) $bfd_count_meta ),
					$bfd_filesize,
					$bfd_published_date,
					//date_i18n( 'F j, Y', $bfd_published_date ),
					esc_attr__($bfd_filetype, $this->plugin_name ),
					$bfd_published_text, // %11$
					$bfd_type_text,
					$bfd_size_text,
					$bfd_download_text,
					$bfd_downloaded_text

				);

				// Set an array of each post for the output loop.
				$bfd_result[$bfd_term_slug][] = array(
					'post_id' => get_the_id(),
					'post_content' => $bfd_content,
					'term_name' => $bfd_term_name,
					'term_id' => $bfd_term_id
				);


