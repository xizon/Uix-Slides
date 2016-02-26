<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !isset( $_GET[ 'tab' ] ) || $_GET[ 'tab' ] == 'about' ) {
?>

        <p>
        <?php _e( 'This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme. <br>Insert slides anywhere on your site using a custom post type. Powered by jQuery Flexslider with some transition styles to choose from.', 'uix-slides' ); ?>
        </p>  
       
<?php } ?>