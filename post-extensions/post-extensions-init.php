<?php


/*
 * Custom Metaboxes and Fields
 *
 * Define the metabox and field configurations.
 * @param  array $meta_boxes
 * @return array
 *
 */


function uix_slides_metaboxes( array $meta_boxes ) {

	// Slides
	$meta_boxes[] = array(
		'id'			=> 'uix-slides-img',
		'title'			=> __( 'Slider Image', 'uix-slides' ),
		'pages'			=> array( 'uix-slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	    => false,
		'fields'		    => array(
			
			
			array(
				'name' => '',
				'id'   => 'uix_slide_img',
				'type' => 'file',
			),
			
		),
	);

	$meta_boxes[] = array(
		'id'			=> 'uix-slides-meta',
		'title'			=> __( 'Slider Settings', 'uix-slides' ),
		'pages'			=> array( 'uix-slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
		
			array(
				'name'	=> __( 'Caption', 'uix-slides' ),
				'desc'	=>  '',
				'id'	=> 'uix_slide_caption',
				'type'	=> 'textarea_small',
				
			),
			
			array(
				'name'    => __( 'Title Color', 'uix-slides' ),
				'desc'    => '',
				'id'      => 'uix_slide_title_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
			
			array(
				'name'    => __( 'Caption Color', 'uix-slides' ),
				'desc'    => '',
				'id'      => 'uix_slide_caption_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
			

		),
	);


	$meta_boxes[] = array(
		'id'			=> 'uix-slides-url-meta',
		'title'			=> __( 'URL Settings', 'uix-slides' ),
		'pages'			=> array( 'uix-slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	    => true,
		'fields'		    => array(
			array(
				'name'	=> __( 'URL', 'uix-slides' ),
				'desc'	=>  __( 'Enter a custom URL to link this slide to. Don\'t forget the http// at the front!', 'uix-slides' ),
				'id'	=> 'uix_slide_url',
				'type'	=> 'text',
				
			),
			array(
				'name'	=> __( 'Target', 'uix-slides' ),
				'desc'	=>  __( 'Open link in a new window/tab', 'uix-slides' ),
				'id'	=> 'uix_slide_target',
				'type'	=> 'checkbox',
				'default' => false
				
			),
			
			

		),
	);



	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'uix_slides_metaboxes' );




/*
 * Custom Post Types
 *
 * WordPress can hold and display many different types of content. A single item of such a content is generally called a post, 
 * although post is also a specific post type. Internally, all the post types are stored in the same place, 
 * in the wp_posts database table, but are differentiated by a column called post_type.
 *
 */


//New custom post type 'Slides'  
require_once 'slides.php';









 