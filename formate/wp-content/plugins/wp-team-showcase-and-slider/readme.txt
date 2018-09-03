=== WP Team Showcase and Slider ===
Contributors: wponlinesupport, anoopranawat 
Tags: team, teamshowcase, team slider, responsive teamshowcase, slider, teamshowcase rotator, carousel, custom, custom post type, cv, employees, grid, honeycomb, meet team, members, portfolio, profile, shortcode, skills, social, staff, team, template, v-card, members profile, my team, our team,  responsive team display, responsive team, team members, team members profile, team profile, team showcase, tlp team, WordPress Team Member
Requires at least: 3.5
Tested up to: 4.9.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy to add and display your employees, team members in Grid view and Slider view.

== Description ==
WP Team Showcase and Slider allows you to easily create and display your team members & staff and show them on your site. Your visitors will see a beautiful list of your team, with their pictures, links to social icons. The members will display in a responsive grid with the number of columns you set and with the information you want to display.

View [DEMO](http://wponlinesupport.com/wp-plugin/wp-team-showcase-slider/) | [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/wp-team-showcase-slider/) for additional information.

Checkout our new plugin - [PowerPack - Need of Every Website](https://wordpress.org/plugins/powerpack-lite/)

**Plugin contain two shortcode**

<code>[wp-team] and [wp-team-slider]</code>

Where you can display Team Showcase in grid view and slider view with responsive. You can also select design theme from "Team Showcase -> Designs".

A really simple way to manage Team Showcase on your site. This plugin creates a Team Showcase and a Team Showcase rotator/Team Showcase slider custom post type,
complete with WordPress admin fields for adding team member details ie Name, content, Team Details, Social Details and Image.

= Features Added =

* Display Team member showcase in grid view.
* Display Team member showcase in slider view.
* Enable popup for more info.
* Fully Responsive
* 3 Different layout
* Custom meta filed
* Shortcode
* Social links (FB, Twitter, LinkedIn and Google+ )


= Use Following parameters with shortcode =
<code>[wp-team]</code>

* **limit:**
[wp-teamlimit="5"] ( ie Display 5 team member on your website )
* **design:**
[wp-team design="design-1"] ( ie Select the design for team showcase. Values are design-1, design-2, design-3 )
* **Grid:**
[wp-team grid="2"]( ie Display your team showcase by Grid view - Number of column you want to create)
* **Display by category**
[wp-team category="category_ID"] ( ie Display by their category ID )
* **popup:**
[wp-team popup="true"] ( ie Display member more information on pop. Default value is "true". Values are "true OR false" )



= Use Following Slider parameters with shortcode =
<code>[wp-team-slider]</code>

* **Slide columns for testimonial rotator:**
[wp-team-slider slides_column="2"] (Display number of columns in rotator )
* **design:**
[wp-team-slider design="design-1"] ( ie Select the design. Values are design-1, design-2 )
* **Number of testimonial slides at a time:**
[wp-team-slider slides_scroll="2"] (Controls number of rotate at a time)
* **Pagination and arrows:**
[wp-team-slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval:**
[wp-team-slider autoplay="true" autoplay_interval="100"]
* **Testimonials Slide Speed:**
[wp-team-slider speed="3000"]
* **limit:**
[wp-team-slider limit="5"] ( ie Display 5 team member on your website )
* **Display  by category**
[wp-team-slider category="category_ID"] ( ie Display  by their category ID )
* **popup:**
[wp-team-slider popup="true"] ( ie Display member more information on pop. Default value is "true". Values are "true OR false" )




= Here is Template code =

<code><?php echo do_shortcode('[wp-team]'); ?> </code>

If you want to display using slider then use this template code

<code><?php echo do_shortcode('[wp-team-slider]'); ?> </code>

= Available fields =

* Title/Name (Add as Post title)
* Description (Add as Post Content)
* Short Bio (Add as Post Excerpt)
* Member Department
* Member Designation
* Skills
* Member Experience
* Social links (FB, Twitter, LinkedIn and Google+ )

= PRO Features : =
> <strong>Premium Version</strong><br>
>
> * Added 2 shortcodes with various parameters.
> [wp-team] – Grid Shortcode
> [wp-team-slider] – Slider Shortcode
> * 25 stunning and cool designs.
> * Display team member in a grid view.
> * Display team member in a slider view.
> * Display team member details in a popup.
> * 2 popup designs for team members.
> * 2 popup theme (Light - Dark) for team members.
> * Slider RTL support.
> * Display team showcase categories wise.
> * Drag &amp; Drop team members to display in your desired order.
> * Strong shortcode parameters.
> * Fully Responsive.
> * 100% Multilanguage.
> * Template code : 
> <code><?php echo do_shortcode('[wp-team]'); ?></code> 
> <code><?php echo do_shortcode('[wp-team-slider]'); ?></code>
>
> View [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/wp-team-showcase-slider/) for additional information.
>

= Privacy & Policy =
* We have also opt-in e-mail selection , once you download the plugin , so that we can inform you and nurture you about products and its features.

== Installation ==

1. Upload the 'wp-team-showcase-and-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the "wp-team-showcase-and-slider" list plugin through the 'Plugins' menu in WordPress.
3. Add a new page and add this short code 
<code>[wp-team]</code>
4. If you want to display  using slider then use this short code 
<code>[wp-team-slider]</code>
5. Here is Template code 
<code><?php echo do_shortcode('[wp-team]'); ?> </code>
6. If you want to display using slider then use this template code
<code><?php echo do_shortcode('[wp-team-slider]'); ?> </code>

== Screenshots ==

1. Design-1
2. Design-2
3. Popup
4. Slider
5. Teamshowcase all view
6. Add new member

== Changelog ==

= 1.5.2 (08, June 2018) =
* [*] Follow some WordPress Detailed Plugin Guidelines.

= 1.5.1 (07-05-2018) =
* [*] Fixed : Design issues.

= 1.5 (26-03-2018) =
* [*] Fixed : Popup issue with Divi Theme

= 1.4 (01-02-2018) =
* [*] Fixed : loop has different popup of a team member

= 1.3 (22-11-2017) =
* [+] Added Magnific popup
* [*] Made some changes in files structure
* [*] Updated Slick.js to the latest version
* [*] Fixed some css and design issues

= 1.2.5 (03-8-2017) =
* Fixed  wp_enqueue_script( 'wpos-slick-jquery' ); issue if user using our some other plugin

= 1.2.4 (22-5-217) =
* Fixed  iscw_help_tabs() function error

= 1.2.3 (1-5-2017) =
* [+] Added How It Word Tab. 
* [-] Removed design tab

= 1.2.2 (1-5-2017) =
* [+] Added new design (design-3) for grid and slider. 
* Fixed some Grid and slider issue.
* [+] Added background color and hover color for social iocns
* Fixed some css issue.

= 1.2.1 =
* Updated wrong shortcode in team showcase category column.

= 1.2 =
* Fixed image issue
* Fixed popup image issue

= 1.1.1 =
* Update slider js to latest version.
* Resolved multiple popup issue.
* Improved member popup css.
* Optimized some code.

= 1.1 =
* Fixed some css issues.

= 1.0.1 =
* Fixed some css issues.
* Resolved multiple slider jquery conflict issue.

= 1.0 =
* Initial release.