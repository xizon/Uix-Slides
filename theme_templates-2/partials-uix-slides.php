<?php
/**
 * The template for displaying Uix Slides.
 *
 *
 * Note: The function will be used to .php file of theme when get_header() exist. The code could also be sought for header.php file.
 *
 * The .php file of theme contains the following standard code:

   get_template_part( 'partials', 'uix-slides' ); 

 */
 
if ( ! class_exists( 'UixSlides' ) ) { 
    return;
}

//Uix Slides paged template declaration
global $uix_slides_temp;
$uix_slides_temp = true;


// Query
global $uix_slider_per;
$show = ( empty( $uix_slider_per ) ) ? '-1' : $uix_slider_per;
$uix_slides_query_slides = new WP_Query(
	array(
		'post_type'      => 'uix-slides',
		'posts_per_page' => $show,
		'no_found_rows'  => true,
	)
);

if ( $uix_slides_query_slides->posts && is_array ( $uix_slides_query_slides->posts ) ) { 
    add_action( 'wp_footer', 'uix_slides_script', 100 );
}


if ( !function_exists( 'uix_slides_script' ) ) {
	function uix_slides_script() {
	
?>
	<script>
	( function($) {
		'use strict';
		
		$( function() {
			
	
			/*! 
			 * ************************************
			 * Home Carousel
			 *************************************
			 */
			$( '#uix-slides' ).flexslider( {
				animation         : '<?php echo  get_theme_mod( 'custom_uix_slides_effect', 'slide' ); ?>',
				slideshow         : <?php echo ( get_theme_mod( 'custom_uix_slides_auto', true ) ) ? 'true' : 'false'; ?>,
				slideshowSpeed    : '<?php echo  get_theme_mod( 'custom_uix_slides_speed', 10000 ); ?>',
				animationSpeed    : '<?php echo get_theme_mod( 'custom_uix_slides_effect_duration', 600 ); ?>',
				smoothHeight      : <?php echo ( get_theme_mod( 'custom_uix_slides_smoothheight', false ) ) ? 'true' : 'false'; ?>,
				controlNav        : <?php echo ( get_theme_mod( 'custom_uix_slides_paging_nav', false ) ) ? 'true' : 'false'; ?>,
				directionNav      : <?php echo ( get_theme_mod( 'custom_uix_slides_arr_nav', true ) ) ? 'true' : 'false'; ?>,
				animationLoop     : <?php echo ( get_theme_mod( 'custom_uix_slides_animloop', false ) ) ? 'true' : 'false'; ?>,
				selector          : '.slides > li',
				prevText          : '<span class="flex-custom-dir flex-custom-dir-prev"></span>',
				nextText          : '<span class="flex-custom-dir flex-custom-dir-next"></span>',
				controlsContainer : ".flexslider-container",
				start: function(slider) {//Fires when the slider loads the first slide
					slider.removeClass( 'flexslider-loading' );
					slider.slides.find( 'img' ).css( { 'opacity': 0 } );
					slider.slides.find( 'img' ).eq( 0 ).animate( { 'opacity': 0.3 }, slider.vars.animationSpeed, slider.vars.easing );
					
					
					//captions
					$( '.uix-slides-homepage-content' ).hide();
					setTimeout( function(){
						var sliderHeight = slider.height();
						var sliderWidth = slider.width();
						$( '.uix-slides-homepage-content' ).each( function( index ) {
							
							var capWidth;
							if ( sliderWidth > 767 ) {
								capWidth = sliderWidth*0.35;
							} else {
								capWidth = sliderWidth*0.7;
							}
							$( this ).css( { 'width': capWidth + 'px' } );
							
							
							var capHeight = $( this ).height();
							$( this ).css( { 'top': (sliderHeight - capHeight)/2 + 'px', 'left': (sliderWidth - capWidth)/2 + 'px' } ).fadeIn(300);
							
						});
	
					}, <?php echo get_theme_mod( 'custom_uix_slides_effect_duration', 600 ); ?>);
					
				},
				end: function(slider) {//Fires when the slider reaches the last slide (asynchronous).
					slider.slides.find( 'img' ).css( { 'opacity': 0 } );	
			
				},
				
				before: function(){//Fires asynchronously with each slider animation
	
				
				},
				after: function( slider ){//Fires after each slider animation completes
	
					var currentSlide = slider.slides.find( 'img' ).css( { 'opacity': 0, 'display': 'block', 'zIndex': 1 } ).eq( slider.currentSlide ),
						currentSlideVisible = currentSlide.is(':visible'),
						sliderSpeed = slider.vars.animationSpeed,
						sliderEasing = slider.vars.easing;
				
		
					currentSlide.css( { 'opacity': 0, 'zIndex': 2 } ).animate( { 'opacity': 0.3 }, sliderSpeed, sliderEasing );
				
				}
					
	
			} );
		
		
	
		} ); 
		
	} ) ( jQuery );
	</script>


<?php 
	}
} 
?>

	<div id="uix-slides-wrap" class="flexslider-container">

		<div id="uix-slides" class="flexslider flexslider-loading">

			<ul class="slides">

				<?php
				
				if ( $uix_slides_query_slides->posts && is_array ( $uix_slides_query_slides->posts ) ) { 
				
			
					// Loop through each item
					foreach( $uix_slides_query_slides->posts as $post ) : setup_postdata( $post ); ?>
	
						<?php
						// Get data
						$caption    = get_post_meta( get_the_ID(), 'uix_slide_caption', true );
						$url        = get_post_meta( get_the_ID(), 'uix_slide_url', true );
						$url_target = get_post_meta( get_the_ID(), 'uix_slide_target', true );
						$url_target = ( $url_target == true ) ? ' target="_blank" ' : ''; 
						$text_color = get_post_meta( get_the_ID(), 'uix_slide_textcolor', true );
						if ( $text_color == '' ) $text_color = '#ffffff';
	
						?>
    
						<li data-id="slide-<?php echo get_the_ID(); ?>">
	
							<?php if ( get_theme_mod( 'custom_uix_slides_textinfo', true ) ) { ?>
                                
								<?php if ( $url ) { ?>
                                    <a href="<?php echo $url; ?>"  title="<?php the_title_attribute(); ?>" <?php echo $url_target; ?>>
                                <?php } ?>
        
                                <div class="uix-slides-homepage-inner">
                                    <div class="uix-slides-homepage-content" style="border-color:<?php echo $text_color; ?>">
                                        <div class="uix-slides-homepage-title" style="color:<?php echo $text_color; ?>"><?php the_title(); ?></div>
                                        <?php if ( $caption ) { ?>
                                            <div class="uix-slides-homepage-caption" style="color:<?php echo $text_color; ?>"><?php echo $caption; ?></div>
                                        <?php } ?>
                                    </div><!-- .uix-slides-content -->
                                </div>
    
                                <?php if ( $url ) { ?>
                                    </a>
                                <?php } ?>  
     
                                
                                
                            <?php } ?>
                            
                              
							<?php
							// Display post thumbnail
							$image_src = get_post_meta( get_the_ID(), 'uix_slide_img', true );
							$image_id = attachment_url_to_postid( $image_src );
												
							if ( $image_id ) {
								$thumb = wp_get_attachment_image_url( $image_id, 'uix-slides-entry', true );
							}
							
							if ( isset( $thumb ) ) {
								echo '<img src="'.$thumb.'" alt="">';
							} 
							
							?>
                  
	
				
						</li>

				<?php 
				    endforeach; 
					
				 }
				?>
                
                
			</ul><!-- .slides -->
            
         </div><!-- .flexslider -->

	</div><!-- #uix-slides-wrap" -->

<?php

// Reset post data to prevent conflicts with the main query
wp_reset_postdata();