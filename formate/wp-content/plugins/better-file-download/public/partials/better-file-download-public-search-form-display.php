<div id="bfd-search-shortcode">    
    <form method="get" id="bfd-search-form" class="bfd-search-form" action="<?php echo esc_url( home_url( '/' )); ?>" role="search">    	
    	<div class="bfd-embed-submit-field">
		    <input class="bfd-search-input-box" type="text" name="s" value="" placeholder="enter search keywords&hellip;" maxlength="50" required="required" />	
		    <input type="hidden" name="post_type" value="bfd_download" />	    
		    <button type="submit" id="bfd-search-button" disabled>
		    	<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" version="1.1" id="bfd-search-icon"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-59.000000, -51.000000)" fill="#CCCCCC"><path d="M71.5 62L70.7 62 70.4 61.7C71.4 60.6 72 59.1 72 57.5 72 53.9 69.1 51 65.5 51 61.9 51 59 53.9 59 57.5 59 61.1 61.9 64 65.5 64 67.1 64 68.6 63.4 69.7 62.4L70 62.7 70 63.5 75 68.5 76.5 67 71.5 62 71.5 62ZM65.5 62C63 62 61 60 61 57.5 61 55 63 53 65.5 53 68 53 70 55 70 57.5 70 60 68 62 65.5 62L65.5 62Z"/></g></g></svg>
		    </button>		   
		</div>
    </form>
</div>
<div class="bfd-ajax-results"></div>
