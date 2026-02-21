===Lollum Framework===

Contributors: Lollum (lollum.com)
Version 1.26
Requires at least: 3.4.0
Tested up to: 4.1.0
License: The PHP code and integrated HTML are licensed under the General Public
License (GPL). All other parts, but not limited to the CSS code, images, and design belong to their respective owners.

==Description==

Lollum Framework extends functionality to Lollum themes. It provides some post types, the page builder, shortcodes, post formats meta boxes and the 'love' functionality.

==Frequently Asked Questions==

= What is this plugin and why do I need it? =

Lollum Framework provides extra functionality to the collection of Lollum themes. The plugin is not a requirement to use Lollum themes, but it will extend the themes to function as you see them in the demos.

= Can I use this plugin with other themes? =

Yes, but only the code lincensed under the General Public
License (GPL). Lollum Framework was developed to extend the functionality of Lollum themes specifically and it contains some assets that can't be distributed (UI Font - Lines for example). However parts of it may be useful to other themes.

To register a post type add this code in your theme (functions.php):

```php
$post_types = array(
	'portfolio' => 'yes',
	'team' => 'yes',
	'job' => 'yes',
	'faq' => 'yes'
);
add_option('lolfmk_supported_post_types', $post_types);
```

Please note: I don't provide support for these customizations.

==Changelog==

= v1.26 - May 21, 2015 =
* Security fix: prettyPhoto updated

= v1.25 - Feb 15, 2015 =
* Error control operator removed when meta boxes are saved (in functions-metaboxes.php and data-builder.php)

= v1.24 - Feb 12, 2015 =
* Font-Awesome updated
* Update notifier deleted

= v1.23 - Jan 28, 2015 =
* New block for Nantes: Masonry-Images
* Plugin localized.

= v1.22 - Jan 09, 2015 =
* Optional URL for team members
* Plugin localized.

= v1.21 - Nov 24, 2014 =
* Filter Masonry-Products by category
* Plugin localized.

= v1.20 - Nov 03, 2014 =
* New icon font: Simple-Line-Icons.

= v1.19 - Oct 13, 2014 =
* New blocks and some options for Nantes.
* New media uploader for "upload" meta boxes
* New icon font: UI Font Line
* Plugin localized.

= v1.18 - Aug 04, 2014 =
* Images clickable in grid blocks.

= v1.17 - Jul 24, 2014 =
* Fix for Mailchimp library in PHP 5.3-.

= v1.16 - Jul 16, 2014 =
* New meta box for Crazy Diamond.

= v1.15 - Jun 28, 2014 =
* New block for Crazy Diamond.

= v1.14 - Jun 12, 2014 =
* New blocks and some options for Crazy Diamond.
* Minor fix for prettyPhoto.

= v1.13 - May 31, 2014 =
* Font picker in progress number.
* Plugin localized.

= v1.12 - May 20, 2014 =
* Font Awesome updated (v. 4.1.0).
* Linecons font added.
* Font picker in blocks.
* Plugin localized.

= v1.11 - May 14, 2014 =
* Filter portfolio blocks by category.
* Plugin localized.

= v1.10 - Feb 19, 2014 =
* Save page elements in draft mode.

= v1.9 - Feb 18, 2014 =
* Fix in update notifier.

= v1.8 - Feb 17, 2014 =
* Plugin localized.

= v1.7 - Feb 14, 2014 =
* Minor fix.

= v1.6 - Feb 11, 2014 =
* New blocks and some options for Big Point

= v1.5 - Jan 21, 2014 =
* Filter FAQs by category.
* Marker in Map Block.
* Lightbox in Image Block.
* Minor fix.

= v1.4 - Dec 20, 2013 =
* Minor fix.

= v1.3 - Dec 01, 2013 =
* Version fixed.

= v1.2 - Nov 28, 2013 =
* Added post types support control.
* Fixed minor error in feature block

= v1.1 - Nov 09, 2013 =
* Added product sidebar option.

= v1.0 - Oct 30, 2013 =
* Original Release.
