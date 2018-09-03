<?php

$cminds_plugin_config = array(
    'plugin-is-pro'                 => false,
    'plugin-has-addons'             => TRUE,
    'plugin-version'                => '2.10.4',
    'plugin-affiliate'              => '',
    'plugin-redirect-after-install' => admin_url( 'admin.php?page=CMA_admin_settings' ),
    'plugin-settings'               => admin_url( 'admin.php?page=CMA_admin_settings' ),
    'plugin-show-guide'             => TRUE,
    'plugin-guide-text'             => '    <div style="display:block">
        <ol>
         <li>Go to <strong>"Setting"</strong> and click on <strong>"Link to questions frontend list"</strong></li>
            <li>Scroll down to the bottom and <strong>Add</strong> your first question</li>
            <li>Click on the question which was created and scroll down to <strong>Add</strong>  your first answer.</li>
            <li>In the plugin setting you can change moderation options and notification settings</li>
            <li><strong>Troubleshooting:</strong> Make sure that you are using Post name permalink structure in the WP Admin Settings -> Permalinks.</li>
            <li><strong>Troubleshooting:</strong> If post type archive does not show up or displays 404 then install Rewrite Rules Inspector plugin and use the Flush rules button.</li>
            <li><strong>Troubleshooting:</strong> if the settings cannot be saved eg. 403 Forbidden error shows up after pressed the Save button, then contact your hosting provider and ask for the restrictions for POST requests to the /wp-admin/admin.php.</li>        </ol>
    </div>',
    'plugin-guide-video-height'     => 240,
    'plugin-guide-videos'           => array(
        array( 'title' => 'Installation tutorial', 'video_id' => '159673807' ),
    ),
    'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Why you should upgrade to Pro', 'video_time' => '0:00' ),
        array( 'title' => 'Improved questions list view with search and filters ', 'video_time' => '0:03' ),
        array( 'title' => 'Improved thred view with more options', 'video_time' => '0:50' ),
        array( 'title' => 'Categories support', 'video_time' => '1:24' ),
        array( 'title' => 'Multiple attachment support', 'video_time' => '1:55' ),
        array( 'title' => 'Replace comments with question module', 'video_time' => '2:34' ),
        array( 'title' => 'Enhanced voting support', 'video_time' => '3:18' ),
        array( 'title' => 'Tags support', 'video_time' => '3:49' ),
        array( 'title' => 'User dashboard and profile', 'video_time' => '4:23' ),
        array( 'title' => 'Multiple forums support', 'video_time' => '4:56' ),
        array( 'title' => 'Logs and statistics', 'video_time' => '5:18' ),
        array( 'title' => 'Private posts', 'video_time' => '5:52' ),
        array( 'title' => 'Advanced notifications', 'video_time' => '6:28' ),
        array( 'title' => 'Disclaimer support ', 'video_time' => '6:55' ),
        array( 'title' => 'Shortcode support ', 'video_time' => '7:52' ),
   ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'Answers Premium Plugin Overview', 'video_id' => '271271526' ),
    ),
    'plugin-abbrev'                 => 'cma',
    'plugin-file'                   => CMA_PLUGIN_FILE,
    'plugin-dir-path'               => plugin_dir_path( CMA_PLUGIN_FILE ),
    'plugin-dir-url'                => plugin_dir_url( CMA_PLUGIN_FILE ),
    'plugin-basename'               => plugin_basename( CMA_PLUGIN_FILE ),
    'plugin-icon'                   => '',
    'plugin-name'                   => 'CM Answers',
    'plugin-license-name'           => 'CM Answers',
    'plugin-slug'                   => '',
    'plugin-short-slug'             => 'cm-answers',
    'plugin-menu-item'              => 'CMA_answers_menu',
    'plugin-textdomain'             => 'cm-answers',
    'plugin-userguide-key'          => '987-answers-cma',
    'plugin-store-url'              => 'https://www.cminds.com/wordpress-plugins-library/answers/',
    'plugin-support-url'            => 'https://wordpress.org/support/plugin/cm-answers',
    'plugin-review-url'             => 'https://wordpress.org/support/view/plugin-reviews/cm-answers',
    'plugin-changelog-url'          => 'https://answers.cminds.com/release-notes/',
    'plugin-licensing-aliases'      => array( 'CM Answers' ),
    'plugin-compare-table'          => '
              <div class="suite-package" style="padding-left:10px;"><h2>The premium version of this plugin is included in CreativeMinds All plugins suite:</h2><a href="https://www.cminds.com/wordpress-plugins-library/cm-wordpress-plugins-yearly-membership/" target="_blank"><img src="' . plugin_dir_url( __FILE__ ) . 'CMWPPluginssuite.png"></a></div>
            <hr style="width:1000px; height:3px;">
            <div class="pricing-table" id="pricing-table"><h2 style="padding-left:10px;">Upgrade The Answers Plugin:</h2>
                <ul>
                    <li class="heading" style="background-color:red;">Current Edition</li>
                    <li class="price">FREE<br /></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Basic Moderation options</li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Answers & Voting Counts</li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Templates can be Customized</li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Localization Support</li>
                </ul>

               <ul>
                   <li class="heading">Pro<a href="https://www.cminds.com/wordpress-plugins-library/answers/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$39.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/answers/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-answers-pro/?edd_action=add_to_cart&download_id=1119&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=0" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-plus-alt"></span><span style="background-color:lightyellow">&nbsp;All Free Version Features</span> <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free features are supported in the pro"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Advanced Access Control <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Ability to define who can view, post new questions, answer exiting questions and comments. This can be based on user roles or logged-in status"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Question Categories  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Questions can be organized by categories. This also support creating multiple forums each on a separate page using a different category"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Shortcodes with Ajax Support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Forum can be embedded using a shortcode on any post or page. Using the shortcode it is possible to customize the forum look and feel and also to enable Ajax based interaction "></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Widgets <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Several widgets can be added to the sidebar to display recent questions, most popular, most active users and more "></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User Dashboard <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Using a shortcode you can add to each user profile a list showing  all his postings"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Social Media Integration <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Ability to let users register and login using their social media accounts"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>File Attachments <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Multiple files can be added to a question or to answer. Images and Videos can be shown while viewing the content without the need to download first "></span></li>
                 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Q&A Comments <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support adding comments to the question or the answers "></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Question Tags <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Each question can be tagged and user can filter questions using tags"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Customize Permalink <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Forum URL can be set using a permalink in the plugin settings"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Sticky Questions <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Questions can be set to appear always on the top part of the questions list"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Forum Disclaimer  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="A disclaimer can be shown before user is able to view questions or answers. User needs to approve disclaimer in order to view forum"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Social Share Widget <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Add a social share widget on each question page so user can share the question"></span></li>
                 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Make Forum your Homepage <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support turning the forum into your site homepage"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User Profile Page  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Each user has a profile page showing all his posting and basic information about the user "></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User Posting Meter <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="A widget showing the amount of posting is shown near each question or answer "></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Gravatar Support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Show user gravatar icon in each question or answer"></span></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Multisite Support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Works in WordPress multisite environment. Please check licensing information regarding Multisite support"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>BuddyPress Integration <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Integrates with the BuddyPress API, specifically the groups feature. Buddypress will display posts on the CM Answers forum by users that login with their BP profile.  You can also associate a BP group with a specific CMA category! The chosen CMA category becomes a forum for this group where the users can create topics (questions) and post answers. "></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Logs &amp; Statistics <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Detailed report is included in the plugin backend to show who posted what and when. Reports can be filtered by dates. User IP information is also provided."></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Geo-Location Information <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support resolving user IP into a geo location information in the plugin reports "></span></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Replace WordPress Comments <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support replacing WordPress comments on each page or post with a forum widget."></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Full Text Editor <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support full text editor on frontend question or answer submission form. The default TinyMCE editor is shown "></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Best Question Selection <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Question author or admin can choose the best question"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Edit After Posting <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support the ability to edit the question or answer after posting. Admin has several options to restrict timeframe when content can be edited"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Private Questions <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support sending private questions directly to users"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Private Answers Comments <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support turning a question to private, Only admin and question author will be able to view it"></span></li>
                      <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>AdSense Integration <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support integration with Google AdSense in order to show ads within forum content "></span></li>
                    <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 35% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>
                </ul>
                    <ul>
                  <li class="heading">Pro + Anonymous<a href="https://www.cminds.com/wordpress-plugins-library/answers/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$59.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/answers/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-answers-pro/?edd_action=add_to_cart&download_id=15723&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=0" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-plus-alt"></span><span style="background-color:lightyellow">&nbsp;All Free and Pro Version Features</span> <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free and pro features are supported"></span></li>

                        <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Anonymous Posting for non logged-in Users <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Allow non logged-in users to post questions or answers"></span></li>
                    <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 35% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>
               </ul>

    </ul>
                    <ul>
                   <li class="heading">Ultimate<a href="https://www.cminds.com/wordpress-plugins-library/answers/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$99.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/answers/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-answers-pro/?edd_action=add_to_cart&download_id=146678&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-plus-alt"></span><span style="background-color:lightyellow">&nbsp;All Free and Pro Version Features</span> <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free and pro features are supported"></span></li>

                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Integration with Micropayments  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Integrates with CM MicroPayments plugin. This will support adding a transaction layer to each posting. For example when a user asks a question he than needs to pay X amount of virtual coins"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Payment support  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support for payments for posting a question or an answer using real money. Cart system is based on Easy Digital Downloads"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Answers Widgets  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Additional visual widgets which you can use in your site widgets and sidebar"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Ask the expert support  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Includes ask the expert system"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Idea Stimulator support  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Includes the idea stimulator system"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Integration with PeepSo   <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Integration with PeepSo social network. Each member can manage his q&a posting"></span></li>

                     <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 35% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>

                </ul>

            </div>',
);

