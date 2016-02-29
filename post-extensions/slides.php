<?php

/**
 * Thumbnail support for slides posts
 *
 */
add_theme_support( 'post-thumbnails', array( 'uix-slides' ) );

/*
 * Removing a Meta Box
 * 
 */ 

function uix_slides_remove_custom_field_meta_box() {
	remove_meta_box( 'postimagediv', 'uix-slides', 'side' );
}
add_action( 'do_meta_boxes', 'uix_slides_remove_custom_field_meta_box' );


function uix_slides_featured_image_column_remove_post_types( $post_types ) {
    foreach( $post_types as $key => $post_type ) {
        if ( 'uix-slides' === $post_type ) // Post type you'd like removed. Ex: 'post' or 'page'
            unset( $post_types[$key] );
    }
    return $post_types;
}

function uix_slides_featured_image_column_init() {
    add_filter( 'featured_image_column_post_types', 'uix_slides_featured_image_column_remove_post_types', 11 ); // Remove
}
add_action( 'featured_image_column_init', 'uix_slides_featured_image_column_init' );




/**
 * Registers the "Slides" custom post type
 *
 * @link	http://codex.wordpress.org/Function_Reference/register_post_type
 */

function uix_slides_taxonomy_register() {

	// Define post type labels
	$labels = array(
		'name'					=> __( 'Uix Slides', 'uix-slides' ),
		'singular_name'			=> __( 'Slides Item', 'uix-slides' ),
		'add_new'				=> __( 'Add New Item', 'uix-slides' ),
		'add_new_item'			=> __( 'Add New Slides Item', 'uix-slides' ),
		'edit_item'				=> __( 'Edit Slides Item', 'uix-slides' ),
		'new_item'				=> __( 'Add New Slides Item', 'uix-slides' ),
		'view_item'				=> __( 'View Item', 'uix-slides' ),
		'search_items'			=> __( 'Search Slides', 'uix-slides' ),
		'not_found'				=> __( 'No slides items found', 'uix-slides' ),
		'not_found_in_trash'	=> __( 'No slides items found in trash', 'uix-slides' )
	);
	
	// Define post type args
	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'supports'			=> array( 'title', 'thumbnail'),
		'capability_type'	=> 'post',
		'rewrite'			=> false,
		'has_archive'		=> false,
		'menu_icon'			=> 'dashicons-images-alt2',
	); 
	
	// Apply filters for child theming
	$args = apply_filters( 'uix_slides_args', $args );
	
	
	// Register the post type
	register_post_type( 'uix-slides', $args );

}
add_action( 'init', 'uix_slides_taxonomy_register', 0 );





/**
 * Adds columns in the admin view for thumbnail and taxonomies
 *
 *
 */

	
function uix_slides_taxonomy_edit_cols( $columns ) {

	$columns = array(
		'cb' 		                => $columns['cb'], 
		'uix-slides-thumbnail'      => __( 'Slide Image', 'uix-slides' ),
		'title'                  	=> $columns['title'], 
		'uix-slides-url'            => __( 'URL', 'uix-slides' ),
		'author' 	                => __('Author', 'uix-slides'),
		'date'                      => $columns['date']
		
	);
	
	return $columns;
}
add_filter( 'manage_edit-uix-slides_columns', 'uix_slides_taxonomy_edit_cols' );


/**
 * Adds columns in the admin view for thumbnail and taxonomies
 *
 * Display the meta_boxes in the column view
 */
function uix_slides_taxonomy_cols_display( $columns, $post_id ) {
	
	switch ( $columns ) {
		
		case 'uix-slides-thumbnail':
	
	
	        // Get attachment ID
			$image_src = get_post_meta( $post_id, 'uix_slide_img', true );
			$image_id = attachment_url_to_postid( $image_src );
			
		
			if ( $image_id ) {
				$thumb = wp_get_attachment_image_url( $image_id, array( '50', '50' ), true );
			}
			
			if ( isset( $thumb ) ) {
				echo '<a href="'.$image_src.'" target="_blank"><img src="'.$thumb.'" style="max-width:50px; max-height:50px"></a>';
			} else {
				echo '&mdash;';
			}
			
			

		break;	

	
		case 'uix-slides-url':


			$url = esc_html( get_post_meta( get_the_ID(), 'uix_slide_url', true ) );
			
			if ( $url != '' ) {
				echo '<a href="'.$url.'" target="_blank">'.$url.'</a>';
			} else {
				echo '&mdash;';
			}
			
		break;		
		
	}

}
add_action( 'manage_uix-slides_posts_custom_column', 'uix_slides_taxonomy_cols_display', 10, 2 );


/**
 * Display “Edit | Quick Edit | Trash ” in custom WP_List_Table column
 */
function uix_slides_row_actions() {
	
	  //Check if screen’s ID, base, post type, and taxonomy, among other data points
	  $currentScreen = get_current_screen();

	  if( ( mb_strlen( strpos( $currentScreen->id, 'uix_slides' ), 'UTF8' ) > 0 || mb_strlen( strpos( $currentScreen->id, 'uix-slides' ), 'UTF8' ) > 0 ) && mb_strlen( strpos( $currentScreen->id, '_page_' ), 'UTF8' ) <= 0 ) {
		  add_filter( 'post_row_actions', 'uix_slides_remove_row_actions', 10, 1 );
	  }
	

}	
function uix_slides_remove_row_actions( $actions ){
    if( get_post_type() === 'uix-slides' )
        unset( $actions['view'] );
		unset( $actions['inline hide-if-no-js'] );
       
    return $actions;
}
add_action( 'current_screen', 'uix_slides_row_actions' );


/**
 * Removes the permalinks display on the custom post type
 */
function uix_slides_remove_permalink() {
	if( get_post_type() === 'uix-slides' ) {
			echo '
			<style>
		    	#edit-slug-box,
				#post-preview
				{display:none;}
			</style>';
	}
}
add_action( 'admin_head', 'uix_slides_remove_permalink' );
