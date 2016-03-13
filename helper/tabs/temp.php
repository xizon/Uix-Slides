<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'temp' ) {
	
	
	$wpnonce_url = 'edit.php?post_type='.UixSlides::get_slug().'&page='.UixSlides::HELPER;
	$wpnonce_action = 'temp-filesystem-nonce';
	
?>     

     <?php if( UixSlides::tempfile_exists() ) { ?>
	 
	 
         <p>
           <?php _e( 'Uix Slides template files already exists.', 'uix-slides' ); ?>
   
        </p>  
        
    <?php } else {  ?>

         <h3><?php _e( 'Copy Uix Slides template files in your templates directory:', 'uix-slides' ); ?></h3>
         <p>
           <?php _e( 'As a workaround you can use FTP, access the Uix Slides template files path <code>/wp-content/plugins/uix-slides/theme_templates/</code> and upload files to your theme templates directory <code>/wp-content/themes/{your-theme}/</code>. ', 'uix-slides' ); ?>
   
        </p>   
         
         <form method="post">
          <?php
		  
            $output = "";

            if ( !empty( $_POST ) ) {
				
				
                  $output = UixSlides::templates( $wpnonce_action, $wpnonce_url );
				  echo $output;
			
            } else {
				
				wp_nonce_field( $wpnonce_action );
				echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__( 'Click This Button to Copy Files', 'uix-slides' ).'"  /></p>';
				
			}

          ?>
         </form>
         
         
    <?php } ?>
    
<?php } ?>