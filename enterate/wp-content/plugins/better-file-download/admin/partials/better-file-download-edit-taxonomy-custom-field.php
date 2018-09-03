<tr class="form-field">
	<th scope="row">
		<label for="bfd-tax-shortcode-update"><?php _e("Category Shortcode", $this->plugin_name); ?></label>
	</th>
	<td>
		<input type="text"  name="bfd-tax-shortcode-update" id="bfd-tax-shortcode-update"  value='<?php echo $bfd_show_category; ?>' readonly />		
		<p class="description"><?php _e("Use this shortcode in your posts or pages to display all the downloads assigned to this category on the front end", $this->plugin_name); ?></em></p>
	</td>
</tr>