=== Uix Slides ===
Contributors: UIUX Lab
Author URI: http://uiux.cc
Plugin URL: http://uiux.cc/wp-plugins/uix-slides/
Tags: slides, slider, post type
Requires at least: 4.2
Tested up to: 4.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. 

== Description ==


This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. 

Insert slides anywhere on your site using a custom post type. Powered by jQuery Flexslider with some transition styles to choose from.


= Credits and Special Thanks =
 - Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins (https://github.com/jeremyclark13/automatic-theme-plugin-update)
 - Custom Metaboxes and Fields (https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
 - Kirki (http://kirki.org/)
 - Flexslider (http://flexslider.woothemes.com/)
 - Cherry Framework (http://www.cherryframework.com/)


== Installation ==

1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to "Appearance -> Install Plugins".
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)

2. Please check if you have the 2 template files 'uix-slides-style.css' and 'partials-uix-slides.php' in your templates directory. If you can't find these files, then just copy them from the directory '/wp-content/plugins/uix-slides/theme_templates/' to your templates directory.

3. Create uix slides item and publish slides then.

4. You can pretty much custom every aspect of the look and feel of this page by modifying the 'uix-slides-style.css' and 'partials-uix-slides.php'.

5. Embedding Methods: 

    (1) Place <?php get_template_part( 'partials', 'uix-slides' ); ?> in your templates.
    (2) Use [uix_slides_output show="-1"] to add it to your Post, Widgets or Page content. Now this shortcode has one attributes. Slides show at most can be customized using the "show" parameter. Show all items if value is '-1'.
    
6. The Uix Slides plugin allows users to easily enable a "Customizer Page" to themes. Go to "Appearance -> Customize". 


== Changelog ==

= 1.0.0 =
*Release Date - 1st February, 2016*

* First release.
