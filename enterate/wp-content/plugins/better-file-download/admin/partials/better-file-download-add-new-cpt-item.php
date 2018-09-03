<!-- <input type="hidden" name="bfd-meta-box-download" value="<?php //echo wp_create_nonce( basename( __FILE__ ) ); ?>" /> -->

<br />
<div id="bfd-required-field" class="notice notice-error is-dismissable" style="display:none !important;">
	<p><?php _e("Published downloads must be assigned a title and a selected file") ?></p>
</div>

<table class="form-table">
<?php  wp_nonce_field("bfd_secure_form_data", "bfd_meta_box_download"); ?>

	<p><em><?php _e( "* denotes required field", $this->plugin_name ); ?></em></p>
		
	<tr>
      <th><label for="bfd-download-file"><?php _e("File *", $this->plugin_name); ?></label></th>
      <td>
         <input type="url" id="bfd-download-file" size="60" name="bfd-download-file" value="<?php echo esc_url( $bfd_download['file'] ); ?>" required />
         <input type="button" id="bfd-upload-file-button"  class="button" value="Upload file" />
         <p><span class="description"><?php _e("Upload or link to download file", $this->plugin_name); ?></span></p>
      </td>
   </tr>

   <tr>
      <th><label for="bfd-download-version"><?php _e("Version", $this->plugin_name); ?></label></th>
      <td>
         <input type="text" id="bfd-download-version" name="bfd-download-version" value="<?php echo esc_attr( $bfd_download['version'] ); ?>" size="3" />
      </td>
   </tr>

   <tr>
      <th><label for="bfd-download-count"><?php _e("Download count", $this->plugin_name); ?></label></th>
      <td>		         
         <input type="number" id="bfd-download-count" name="bfd-download-count" value="<?php echo absint( $bfd_count ); ?>" size="5" min="0" />
         <?php printf( '<p><em> %s <b>%d</b> %s </em></p>',  __("This file has been downloaded", $this->plugin_name), absint( $bfd_count ), __(" times", $this->plugin_name) ); ?>
      </td>
   </tr>

   <tr>
      <th><label for="bfd-download-custom-post-id"><?php _e("Download ID", $this->plugin_name); ?></label></th>
      <td>		      
         <label><input type="text" id="bfd-download-custom-post-id" name="bfd-download-custom-post-id" value="<?php echo absint( get_the_id() ); ?>" size="3" readonly />
         <p><span class="description"><?php _e("The ID of the download", $this->plugin_name); ?></span></label></p>
      </td>
   </tr>

   <tr>
   	<th><label for="bfd-download-post-shortcode"><?php _e("Shortcode", $this->plugin_name) ?></label></th>
   	<td>
   		<label><input type="text" id="bfd-download-post-shortcode"  name="bfd-download-post-shortcode" value='[download id="<?php echo absint( get_the_id() ); ?>"]' readonly />
         <p><span class="description"><?php _e("Use this shortcode to display this download on the front end", $this->plugin_name); ?></span></label></p>
   	</td>
   </tr>
</table>
