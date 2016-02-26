# Uix Slides
This is a WordPress Plugin. This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme.

Copyright (c) 2016 UIUX Lab [@uiux_lab](http://twitter.com/uiux_lab)


[Plugin URI](http://uiux.cc/wp-plugins/uix-slides/)

### Licensing

Licensed under the [GPL3.0](http://www.gnu.org/licenses/gpl-3.0.en.html).

### Description

This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. 

Insert slides anywhere on your site using a custom post type. Powered by jQuery Flexslider with some transition styles to choose from.

### Updates 

##### Version 1.0.0
Initial Release.


### Tested under

- WP 4.2.*
- WP 4.3.*
- WP 4.4.1
- WP 4.4.2


###Credits

#####I would like to give special thanks to credits. The following is a guide to the list of credits for this plugin:

- [Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins](https://github.com/jeremyclark13/automatic-theme-plugin-update)
- [Custom Metaboxes and Fields](https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
- [Kirki](http://kirki.org/)
- [Flexslider](https://github.com/woothemes/FlexSlider)
- [Cherry Framework](http://www.cherryframework.com/)

###How to use?

1.After activating your theme, you can see a prompt pointed out as absolutely critical. Go to **"Appearance -> Install Plugins"**.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)

![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/plug.jpg)

2.Please check if you have the **2** template files `uix-slides-style.css` and `partials-uix-slides.php` in your templates directory. If you can't find these files, then just copy them from the directory **"/wp-content/plugins/uix-slides/theme_templates/"** to your templates directory.
![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/temp.jpg)


3.Create uix slides item and publish slides then.

![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/add-item.jpg)

4.You can pretty much custom every aspect of the look and feel of this page by modifying the `uix-slides-style.css` and `partials-uix-slides.php`.

![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/editor.jpg)

5.**Embedding Methods:**

(1) Place `<?php get_template_part( 'partials', 'uix-slides' ); ?>` in your templates.
(2) Use `[uix_slides_output show="-1"]` to add it to your Post, Widgets or Page content. Now this shortcode has one attributes. Slides show at most can be customized using the **"show"** parameter. Show all items if value is **"-1"**. Go to your WordPress admin panel, edit or create a new post (or page). You’ll see our tiny little button in the toolbar, preceded by a separator:

![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/sc.jpg)


6.The Uix Slides plugin allows users to easily enable a "Customizer Page" to themes. Go to **"Appearance -> Customize"**.

![](https://github.com/xizon/Uix-Slides/blob/master/helper/img/customize.jpg)
