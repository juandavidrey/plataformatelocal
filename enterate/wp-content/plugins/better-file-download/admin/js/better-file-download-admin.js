(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(function() {
		// INCLUDE MEDIA UPLOADER FUNCTIONALITY.
		var bfdMediaUploader;
		$('#bfd-upload-file-button').click(function(e) {
			e.preventDefault();
			// If the uploader object has already been created, reopen the dialog.
			if (bfdMediaUploader) 
				{
					bfdMediaUploader.open();
					return;
				}
				// Extend the wp.media object.
				bfdMediaUploader = wp.media.frames.file_frame = wp.media({
					// Set the values through wp_localize_script so that they can be localised/translated.
					title: bfdMediaUploaderVars.title, 
					button: {
						text: bfdMediaUploaderVars.text
					}, multiple: false
				});
				// When a file is selected, grab the URL and set it as the fields value.
				bfdMediaUploader.on('select', function() {
					var attachment = bfdMediaUploader.state().get('selection').first().toJSON();
					$('#bfd-download-file').val(attachment.url);
				});
				// Open the uploader dialog.
				bfdMediaUploader.open();
		});
		// DISPLAY CUSTOM ERROR WARNING FOR BLANK FILE INPUT SUBMISSION.
		//  Get the admin notice element.
		var bfdBlankFieldText = document.getElementById("bfd-required-field"); 
		// Check we are on the right screen.
		if (bfdBlankFieldText) {
			//  Listen for the submit action (Publish).
			$('#post').submit(function(){
				// Get the contents of the file input field.
				var bfdFileInputField = document.getElementById("bfd-download-file").value;				
				// Check if it has content.
				if (bfdFileInputField == "" || bfdFileInputField.length == 0 ) {
					// If its empty, throw the error notice...
					bfdBlankFieldText.style.display = 'block';
					// and prevent the form from submitting.
					return false;
				};
			});
		};
		// POPULATE SHORTCODE FIELD AS CATEGORY SLUG IS CREATED.
		// Get the desired element.
		var bfdCategoryShortCodeField = document.getElementById("bfd-tax-shortcode");
		// Ensure we are on the right screen.
		if (bfdCategoryShortCodeField) {
			// Listen for the keyup event in the category slug text box.
			$('#tag-slug').keyup(function(){
				// Capture its value.
				var bfdSlugVal = $(this).val();
				// Set the static portion of the shortcode with translatable text.
				var bfdCategoryShortCode = bfdShortCodeVars.shortcode;
				// Concatenate the static code with the slug variable.
				$(bfdCategoryShortCodeField).val(bfdCategoryShortCode+bfdSlugVal+'"]');
			});
		};
		// POPULATE SHORTCODE FIELD AS CATEGORY SLUG IS UPDATED.
		// Get the desired element.
		var bfdCategoryShortCodeUpdateField = document.getElementById("bfd-tax-shortcode-update");
		// Ensure we are on the right screen.
		if (bfdCategoryShortCodeUpdateField) {
			// Listen for the keyup event in the category slug text box.
			$('#slug').keyup(function(){
				// Capture its value.
				var bfdSlugValUpdate = $(this).val();
				// Set the static portion of the shortcode with translatable text.
				var bfdCategoryShortCodeUpdateValue = bfdShortCodeVars.shortcode;
				// Concatenate the static code with the slug variable.
				$(bfdCategoryShortCodeUpdateField).val(bfdCategoryShortCodeUpdateValue+bfdSlugValUpdate+'"]');
			});
		};
		// Initialise colour picker
		$('.bfd-display-colour-picker').wpColorPicker();
		// Initialise jQuery UI tabs and set default tab
		$( "#bfd-tabs" ).tabs({ active: 0 });
		// Keep track of the active tab
		var index = 'bfd-active-tab';
	    //  Define friendly data store name
	    var dataStore = window.sessionStorage;
	    var oldIndex = 0;
	    //  Start magic!
	    try {
	        // getter: Fetch previous value
	        oldIndex = dataStore.getItem(index);
	    } catch(e) {}
	 
	    $( "#bfd-tabs" ).tabs({
	        active: oldIndex,
	        activate: function(event, ui) {
	            //  Get future value
	            var newIndex = ui.newTab.parent().children().index(ui.newTab);
	            //  Set future value
	            try {
	                dataStore.setItem( index, newIndex );
	            } catch(e) {}
	        }
	    });
	});
})( jQuery );
