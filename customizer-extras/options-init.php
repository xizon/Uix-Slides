<?php
/**
 * Building WordPress themes using the Kirki Customizer
 *
 */

if ( class_exists( 'Kirki' )  && class_exists( 'UixSlides' )  ) {
	
	global $wp_customize;
	
	$uix_slides_kirki_config_id = 'uix_slides_kirki_custom';
	
	/*
	*
	* Kirki customizer configuration
	*
	*/
	
	Kirki::add_config( $uix_slides_kirki_config_id, array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	

	
	
	//Function of "Allowing html in text"
	function uix_slides_kirki_do_not_filter_anything( $value ) {
		return $value;
	}
		
	
			
	//This function adds some styles to the WordPress Customizer
	function uix_slides_kirki_custom_style() {
	
		wp_enqueue_style( 'kirki-customizer-custom-css', UixSlides::plug_directory() .  'customizer-extras/css/main.css', null, null );

	}
	if ( $wp_customize ) {
	
		add_action( 'customize_controls_print_styles', 'uix_slides_kirki_custom_style', 100 );
		
	}
	


    /*
     * ------------------------------------------------------------------------------------------------
     */

	
	Kirki::add_section( 'panel-theme-uix-slides', array(
		'title'          => __( 'Uix Slides Settings', 'uix-slides' ),
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
	) );
	
	
	/**
	 * Add the configuration.
	 * 
	 * will inherit these options
	 */
	
		


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'radio',
		'settings'    => 'custom_uix_slides_effect',
		'label'       => __( 'Effect', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => 'slide',
		'priority'    => 10,
		'choices'     => array(
			'slide'   => __( 'Slide', 'uix-slides' ),
			'fade' => __( 'Fade', 'uix-slides' ),
		),
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_auto',
		'label'       => __( 'Automatically Transition', 'uix-slides' ),
		'description' => __( 'Setup a slideshow for the slider to animate automatically.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'slider',
		'settings'    => 'custom_uix_slides_effect_duration',
		'label'       => __( 'Speed of images appereance in ms', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => 600,
		'priority'    => 10,
		'choices' => array(
			'min' => 0,
			'max' => 5000,
			'step' => 100,
		),
	) );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'slider',
		'settings'    => 'custom_uix_slides_speed',
		'label'       => __( 'Delay between images in ms', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => 10000,
		'priority'    => 10,
		'choices' => array(
			'min' => 0,
			'max' => 15000,
			'step' => 100,
		),
	) );

	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_arr_nav',
		'label'       => __( 'Show Arrow Navigation', 'uix-slides' ),
		'description' => __( 'Create previous/next arrow navigation.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	) );
	

	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_paging_nav',
		'label'       => __( 'Show Paging Navigation', 'uix-slides' ),
		'description' => __( 'Create navigation for paging control of each slide.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => false,
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_animloop',
		'label'       => __( 'Animation Loop', 'uix-slides' ),
		'description' => __( 'Gives the slider a seamless infinite loop.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	) );

	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_smoothheight',
		'label'       => __( 'Smooth Height', 'uix-slides' ),
		'description' => __( 'Animate the height of the slider smoothly for slides of varying height.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => false,
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_slides_textinfo',
		'label'       => __( 'Show Text Information', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_box_height_title',
		'label'       => __( 'Slider Height', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
	) );

	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'checkbox',
		'settings'    => 'custom_uix_slides_box_autoheight',
		'label'       => __( 'Automatic height', 'uix-slides' ),
		'description' => __( 'When checked, the slider container will resize height proportionally.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'dimension',
		'settings'    => 'custom_uix_slides_box_height',
		'label'       => '',
		'description' => __( 'The slider container height in pixels. ', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => 600,
		'priority'    => 10,
		'choices' => array(
			'units' => array( 'px' )
		),
		'required'    => array(
			array(
				'setting'  => 'custom_uix_slides_box_autoheight',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_box_width_title',
		'label'       => __( 'Slider Width', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'checkbox',
		'settings'    => 'custom_uix_slides_box_fullwidth',
		'label'       => __( 'Full Width', 'uix-slides' ),
		'description' => __( 'When checked, allow slider to display in full width that will keep width/height proportions.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => true,
		'priority'    => 10,
	
	) );
	

	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'dimension',
		'settings'    => 'custom_uix_slides_box_width',
		'label'       => '',
		'description' => __( 'The slider container width in pixels. ', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => 1440,
		'priority'    => 10,
		'choices' => array(
			'units' => array( 'px' )
		),
		'required'    => array(
			array(
				'setting'  => 'custom_uix_slides_box_fullwidth',
				'operator' => '==',
				'value'    => false,
			),
		),
	) );
	


	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_single_size_title',
		'label'       => __( 'Image Size for Entry', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_slides_single_size_w',
		'label'       => '',
		'description' => __( 'Max Width (in px)', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => '1920',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_slides_single_size_h',
		'label'       => '',
		'description' => __( 'Max Height (in px)', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => '9999',
		'priority'    => 10
	) );
	

<<<<<<< HEAD


	/**
	 * ----------------------  Add google fonts section. ----------------------
	 * 
	 */
	
=======
>>>>>>> origin/master
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_gf_title',
		'label'       => __( 'Slider Title', 'uix-slides' ),
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
	) );
	
	
	/**
	 * Add the configuration.
	 * 
	 * will inherit these options
	 */

	Kirki::add_field( $uix_slides_kirki_config_id, array(
<<<<<<< HEAD
		'type'     => 'select',
		'settings' => 'custom_uix_slides_google_font_slidetitle_family',
		'description'    => __( 'Font Family', 'uix-slides' ),
		'section'  => 'panel-theme-uix-slides',
		'default'  => 'Open Sans',
		'priority' => 10,
		'choices'  => Kirki_Fonts::get_font_choices(), //gets the list of fonts
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-title',
				'property' => 'font-family',
			),
=======
		'type'        => 'dimension',
		'settings'    => 'custom_uix_slides_fsize_t',
		'label'       => '',
		'description' => __( 'Slider Title', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => '2em',
		'priority'    => 10,
		'choices' => array(
			'units' => array( 'em', 'px' )
>>>>>>> origin/master
		),
		
		
	) );
	

	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
<<<<<<< HEAD
		'type'     => 'slider',
		'settings' => 'custom_uix_slides_google_font_slidetitle_weight',
		'description'    => __( 'Font Weight', 'uix-slides' ),
		'section'  => 'panel-theme-uix-slides',
		'default'  => 600,
		'priority' => 10,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
	
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-title',
				'property' => 'font-weight',

			),
		),
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'      => 'slider',
		'settings'  => 'custom_uix_slides_google_font_slidetitle_size',
		'description'     => __( 'Font Size', 'uix-slides' ),
		'section'   => 'panel-theme-uix-slides',
		'default'   => 32,
		'priority'  => 10,
		'choices'   => array(
			'min'   => 7,
			'max'   => 200,
			'step'  => 1,
		),
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-title',
				'property' => 'font-size',
				'units'    => 'px',

			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.uix-slides-homepage-title',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px'
			),
		),
	) );
	
	/**
	 * ----------------------  Add google fonts section. ----------------------
	 * 
	 */
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_gf_caption',
		'label'       => __( 'Slider Title', 'uix-slides' ),
		'description' => '',
=======
		'type'        => 'dimension',
		'settings'    => 'custom_uix_slides_fsize_c',
		'label'       => '',
		'description' => __( 'Slider Caption', 'uix-slides' ),
>>>>>>> origin/master
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
	) );
	
	
	/**
	 * Add the configuration.
	 * 
	 * will inherit these options
	 */

	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'     => 'select',
		'settings' => 'custom_uix_slides_google_font_slidecaption_family',
		'description'    => __( 'Font Family', 'uix-slides' ),
		'section'  => 'panel-theme-uix-slides',
		'default'  => 'Open Sans',
		'priority' => 10,
		'choices'  => Kirki_Fonts::get_font_choices(), //gets the list of fonts
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-caption',
				'property' => 'font-family',
			),
		),
		
		
	) );

	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'     => 'slider',
		'settings' => 'custom_uix_slides_google_font_slidecaption_weight',
		'description'    => __( 'Caption Font Weight', 'uix-slides' ),
		'section'  => 'panel-theme-uix-slides',
		'default'  => 300,
		'priority' => 10,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
	
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-caption',
				'property' => 'font-weight',

			),
		),
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'      => 'slider',
		'settings'  => 'custom_uix_slides_google_font_slidecaption_size',
		'description'     => __( 'Caption Font Size', 'uix-slides' ),
		'section'   => 'panel-theme-uix-slides',
		'default'   => 14,
		'priority'  => 10,
		'choices'   => array(
			'min'   => 7,
			'max'   => 100,
			'step'  => 1,
		),
		'output' => array(
			array(
				'element'  => '.uix-slides-homepage-caption',
				'property' => 'font-size',
				'units'    => 'px',

			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.uix-slides-homepage-caption',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px'
			),
		),
	) );
	


	
	//Read css file value
	global $org_cssname_uix_slides;
	global $org_csspath_uix_slides;

    $org_cssname_uix_slides = 'uix-slides-style.css';
	$org_csspath_uix_slides = get_template_directory_uri() .'/'. $org_cssname_uix_slides;
	
	
	function uix_slides_view_style() {
		

		global $org_cssname_uix_slides;
		global $org_csspath_uix_slides;
	
		
		wp_nonce_field( 'customize-filesystem-nonce' );
		
		// capture output from WP_Filesystem
		ob_start();
		
			UixSlides::wpfilesystem_read_file( 'customize-filesystem-nonce', 'customize.php', '', $org_cssname_uix_slides, 'theme' );
			$filesystem_uix_slides_out = ob_get_contents();
		ob_end_clean();
		
		if ( empty( $filesystem_uix_slides_out ) ) {
			
			$style_org_code_uix_slides = UixSlides::wpfilesystem_read_file( 'customize-filesystem-nonce', 'customize.php', '', $org_cssname_uix_slides, 'theme' );
			
			echo '
					 <div class="uix-slides-dialog-mask"></div>
					 <div class="uix-slides-dialog" id="uix-slides-view-css-container">  
						<textarea rows="15" style=" width:95%;" class="regular-text">'.$style_org_code_uix_slides.'</textarea>
						<a href="javascript:" id="uix_slides_close_css" class="close button button-primary">'.__( 'Close', 'uix-slides' ).'</a>  
					</div>
					<script type="text/javascript">
						
					( function($) {
						
						"use strict";
						
						$( function() {
							
							var dialog_uix_slides = $( "#uix-slides-view-css-container, .uix-slides-dialog-mask" );  
							
							$( "#uix_slides_view_css" ).click( function() {
								dialog_uix_slides.show();
							});
							$( "#uix_slides_close_css" ).click( function() {
								dialog_uix_slides.hide();
							});
						
				
						} );
						
					} ) ( jQuery );
					
					</script>
			
			';	
	
		} else {
			
			echo '
					
					<script type="text/javascript">
						
					( function($) {
						
						"use strict";
						
						$( function() {
							
							$( "#uix_slides_view_css" ).attr({ "href": "'.$org_csspath_uix_slides.'", "target":"_blank" });
				
						} );
						
					} ) ( jQuery );
					
					</script>
			
			';	
			
			
		}
		
	}
	
    add_action( 'customize_controls_print_scripts', 'uix_slides_view_style' );


	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_slides_css_tip',
		'label'       => __( 'Custom CSS', 'uix-slides' ),
		'description' => __( 'You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original <code>.css</code> files.', 'uix-slides' ),
		'section'     => 'panel-theme-uix-slides',
		'default'     => '
        <p>'.__( 'CSS file root directory:', 'uix-slides' ).'
            <a href="javascript:" id="uix_slides_view_css" >'.$org_csspath_uix_slides.'</a>
        </p>  
		',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_slides_kirki_config_id, array(
		'type'        => 'code',
		'settings'    => 'custom_uix_slides_css',
		'label'       => '',
		'description' => '',
		'section'     => 'panel-theme-uix-slides',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
			'height'   => 250,
		),
	) );

	



}
