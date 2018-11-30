=== Uix Slides ===
Contributors: UIUX Lab
Author URI: https://uiux.cc
Plugin URL: https://uiux.cc/wp-plugins/uix-slides/
Tags: slides, slider, post type
Requires at least: 4.2
Tested up to: 4.9.8
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. 

== Description ==


This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. 

Insert slides anywhere on your site using a custom post type. Powered by jQuery Flexslider with some transition styles to choose from.


= Credits and Special Thanks =
 - Plugin Update Checker Library (http://w-shadow.com)
 - Custom Metaboxes and Fields (https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
 - Kirki (http://kirki.org/)
 - Flexslider (http://flexslider.woothemes.com/)
 - Cherry Framework (http://www.cherryframework.com/)


== Installation ==

1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to "Appearance -> Install Plugins".
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)

2. You need to create Uix Slides template files in your templates directory. You can create the files on the WordPress admin panel. As a workaround you can use FTP, access the Uix Slides template files path (/wp-content/plugins/uix-slides/theme_templates/) and upload files to your theme templates directory (/wp-content/themes/{your-theme}/).  

   Please check if you have the 2 template files 'uix-slides-style.css' and 'partials-uix-slides.php' in your templates directory. If you can't find these files, then just copy them from the directory '/wp-content/plugins/uix-slides/theme_templates/' to your templates directory.

3. Create uix slides item and publish slides then.

4. You can pretty much custom every aspect of the look and feel of this page by modifying the "*.php" template files (Access the path to the themes directory) . Best Practices for Editing WordPress Template Files:

  (1) WordPress comes with a theme and plugin editor as part of the core functionality. You can find it in your install by going to "Appearance > Editor" from your sidebar.

  (2) You can connect to your site via an FTP client, download a copy of the file you want to change, make the changes and then upload the file back to the server, overwriting the file that’s on the server.
  
  
5. Adding Uix Slides to Web Pages.

There are two different ways you can add the Uix Slides widget to your site's pages:

  (1) Shortcode - Embed a shortcode into the editor of any post, page, or custom post type. 
      
      Use [uix_slides_output show="-1"] to add it to your Post, Widgets or Page content. Now this shortcode has one attributes. Slides show at most can be customized using the "show" parameter. Show all items if value is '-1'.
      
      Go to your WordPress admin panel, edit or create a new post (or page). You’ll see a Uix Slides button in the toolbar.
  
  (2) Template tags - Add a simple PHP function to one of your theme's template files. 
  
      Place <?php get_template_part( 'partials', 'uix-slides' ); ?> in your templates.

 
6. The Uix Slides plugin allows users to easily enable a "Customizer Page" to themes. Go to "Appearance -> Customize". 

7. You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original ".css" files. Go to "Appearance -> Customize".


== Changelog ==

= 1.0.3 (November 30, 2018) =

* Fix: Solved some problems under PHP7 and Gutenberg.


= 1.0.2 =
* Upgraded the plugin Flexslider to 2.7.0.
* Solved some compatibility issues.


= 1.0.0 =
*Release Date - 1st February, 2016*

* First release.
