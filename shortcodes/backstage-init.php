<?php
/**
 * Add shortcodes
 *
 * Search content for shortcodes and filter shortcodes through their hooks.
 */



/**
 * To add buttons to the editor
 *
 */
function uix_slides_register_buttons( $buttons ) {
    array_push( $buttons, 'uix_slides_btn' ); 
    return $buttons;
}
add_filter( 'mce_buttons', 'uix_slides_register_buttons' );


function uix_slides_add_buttons( $plugin_array ) {
    $plugin_array['uix_slides'] = UixSlides::plug_directory() .'shortcodes/core/tinymce-plugin.js';
    return $plugin_array;
}
add_filter( "mce_external_plugins", "uix_slides_add_buttons" );





