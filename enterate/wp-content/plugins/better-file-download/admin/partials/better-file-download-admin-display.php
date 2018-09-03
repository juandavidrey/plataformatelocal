<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://nikhaddon.com
 * @since      1.0.0
 *
 * @package    Better_File_Download
 * @subpackage Better_File_Download/admin/partials
 */

if (! defined( 'WPINC' )) {	die;}
settings_errors();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<h2><?php _e( 'Better File Download Settings', $this->plugin_name ); ?></h2>
	<hr>
	<h2></h2>
	<div id="bfd-tabs">
		<ul>
	        <li><a href="#bfd-general-info"  class="nav-tab"><span><?php _e("General Info", $this->plugin_name); ?></span></a></li>
	        <li><a href="#bfd-styling" class="nav-tab"><span><?php _e("Display Options", $this->plugin_name); ?></span></a></li>
	        <li><a href="#bfd-file_types" class="nav-tab"><span><?php _e("File Types", $this->plugin_name); ?></span></a></li>
	        <li><a href="#bfd-shortcodes" class="nav-tab"><span><?php _e("Shortcodes", $this->plugin_name); ?></span></a></li>
	        <li><a href="#bfd-css-guide" class="nav-tab"><span><?php _e("CSS Reference", $this->plugin_name); ?></span></a></li>
	    </ul>
		<div id="bfd-general-info">
			<h4><?php _e("Create Downloads", $this->plugin_name); ?></h4>
			<p><?php _e('To create a new download, click on the <strong>Add New</strong> link in the admin sidebar under the <strong>Downloads</strong> menu. Fill in the title field and use the <strong>Upload file</strong> button to select a file from the media library or your computer. At this point you can assign the download to a category and add a featured Image using the meta boxes on the right hand side of the screen. When you are ready, click the <strong>Publish</strong> button to publish the download. ', $this->plugin_name); ?></p>

			<h4><?php _e("Create Categories", $this->plugin_name); ?></h4>
			<p><?php _e('To create a new category, click the <strong>Download Categories</strong> link in the <strong>Downloads</strong> submenu in the sidebar and use the <strong>Add New Category</strong> form on the left hand side of the page.', $this->plugin_name); ?></p>

			<h4><?php _e("Add Downloads to Categories", $this->plugin_name); ?></h4>
			<p><?php _e('Once a category has been created assigning a download to the category can be achieved in the usual WordPress way, by using the <strong>Categories</strong> meta box when adding or editing an individual download.', $this->plugin_name); ?></p>

			<h4><?php _e("Display Options", $this->plugin_name); ?></h4>
			<p><?php _e('To customise the front end display of your downloads, use the settings available on the <strong>Display options</strong> tab on this page. With those settings you can make simple changes to the colour scheme to suit your site and include/exclude additional information relating to your files. Further customisation can be made by implementing custom CSS in your child theme, check the <strong>CSS Reference</strong> tab on this page to see all the various classes and IDs used by the plugin.', $this->plugin_name); ?></p>

			<h4><?php _e("Display Downloads & Categories", $this->plugin_name); ?></h4>
			<p><?php _e('To display your files and categories you will need to use the shortcodes in your posts and pages wherever you would like them to appear, more information and examples can be found on the <strong>Shortcodes</strong> tab on this page.', $this->plugin_name); ?></p>

			<h4><?php _e("Download Count", $this->plugin_name); ?></h4>
			<p><?php _e('To display the number of times a file has been downloaded you will need to set the <code>show_count="true"</code> attribute when using the shortcodes, examples of this can be seen on the <strong>Shortcodes</strong> tab on this page.', $this->plugin_name); ?></p>

			<h4><?php _e("Featured Images", $this->plugin_name); ?></h4>
			<p><?php _e('Featured images may be set for downloads if you would like to include an image such as album artwork or some other image to accompany the download. The featured image may be set in the same manner as it would for any WordPress post or page, by using the "Featured Image" meta box on the add/edit download screen. <br><em>Note: downloads displayed using the inline format shortcode will not display the featured image.</em>', $this->plugin_name); ?></p>

			<h4><?php _e("Archives", $this->plugin_name); ?></h4>
			<p><?php _e('You can choose whether or not you would like to include the downloads in the post archives for your site by using the check boxes at the bottom of the <strong>Display Options</strong> tab. The manner in which they are displayed will depend greatly upon the theme that you are using and you may find that the display is not identical to that of standard posts. A better solution may be to create a standard post and use either the individual or category shortcodes within it if you wish to have a more presentable archive record of the files available for download. The decision is all yours, this functionality has simply been included as an option.', $this->plugin_name); ?></p>
			<p><?php _e("If you choose to include the downloads post type in the archives, the <em>Published</em> date will not show by default. Should you wish to display this date in the archive pages of your child theme you will need to copy archive.php from your parent theme into your child theme folder and change the loop to include this post type. The line you will need to change looks something like this <code>if ( 'post' === get_post_type() ) : ?></code>, you will need to change it to look like the following <code>if ( 'post' === get_post_type()  || 'bfd_download' == get_post_type() ) : ?></code>, please bear in mind that archive.php file may be pulling in templates from other locations. In this case it will most likely be the template file that must be adjusted.", $this->plugin_name); ?></p>

			<h4><?php _e("Search Results", $this->plugin_name); ?></h4>
			<p><?php _e('By default the results of the custom downloads search form are displayed using the <em> box</em> display format. To display them using the <em>inline</em> format, use the <strong>Search Results</strong> check box on the <strong>Display options</strong> tab on this page.', $this->plugin_name); ?></p>

			<h4><?php _e("Allowed File Types", $this->plugin_name); ?></h4>
			<p><?php _e('While the plugin caters for a vast array of different file types, by default the WordPress file upload system does not. Better File Download offers you the option of adding to the list of permissible file types by check marking the boxes available in the <strong>File Types</strong> tab on this page. It is strongly recommended to disable this feature once your file upload has completed to prevent potential attackers from uploading executable files which may put your site or your users at risk.', $this->plugin_name); ?></p>
		</div>
		<div id="bfd-styling">
			<form action="options.php" method="POST">
				<?php
					settings_fields( 'better-file-download-display-settings' );
					do_settings_sections('better-file-download-display-settings' );
					submit_button();
				 ?>
			</form>
		</div>

		<div id="bfd-file_types">
		<form action="options.php" method="POST" name="bfd_file_options">
			<?php
				settings_fields( 'better-file-download-upload-settings' );
				do_settings_sections('better-file-download-upload-settings' );
				submit_button();
			 ?>
		</form>
		</div>

		<div id="bfd-shortcodes">
			<p><?php _e("Better file download supports shortcodes for the display of either individual file downloads or categories of files. Shortcodes may be used in your posts or pages wherever you would like the download links to appear. ", $this->plugin_name); ?></p>
			<p><?php _e("Individual downloads may be displayed in either a styled <em>box</em> format complete with a file type icon and animated download button or they may be displayed <em>inline</em> which takes the form a standard link and will be subject to the default styling applied by your theme.", $this->plugin_name); ?></p>
			<p><?php _e("The <em>block</em> display will take up 100% of its parent container's width by default and will resize and stack to display nicely on smaller screens such as phones and tablets.", $this->plugin_name); ?></p>

			<h4><?php _e("Individual Downloads", $this->plugin_name); ?></h4>
			<p><?php _e('The basic format for showing an individual download is <code>[download id="#"]</code> where # is the ID of the download. A ready to copy shortcode may be found by looking at either the "All Downloads" page or as the download is created, the ID and the shortcode are displayed when adding or editing a download.', $this->plugin_name); ?></p>
			<p><?php _e('The individual download shortcode optionally takes two additional parameters these are <em>show_count</em> and <em>format</em>. The <em>show_count</em> parameter can be added if you would like to display the number of times that the file has been downloaded. The <em>format</em> parameter can be added to the shortcode if you would like the display to be inline, by default downloads are displayed in the box format. So, an individual file with an ID of 142 which is to be displayed inline along with the download count would look like this, <code>[download id="142" show_count="true" format="inline"]</code> ', $this->plugin_name); ?></p>

			<h4><?php _e("Download Categories", $this->plugin_name); ?></h4>
			<p><?php _e('Displaying files available for download grouped by categories such as songs in an album or publications in a collection can be achieved using the download categories shortcode which is <code>[download_category category="#"]</code> where # is the slug of the category. The slug is set by you when creating the category via the "Download Categories" link in the side bar menu, and once set, the shortcode will display just above the "Add New Category" button.', $this->plugin_name); ?></p>
			<p><?php _e('The download category shortcode accepts only one optional parameter, <em>show_count</em>. As with the individual download shortcode this parameter may be set to true if you wish to show the number of times each file in the category has been downloaded. For example, If you would like to display all the available downloads in a category with the slug "april-publications" and also display the download count, the shortcode would look like this <code>[download_category category="april-publications" show_count="true"]</code>', $this->plugin_name); ?></p>

			<h4><?php _e("Search Form", $this->plugin_name); ?></h4>
			<p><?php _e('Better File Downloads offers a custom search form to enable your users to quickly find the file or files that they are after. Results from the search are returned via AJAX and will display directly below the search form itself. To render the search form anywhere in your posts or pages simply use the following shortcode <code>[bfd_download_search]</code>', $this->plugin_name); ?></p>
		</div>

		<div id="bfd-css-guide">
			<p><?php _e('Provided for your reference and usage within your child theme stylesheet. <br><em>Note: Overriding some of these styles may require the usage of the !important rule</em>', $this->plugin_name); ?></p>
			<table class="form-table">
				<tr>
					<th class="row-title"><?php esc_attr_e( 'Selector', $this->plugin_name ); ?></th>
					<th><?php esc_attr_e( 'Affects', $this->plugin_name ); ?></th>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e(	'.bfd-master-block', $this->plugin_name	); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Container for the category display group of downloads', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e('.bfd-download-block', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Feature block containing all visual elements of the category display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e('.bfd-single-download', $this->plugin_name	); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Feature block containing all visual elements of the individual display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code><?php esc_attr_e(
								'.bfd-download-btn', $this->plugin_name	); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Download button with cloud icon, category display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-button-container', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Column containing the download button with cloud icon', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e('.bfd-single-download-btn', $this->plugin_name	); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Download arrow icon button, individual display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-single-button-container', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Column containing the download arrow icon button', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-mime-col', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Column containing the file type icon, both displays', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-download-meta', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Column containing the file title and associated information', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-download-meta p', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The download text, title and associated information', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-download-title', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The title of the download', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-icon-single', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The file icon, individual display. Class used for positioning', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-svg', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'File type icons, Used for positioning and JavaScript colour effects', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-icon', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The download button cloud icon, category display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-svg-container', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'A container for the clickable SVG elements, uses the pseudo after selector ', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e(
								'.bfd-download-thumbnail', $this->plugin_name
							); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The featured image', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e(
								'.bfd-tax-row', $this->plugin_name
							); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The row used for the category display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-single-row', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The row used for the individual display', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-column', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Columns contained within the rows', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-bottom-zero', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'Remove bottom margin and padding on an element', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '#bfd-search-shortcode', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The container for the custom search form', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-search-input-box', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The input field for the custom search form', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-ajax-results', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The container for the search form results delivered via AJAX', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '#bfd-search-button', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The search button for the custom search form', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code><?php esc_attr_e( '#bfd-search-icon', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The search icon for the custom search form. The colour can be changed by setting the fill attribute', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label for="tablecell">
							<code>
								<?php esc_attr_e( '.bfd-inline-download', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The inline format download link', $this->plugin_name ); ?></td>
				</tr>
				<tr valign="top" class="alternate">
					<td scope="row">
						<label for="tablecell">
							<code><?php esc_attr_e( '.bfd-inline-filetype', $this->plugin_name ); ?>
							</code>
						</label>
					</td>
					<td><?php esc_attr_e( 'The emphasised file extension text for the inline format display ', $this->plugin_name ); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
