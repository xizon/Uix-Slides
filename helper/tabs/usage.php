<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'usage' ) {
?>


        <p>
           <?php _e( '1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to <strong>"Appearance -> Install Plugins"</strong>.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)', 'uix-slides' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/plug.jpg" alt="">
        </p> 
        <p>
           <?php _e( '2. Please check if you have the 2 template files <code>"uix-slides-style.css"</code> and <code>"partials-uix-slides.php"</code> in your templates directory. If you can\'t find these files, then just copy them from the directory "/wp-content/plugins/uix-slides/theme_templates/" to your templates directory.', 'uix-slides' ); ?>
           
          
        </p>  
        <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/temp.jpg" alt="">
        </p> 
       
        <p>
           <?php _e( '3. Create uix slides item and publish slides then.', 'uix-slides' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/add-item.jpg" alt="">
        </p> 
        <p>
           <?php _e( '4. You can pretty much custom every aspect of the look and feel of this page by modifying the <code>"uix-slides-style.css"</code> and <code>"partials-uix-slides.php"</code>.', 'uix-slides' ); ?>
        </p>   
        <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/editor.jpg" alt="">
        </p> 
        
        <p>
           <?php _e( '5. <strong>Embedding Methods:</strong>', 'uix-slides' ); ?>
        </p>   
        <p>
           <?php _e( '(1) Place <code>&lt;?php get_template_part( \'partials\', \'uix-slides\' ); ?&gt;</code> in your templates.', 'uix-slides' ); ?>
        </p>      
         <p>
           <?php _e( '(2) Use <code>[uix_slides_output show="-1"]</code> to add it to your Post, Widgets or Page content. Now this shortcode has one attributes. Slides show at most can be customized using the "show" parameter. Show all items if value is "-1". Go to your WordPress admin panel, edit or create a new post (or page). You’ll see our tiny little button in the toolbar, preceded by a separator:', 'uix-slides' ); ?>
        </p>  
    
         <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/sc.jpg" alt="">
        </p> 
        
        <p>
           <?php _e( '6. The Uix Slides plugin allows users to easily enable a "Customizer Page" to themes. Go to <strong>"Appearance -> Customize"</strong>.', 'uix-slides' ); ?>
        </p>   
        <p>
           <img src="<?php echo UixSlides::plug_directory(); ?>helper/img/customize.jpg" alt="">
        </p>  

<?php } ?>