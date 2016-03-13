<?php

/**
 * Enable the use of shortcodes in ...
 *
 */

add_filter( 'widget_text', 'do_shortcode' ); //text widgets.
add_filter( 'the_excerpt', 'do_shortcode' ); //excerpt.
add_filter( 'comment_text', 'do_shortcode' ); //comment.

//----------------------------------------------------------------------------------------------------
//[shortcode - uix_slides]
//----------------------------------------------------------------------------------------------------
	
function uix_slides_fun( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'show' => '-1',
	 ), $atts ) );
	 
	 global $post;
	 global $uix_slider_per;
	 
	$uix_slider_per = $show;
	 
    // capture output from the widgets
	ob_start();
	
	    if( !UixSlides::tempfile_exists() ) {
			require_once WP_PLUGIN_DIR .'/'.UixSlides::get_slug(). '/theme_templates/partials-uix-slides.php';
		} else {
			require_once get_template_directory() . '/partials-uix-slides.php';
		}
		
		$out = ob_get_contents();
	ob_end_clean();
	 
	
   $return_string = $out;
   
   return UixSlides::do_callback( $return_string );
}
add_shortcode( 'uix_slides_output', 'uix_slides_fun' );


