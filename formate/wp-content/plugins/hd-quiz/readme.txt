﻿=== HD Quiz ===
Contributors: HarmonicDesign
Tags: quiz, quizzes, quizes, quiz, questionnaire, questionnaires, questionnairs, questionair, questionaires, hdquiz, hd quiz, test, question and answers, harmonic design
Requires at least: 3.4.1
Tested up to: 4.9.6
Stable tag: 1.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a Quiz. A very easy to use and feature rich plugin to create an unlimited amount of quizzes and embed them onto any page or post.

== Description ==

HD Quiz is a very easy to use plugin to create an unlimited amount of quizzes and embed them onto any page or post. HD Quiz is equally perfect for building strong professional based questionnaires or fun Buzzfeed style quizzes.

[See a live demo](http://designbypixel.ca/the-ultimate-friends-quiz/ "See a live demo")

= Features include: =

* Unlimited amount of quizzes
* Each quiz has individual options
* Mobile-friendly (responsive design)
* Touch friendly (each option is coded and designed to make it easy to select on touch devices)
* Each question can have its own featured image
* Each question can have its own tooltip
* Share Quiz score across Facebook and Twitter
* NEW: You can now use images as answers
 * Recommended size of 400x400, but the plugin will upscale any image too small
* Animated gifs as question featured image, or for any answer
* Quiz Timer - set a time limit to complete the quiz
* Pagination
* Question as title / heading
* Ability to rename the Next and Finish buttons (found in the HD Quiz About / Options page)
* Add links to quiz results!
* Ability to add a small write-up for each question that would be displayed underneath the question on quiz completion.
* [NEW!] Grab from a pool of questions

Please note that as always, new features are marked as experimental - so please let me know if you need any help in getting them to work!

= Individual Quiz Options are: =

* Results position (above quiz/below quiz)
* Ability to share quiz results
* Results checking (highlights right and wrong answers on quiz completion)
 * Option to highlight what the correct answer was
* Pass percentage
* Quiz Pass text
* Quiz Fail text
* Quiz Timer
* Pagination
* Random question order
* Random answer order

[view the HD Quiz plugin page](https://harmonicdesign.ca/hd-quiz/ "view the HD Quiz plugin page")


>== HOW TO USE | TUTORIAL ==

= Adding A New Quiz =
* Select **Quizzes** in the left menu.
* Enter the name of the quiz, then click on Add A New Quiz. This will add it to the list on the right.
* Click the name of the newly added quiz to set the quiz options such as the needed pass percentage.

= Adding New Questions =

* Select **Add New Question** in the left menu.
* Enter the question as the title.
* You can have up to ten (10) answers per question. Make sure to select which answer is the correct one.
* In the right sidebar, you will see a metabox called **Quizzes** with a list of all quizzes you have created. Select the quiz that this question belongs to.

= Using A Quiz =

* HD Quiz uses shortcodes to render a quiz, so you can place a quiz almost anywhere on your site!
* To find the shortcode for a quiz, select **Quizzes** in the left menu.
* You will now see a list of all of your quizzes in a table, with the shortcode listed.
* Copy and paste the shortcode into any page or post you want to render that quiz!


>== UPCOMING FEATURES ==

I have already taken this plugin farther than I intended, but I'm overwhelmed with joy at how much you are all using and loving HD Quiz!
Because of this, I have no intentions of stopping or slowing down development!

If you have any feature requests, then please let me know via the support tab or by leaving a comment on the [HD Quiz plugin page](https://harmonicdesign.ca/hd-quiz/ "HD Quiz plugin page").

= LIST =

* Add option for each quiz to hide the results unless the user submits their email address.
 * This would also include a new admin page for HD Quiz that would display a table of all submitted email addresses.
* Add ability to set a quiz pass/fail featured image for each quiz.
* Allow multiple quizzes on a single page.
* Add option for each quiz to hide the results unless the user shares the quiz on social media first.
* Quiz option to immediately show if you got the question right or wrong as soon as you select an option
* Translations

== Installation ==

The plugin can be installed like any other.

1. Log into WordPress
1. Select Plugins, then Add New
1. Select Upload Plugin
1. Choose the zip file, then Install and activate

Once installed, you will need to create your first quiz by going to HD Quiz, then Quizzes.

== Frequently Asked Questions ==


= Using an image already in my library =

WordPress will NOT create the new thumbnail size for images that existed before the installation of HD Quiz, only new ones. This is likely because on larger sites, this would take up vast amounts of server resources.

If you do not wish to simply re-upload any desired image from your library, then I would recommend using the [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/ "Regenerate Thumbnails") plugin (over 1 Million active installs). It will go through and recreate thumbnails for every single image in your library, ensuring that all images in your library can be used with HD Quiz.

With that siad, I do, however, have plans to integrate a solution that will work with images uploaded before the installation of HD Quiz.

= What's the difference betwen WP Pagination and jQuery Pagination? Which should I use? =

Unless you are a unique situation, I'd almost always recommend using jQuery Pagination as it provides more control for you and a better experiece for your users. WP Pagination should only be used if you are trying to increase your overall page views for ad revenue or something similar.

Please see [this article](https://harmonicdesign.ca/hd-quiz-pagination/ "HD Quiz Pagination") for a full writeup on what the two features are and how they differ.

= I have a feature request! =
Fantastic! I'm one of those cray programmers who loves a good challenge. Please submit your feature request here by using the **support** tab or leave a request of the [official HD Quiz plugin page](https://harmonicdesign.ca/hd-quiz/ "view the HD Quiz plugin page").

= Keywords =
Quiz, quizzes, create a quiz, add a quiz, quiz plugin

== Screenshots ==

1. Example Quiz
2. Example Quiz 2
3. Quizzes Page
4. Quiz Options
5. Questions Page

== Changelog ==
= 1.4.2 =
* various bug fixes and compatability increases
* Quiz option to grab from a pool of questions
* Quiz option to allow the custom question text to appear even if the user selected the correct answer

= 1.4.1 =
* various bug fixes and compatability increases
* the word 'question' (that's prefixed before every question) is now translatable in the HD Quiz options page along with 'Next' and 'Finish'.
* More power over the quiz results pass/fail text. You can now embolded, italicize, and linkify the text.
* Each question can have a small write up explaining what the right answer is. This would only show if entered and if the user get's the question wrong. You can also add links to this sections if you wish.

= 1.4.0 =
* Added in the more powerful jQuery pagination feature
* Added ability to use a question as a title or heading
* added option to randomize the question answer order
* revamped quiz options page to make features more clear and even more accessible.
* added FAQ to readme.txt

= 1.3.5 =
* Added two new global options to About / Options page
 * Next Button Text
 * Finish Button Text
* NEW: Added quiz option to **randomize the order** of the questions
* NEW: Added quiz option to **highlight the correct answers** on completion
 * in addition to the default that only shows if your selected answers are right or wrong
* Speed and compatibility improvements
 * HD Quiz jQuery and CSS files will now only load if the page actually has a quiz on it
* improvements to quiz pagination
* General code cleanup and optimization

= 1.3.0 =
* Added new Timer option
* Added Pagination (experimental)
* Massive rewrite of the results function. Much more optimized and stable
* Added Quiz filter to the Questions list admin page
* New reskinning of Quiz options page
* Updated about / options page

= 1.2.1 =
* bug fixes to admin area.

= 1.2 =
* advancements to featured images for questions
 * images will upscale if you upload a small image
 * each answer can have it's own featured image.
* code cosmetics, minor bug fixes, and code optimizations

= 1.1 =
* New option to share via twitter.
 * You can set up your twitter handle to have each share mention you.
* Extended Facebook share.
 * If you create a Facebook App (don't worry, it's easy to do!), then HD Quiz can actual share a users score and results instead of Facebook grabbing content from your page as if the content were static.
 * If you do not wish to create an app, then HD Quiz will revert to the old facebook share.
* These options are global options and can be found under HD Quiz -> About / Options

== Upgrade Notice ==
= 1.4.0 =
This update adds some great new features!
* Added in the more powerful jQuery pagination feature
* Added ability to use a question as a title or heading
* added option to randomize the question answer order
* revamped quiz options page to make features more clear and even more accessible.
[See the new live demo](http://designbypixel.ca/the-ultimate-friends-quiz/ "See a live demo")

= 1.3.5 =
* NEW: Added quiz option to **randomize the order** of the questions
* NEW: Added quiz option to **highlight the correct answers** on completion
 * in addition to the default that only shows if your selected answers are right or wrong
* Added two new global options to About / Options page
 * Next Button Text
 * Finish Button Text
* Speed and compatibility improvements
 * HD Quiz jQuery and CSS files will now only load if the page actually has a quiz on it
* improvements to quiz pagination
* General code cleanup and optimization

= 1.3.0 =
* Added new Timer option
* Added Pagination (experimental)
* Massive rewrite of the results function. Much more optimized and stable
* Added Quiz filter to the Questions list admin page
* New reskinning of Quiz options page
* Updated about / options page

= 1.2.1 =
* bug fixes to admin area.

= 1.2 =
This update contains new question type: Images as answers

= 1.1 =
This update contains code cleanup and extended social sharing.