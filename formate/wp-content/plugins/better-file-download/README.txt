=== Better File Download ===
Contributors: ndhaddon
Donate link: paypal.me/nhaddonwebdev
Tags: better file download, file download, downloads, download manager, file upload, file types, file management, publications, albums
Requires at least: 4.7
Tested up to: 4.9
Requires PHP: 5.3
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Better File Download allows you to offer various file types for your users to download, track the popularity of your files and present them in a highly configurable way.


== Description ==

Better File Download is a digital media download manager designed to allow you to offer digital media files for download from your website or blog.

The plugin allows you to quickly create downloads and display them within your pages or posts. Downloads may be assigned to categories to allow you to to display your offered files in a grouping such as monthly, yearly or tracks in an album, just create your category and assign the appropriate downloads to it and then use the shortcode, easy as pie!

Better File Downloads allows you to display your downloads either as a link or in a styled block. It also allows you to very simply make basic styling adjustments using colour pickers to format the display of your downloads such as background colours, font colours, icon colours & hover event colours so that it fits in nicely with the style of your site. Additionally, using a simple check box you can remove the default CSS and use the included CSS reference guide, style it yourself to suit your own personal taste. The reference guide can also be used to tweak the default CSS if you only want to make a few changes.

Better File Downloads supports featured images when using the default box format, the image will be displayed along with the download link and button in the event that you would like to attach an image to your download, whether its an album cover or a company logo, a photo of the author or whatever you like. You can see some examples of this in the screen shots section of the repository page. Simply add a featured image when you are creating the download and you're good to go!

Better File Download currently offers support for over 50 types of files and a default file icon that will display when the file extension has no matching icon. If your desired file type is not included please shoot me a message in the support forum and together we can work on a solution.


##Features

* Quickly and easily create downloads.
* Easily create categories of downloads.
* Custom post type and taxonomy, adding a download is as simple as creating a post.
* Responsive design.
* Documentation included in the plugin menu .
* Custom downloads search feature with instant results returned by AJAX.
* Out of the box support for all file types permitted by a default WordPress install plus the file types listed below.
* Optionally allow .mts, | .vob | .ai | .eps | .aep | .dwt | .indd | .csv | .xml | .svg | .rar | .gzip | .gz | .iso | .img | .ttf | .woff | .azw | .epub | .mobi files to be uploaded and displayed with a dedicated icon.
* Allows you to choose whether to use the default styling or go it alone with the included CSS reference guide.
* Optionally include downloads in the archives and sidebar archives widget for your site.
* Optionally display associated data such as the file size, published date and the download count.
* Easily insert either individual or categories of downloads in to your posts or pages using a simple shortcode.
* Shortcodes displayed for each download or category upon creation as well as in the downloads and categories list tables
* SVG icons that look super crisp at any resolution and are super light weight helping your pages to load faster.
* Display downloads in either a simple link or styled box format.
* Set your own text/language for the publicly displayed downloads.
* Easy to use styling override options to allow you to change the default colour scheme to compliment your site without having to write a single line of code.


== Installation ==

1. Upload the **Better File Downloads** zip archive to the `/wp-content/plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Start adding files and categories via the **Downloads** link in the sidebar
4. Adjust the settings to suit your preferences via the **Download Settings** link in the sidebar
5. Use the shortcode to display them within your posts and pages


== Frequently Asked Questions ==

= How do I add a file? =

By selecting the **Downloads** link in the sidebar and then selecting the **Add New link** . Give the file a title, upload your file using the **Upload File** button and hit the big blue **Publish** button.

= How do I add a category? =

Click the **Download Categories** link in the **Downloads** submenu in the sidebar and use the **Add New Category** form on the left hand side of the page.

= How do I add a file to a category? =

Click the **Downloads** link in the sidebar to see a list of all your uploaded files. Click the title of the file you would like to add and then check mark the box next to the appropriate category in the **Download Categories** meta box on the right hand side of the page.

= How do I display a file or a category of files? =

Each file and category is able to be displayed using its associated shortcode. Simply add the shortcode to your posts or pages where you would like the link to be displayed. Further information about the shortcodes and examples can be found under the **Shortcodes** tab in the **Download Settings** link in the sidebar.

= How do I override the colour scheme without writing code? =

You can use the colour pickers in the **Display Options** tab of the **Download Settings** link in the sidebar. Using these you can easily change the background colour, the font & download icon colour, the hover colour of the text and download icon and the file type icon colour.

= Do I have to use your CSS or can I style things my way? =

Absolutely you can use your own, By un-checking the option in the **Display Options** tab of the **Download Settings** link in the sidebar you can prevent the usage of the plugin's styling, you can then use the CSS reference guide to style away to your heart's content. The layout of the box format is also governed by CSS and overriding that might require some digging around using your browser's developer tools however, just shoot me a message in the support form and I'll help you out as much as possible.

= Where do I find the shortcode for the file(s) that I want to display =

Depending on whether you would like to display in individual file or a category, either click the **All Downloads** or the **Download Categories** link in the **Downloads** sidebar menu to see a list of all of your files or categories. The shortcode for each is displayed in the far right hand side column. Additionally, shortcodes are displayed when adding or editing a new download or category.

= How do I use the search feature? =

The search form can be added using the search shortcode `[bfd_download_search]`, just place this shortcode within your posts or pages wherever you would like it to be displayed. Downloads matching the search term are returned via AJAX directly below the input field, the returned results are displayed in the box format by default. To display them as simple links using the inline format use the **Search Results** check box in the **Display Options** tab of the **Download Settings** link in the sidebar.


== Screenshots ==

1. This is a view of a category of downloads, both with and without Featured images attached.
2. Here we can see the single file views of a download in both the *box* and the *inline* formats as well as the custom search box.
3. The display has been designed to be responsive to displaying on smaller screens such as phones and tablets.
4. This is the list view of all the available downloads, you can see that the shortcode is displayed for easy reference.
5. The Add New Download view, you can see that the shortcode is displayed when you are adding or editing each individual download.
6. Here we are creating a new category, you can see that the category shortcode is displayed as soon as the slug for the category is declared.


== Changelog ==

= 1.0.0 =
* Plugin launched

= 1.0.1 =
* Tested compatibility with WP 4.8.3 & fixed file icon display size issue in Internet Explorer


 == Upgrade Notice ==

= 1.0.0 =
* Plugin launched

= 1.0.1 =
* Fixes a bug with file icon display size in Internet Explorer

= 1.0.2 =
* Disabled the submit button on the AJAX search feature as it is not required

= 1.0.3 =
* Tweaked the default colour of the icons & some minor CSS adjustments

= 1.0.4 =
* Fixed an issue with forcing the date format so that it now displays the user defined WP date format. Added settings to allow users to define their own text for the displayed text "Published", "Type", "Size", "Downloaded" so that the plugin may appear to be translated into a language other than English without all the bother of actually translating it.

= 1.0.5 =
* Added the option to force downloads to open in a new browser tab. Added translation options for the word "Time" & "Times"

= 1.0.6 =
* Fixed a bug that caused a colon to appear after the words "Time" & "Times"
