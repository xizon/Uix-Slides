<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'credits' ) {
?>


        <h3>
           <?php _e( 'I would like to give special thanks to credits. The following is a guide to the list of credits for this plugin:', 'uix-slides' ); ?>
        </h3>  
        <p>
        
        <ul>
            <li><a href="http://w-shadow.com" target="_blank" rel="nofollow">Plugin Update Checker Library</a></li>
            <li><a href="https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress" target="_blank" rel="nofollow">Custom Metaboxes and Fields</a></li>
            <li><a href="http://kirki.org/" target="_blank" rel="nofollow">Kirki</a></li>
            <li><a href="https://github.com/woothemes/FlexSlider" target="_blank" rel="nofollow">Flexslider</a></li>
            <li><a href="http://www.cherryframework.com/" target="_blank" rel="nofollow">Cherry Framework</a></li>

        </ul>
        
        </p> 
        
    
<?php } ?>