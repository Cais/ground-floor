==== readme.txt ====
Updated June 19, 2015

=== Contents ===
* Items of Note
* F.A.Q.
* Internal Code Conventions
* Changelog
* Review Tickets

=== Items of Note ===
* This Theme does not use Custom Header Images
* Posts without titles can be reached by clicking on the linked 'Comment' reference
* Posts without titles and password protected will not have a direct link to the single view of the post.
* Author email link will only appear on 'author.php' rendered pages if their website URL has been added to their profile.

=== F.A.Q. ===
Q: Why is the theme not using the WordPress core search form since Ground Floor version 2.1?
The update routine for WordPress themes overwrites the existing files with the files found in the updated version of the theme. If a file is removed in an update it must be manually removed from the website afterward. This does not affect new (re-)installation of the theme.

Q: Why are not all of the archive posts showing an excerpt only?
The archive templates are created to show as "mullet" loops where the first few posts will show in their entirety then the following posts will show as excerpts.

=== Internal Code Conventions ===
* Unique function prefix: `gf_`
* Expected theme slug: `ground-floor`
* Theme textdomain is expected to be the same as the theme slug: `ground-floor`

=== Changelog ===
== Version 2.4 ==
Released June 2015

= Code =
* Added `id` parameters to "sidebar" definitions
* Created `content-navigation.php` template file for DRY reasons; update templates as appropriate
* Created `content-no_posts.php` template file for DRY reasons; update templates as appropriate
* Improved i18n implementation
* Minor code formatting to better meet WordPress Coding Standards guidelines

= CSS =
* Added custom CSS for BNS Support to hide sidebar background in content areas

= Miscellaneous =
* Added default `ground-floor.pot` file as well as English (Canada) translation files
* Moved `changelog.txt` into `readme.txt` file
* Updated copyright years

/** ------------------------------------------------------------------------- */
== Version 2.3.2 ==
Released December 2014
= Code =
* Added support for `add_theme_support( 'title-tag' )`
* Added support for `BNS Login` using dashicons
* Code formatting to better meet WordPress Coding Standards
* Miscellaneous inline documentation updates
* Moved `$content_width` into callback function

= CSS =
* Added compatibility styles for `BNS Theme Details`

= Miscellaneous =
* Corrections to `readme.txt` to address mark-up issues

/** ------------------------------------------------------------------------- */
== Version 2.3.1.1 ==
* Additional reversion updates

== Version 2.3.1 ==
* Reverted name change: `gf_setup` -> `ground_floor_setup`

/** ------------------------------------------------------------------------- */
== Version 2.3 ==
= Code =
* Re-factored `comment_add_userid` to note various user roles as comment classes
* Minor i18n corrections and updates
* Removed `wp_list_bookmarks` call from the default sidebar widgets
* Removed micro-ID class insertion into comment classes
* Renamed `ground_floor_setup` to `gf_setup` to be more consistent

= CSS =
* Ensured embedded "tweets" are set to 100% width in the content area

= Miscellaneous =
* Set i18n textdomain references to match theme slug
* Updated `readme.txt` file with better details about the theme

/** ------------------------------------------------------------------------- */
== Version 2.2.3 ==
= Code =
* Reformatted code to better meet WordPress Coding Standards

= CSS =
* Added `address` definition
* Fixed two minor typos and corrected `.wp-caption` alignment issues

= Miscellaneous =
* Added `Textdomain` to theme header block
* Added FAQ: Why are not all of the archive posts showing an excerpt only?
* Changed theme tag `fixed-width` to `fixed-layout`
* Replace `screenshot.png` with a 880 x 660 pixel version
* Update Copyright years

/** ------------------------------------------------------------------------- */
== Version 2.2.2 ==
= Code =
* Removed unused variables and parameters as part of code clean-up

= CSS =
* Added some basic list element styles for sub-elements
* Added some minor aesthetic changes to some elements
* Added `word-wrap` properties for pages and posts
* Added better list element styles
* Basic clean up of old and/or duplicated properties

/** ------------------------------------------------------------------------- */
== Version 2.2.1 ==
= Code =
* Added constant 'GF_HOME_URL'
* Applied 'GF_HOME_URL' as appropriate
* Change Featured Image to centered and full size from left aligned thumbnail
* General code cleanup
* Simplified custom menu support code

= CSS =
* Added 'display: none;' for `screen reader text` labels
* Adjusted galleries CSS to provide a larger thumbnail view where space is available
* Adjusted `img` properties related to the Featured Image
* Keep Featured Images to width of container with `wp-post-image` properties

/** ------------------------------------------------------------------------- */
== Version 2.2 ==
= Code =
* Added 'search' results template
* Dropped the "subscribe" link from the post meta in the 'single' template
* Refactored code formatting and code block termination comments
* Refactored widget area definitions into `gf_widgets` function and hooked into `widget_init`
* Refactored to be more i18n compatible
* Removed 'searchform.php' in favor of using WordPress core version
* Updated DOCTYPE and other related header elements

= CSS =
* Changed size of archive titles to a much smaller more aesthetic size
* Change search input field width in sidebar (see 'searchform.php' removal)

= Miscellaneous
* Change 'style.css' header texts to reflect core trac ticket #16868
* Updated copyright year
* Updated 'readme' with new F.A.Q. section and answer regarding the removal of the theme version of 'searchform.php'

/** ------------------------------------------------------------------------- */
== Version 2.1 ==
Changelog: December 9, 2012
= Code =
* Added filters to allow the theme version text to be completely overwritten
* Added 'Ground Floor Custom Background Callback' to specifically set the CSS `background-attachment` property to `fixed` by default.
* Addressed conditional to display threaded comments if they are open or closed
* Fixed spacing issue in meta details if post has no tags
* Refactored sidebar definitions to include names and descriptions
* Reworded the theme version texts
* Removed duplicate `content width` entry
* Removed `gf_login` function in favor of using its parent plugin BNS Login
* Removed `gf_modified_post` as unused code (may re-introduce in a later version)

= CSS =
* Adjusted search box input field to fill width
* Change `font-size` properties to percentage based values with base font-size set to 100%
* Fixed aesthetics of the menu for the current page
* Hid search buttons by un-commenting the `hidden` class properties

= Miscellaneous =
* Minor code reformatting
* Documentation updates and corrections
* More complete PHPDocs style documentation added

/** ------------------------------------------------------------------------- */
== Version 2.0 ==
Changelog: July 6, 2012
= Code =
* Addressed `_e` and other output / i18n issues
* Changed TEMPLATEPATH to `get_template_directory()`
* Refactored `wp_title` usage
* Refactored script enqueue of threaded comments
* Removed code for call to deprecated function `add_custom_background`
* Removed code for call to deprecated function `get_theme_data`
* Removed `function_exists( 'dynamic-sidebar' )` checks - should not be needed
* Updates to i18n support

= Miscellaneous =
* Various inline documentation updates and corrections
* Dropped widget-map image file from package

/** ------------------------------------------------------------------------- */
== Version 1.9 ==
Changelog: April 19, 2012
= Code =
* Added conditionals to display website (with email) and biography only if information has been entered into the user fields
* Addressed deprecated function call to `add_custom_background`
* Addressed deprecated function calls to `get_theme_data`
* Addressed deprecated function call to `get_userdatabylogin`
* Changed `bns_modified_post` to `gf_modified_post`
* Changed `bns_theme_version` to `gf_theme_version`
* Changed `bns_dynamic_copyright` to `gf_dynamic_copyright`

= CSS =
* Adjust CSS on sticky posts to provide better contrast
* Added CSS to better display more uniform images in galleries greater than four columns

= Miscellaneous =
* Improved code quality via better and more consistent structure and format
* Dropped direct support for older versions of Internet Explorer

= Internet Browsers Reviewed =
* Chrome v18.0
* Firefox v11.0
* Internet Explorer v9.0
* Opera v11.61
* Safari v5.1.5

/** ------------------------------------------------------------------------- */

Changelog as of September 3, 2011
= Version 1.8 =
  - general code clean-up
  - modified bns-login function to gf-login
  - modified drop-down menu styles and added rounded corners to menu elements
  - add conditional to not display comment(s) if post is password protected
  - update bns_dynamic_copyright function
  - update bns_theme_version function
  - modified the site title creation code

= Version 1.7.1 =
  - changed main background image to a smaller 'jpg' version (to address this post: http://wordpress.org/support/topic/huge-background-image-slow-loading)
  - original background image will be retained (temporarily) for those that prefer a better quality
  - added span id's to the `BNS Dynamic Copyright` and `BNS Theme Version` functions

= Version 1.7 =
  - released: March 27, 2011
  - published: March 27, 2011
  - removed 'hard-coded' links from sidebar
  - added readme.txt file for additional information and other details
  - added additional 'required' WordPress style elements
  - updated Theme copyright date
  - additional minor changes
  - edit Theme tags to be more appropriate

= Version 1.6 =
  - published: October 5, 2010
  - released: October 2, 2010
  - updated deprecated function calls
  - correct typo in page.php template file - thanks to 'charlie' (http://buynowshop.com/themes/ground-floor/comment-page-1/#comment-1461)
  - use `get_search_form()` in place of `include( TEMPLATEPATH . "/searchform.php" )`
  - added unique namespace for theme functions 'gf_'
  - added full `wp_nav_menu` support
  - added multi-page navigation to all template files using `the_content()`
  - added post_thumbnail support to index.php, single,php, and page.php

= Version 1.5.1 =
  - published: July 26, 2010
  - released: July 5, 2010
  - style updates for the `comment_form()` function

= Version 1.5 =
  - released: July 5, 2010
  - cleaned up code to meet WP Standards
  - adjusted content_width value
  - fixed page with comments closed message
  - removed feed links from header; using `add_theme_support( 'automatic-feed-links' );`
  - removed `legacy.comments.php` file as it is no longer referenced.
  - add the use of `comment_form()`

= Version 1.4 =
  - published: Apr 28, 2010
  - released: Apr 23, 2010
  - reviewed for compatibility with WordPress 3.0
  - added revision / date reference to each file
  - corrected dynamic_copyright function
  - removed legacy.comments.php and associated function calls
  - CSS: added elements for the Calendar
  - WP: add class and ID to function widget definition
  - WP: minor clean up to widget functions
  - WP: using `add_theme_support` added: `post-thumbnails`, `nav-menus`, and `automatic-feed-links`
  - added BNS Modified Post function (requires WordPress 3.0)

  - additional modifications to meet current guidelines as found at: http://codex.wordpress.org/Theme_Development_Checklist.

= Version 1.3.1 =
  - modified bns_login function to use wp-login.php to match the BNS Login plugin
  - removed promotional link to the BNS Login plugin at WordPress.org

= Version 1.3 =
  - added "GPL2" license statement to style.css
  - added YUI reset to CSS
  - general clean-up of CSS file (removed most empty elements)
  - added bns_dynamic_copyright()

= Version 1.2.1 =
  - moved theme version display to functions.php

= Version 1.2 =
  - added clearing div to the end of the_Loop
  - fixed page navigation 'previous' and 'next' links display

= Version 1.1.3 =
  - minor change to comment count display -> "Closed" to "Comments Closed" on all pages

= Version 1.1.2 =
  - re-coded footer.php to address fopen() errors
  - updated theme URL (to its own page)
  - minor edit in "date.php" to change comments message from 'Closed' to 'Comments Closed'
  - added the wp_link_pages() function to single.php
  - CSS: .widget p {margin-bottom: 0;}
  - CSS (edit): updated BNS Plugins section

= Version 1.1 =
  - re-work of the footer widget area into three (3) defined areas
  -- removed the `table` structures
  -- added BNS-Login plugin functionality to Middle Footer Widget as default.
  - improved IE6 compatibility
  - CSS: hr element -> edited properties: 'border: 1px solid black;' and 'background: #673000;'
  - CSS (new): added BNS Plugins section at end of style.css

= Version 1.0.3 =
  - added `id="page-content"` and `id="page-meta" to page.php for more style control
  - CSS: .post-details -> added property 'padding-left: 18px'
  - CSS: .post -> added properties 'padding-bottom: 9px' and 'border-bottom: thick double Black;'
  - CSS (new): .post:hover -> semi-transparent background on all posts
  - CSS (new): #page-content:hover -> semi-transparent background on all posts

= Version 1.0.2.1 =
  - Submission related changes:
  * CSS: .widget -> adjusted 'padding-left' and 'padding-right' to 20px;
  * CSS: .widget ul -> adjusted 'padding' to 0 (zero) in all quadrants

= Version 1.0.2 =
  - edited post meta details to re-arrange positions
  - CSS: blockquote -> add property 'padding-bottom: 8px;' to show entire "quotes" image on single line quotes.
  - CSS: .hr, .groundfloor -> add properties 'border: none;' and 'background: none;' to correct all blank display of class="hr"
  - Submission requested changes:
    * CSS: body -> changed background color and muted tone of background image (original commented out in style.css)
    * CSS: .post-details -> added properties to create viewable differences between the meta data and standard text

= Version 1.0.1 =
  - Submission requested changes:
    * Removed title tag from the credit link
    * Pages now display comments

= Version 1.0 =
  - Initial Release

=== Review Tickets ===
* http://themes.trac.wordpress.org/ticket/278
* http://themes.trac.wordpress.org/ticket/1363
* http://themes.trac.wordpress.org/ticket/3374
* http://themes.trac.wordpress.org/ticket/4165 - version 1.7.1
* http://themes.trac.wordpress.org/ticket/5143 - version 1.8
* http://themes.trac.wordpress.org/ticket/7445 - version 1.9
* http://themes.trac.wordpress.org/ticket/7446 - version 1.9.1
* http://themes.trac.wordpress.org/ticket/8516 - version 2.0
* http://themes.trac.wordpress.org/ticket/10292 - version 2.1
* http://themes.trac.wordpress.org/ticket/11663 - version 2.2 - March 2013
* http://themes.trac.wordpress.org/ticket/13433 - version 2.2.1 - July 2013
* http://themes.trac.wordpress.org/ticket/15297 - version 2.2.2 - November 2013
* https://themes.trac.wordpress.org/ticket/17977 - version 2.2.3 - April 2014
* https://themes.trac.wordpress.org/ticket/21491 - version 2.3 - November 2014
* https://themes.trac.wordpress.org/ticket/22352 - version 2.3.2 - December 2014
* https://themes.trac.wordpress.org/ticket/25508 - version 2.4 - June 2015