<?php

/** WP Latest Posts views class * */
class WPLPBlockSettings
{
    /** Drop-down menu values * */
    private $pagination_values = array(
        'None',
        'Arrows',
        'Arrows with bullets',
        'Bullets'
    );

    private $thumb_img_values = array(
        'Use featured image',
        //'Use first attachment',
        'Use first image'
    );

    public $width_unit_values = array(
        '%',
        'em',
        'px'
    );

    private $field_defaults = false;

    /**
     * WPLPBlockSettings constructor.
     * @param $default
     */
    public function __construct($default)
    {
        $this->field_defaults = $default;
    }

    /**
     * Create navigation tabs in the main configuration screen
     *
     */
    public function editorTabs()
    {
        wp_nonce_field(CUSTOM_POST_NONCE_NAME, CUSTOM_POST_NONCE_NAME . '_nonce');

        //TODO: externalize js, cleanup obsolete/commented code
        ?>

        <div style="background:#fff; border: none;" class="ui-tabs ui-widget ui-widget-content ui-corner-all">

            <script type="text/javascript">
                (function ($) {
                    $(document).ready(function () {
                        $("#wplp_spinner").hide();
                        $("#wplpnavtabs").show();


                        $('#tab-1 ul.hidden').hide();

                        $('.source_type_sel').click(function (e) {
                            $(".wplp_source_type_section").hide();
                            $('#div-' + $(this).val()).show();
                        });

                        $('#div-' + $('input[name=wplp_source_type]:checked').val()).show();

                        /** You can check the all box or any other boxes, but not both **/
                        $('#cat_all').click(function (e) {
                            if ($(this).is(':checked')) {
                                $('.cat_cb').attr('checked', false);
                            }
                        });
                        $('.cat_cb').click(function (e) {
                            if ($(this).is(':checked')) {
                                $('#cat_all').attr('checked', false);
                            }
                        });


                        $('.slider').slider({
                            min: 0,
                            max: 50,
                            slide: function (event, ui) {
                                field = event.target.id.substr(7);
                                $("#" + field).val(ui.value);
                            }
                        });
                        $('.slider').each(function () {
                            var field = this.id.substr(7);
                            $(this).slider({
                                min: 0,
                                max: 50,
                                value: $("#" + field).val(),
                                slide: function (event, ui) {
                                    $("#" + field).val(ui.value);
                                }
                            });
                        });
                        $('#margin_sliders input').change(function () {
                            $('#slider_' + this.id).slider('value', $(this).val());
                        });

                        // slider overlay
                        $('.overlay-slider').slider({
                            min: 0,
                            max: 1,
                            step: 0.1,
                            slide: function (event, ui) {
                                field = event.target.id;
                                $("#" + field).val(ui.value);
                            }
                        });

                        $('#slider_overlay_transparent').each(function () {
                            $(this).slider({
                                min: 0,
                                max: 1,
                                step: 0.1,
                                value: $("#overlayTransparent").val(),
                                slide: function (event, ui) {
                                    $("#overlayTransparent").val(ui.value);
                                }
                            });
                        });
                        $('#overlayTransparent').change(function () {
                            $('.overlay-slider').slider('value', $(this).val());
                        });

                        $('form').attr('enctype', 'multipart/form-data');

                    });
                })(jQuery);
                function console_log(msg) {
                    if (window.console) {
                        window.console.log(msg);
                    }
                }
            </script>
            <span class="spinner" id="wplp_spinner" style="visibility:visible;float:left;margin-top: -8px;"></span>
            <div id="wplpnavtabs" class="wplptabs" style="display: none">
                <ul class="tabs z-depth-1">
                    <li class="tab"><a href="#tab-1" id="content-source"
                                       data-tab-id="content-source">
                            <?php _e('Content source', 'wp-latest-posts'); ?></a>
                    </li>
                    <li class="tab"><a href="#tab-2" id="display-theme"
                                       data-tab-id="display-theme">
                            <?php _e('Display and theme', 'wp-latest-posts'); ?></a>
                    </li>
                    <li class="tab"><a href="#tab-3" id="image-source"
                                       data-tab-id="image-source">
                            <?php _e('Images source', 'wp-latest-posts'); ?></a>
                    </li>
                    <li class="tab"><a href="#tab-4" id="advanced"
                                       data-tab-id="advanced">
                            <?php _e('Advanced', 'wp-latest-posts'); ?></a></li>
                </ul>

                <div id="tab-1" class="metabox_tabbed_content wplptabs">
                    <?php $this->displayContentSourceTab();
                    ?>
                </div>

                <div id="tab-2" class="metabox_tabbed_content">
                    <?php $this->displayDisplayThemeTab(); ?>
                </div>

                <div id="tab-3" class="metabox_tabbed_content">
                    <?php $this->displayImageSourceTab(); ?>
                </div>

                <div id="tab-4" class="metabox_tabbed_content">
                    <?php $this->displayAdvancedTab(); ?>
                </div>

            </div>

        </div>
        <?php
    }


    /**
     * Wp Latest Posts Widget Image source Settings tab
     *
     */
    private function displayImageSourceTab()
    {
        global $post;
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }


        if (isset($settings['thumb_img'])) {
            $thumb_selected[$settings['thumb_img']] = ' selected="selected"';
        }


        $class_enabled_default = "";
        $disabled_image_postion = "";
        if (strpos($settings["theme"], 'masonry-category') !== false ||
            strpos($settings["theme"], 'masonry') !== false ||
            strpos($settings["theme"], 'smooth-effect') !== false ||
            strpos($settings["theme"], 'portfolio') !== false ||
            strpos($settings["theme"], 'timeline') !== false) {
            $class_enabled_default = " disabled";
            $disabled_image_postion = "disabled = 'disabled'";
        }

        echo '<ul class="fields">';

        /** Thumbnail image src drop-down * */
        echo '<li class="field input-field input-select width33"><label for="thumb_img" class="coltab">' .
            __('Select Image', 'wp-latest-posts') . '</label>' .
            '<select id="thumb_img" name="wplp_thumb_img">';
        foreach ($this->thumb_img_values as $value => $text) {
            echo '<option value="' . $value . '" ' .
                (isset($thumb_selected[$value]) ? $thumb_selected[$value] : '') . '>';
            echo htmlspecialchars(__($text, 'wp-latest-posts'));
            echo '</option>';
        }
        echo '</select></li>';

        /**
         * selected
         */
        $imageThumbSizeSelected = '';
        $imageMediumSizeSelected = '';
        $imageLargeSizeSelected = '';

        /**
         * fix notice when update from old version
         */
        if (!isset($settings['image_size'])) {
            $settings['image_size'] = "";
        }

        if ($settings['image_size'] == "thumbnailSize") {
            $imageThumbSizeSelected = 'selected="selected"';
        } elseif ($settings['image_size'] == "mediumSize") {
            $imageMediumSizeSelected = 'selected="selected"';
        } elseif ($settings['image_size'] == "largeSize") {
            $imageLargeSizeSelected = 'selected="selected"';
        }
        /** image Size field * */
        echo '<li class="field input-field input-select width33"><label for="thumb_width" class="coltab">' .
            __('Image size', 'wp-latest-posts') . '</label>' .
            '<select id="wplp_imageThumbSize" name="wplp_image_size">
				<option  ' . $imageThumbSizeSelected . ' value="thumbnailSize" >' .
            __('Thumbnail', 'wp-latest-posts') . '</option>

				<option  ' . $imageMediumSizeSelected . ' value="mediumSize" >' .
            __('Medium', 'wp-latest-posts') . '</option>

                <option  ' . $imageLargeSizeSelected . ' value="largeSize" >' .
            __('Large', 'wp-latest-posts') . '</option>

			</select></li>';
        /*
        * display image width for default theme
        */
        echo '<li class="field ' . $class_enabled_default . '">
        <label for="image_position_width" class="coltab wplp_tooltip" alt="' .
            __('The image width in %, used when the image is loaded on left position', 'wp-latest-posts') . '">' .
            __('Image position width', 'wp-latest-posts') . '</label>' .
            '<input id="image_position_width" ' . $disabled_image_postion .
            ' size="20" type="text" style="width:50px" name="wplp_image_position_width" value="' .
            htmlspecialchars(isset($settings['image_position_width']) ? $settings['image_position_width'] : '') .
            '" class="short-text ' . $class_enabled_default . '" />';

        /** Width units drop-down * */
        echo '</span><span class="width_settings">%</span></li>';

        /** Add an image option to load image with their full height **/
        if (!isset($settings['full_height'])) {
            $settings['full_height'] = 0;
        }
        if (isset($settings['full_height'])) {
            $full_height_checked[$settings['full_height']] = ' checked="checked"';
        }

        echo '<li class="field"><label class="coltab">' .
            __('Full height images', 'wp-latest-posts') . '</label>' .
            '<span class="radioset">' .
            '<input id="full_height1" type="radio" name="wplp_full_height" value="0" ' .
            (isset($full_height_checked[0]) ? $full_height_checked[0] : '') . '/>' .
            '<label for="full_height1">' . __('Off', 'wp-latest-posts') . '</label>' .
            '<input id="full_height2" type="radio" name="wplp_full_height" value="1" ' .
            (isset($full_height_checked[1]) ? $full_height_checked[1] : '') . '/>' .
            '<label for="full_height2">' . __('On', 'wp-latest-posts') . '</label>' .
            '</span></li>';

        do_action('wplp_displayimagesource_crop_add_fields', $settings);
        /** Sliders * */
        // -block---------------------------------- //
        echo '<div id="margin_sliders" class="wpcu-inner-admin-block with-title with-border">';
        echo '<h4>Image margin</h4>';
        echo '<ul class="fields">';
        echo '<li class="field"><label for="margin_left" class="coltab">' .
            __('Margin left', 'wp-latest-posts') . '</label>' .
            '<span id="slider_margin_left" class="slider"></span>' .
            '<input id="margin_left" type="text" name="wplp_margin_left" value="' .
            htmlspecialchars(isset($settings['margin_left']) ? $settings['margin_left'] : '') .
            '" class="short-text" /></li>';
        echo '<li class="field"><label for="margin_top" class="coltab">' .
            __('Margin top', 'wp-latest-posts') . '</label>' .
            '<span id="slider_margin_top" class="slider"></span>' .
            '<input id="margin_top" type="text" name="wplp_margin_top" value="' .
            htmlspecialchars(isset($settings['margin_top']) ? $settings['margin_top'] : '') .
            '" class="short-text" /></li>';
        echo '<li class="field"><label for="margin_right" class="coltab">' .
            __('Margin right', 'wp-latest-posts') . '</label>' .
            '<span id="slider_margin_right" class="slider"></span>' .
            '<input id="margin_right" type="text" name="wplp_margin_right" value="' .
            htmlspecialchars(isset($settings['margin_right']) ? $settings['margin_right'] : '') .
            '" class="short-text" /></li>';
        echo '<li class="field"><label for="margin_bottom" class="coltab">' .
            __('Margin bottom', 'wp-latest-posts') . '</label>' .
            '<span id="slider_margin_bottom" class="slider"></span>' .
            '<input id="margin_bottom" type="text" name="wplp_margin_bottom" value="' .
            htmlspecialchars(isset($settings['margin_bottom']) ? $settings['margin_bottom'] : '') .
            '" class="short-text" /></li>';
        echo '</ul>'; //fields
        echo '</div>'; //wpcu-inner-admin-block
        // ---------------------------------------- //

        if (!class_exists('WPLPAddonAdmin')) {
            echo '<div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2">' .
                '<div class="card-content white-text">' .
                __(
                    'Additional advanced customization features are available with the optional ' .
                    '<a href="http://www.joomunited.com/wordpress-products/wp-latest-posts"
 target="_blank" >pro add-on</a>.'
                ) .
                '</div></div>';
        } else {
            do_action('wplp_imagesource_add_fields', $settings);
        }
    }


    /**
     * Wp Latest Posts Widget Advanced Settings tab
     *
     */
    private function displayAdvancedTab()
    {
        global $post;
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }
        echo '<ul class="fields">';

        echo '<li class="field"><label for="date_fmt" class="coltab">' .
            __('Date format', 'wp-latest-posts') . '</label>' .
            '<input id="date_fmt" type="text" name="wplp_date_fmt" value="' .
            htmlspecialchars(isset($settings['date_fmt']) ? $settings['date_fmt'] : '') .
            '" class="short-text" />
			<a id="wplp_dateFormat" target="_blank" href="http://php.net/manual/en/function.date.php"> ' .
            __('Date format', 'wp-latest-posts') . ' </a>
			</li>';

        echo '<li class="field"><label for="text_content" class="coltab">' .
            __('Text Content', 'wp-latest-posts') . '</label>' .
            '<select name="wplp_text_content" class="browser-default" id="text_content">' .
            '<option value="0" ' . ((isset($settings['text_content']) &&
                $settings['text_content'] == "0") ? "selected" : '') .
            ' class="short-text">' . __('Full content', 'wp-latest-posts') . '</option>' .
            '<option value="1" ' . ((isset($settings['text_content']) &&
                $settings['text_content'] == "1") ? "selected" : '') .
            ' class="short-text">' . __('Excerpt content', 'wp-latest-posts') . '</option>' .
            '</select> </li>';

        echo '<li class="field"><label for="no_post_text" class="coltab">' .
            __('No post text', 'wp-latest-posts') . '</label>' .
            '<input id="no_post_text" type="text" name="wplp_no_post_text" value="' .
            htmlspecialchars(isset($settings['no_post_text']) ? $settings['no_post_text'] : '') .
            '" class="short-text" /></li>';


        echo '</ul>'; //fields

        echo '<hr/><div><label for="custom_css" class="coltab" style="vertical-align:top">' .
            __('Custom CSS', 'wp-latest-posts') . '</label>' .
            '<textarea id="wplp_custom_css" cols="100" rows="5" name="wplp_custom_css">' .
            (isset($settings['custom_css']) ? $settings['custom_css'] : '') . '</textarea></div>';

        if (class_exists('WPLPAddonAdmin')) {
            do_action('wplp_displayadvanced_add_fields', $settings);
        }

        if (isset($post->ID) && isset($post->post_title) && (!empty($post->post_title))) {
            echo '<hr style="clear:both"/><div><label for="phpCodeInsert" class="coltab" style="margin:10px 0 5px">' .
                __('Copy & paste this code into a template file to display this WPLP block', 'wp-latest-posts') .
                '</label>' .
                '<br><textarea readonly id="phpCodeInsert" cols="100" rows="2" name="wplp_phpCodeInsert">' .
                'echo do_shortcode(\'[frontpage_news widget="' . $post->ID . '" name="' .
                $post->post_title . '"]\');' . '</textarea></div>';
        }

        if (!class_exists('WPLPAddonAdmin')) {
            echo '<div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2">' .
                '<div class="card-content white-text">';
            echo '<p>' . __('Looking out for more advanced features?', 'wp-latest-posts') . '</p>';
            echo '<p>' . __('Check out our optional <a 
href="http://www.joomunited.com/wordpress-products/wp-latest-posts" 
target="_blank" style="text-decoration:none;s">Pro add-on</a>.
', 'wp-latest-posts') . '</p>';
            echo '</div></div>';
        }
    }


    /**
     * Wp Latest Posts Widget Display and theme Settings tab
     *
     */
    private function displayDisplayThemeTab()
    {
        global $post;
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }
        if (isset($settings['show_title'])) {
            $show_title_checked[$settings['show_title']] = ' checked="checked"';
        }
        if (isset($settings['pagination'])) {
            $pagination_selected[$settings['pagination']] = ' selected="selected"';
        }
        if (isset($settings['total_width_unit'])) {
            $units_selected[$settings['total_width_unit']] = ' selected="selected"';
        }
        if (!isset($settings['layzyload_default'])) {
            $settings['layzyload_default'] = 0;
        }
        if (isset($settings['layzyload_default'])) {
            $layzyload_default_checked[$settings['layzyload_default']] = ' checked="checked"';
        }
        /*
         *
         * Specific parameters with Mansonry
         *
         */
        $classdisabled = "";
        if (strpos($settings["theme"], 'masonry') || strpos($settings["theme"], 'portfolio')) {
            $classdisabled = " disabled";
        }

        $classdisabledsmooth = "";
        if (strpos($settings["theme"], 'timeline')) {
            $classdisabledsmooth = " disabled";
        }

        echo '<div class="wpcu-inner-admin-col">';

        // -block---------------------------------- //
        echo '<div class="wpcu-inner-admin-block">';
        echo '<ul class="fields">';

        /** Show title radio button set * */
        echo '<li class="field"><label class="coltab">' . __('Show title', 'wp-latest-posts') . '</label>' .
            '<span class="radioset">' .
            '<input id="show_title1" type="radio" name="wplp_show_title" value="0" ' .
            (isset($show_title_checked[0]) ? $show_title_checked[0] : '') . '/>' .
            '<label for="show_title1">' . __('Off', 'wp-latest-posts') . '</label>' .
            '<input id="show_title2" type="radio" name="wplp_show_title" value="1" ' .
            (isset($show_title_checked[1]) ? $show_title_checked[1] : '') . '/>' .
            '<label for="show_title2">' . __('On', 'wp-latest-posts') . '</label>' .
            '</span>';
        echo '</li>';

        /*
         * display number of columns
         */
        echo '<li class="field ' . $classdisabledsmooth . '">
<label for="   amount_cols" class="coltab">' .
            __('Number of columns', 'wp-latest-posts') . '</label>' .
            '<input id="amount_cols" type="text" name="wplp_amount_cols" value="' .
            htmlspecialchars(isset($settings['amount_cols']) ? $settings['amount_cols'] : '3') .
            '" class="short-text" ' . $classdisabledsmooth . '/></li>';
        /*
         * display number of rows
         */
        echo '<li class="field ' . $classdisabled . $classdisabledsmooth . '">
<label for="amount_rows" class="coltab">' .
            __('Number of rows', 'wp-latest-posts') . '</label>' .
            '<input id="amount_rows" type="text" name="wplp_amount_rows" value="' .
            htmlspecialchars(isset($settings['amount_rows']) ? $settings['amount_rows'] : '') .
            '" class="short-text" ' . $classdisabled . $classdisabledsmooth . '/></li>';

        /** Pagination drop-down * */
        echo '<li class="field ' . $classdisabled . $classdisabledsmooth . '">
<label for="pagination" class="coltab">' . __('Pagination', 'wp-latest-posts') . '</label>' .
            '<select id="pagination" name="wplp_pagination" class="browser-default ' .
            $classdisabled . $classdisabledsmooth . '" >';
        foreach ($this->pagination_values as $value => $text) {
            echo '<option value="' . $value . '" ' .
                (isset($pagination_selected[$value]) ? $pagination_selected[$value] : '') . '>';
            echo htmlspecialchars(__($text, 'wp-latest-posts'));
            echo '</option>';
        }
        echo '</select></li>';
        /*
         * display max elements
         */
        echo '<li class="field"><label for="max_elts" class="coltab">' .
            __('Max number of elements', 'wp-latest-posts') . '</label>' .
            '<input id="max_elts" type="text" name="wplp_max_elts" value="' .
            htmlspecialchars(isset($settings['max_elts']) ? $settings['max_elts'] : '') .
            '" class="short-text" /></li>';
        /*
         * display total width
         */
        echo '<li class="field"><label for="total_width" class="coltab">' .
            __('Total width', 'wp-latest-posts') . '</label>' .
            '<input id="total_width" type="text" name="wplp_total_width" value="' .
            htmlspecialchars(isset($settings['total_width']) ? (int)$settings['total_width'] : '') .
            '" class="short-text" />';

        /** Width units drop-down * */
        echo '<select id="total_width_unit" class="browser-default" name="wplp_total_width_unit">';
        foreach ($this->width_unit_values as $value => $text) {
            echo '<option value="' . (isset($value) ? $value : '') . '" ' .
                (isset($units_selected[$value]) ? $units_selected[$value] : '') . '>' .
                $text . '</option>';
        }
        echo '</select></li>';
        /** offset number posts to skip */
        echo '<li class="field"><label for="off_set" class="coltab">' .
            __('Number of posts to skip:', 'wp-latest-posts') . '</label>' .
            '<input id="off_set" type="text" name="wplp_off_set" value="' .
            htmlspecialchars(isset($settings['off_set']) ? (int)$settings['off_set'] : '') . '" class="short-text" />';

        /** Load posts in AJAX radio button set * */
        echo '<li class="field lazyloadConfig"><label class="coltab">' . __('Lazy load image', 'wp-latest-posts') .'</label>'.
            '<span class="radioset">' .
            '<input id="lazyload_default1" type="radio" name="wplp_layzyload_default" value="0" ' .
            (isset($layzyload_default_checked[0]) ? $layzyload_default_checked[0] : '') . '/>' .
            '<label for="lazyload_default1">' . __('Off', 'wp-latest-posts') . '</label>' .
            '<input id="lazyload_default2" type="radio" name="wplp_layzyload_default" value="1" ' .
            (isset($layzyload_default_checked[1]) ? $layzyload_default_checked[1] : '') . '/>' .
            '<label for="lazyload_default2">' . __('On', 'wp-latest-posts') . '</label>' .
            '</span>';
        echo '</li>';

        do_action('wplp_display_button_loadmore', $settings);

        do_action('wplp_display_force_hover_icon', $settings);

        do_action('wplp_display_open_link', $settings);

        echo '<div class="on_icon_selector">';
        do_action('wplp_display_icon_selector', $settings);
        echo '</div>';
        do_action('wplp_displayandtheme_add_fields', $settings);
        echo '</ul>'; //fields
        echo '</div>'; //wpcu-inner-admin-block

        // -block---------------------------------- // readmore option
        $button_sizes = array('Small', 'Medium','Large');

        if (isset($settings['readmore_size'])) {
            $readmore_size_selected[$settings['readmore_size']] = ' selected="selected"';
        }
        if (!isset($settings['readmore_text_color'])) {
            $settings['readmore_text_color'] = '#0c0c0c';
        }
        echo '<div id="wplp_readmore_config" class="wpcu-inner-admin-block with-title with-border">';
        echo '<h4>Read more button</h4>';
        echo '<ul class="fields">';
        // button color
        echo '<li class="field"><label class="coltab" style="vertical-align: top;">' .
            __('Button color', 'wp-latest-posts') . '</label>';
        echo '<div id="readmoreBgColor" style="display: inline-block">
                  <input id="readmoreBgColor" name="wplp_readmore_bg_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['readmore_bg_color']) ? $settings['readmore_bg_color'] : 'transparent') . '"/>
            </div>';
        echo '</li>';
        // button text color
        echo '<li class="field"><label class="coltab" style="vertical-align: top;">' .
            __('Button text color', 'wp-latest-posts') . '</label>';
        echo '<div id="readmoreTextColor" style="display: inline-block">
                  <input id="readmoreTextColor" name="wplp_readmore_text_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['readmore_text_color']) ? $settings['readmore_text_color'] : '#0c0c0c') . '"/>
            </div>';
        echo '</li>';
        // Button size drop-down
        echo '<li class="field">
            <label for="readmore_size" class="coltab" style="vertical-align: middle;">' .
            __('Button size', 'wp-latest-posts') . '</label>' .
            '<select id="readmore_size" name="wplp_readmore_size" style="display: inline-block" class="browser-default" >';
        foreach ($button_sizes as $value => $text) {
            echo '<option value="' . $value . '" ' .
                (isset($readmore_size_selected[$value]) ? $readmore_size_selected[$value] : '') . '>';
            echo htmlspecialchars(__($text, 'wp-latest-posts'));
            echo '</option>';
        }
        echo '</select></li>';

        /*
        * display radius border readmore
        */
        echo '<li class="field">
            <label for="readmore_border" class="coltab">' .
            __('Button border radius', 'wp-latest-posts') . '</label>' .
            '<input id="readmore_border" type="text" name="wplp_readmore_border" value="' .
            htmlspecialchars(isset($settings['readmore_border']) ? $settings['readmore_border'] : '0') .
            '" class="short-text" style="width: 10%"/>'.
            '<span class="readmore-border-param">'.__('px', 'wp-latest-posts') .'</span>'
            .'</li>';
        echo '</ul>';    //fields
        echo '</div>';    //wpcu-inner-admin-block
// ---------------------------------------- //

        // -block---------------------------------- // Add overlay color on image mouse hover
        echo '<div id="wplp_overlay_default_config" class="wpcu-inner-admin-block with-title with-border">';
        echo '<h4>Overlay image</h4>';
        echo '<ul class="fields">';
        // overlay color
        echo '<li class="field"><label class="coltab" style="vertical-align: middle;">' .
            __('Overlay color', 'wp-latest-posts') . '</label>';
        echo '<div id="overlayColor" style="display: inline-block">
                  <input id="overlayColor" name="wplp_overlay_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['overlay_color']) ? $settings['overlay_color'] : 'transparent') . '"/>
            </div>';
        echo '</li>';
        // overlay transparent
        echo '<li class="field"><label class="coltab" style="vertical-align: middle;">' .
            __('Overlay transparency', 'wp-latest-posts') . '</label>';
        echo '<span id="slider_overlay_transparent" class="overlay-slider"></span>' .
            '<input id="overlayTransparent" type="text" name="wplp_overlay_transparent" value="' .
            htmlspecialchars(isset($settings['overlay_transparent']) ? $settings['overlay_transparent'] : '0') .
            '" class="short-text" />';
        echo '</li>';
        // overlay icon
        echo '<li class="field">
            <label for="overlayIcon" class="coltab" style="vertical-align: middle;">' .
            __('Overlay icon', 'wp-latest-posts') . '</label>' .
            '<input id="overlayIcon" class="btn" type="button" value="' .
            __('Choose an icon', 'wp-latest-posts') . '" />';
        echo '<input id="overlayIconSelected" name="wplp_overlay_icon_selected"
         type="text" readonly="true" value="'.
            htmlspecialchars(isset($settings['overlay_icon_selected']) ? $settings['overlay_icon_selected'] : 'f109')
            .'" class="short-text"/>';
        echo '</li>';
        // icon color
        echo '<li class="field"><label class="coltab" style="vertical-align: middle;">' .
            __('Icon color', 'wp-latest-posts') . '</label>';
        echo '<div id="overIconColor" style="display: inline-block">
                  <input id="overIconColor" name="wplp_over_icon_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['over_icon_color']) ? $settings['over_icon_color'] : '#ff0000') . '"/>
            </div>';
        echo '</li>';
        // icon color
        echo '<li class="field"><label class="coltab" style="vertical-align: middle;">' .
            __('Icon background color', 'wp-latest-posts') . '</label>';
        echo '<div id="overBGIconColor" style="display: inline-block">
                  <input id="overBGIconColor" name="wplp_over_bg_icon_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['over_bg_icon_color']) ? $settings['over_bg_icon_color'] : '#2C8FC7') . '"/>
            </div>';
        echo '</li>';
        ?>
        <div class="popUp" id="overlayIconList">
            <span class="wplp-overlay-close">×</span>
            <h4>Admin Menu</h4>
            <span alt="f333" class="dashicons dashicons-menu"></span>
            <span alt="f319" class="dashicons dashicons-admin-site"></span>
            <span alt="f226" class="dashicons dashicons-dashboard"></span>
            <span alt="f109" class="dashicons dashicons-admin-post"></span>
            <span alt="f104" class="dashicons dashicons-admin-media"></span>
            <span alt="f103" class="dashicons dashicons-admin-links"></span>
            <span alt="f105" class="dashicons dashicons-admin-page"></span>
            <span alt="f101" class="dashicons dashicons-admin-comments"></span>
            <span alt="f100" class="dashicons dashicons-admin-appearance"></span>
            <span alt="f106" class="dashicons dashicons-admin-plugins"></span>
            <span alt="f110" class="dashicons dashicons-admin-users"></span>
            <span alt="f107" class="dashicons dashicons-admin-tools"></span>
            <span alt="f108" class="dashicons dashicons-admin-settings"></span>
            <span alt="f112" class="dashicons dashicons-admin-network"></span>
            <span alt="f102" class="dashicons dashicons-admin-home"></span>
            <span alt="f111" class="dashicons dashicons-admin-generic"></span>
            <span alt="f148" class="dashicons dashicons-admin-collapse"></span>
            <span alt="f536" class="dashicons dashicons-filter"></span>
            <span alt="f540" class="dashicons dashicons-admin-customizer"></span>
            <span alt="f541" class="dashicons dashicons-admin-multisite"></span>
            <h4>Welcome Screen</h4>
            <span alt="f119" class="dashicons dashicons-welcome-write-blog"></span>
            <span alt="f113" class="dashicons dashicons-welcome-add-page"></span>
            <span alt="f115" class="dashicons dashicons-welcome-view-site"></span>
            <span alt="f116" class="dashicons dashicons-welcome-widgets-menus"></span>
            <span alt="f117" class="dashicons dashicons-welcome-comments"></span>
            <span alt="f118" class="dashicons dashicons-welcome-learn-more"></span>
            <h4>Post Formats</h4>
            <span alt="f123" class="dashicons dashicons-format-aside"></span>
            <span alt="f128" class="dashicons dashicons-format-image"></span>
            <span alt="f161" class="dashicons dashicons-format-gallery"></span>
            <span alt="f126" class="dashicons dashicons-format-video"></span>
            <span alt="f130" class="dashicons dashicons-format-status"></span>
            <span alt="f122" class="dashicons dashicons-format-quote"></span>
            <span alt="f125" class="dashicons dashicons-format-chat"></span>
            <span alt="f127" class="dashicons dashicons-format-audio"></span>
            <span alt="f306" class="dashicons dashicons-camera"></span>
            <span alt="f232" class="dashicons dashicons-images-alt"></span>
            <span alt="f233" class="dashicons dashicons-images-alt2"></span>
            <span alt="f234" class="dashicons dashicons-video-alt"></span>
            <span alt="f235" class="dashicons dashicons-video-alt2"></span>
            <span alt="f236" class="dashicons dashicons-video-alt3"></span>
            <h4>Media</h4>
            <span alt="f501" class="dashicons dashicons-media-archive"></span>
            <span alt="f500" class="dashicons dashicons-media-audio"></span>
            <span alt="f499" class="dashicons dashicons-media-code"></span>
            <span alt="f498" class="dashicons dashicons-media-default"></span>
            <span alt="f497" class="dashicons dashicons-media-document"></span>
            <span alt="f496" class="dashicons dashicons-media-interactive"></span>
            <span alt="f495" class="dashicons dashicons-media-spreadsheet"></span>
            <span alt="f491" class="dashicons dashicons-media-text"></span>
            <span alt="f490" class="dashicons dashicons-media-video"></span>
            <span alt="f492" class="dashicons dashicons-playlist-audio"></span>
            <span alt="f493" class="dashicons dashicons-playlist-video"></span>
            <span alt="f522" class="dashicons dashicons-controls-play"></span>
            <span alt="f523" class="dashicons dashicons-controls-pause"></span>
            <span alt="f519" class="dashicons dashicons-controls-forward"></span>
            <span alt="f517" class="dashicons dashicons-controls-skipforward"></span>
            <span alt="f518" class="dashicons dashicons-controls-back"></span>
            <span alt="f516" class="dashicons dashicons-controls-skipback"></span>
            <span alt="f515" class="dashicons dashicons-controls-repeat"></span>
            <span alt="f521" class="dashicons dashicons-controls-volumeon"></span>
            <span alt="f520" class="dashicons dashicons-controls-volumeoff"></span>
            <h4>Image Editing</h4>
            <span alt="f165" class="dashicons dashicons-image-crop"></span>
            <span alt="f531" class="dashicons dashicons-image-rotate"></span>
            <span alt="f166" class="dashicons dashicons-image-rotate-left"></span>
            <span alt="f167" class="dashicons dashicons-image-rotate-right"></span>
            <span alt="f168" class="dashicons dashicons-image-flip-vertical"></span>
            <span alt="f169" class="dashicons dashicons-image-flip-horizontal"></span>
            <span alt="f533" class="dashicons dashicons-image-filter"></span>
            <span alt="f171" class="dashicons dashicons-undo"></span>
            <span alt="f172" class="dashicons dashicons-redo"></span>
            <h4>TinyMCE</h4>

            <span alt="f200" class="dashicons dashicons-editor-bold"></span>
            <span alt="f201" class="dashicons dashicons-editor-italic"></span>
            <span alt="f203" class="dashicons dashicons-editor-ul"></span>
            <span alt="f204" class="dashicons dashicons-editor-ol"></span>
            <span alt="f205" class="dashicons dashicons-editor-quote"></span>
            <span alt="f206" class="dashicons dashicons-editor-alignleft"></span>
            <span alt="f207" class="dashicons dashicons-editor-aligncenter"></span>
            <span alt="f208" class="dashicons dashicons-editor-alignright"></span>
            <span alt="f209" class="dashicons dashicons-editor-insertmore"></span>
            <span alt="f210" class="dashicons dashicons-editor-spellcheck"></span>
            <span alt="f211" class="dashicons dashicons-editor-expand"></span>
            <span alt="f506" class="dashicons dashicons-editor-contract"></span>
            <span alt="f212" class="dashicons dashicons-editor-kitchensink"></span>
            <span alt="f213" class="dashicons dashicons-editor-underline"></span>
            <span alt="f214" class="dashicons dashicons-editor-justify"></span>
            <span alt="f215" class="dashicons dashicons-editor-textcolor"></span>
            <span alt="f216" class="dashicons dashicons-editor-paste-word"></span>
            <span alt="f217" class="dashicons dashicons-editor-paste-text"></span>
            <span alt="f218" class="dashicons dashicons-editor-removeformatting"></span>
            <span alt="f219" class="dashicons dashicons-editor-video"></span>
            <span alt="f220" class="dashicons dashicons-editor-customchar"></span>
            <span alt="f221" class="dashicons dashicons-editor-outdent"></span>
            <span alt="f222" class="dashicons dashicons-editor-indent"></span>
            <span alt="f223" class="dashicons dashicons-editor-help"></span>
            <span alt="f224" class="dashicons dashicons-editor-strikethrough"></span>
            <span alt="f225" class="dashicons dashicons-editor-unlink"></span>
            <span alt="f320" class="dashicons dashicons-editor-rtl"></span>
            <span alt="f474" class="dashicons dashicons-editor-break"></span>
            <span alt="f475" class="dashicons dashicons-editor-code"></span>
            <span alt="f476" class="dashicons dashicons-editor-paragraph"></span>
            <span alt="f535" class="dashicons dashicons-editor-table"></span>
            <h4>Posts Screen</h4>
            <span alt="f135" class="dashicons dashicons-align-left"></span>
            <span alt="f136" class="dashicons dashicons-align-right"></span>
            <span alt="f134" class="dashicons dashicons-align-center"></span>
            <span alt="f138" class="dashicons dashicons-align-none"></span>
            <span alt="f160" class="dashicons dashicons-lock"></span>
            <span alt="f528" class="dashicons dashicons-unlock"></span>
            <span alt="f145" class="dashicons dashicons-calendar"></span>
            <span alt="f508" class="dashicons dashicons-calendar-alt"></span>
            <span alt="f177" class="dashicons dashicons-visibility"></span>
            <span alt="f530" class="dashicons dashicons-hidden"></span>
            <span alt="f173" class="dashicons dashicons-post-status"></span>
            <span alt="f464" class="dashicons dashicons-edit"></span>
            <span alt="f182" class="dashicons dashicons-trash"></span>
            <span alt="f537" class="dashicons dashicons-sticky"></span>
            <h4>Sorting</h4>
            <span alt="f504" class="dashicons dashicons-external"></span>
            <span alt="f142" class="dashicons dashicons-arrow-up"></span>
            <span alt="f140" class="dashicons dashicons-arrow-down"></span>
            <span alt="f139" class="dashicons dashicons-arrow-right"></span>
            <span alt="f141" class="dashicons dashicons-arrow-left"></span>
            <span alt="f342" class="dashicons dashicons-arrow-up-alt"></span>
            <span alt="f346" class="dashicons dashicons-arrow-down-alt"></span>
            <span alt="f344" class="dashicons dashicons-arrow-right-alt"></span>
            <span alt="f340" class="dashicons dashicons-arrow-left-alt"></span>
            <span alt="f343" class="dashicons dashicons-arrow-up-alt2"></span>
            <span alt="f347" class="dashicons dashicons-arrow-down-alt2"></span>
            <span alt="f345" class="dashicons dashicons-arrow-right-alt2"></span>
            <span alt="f341" class="dashicons dashicons-arrow-left-alt2"></span>
            <span alt="f156" class="dashicons dashicons-sort"></span>
            <span alt="f229" class="dashicons dashicons-leftright"></span>
            <span alt="f503" class="dashicons dashicons-randomize"></span>
            <span alt="f163" class="dashicons dashicons-list-view"></span>
            <span alt="f164" class="dashicons dashicons-exerpt-view"></span>
            <span alt="f509" class="dashicons dashicons-grid-view"></span>
            <span alt="f545" class="dashicons dashicons-move"></span>
            <h4>Social</h4>
            <span alt="f237" class="dashicons dashicons-share"></span>
            <span alt="f240" class="dashicons dashicons-share-alt"></span>
            <span alt="f242" class="dashicons dashicons-share-alt2"></span>
            <span alt="f301" class="dashicons dashicons-twitter"></span>
            <span alt="f303" class="dashicons dashicons-rss"></span>
            <span alt="f465" class="dashicons dashicons-email"></span>
            <span alt="f466" class="dashicons dashicons-email-alt"></span>
            <span alt="f304" class="dashicons dashicons-facebook"></span>
            <span alt="f305" class="dashicons dashicons-facebook-alt"></span>
            <span alt="f462" class="dashicons dashicons-googleplus"></span>
            <span alt="f325" class="dashicons dashicons-networking"></span>
            <h4>WordPress.org Specific: Jobs, Profiles, WordCamps</h4>
            <span alt="f308" class="dashicons dashicons-hammer"></span>
            <span alt="f309" class="dashicons dashicons-art"></span>
            <span alt="f310" class="dashicons dashicons-migrate"></span>
            <span alt="f311" class="dashicons dashicons-performance"></span>
            <span alt="f483" class="dashicons dashicons-universal-access"></span>
            <span alt="f507" class="dashicons dashicons-universal-access-alt"></span>
            <span alt="f486" class="dashicons dashicons-tickets"></span>
            <span alt="f484" class="dashicons dashicons-nametag"></span>
            <span alt="f481" class="dashicons dashicons-clipboard"></span>
            <span alt="f487" class="dashicons dashicons-heart"></span>
            <span alt="f488" class="dashicons dashicons-megaphone"></span>
            <span alt="f489" class="dashicons dashicons-schedule"></span>
            <h4>Products</h4>
            <span alt="f120" class="dashicons dashicons-wordpress"></span>
            <span alt="f324" class="dashicons dashicons-wordpress-alt"></span>
            <span alt="f157" class="dashicons dashicons-pressthis"></span>
            <span alt="f463" class="dashicons dashicons-update"></span>
            <span alt="f180" class="dashicons dashicons-screenoptions"></span>
            <span alt="f348" class="dashicons dashicons-info"></span>
            <span alt="f174" class="dashicons dashicons-cart"></span>
            <span alt="f175" class="dashicons dashicons-feedback"></span>
            <span alt="f176" class="dashicons dashicons-cloud"></span>
            <span alt="f326" class="dashicons dashicons-translation"></span>
            <h4>Taxonomies</h4>
            <span alt="f323" class="dashicons dashicons-tag"></span>
            <span alt="f318" class="dashicons dashicons-category"></span>
            <h4>Widgets</h4>
            <span alt="f480" class="dashicons dashicons-archive"></span>
            <span alt="f479" class="dashicons dashicons-tagcloud"></span>
            <span alt="f478" class="dashicons dashicons-text"></span>
            <h4>Notifications</h4>
            <span alt="f147" class="dashicons dashicons-yes"></span>
            <span alt="f158" class="dashicons dashicons-no"></span>
            <span alt="f335" class="dashicons dashicons-no-alt"></span>
            <span alt="f132" class="dashicons dashicons-plus"></span>
            <span alt="f502" class="dashicons dashicons-plus-alt"></span>
            <span alt="f460" class="dashicons dashicons-minus"></span>
            <span alt="f153" class="dashicons dashicons-dismiss"></span>
            <span alt="f159" class="dashicons dashicons-marker"></span>
            <span alt="f155" class="dashicons dashicons-star-filled"></span>
            <span alt="f459" class="dashicons dashicons-star-half"></span>
            <span alt="f154" class="dashicons dashicons-star-empty"></span>
            <span alt="f227" class="dashicons dashicons-flag"></span>
            <span alt="f534" class="dashicons dashicons-warning"></span>
            <h4>Misc</h4>
            <span alt="f230" class="dashicons dashicons-location"></span>
            <span alt="f231" class="dashicons dashicons-location-alt"></span>
            <span alt="f178" class="dashicons dashicons-vault"></span>
            <span alt="f332" class="dashicons dashicons-shield"></span>
            <span alt="f334" class="dashicons dashicons-shield-alt"></span>
            <span alt="f468" class="dashicons dashicons-sos"></span>
            <span alt="f179" class="dashicons dashicons-search"></span>
            <span alt="f181" class="dashicons dashicons-slides"></span>
            <span alt="f183" class="dashicons dashicons-analytics"></span>
            <span alt="f184" class="dashicons dashicons-chart-pie"></span>
            <span alt="f185" class="dashicons dashicons-chart-bar"></span>
            <span alt="f238" class="dashicons dashicons-chart-line"></span>
            <span alt="f239" class="dashicons dashicons-chart-area"></span>
            <span alt="f307" class="dashicons dashicons-groups"></span>
            <span alt="f338" class="dashicons dashicons-businessman"></span>
            <span alt="f336" class="dashicons dashicons-id"></span>
            <span alt="f337" class="dashicons dashicons-id-alt"></span>
            <span alt="f312" class="dashicons dashicons-products"></span>
            <span alt="f313" class="dashicons dashicons-awards"></span>
            <span alt="f314" class="dashicons dashicons-forms"></span>
            <span alt="f473" class="dashicons dashicons-testimonial"></span>
            <span alt="f322" class="dashicons dashicons-portfolio"></span>
            <span alt="f330" class="dashicons dashicons-book"></span>
            <span alt="f331" class="dashicons dashicons-book-alt"></span>
            <span alt="f316" class="dashicons dashicons-download"></span>
            <span alt="f317" class="dashicons dashicons-upload"></span>
            <span alt="f321" class="dashicons dashicons-backup"></span>
            <span alt="f469" class="dashicons dashicons-clock"></span>
            <span alt="f339" class="dashicons dashicons-lightbulb"></span>
            <span alt="f482" class="dashicons dashicons-microphone"></span>
            <span alt="f472" class="dashicons dashicons-desktop"></span>
            <span alt="f547" class="dashicons dashicons-laptop"></span>
            <span alt="f471" class="dashicons dashicons-tablet"></span>
            <span alt="f470" class="dashicons dashicons-smartphone"></span>
            <span alt="f525" class="dashicons dashicons-phone"></span>
            <span alt="f510" class="dashicons dashicons-index-card"></span>
            <span alt="f511" class="dashicons dashicons-carrot"></span>
            <span alt="f512" class="dashicons dashicons-building"></span>
            <span alt="f513" class="dashicons dashicons-store"></span>
            <span alt="f514" class="dashicons dashicons-album"></span>
            <span alt="f527" class="dashicons dashicons-palmtree"></span>
            <span alt="f524" class="dashicons dashicons-tickets-alt"></span>
            <span alt="f526" class="dashicons dashicons-money"></span>
            <span alt="f526" class="dashicons dashicons-money"></span>
            <span alt="f529" class="dashicons dashicons-thumbs-up"></span>
            <span alt="f542" class="dashicons dashicons-thumbs-down"></span>
            <span alt="f538" class="dashicons dashicons-layout"></span>
            <span alt="f546" class="dashicons dashicons-paperclip"></span>
        </div>
        <?php

        echo '</ul>';    //fields
        echo '</div>';    //wpcu-inner-admin-block
        // ---------------------------------------- // Arrows color
        if (!isset($settings['arrow_color'])) {
            $settings['arrow_color'] = 'rgb(51, 51, 51)';
        }
        if (!isset($settings['arrow_hover_color'])) {
            $settings['arrow_hover_color'] = 'rgb(54, 54, 54)';
        }
        echo '<div id="wplp_arrows_color" class="wpcu-inner-admin-block with-title with-border">';
        echo '<h4>Arrows color</h4>';
        echo '<ul class="fields">';
        /** Color Picker **/
        echo '<li class="field"><label class="coltab" style="vertical-align: top;">' .
            __('Arrow color', 'wp-latest-posts') . '</label>';
        echo '<div id="arrowColor" style="display: inline-block">
                  <input id="arrowColor" name="wplp_arrow_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['arrow_color']) ? $settings['arrow_color'] : 'rgb(51, 51, 51)') . '"/>
            </div>';
        echo '</li>';
        echo '<li class="field"><label class="coltab" style="vertical-align: top;">' .
            __('Arrow mouse hover', 'wp-latest-posts') . '</label>';
        echo '<div id="arrowHoverColor" style="display: inline-block">
                  <input id="arrowHoverColor" name="wplp_arrow_hover_color" class="wplp_colorPicker" value="' .
            htmlspecialchars(isset($settings['arrow_hover_color']) ? $settings['arrow_hover_color'] : 'rgb(54, 54, 54)') . '"/>
            </div>';
        echo '</li>';
        echo '</ul>';    //fields
        echo '</div>';    //wpcu-inner-admin-block
        // -----------------------------------------//
// ---------------------------------------- //
        if (class_exists('WPLPAddonAdmin')) {
            do_action('wplp_displaytheme_col1_add_fields', $settings);
        }

        echo '</div>'; //wpcu-inner-admin-col
        echo '<div class="wpcu-inner-admin-col">';

        if (isset($settings['theme'])) {
            $theme_selected[$settings['theme']] = ' selected="selected"';
        }
        // -block---------------------------------- //
        echo '<div class="wpcu-inner-admin-block with-title with-border">';
        echo '<h4>Theme choice and preview</h4>';
        echo '<ul class="fields">';

        /** Theme drop-down * */
        echo '<li class="field input-field input-select">
<label for="theme" class="coltab">' . __('Theme', 'wp-latest-posts') . '</label>' .
            '<select id="theme" name="wplp_theme">';
        $all_themes = (array)WPLPAdmin::themeLister();
        wp_localize_script('wplp-back', 'themes', $all_themes);
        //var_dump( $all_themes );	//Debug
        foreach ($all_themes as $dir => $theme) {
            echo '<option  value="' . $dir . '" ' . (isset($theme_selected[$dir]) ? $theme_selected[$dir] : '') . '>';
            echo $theme['name'];
            echo '</option>';
        }
        echo '</select></li>';

        echo '</ul>'; //fields
        echo '<div class="wplp-theme-preview">';

        /** enforce default (first found theme) * */
        if (!isset($settings['theme']) || 'default' == $settings['theme']) {
            reset($all_themes);
            $settings['theme'] = key($all_themes);
        }

        if (isset($all_themes[$settings['theme']]['theme_url'])) {
            $screenshot_file_url = $all_themes[$settings['theme']]['theme_url'] . '/screenshot.png';
            $screenshot_file_path = $all_themes[$settings['theme']]['theme_root'] . '/screenshot.png';
        }
        if (isset($screenshot_file_path) && file_exists($screenshot_file_path)) {
            echo '<img alt="preview" src="' . $screenshot_file_url .
                '" style="width:100%;height:100%;" />';
        }
        echo '</div>';
        echo '</div>'; //wpcu-inner-admin-block
        /**
         * check WPLP Block
         */
        include_once(dirname(plugin_dir_path(__FILE__)) . '/themes/default/default.php');

        if (!class_exists('WPLPAddonAdmin')) {
            echo '<div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2">' .
                '<div class="card-content white-text">' .
                __(
                    'Additional advanced customization features<br/> and various beautiful ' .
                    'pre-configured templates and themes<br/> are available with the optional ' .
                    '<a href="http://www.joomunited.com/wordpress-products/wp-latest-posts" 
                        target="_blank" >pro add-on</a>.'
                ) .
                '</div></div>';
        }
    }

    /**
     * Wp Latest Posts Widget Content source Settings tab
     *
     */
    private function displayContentSourceTab()
    {
        global $post;
        if (!function_exists('pll_languages_list') && function_exists('icl_object_id')) {
            $active_languages = apply_filters('wpml_active_languages', null, 'orderby=name&order=asc');
        }
        $poly_languages = array();
        if (function_exists('pll_languages_list')) {
            foreach (pll_languages_list(array('fields' => 'slug')) as $pll_language) {
                $code = $pll_language;
                if (strpos($code, '_') != false) {
                    $code = substr($code, 0, strpos($code, '_'));
                }
                $poly_languages[$code] = $pll_language;
            }
        }
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }

        if (!isset($settings['source_type']) || !$settings['source_type']) {
            $settings['source_type'] = 'src_category';
        }
        $source_type_checked[$settings['source_type']] = ' checked="checked"';

        $selected_content_language = '';
        if (isset($settings['content_language'])) {
            $selected_content_language = $settings['content_language'];
        }

        $tabs = array(
            'tab-1-0' => array(
                'id' => 'tab-src_category_list',
                'name' => __('Category list', 'wp-latest-posts'),
                'value' => 'src_category_list',
                'method' => array($this, 'displayContentSourceCategoryListTab')
            ),
            'tab-1-1' => array(
                'id' => 'tab-src_category',
                'name' => __('Posts from category', 'wp-latest-posts'),
                'value' => 'src_category',
                'method' => array($this, 'displayContentSourceCategoryTab')
            ),
            'tab-1-2' => array(
                'id' => 'tab-src_page',
                'name' => __('Pages', 'wp-latest-posts'),
                'value' => 'src_page',
                'method' => array($this, 'displayContentSourcePageTab')
            )
        );
        $tabs = apply_filters('wplp_src_type', $tabs);
        ?>
        <!--<ul class="hidden">
        <?php foreach ($tabs as $tabhref => $tab) : ?>
                                    <li><a href="#<?php echo $tabhref; ?>"
                                    id="<?php echo $tab['id']; ?>"><?php echo $tab['name']; ?></a></li>
        <?php endforeach; ?>
                        </ul>-->
        <?php if (function_exists('icl_object_id') || function_exists('pll_languages_list')) : ?>
        <!-- CHECK WPML or Polylang is INSTALLED AND ACTIVED -->
        <?php if (!empty($active_languages)) : ?>
            <div class="content-source-language">
                <label for="content_language"
                       class="content-language-label"><?php _e('Content language', 'wp-latest-posts'); ?></label>
                <select id="content_language" class="content-language-select browser-default"
                        name="wplp_content_language">
                    <?php foreach ($active_languages as $k => $languages) :
                        $check = ($settings['content_language'] == $k) ? ' selected="selected"' : '';
                        ?>
                        <option value="<?php echo $k; ?>" <?php echo $check; ?>>
                            <?php echo apply_filters(
                                'wpml_display_language_names',
                                null,
                                $languages['native_name'],
                                $languages['translated_name']
                            ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr>
        <?php elseif (!empty($poly_languages)) : ?>
            <div class="content-source-language">
                <label for="content_language"
                       class="content-language-label"><?php _e('Content language', 'wp-latest-posts'); ?></label>
                <select id="content_language" class="content-language-select browser-default"
                        name="wplp_content_language">
                    <?php foreach ($poly_languages as $code => $languages) :
                        $check = ($settings['content_language'] == $code) ? ' selected="selected"' : '';
                        ?>
                        <option value="<?php echo $code; ?>" <?php echo $check; ?>><?php echo $languages; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr>
        <?php endif; ?>
        <?php endif; ?>
        <input type="hidden" value="<?php echo $selected_content_language; ?>" id="selected_content_language">
        <input type="hidden" value="" id="selected_source_type"/>
        <ul class="horizontal">
            <?php $idx = 0; ?>
            <?php foreach ($tabs as $tabhref => $tab) : ?>
                <li><input type="radio" name="wplp_source_type" id="sct<?php echo ++$idx; ?>"
                           value="<?php echo $tab['value']; ?>"
                           class="source_type_sel with-gap"
                        <?php echo(isset($source_type_checked[$tab['value']]) ?
                            $source_type_checked[$tab['value']] : ""); ?> />
                    <label for="sct<?php echo $idx; ?>" class="post_radio"><?php echo $tab['name']; ?></label></li>
            <?php endforeach; ?>
        </ul>

        <?php foreach ($tabs as $tabhref => $tab) : ?>
        <div id="div-<?php echo $tab['value']; ?>" class="wplp_source_type_section">
            <?php call_user_func($tab['method']); ?>
        </div>
        <?php endforeach; ?>

        <?php
    }

    /**
     * Content source tab for categories list
     */
    private function displayContentSourceCategoryListTab()
    {
        global $post;
        $source_cat_list_checked = array();
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }
        if (!isset($settings['source_category_list']) ||
            empty($settings['source_category_list']) ||
            !$settings['source_category_list']) {
            $settings['source_category_list'] = array('_all');
        }

        foreach ($settings['source_category_list'] as $cat_list) {
            $source_cat_list_checked[$cat_list] = ' checked="checked"';
        };

        if (isset($settings['cat_list_source_order'])) {
            $source_catlist_order_selected[$settings['cat_list_source_order']] = ' selected="selected"';
        }
        if (isset($settings['cat_list_source_asc'])) {
            $source_catlist_asc_selected[$settings['cat_list_source_asc']] = ' selected="selected"';
        }

        if (is_multisite()) {
            if (!isset($settings['mutilsite_cat_list']) ||
                empty($settings['mutilsite_cat_list']) ||
                !$settings['mutilsite_cat_list']) {
                $settings['mutilsite_cat_list'] = "";
            }
            $all_blog = get_sites();
            echo '<ul>';
            echo '<li class="field "> 
                        <div class="width33 input-field input-select">
			            <label for="mutilsite_cat_list_select" class="cat_list_cb">' .
                __('Multisite selection', 'wp-latest-posts') . ' : </label>		
		                <select id="mutilsite_cat_list_select" class="mutilsite_select" name="wplp_mutilsite_cat_list">
				             <option value="all_blog">' . __('All blog', 'wp-latest-posts') . '</option>' . '';
            foreach ($all_blog as $val) {
                $detail = get_blog_details((int)$val->blog_id);
                $check = ($settings['mutilsite_cat_list'] == $val->blog_id) ? ' selected="selected"' : '';
                echo '<option value="' . $val->blog_id . '" ' . $check . '> ' . $detail->blogname . ' </option>';
            }
            echo '</select></div></li>';
            echo '</ul>';
        }
        $mutilsite_selected_post = '';
        if (isset($settings['mutilsite_cat_list'])) {
            $mutilsite_selected_post = $settings['mutilsite_cat_list'];
        }

        echo '<input type="hidden" value="' . $mutilsite_selected_post . '" id="selected_multisite_cat_list_post_type" />';


        echo '<ul class="fields">';

        echo '<li class="field catlistcat">';
        echo '<ul  class="catlist_field">';
        echo '<li><input id="cat_list_all" type="checkbox" name="wplp_source_category_list[]" 
                value="_all" ' . (isset($source_cat_list_checked['_all']) ? $source_cat_list_checked['_all'] : '') . ' />' .
            '<label for="cat_list_all" class="cat_list_cb">All</li>';
        if (is_multisite()) {
            if ('all_blog' == $settings['mutilsite_cat_list']) {
                $blogs = get_sites();
                foreach ($blogs as $blog) {
                    switch_to_blog((int)$blog->blog_id);
                    $allcats = get_categories(array('hide_empty' => false));
                    if (isset($settings['content_language'])) {
                        $allcats = apply_filters('wplp_get_category_by_language', $allcats, $settings['content_language']);
                    }
                    foreach ($allcats as $allcat) {
                        $allcat->blog = (int)$blog->blog_id;
                        $cats[] = $allcat;
                    }
                    restore_current_blog();
                }
            } else {
                switch_to_blog((int)$settings['mutilsite_cat_list']);
                $cats = get_categories(array('hide_empty' => false));
                if (isset($settings['content_language'])) {
                    $cats = apply_filters('wplp_get_category_by_language', $cats, $settings['content_language']);
                }
                foreach ($cats as $cat) {
                    $cat->blog = (int)$settings['mutilsite_cat_list'];
                }

                restore_current_blog();
            }

            foreach ($cats as $k => $cat) {
                echo '<li><input id="cl_' . $k . '" type="checkbox" name="wplp_source_category_list[]" value="' .
                    $k . '_' . $cat->term_id . '_blog' . $cat->blog .'" ' .
                    (isset($source_cat_list_checked[$k . '_' . $cat->term_id . '_blog' . $cat->blog ]) ?
                        $source_cat_list_checked[$k . '_' . $cat->term_id . '_blog' . $cat->blog ] : "") .
                    ' class="cat_list_cb" />';
                echo '<label for="cl_' . $k . '" class="cat_list_cb">' . $cat->name . '</label></li>';
            }
        } else {
            $cats = get_categories(array('hide_empty' => false));

            if (isset($settings['content_language'])) {
                $cats = apply_filters('wplp_get_category_by_language', $cats, $settings['content_language']);
            }

            foreach ($cats as $k => $cat) {
                echo '<li><input id="cl_' . $k . '" type="checkbox" name="wplp_source_category_list[]" value="' .
                    $cat->term_id . '" ' .
                    (isset($source_cat_list_checked[$cat->term_id]) ? $source_cat_list_checked[$cat->term_id] : "") .
                    ' class="cat_list_cb" />';
                echo '<label for="cl_' . $k . '" class="cat_list_cb">' . $cat->name . '</label></li>';
            }
        }
        echo '</ul></li>';

        echo '<li class="order_field field input-field input-select">';
        echo '<label for="cat_list_source_order" class="coltab">' . __('Order by', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_cat_list_source_order" id="cat_list_source_order" >';
        echo '<option value="id" ' .
            (isset($source_catlist_order_selected['id']) ? $source_catlist_order_selected['id'] : "") . '>' .
            __('By id', 'wp-latest-posts') . '</option>';
        echo '<option value="name" ' .
            (isset($source_catlist_order_selected['name']) ? $source_catlist_order_selected['name'] : "") . '>' .
            __('By name', 'wp-latest-posts') . '</option>';
        echo '<option value="description" ' .
            (isset($source_catlist_order_selected['description']) ? $source_catlist_order_selected['description'] : "") .
            '>' . __('By description', 'wp-latest-posts') . '</option>';

        echo '</select>';
        echo '</li>'; //field

        echo '<li class="order_dir field input-field input-select">';
        echo '<label for="cat_list_source_asc" class="coltab">' .
            __('Posts sort order', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_cat_list_source_asc" id="cat_list_source_asc">';
        echo '<option value="asc" ' .
            (isset($source_catlist_asc_selected['asc']) ? $source_catlist_asc_selected['asc'] : "") . '>' .
            __('Ascending', 'wp-latest-posts') . '</option>';
        echo '<option value="desc" ' .
            (isset($source_catlist_asc_selected['desc']) ? $source_catlist_asc_selected['desc'] : "") . '>' .
            __('Descending', 'wp-latest-posts') . '</option>';
        echo '</select>';
        echo '</li>'; //field
        echo '</ul>'; //fields

        // Notifications
        if (!class_exists('WPLPAddonAdmin')) {
            echo '<div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2" >' .
                '<div class="card-content white-text">' .
                __(
                    'Additional content source options are available with the optional ' .
                    '<a href="http://www.joomunited.com/wordpress-products/wp-latest-posts" 
                    target="_blank" >pro addon</a>.'
                ) .
                '</div></div>';
        }

    }

    /**
     * Content source tab for post categories
     *
     */
    private function displayContentSourceCategoryTab()
    {
        global $post;
        $source_cat_checked = array();
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }
        if (!isset($settings['source_category']) ||
            empty($settings['source_category']) ||
            !$settings['source_category']) {
            $settings['source_category'] = array('_all');
        }
        foreach ($settings['source_category'] as $cat) {
            $source_cat_checked[$cat] = ' checked="checked"';
        };

        if (isset($settings['cat_post_source_order'])) {
            $source_order_selected[$settings['cat_post_source_order']] = ' selected="selected"';
        }
        if (isset($settings['cat_post_source_asc'])) {
            $source_asc_selected[$settings['cat_post_source_asc']] = ' selected="selected"';
        }
        if (is_multisite()) {
            if (!isset($settings['mutilsite_cat']) ||
                empty($settings['mutilsite_cat']) ||
                !$settings['mutilsite_cat']) {
                $settings['mutilsite_cat'] = "";
            }

            $all_blog = get_sites();
            echo '<ul>';
            echo '<li class="field "> 
                        <div class="width33 input-field input-select">
			            <label for="mutilsite_select_post" class="post_cb">' .
                __('Multisite selection', 'wp-latest-posts') . ' : </label>		
		                <select id="mutilsite_select_post" class="mutilsite_select" name="wplp_mutilsite_cat">
				             <option value="all_blog">' . __('All blog', 'wp-latest-posts') . '</option>' . '';
            foreach ($all_blog as $val) {
                $detail = get_blog_details((int)$val->blog_id);
                $check = ($settings['mutilsite_cat'] == $val->blog_id) ? ' selected="selected"' : '';
                echo '<option value="' . $val->blog_id . '" ' . $check . '> ' . $detail->blogname . ' </option>';
            }
            echo '</select></div></li>';
            echo '</ul>';
        }
        $mutilsite_selected_post = '';
        if (isset($settings['mutilsite_cat'])) {
            $mutilsite_selected_post = $settings['mutilsite_cat'];
        }

        echo '<input type="hidden" value="' . $mutilsite_selected_post . '" id="selected_multisite_post_type" />';
        echo '<ul class="fields">';

        echo '<li class="field postcat">';
        echo '<ul  class="post_field">';
        echo '<li><input id="cat_all" type="checkbox" name="wplp_source_category[]" 
value="_all" ' . (isset($source_cat_checked['_all']) ? $source_cat_checked['_all'] : '') . ' />' .
            '<label for="cat_all" class="post_cb">All</li>';

        if (is_multisite()) {
            if ('all_blog' == $settings['mutilsite_cat']) {
                $blogs = get_sites();
                foreach ($blogs as $blog) {
                    switch_to_blog((int)$blog->blog_id);
                    $allcats = get_categories(array('hide_empty' => false));
                    if (isset($settings['content_language'])) {
                        $allcats = apply_filters(
                            'wplp_get_category_by_language',
                            $allcats,
                            $settings['content_language']
                        );
                    }
                    foreach ($allcats as $allcat) {
                        $cats[] = $allcat;
                    }
                    restore_current_blog();
                }
            } else {
                switch_to_blog((int)$settings['mutilsite_cat']);
                $cats = get_categories(array('hide_empty' => false));
                if (isset($settings['content_language'])) {
                    $cats = apply_filters('wplp_get_category_by_language', $cats, $settings['content_language']);
                }
                restore_current_blog();
            }

            foreach ($cats as $k => $cat) {
                echo '<li><input id="ccb_' . $k . '" type="checkbox" name="wplp_source_category[]" value="' . $k . '_' .
                    $cat->term_id . '" ' .
                    (isset($source_cat_checked[$k . '_' . $cat->term_id]) ?
                        $source_cat_checked[$k . '_' . $cat->term_id] : "") .
                    ' class="post_cb" />';
                echo '<label for="ccb_' . $k . '" class="post_cb">' . $cat->name . '</label></li>';
            }
        } else {
            $cats = get_categories(array('hide_empty' => false));
            if (isset($settings['content_language'])) {
                $cats = apply_filters('wplp_get_category_by_language', $cats, $settings['content_language']);
            }

            foreach ($cats as $k => $cat) {
                echo '<li><input id="ccb_' . $k . '" type="checkbox" name="wplp_source_category[]" value="' .
                    $cat->term_id . '" ' .
                    (isset($source_cat_checked[$cat->term_id]) ? $source_cat_checked[$cat->term_id] : "") .
                    ' class="post_cb" />';
                echo '<label for="ccb_' . $k . '" class="post_cb">' . $cat->name . '</label></li>';
            }
        }

        echo '</ul></li>';
        if (class_exists('WPLPAddonAdmin') && is_plugin_active('advanced-custom-fields/acf.php')) {
            $display = false;
            $rule_customs = apply_filters('wplp_get_rules_custom_fields', $settings);
            foreach ($rule_customs as $rule_custom) {
                foreach ($rule_custom as $rule) {
                    if ('post' == $rule['value'] && '==' == $rule['operator']) {
                        $display = true;
                    }
                }
            }
            //Advanced custom fields
            if ($display) {
                do_action('wplp_display_advanced_custom_fields', $settings, 'post');
            } else {
                echo '<li><input type="hidden" name="wplp_advanced_custom_fields" value=""/></li>';
            }
        }
        echo '<li class="order_field field input-field input-select">';
        echo '<label for="cat_post_source_order" class="coltab">' . __('Order by', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_cat_post_source_order" id="cat_post_source_order" >';
        echo '<option value="date" ' .
            (isset($source_order_selected['date']) ? $source_order_selected['date'] : "") .
            '>' . __('By date', 'wp-latest-posts') . '</option>';
        echo '<option value="title" ' .
            (isset($source_order_selected['title']) ? $source_order_selected['title'] : "") . '>' .
            __('By title', 'wp-latest-posts') . '</option>';
        echo '<option value="random" ' .
            (isset($source_order_selected['random']) ? $source_order_selected['random'] : "") .
            '>' . __('By random', 'wp-latest-posts') . '</option>';
        //echo '<option value="order" ' . $source_order_selected['order'] .
        // '>' . __( 'By order', 'wp-latest-posts' ) . '</option>';
        echo '</select>';
        echo '</li>'; //field

        echo '<li class="order_dir field input-field input-select">';
        echo '<label for="cat_post_source_asc" class="coltab">' .
            __('Posts sort order', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_cat_post_source_asc" id="cat_post_source_asc">';
        echo '<option value="asc" ' .
            (isset($source_asc_selected['asc']) ? $source_asc_selected['asc'] : "") . '>' .
            __('Ascending', 'wp-latest-posts') . '</option>';
        echo '<option value="desc" ' .
            (isset($source_asc_selected['desc']) ? $source_asc_selected['desc'] : "") . '>' .
            __('Descending', 'wp-latest-posts') . '</option>';
        echo '</select>';
        echo '</li>'; //field

        if (class_exists('WPLPAddonAdmin')) {
            do_action('wplp_source_category_add_fields', $settings);
            do_action('wplp_source_category_add_content_includesion', $settings);
        }
        echo '</ul>'; //fields

        // Notifications
        if (!class_exists('WPLPAddonAdmin')) {
            echo '<div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2" >' .
                '<div class="card-content white-text">' .
                __(
                    'Additional content source options are available with the optional ' .
                    '<a href="http://www.joomunited.com/wordpress-products/wp-latest-posts" 
                    target="_blank" >pro addon</a>.'
                ) .
                '</div></div>';
        }
    }


    /**
     * Content source tab for pages
     *
     */
    private function displayContentSourcePageTab()
    {
        global $post;
        $settings = get_post_meta($post->ID, '_wplp_settings', true);
        if (empty($settings)) {
            $settings = $this->field_defaults;
        }
        if (isset($settings['pg_source_order'])) {
            $source_order_selected[$settings['pg_source_order']] = ' selected="selected"';
        }
        if (isset($settings['pg_source_asc'])) {
            $source_asc_selected[$settings['pg_source_asc']] = ' selected="selected"';
        }
        if (is_multisite()) {
            if (!isset($settings['mutilsite_page']) ||
                empty($settings['mutilsite_page']) ||
                !$settings['mutilsite_page']) {
                $settings['mutilsite_page'] = "";
            }

            $all_blog = get_sites();
            echo '<ul>';
            echo '<li class="field "> 
                        <div class="width33 input-field input-select">
			            <label for="mutilsite_select_page" class="page_cb">' .
                __('Multisite selection', 'wp-latest-posts') . ' : </label>		
		                <select id="mutilsite_select_page" class="mutilsite_select" name="wplp_mutilsite_page">
				             <option value="all_blog">' . __('All blog', 'wp-latest-posts') . '</option>' . '';
            foreach ($all_blog as $val) {
                $detail = get_blog_details((int)$val->blog_id);
                $check = ($settings['mutilsite_page'] == $val->blog_id) ? ' selected="selected"' : '';
                echo '<option value="' . $val->blog_id . '" ' . $check . '> ' . $detail->blogname . ' </option>';
            }
            echo '</select></div></li>';
            echo '</ul>';
        }
        $mutilsite_selected_page = '';
        if (isset($settings['mutilsite_page'])) {
            $mutilsite_selected_page = $settings['mutilsite_page'];
        }
        echo '<input type="hidden" value="' . $mutilsite_selected_page . '" id="selected_multisite_page_type" />';
        echo '<ul class="fields">';

        echo '<li class="field pagecat">';
        echo '<ul class="page_field">';

        if (!class_exists('WPLPAddonAdmin')) {
            echo '<li><input id="pages_all" type="checkbox" name="wplp_source_pages[]"
            value="_all" checked="checked"  disabled="disabled" />' .
                '<label for="pages_all" class="post_cb">All</li>';
        } else {
            do_action('wplp_source_page_add_fields', $settings);
        }

        echo '</ul>';
        if (class_exists('WPLPAddonAdmin') && is_plugin_active('advanced-custom-fields/acf.php')) {
            $display = false;
            $rule_customs = apply_filters('wplp_get_rules_custom_fields', $settings);
            foreach ($rule_customs as $rule_custom) {
                foreach ($rule_custom as $rule) {
                    if ('page' == $rule['value'] && '==' == $rule['operator']) {
                        $display = true;
//
                    }
                }
            }
            //Advanced custom fields
            if ($display) {
                do_action('wplp_display_advanced_custom_fields', $settings, 'page');
            } else {
                echo '<li><input type="hidden" name="wplp_advanced_custom_fields_page" value=""/></li>';
            }
        }
        echo '</li>'; //field

        echo '<li class="field order_field input-field input-select">';
        echo '<label for="pg_source_order" class="coltab">' . __('Order by', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_pg_source_order" id="pg_source_order" >';
        echo '<option value="order" ' .
            (isset($source_order_selected['order']) ? $source_order_selected['order'] : "") . '>' .
            __('By order', 'wp-latest-posts') . '</option>';
        echo '<option value="title" ' .
            (isset($source_order_selected['title']) ? $source_order_selected['title'] : "") . '>' .
            __('By title', 'wp-latest-posts') . '</option>';
        echo '<option value="date" ' .
            (isset($source_order_selected['date']) ? $source_order_selected['date'] : "") . '>' .
            __('By date', 'wp-latest-posts') . '</option>';
        echo '<option value="random" ' .
            (isset($source_order_selected['random']) ? $source_order_selected['random'] : "") . '>' .
            __('By random', 'wp-latest-posts') . '</option>';
        echo '</select>';
        echo '</li>'; //field

        echo '<li class="order_dir field input-field input-select">';
        echo '<label for="pg_source_asc" class="coltab">' . __('Pages sort order', 'wp-latest-posts') . '</label>';
        echo '<select name="wplp_pg_source_asc" id="pg_source_asc">';
        echo '<option value="asc" ' .
            (isset($source_asc_selected['asc']) ? $source_asc_selected['asc'] : "") . '>' .
            __('Ascending', 'wp-latest-posts') . '</option>';
        echo '<option value="desc" ' .
            (isset($source_asc_selected['desc']) ? $source_asc_selected['desc'] : "") . '>' .
            __('Descending', 'wp-latest-posts') . '</option>';
        echo '</select>';
        echo '</li>'; //field
        if (!class_exists('WPLPAddonAdmin')) {
            echo '<li><div class="card wplp_notice light-blue notice notice-success is-dismissible below-h2">' .
                '<div class="card-content white-text">' .
                __(
                    'Additional content source options are available with the optional ' .
                    '<a href="http://www.joomunited.com/wordpress-products/wp-latest-posts"
                    target="_blank" >pro addon</a>.'
                ) .
                '</div></div></li>';
        }
        echo '</ul>'; //fields
    }
}
