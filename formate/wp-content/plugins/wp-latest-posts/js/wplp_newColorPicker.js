(function( $ ) {

    // Add Color Picker to all inputs that have 'color-field' class
    jQuery(document).ready(function($){
        $('.wplp_colorPicker').wpColorPicker();
        $('.wplp_arrow_color').wpColorPicker();
    });

})( jQuery );