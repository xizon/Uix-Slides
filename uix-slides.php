<?php
/*
Plugin Name: Uix Slides
Plugin URI: http://uiux.cc/wp-plugins/uix-slides/
Description: This plugin is a simple way to build, organize and display beautiful content slides into any existing WordPress theme.  
Author: UIUX Lab
Author URI: http://uiux.cc
Version: 1.0.0
Text Domain: uix-slides
License: GPLv2 or later
*/

class UixSlides {
	
	const PREFIX = 'uix';
	const HELPER = 'uix-slides-helper';
	const NOTICEID = 'uix-slides-notice-helper';

	
	/**
	 * Initialize
	 *
	 */
	public static function init() {
	
		self::meta_boxes();
		
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( __CLASS__, 'actions_links' ), -10 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'frontpage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'print_custom_stylesheet' ) ); 
		add_action( 'current_screen', array( __CLASS__, 'usage_notice' ) );
		add_action( 'current_screen', array( __CLASS__, 'do_register_shortcodes' ) );
		add_action( 'admin_init', array( __CLASS__, 'check_update' ) );
		add_action( 'admin_init', array( __CLASS__, 'templates' ) );
		add_action( 'admin_init', array( __CLASS__, 'tc_i18n' ) );
		add_action( 'admin_init', array( __CLASS__, 'load_helper' ) );
		add_action( 'admin_init', array( __CLASS__, 'nag_ignore' ) );
		add_action( 'admin_menu', array( __CLASS__, 'options_admin_menu' ) );
		add_action( 'wp_head', array( __CLASS__, 'do_my_shortcodes' ) );
		add_action( 'init', array( __CLASS__, 'customizer' ) );
		add_action( 'after_setup_theme', array( __CLASS__, 'image_sizes' ) );
		

	}
	
	
	/*
	 * Enqueue scripts and styles.
	 *
	 *
	 */
	public static function frontpage_scripts() {
	
		// Add flexslider
		wp_enqueue_script( 'js-flexslider-2.5.0', self::plug_directory() .'assets/js/jquery.flexslider.min.js', array( 'jquery' ), '2.5.0', true );	
		wp_enqueue_style( 'flexslider-2.5.0', self::plug_directory() .'assets/css/flexslider.css', false, '2.5.0', 'all' );
		
		// Easing
		wp_enqueue_script( 'jquery-easing-1.3', self::plug_directory() .'assets/js/jquery.easing.js', false, '1.3', false );	
		
		// cherryfullBgSlider
		wp_enqueue_script( 'js-cherryfullBgSlider-1.0', self::plug_directory() .'assets/js/cherryfullBgSlider.js', array( 'jquery' ), '1.0', true );	
		wp_enqueue_style( 'cherryfullBgSlider-1.0', self::plug_directory() .'assets/css/cherryfullBgSlider.css', false, '1.0', 'all' );
		
		//Main stylesheets and scripts to Front-End
		wp_enqueue_style( self::PREFIX . '-slides-frontend-style', get_template_directory_uri() .'/uix-slides-style.css', false, self::ver(), 'all');
			

	}
	
	

	
	/*
	 * Enqueue scripts and styles  in the backstage
	 *
	 *
	 */
	public static function backstage_scripts() {
	
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();
		  
		
		  if( $currentScreen->base === "customize" ) {
			  
				if ( is_admin()) {
						
						wp_enqueue_style( self::PREFIX . '-slides-mce-main', self::plug_directory() .'style.css', false, self::ver(), 'all');
		
							
				}
  
		  } 
	

	}
	
	
	
	/**
	 * Internationalizing  Plugin
	 *
	 */
	public static function tc_i18n() {
	
	
	    load_plugin_textdomain( 'uix-slides', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'  );
		

	}
	
	
	
	/*
	 * Create customizable menu in backstage  panel
	 *
	 * Add a submenu page
	 *
	 */
	 public static function options_admin_menu() {
	
	    //settings
		$hook = add_submenu_page(
			'edit.php?post_type=uix-slides',
			__( 'Uix Slides Settings', 'uix-slides' ),
			__( 'Settings', 'uix-slides' ),
			'manage_options',
			'uix-slides-custom-submenu-page',
			array( __CLASS__, 'uix_slides_options_page' )
		);
		
		add_action("load-{$hook}", create_function('','
			header("Location: '.admin_url( "customize.php" ).'");
			exit;
		'));
	
	
        //helper
		add_submenu_page(
			'edit.php?post_type=uix-slides',
			__( 'Helper', 'uix-slides' ),
			__( 'Helper', 'uix-slides' ),
			'manage_options',
			self::HELPER,
			'uix_slides_options_page' 
		);
		
		

	
		
	 }
	 
	public static function uix_slides_options_page(){
		
	}
	
	
	
	/*
	 * Load helper
	 *
	 */
	 public static function load_helper() {
		 
		 require_once 'helper/settings.php';
	 }
	
	
	
	/*
	 * Adds image sizes for slides items
	 *
	 * @link	http://codex.wordpress.org/Function_Reference/add_image_size
	 *
	 */
	public static function image_sizes() {
	
		add_image_size( 'uix-slides-entry', get_theme_mod( 'custom_uix_slides_single_size_w', 1920 ), get_theme_mod( 'custom_uix_slides_single_size_h', 9999 ), false );

	}
	

	/*
	 * Enable update check on every request.
	 *
	 *
	 */
	public static function check_update() {
	
		require_once 'inc/plugin-update-checker.php';
		$myUpdateChecker = PucFactory::buildUpdateChecker(
			'http://uiux.cc/wp-plugins/'.self::get_slug().'/update/info.json',
			__FILE__
		);

	}
	
	
	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( "customize.php" ) . '">' . __( 'Settings', 'uix-slides' ) . '</a>';
		$links[] = '<a href="' . admin_url( "admin.php?page=".self::HELPER."&tab=usage" ) . '">' . __( 'How to use?', 'uix-slides' ) . '</a>';
		return $links;
	}
	
	
	/*
	 * Register shortcodes
	 *
	 *
	 */
	public static function do_register_shortcodes() {
	
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();
	
		  if( $currentScreen->base === "post" || mb_strlen( strpos( $currentScreen->base, '_page_' ), 'UTF8' ) > 0 ) {
			
				require_once 'shortcodes/backstage-init.php';
		
		  } 
	

	}
	
	/*
	 * Register shortcodes of front-end
	 *
	 *
	 */
	public static function do_my_shortcodes() {
	
		  require_once 'shortcodes/frontpage-init.php';
	
	}
	

	
	
	/*
	 * Get plugin slug
	 *
	 *
	 */
	public static function get_slug() {

         return dirname( plugin_basename( __FILE__ ) );
	
	}
	
	
	/*
	 * Custom Metaboxes and Fields
	 *
	 *
	 */
	public static function meta_boxes() {
	
		if ( ! class_exists( 'cmb_Meta_Box' ) ) {
			require_once 'post-extensions/custom-metaboxes-and-fields/init.php';
		}

	}
	
	/*
	 * Building WordPress themes using the Kirki Customizer
	 *
	 *
	 */
	public static function customizer() {
		
		if ( !class_exists( 'Kirki' ) ) {
		    require_once 'customizer-extras/kirki/kirki.php';
		}
		
		require_once 'customizer-extras/options-init.php';


	}	
	

	
	/*
	 *  Add admin one-time notifications
	 *
	 *
	 */
	public static function usage_notice() {
		
		
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();

		  if( ( mb_strlen( strpos( $currentScreen->id, 'uix_slides' ), 'UTF8' ) > 0 || mb_strlen( strpos( $currentScreen->id, 'uix-slides' ), 'UTF8' ) > 0 ) && mb_strlen( strpos( $currentScreen->id, '_page_' ), 'UTF8' ) <= 0 ) {
			  add_action( 'admin_notices', array( __CLASS__, 'usage_notice_app' ) );
		  }
		
	
	}	
	
	public static function usage_notice_app() {
		
		global $current_user ;
		$user_id = $current_user->ID;
		
		/* Check that the user hasn't already clicked to ignore the message */
		if ( ! get_user_meta( $user_id, self::NOTICEID ) ) {
			echo '<div class="updated"><p>
				'.__( 'Do you want to create a slides website with WordPress?  Learn how to add slides to your themes.', 'uix-slides' ).'
				<a href="' . admin_url( "admin.php?page=".self::HELPER."&tab=usage" ) . '">' . __( 'How to use?', 'uix-slides' ) . '</a>
				 | 
			';
			printf( __( '<a href="%1$s">Hide Notice</a>' ), '?post_type=uix-slides&'.self::NOTICEID.'=0');
			
			echo "</p></div>";
		}
	
	}	
	
	public static function nag_ignore() {
		    global $current_user;
			$user_id = $current_user->ID;
			
			/* If user clicks to ignore the notice, add that to their user meta */
			if ( isset( $_GET[ self::NOTICEID ]) && '0' == $_GET[ self::NOTICEID ] ) {
				 add_user_meta( $user_id, self::NOTICEID, 'true', true);

				if ( wp_get_referer() ) {
					/* Redirects user to where they were before */
					wp_safe_redirect( wp_get_referer() );
				} else {
					/* This will never happen, I can almost gurantee it, but we should still have it just in case*/
					wp_safe_redirect( home_url() );
				}
		    }
	}
	
	
	
	
	/*
	 * Callback the plugin directory
	 *
	 *
	 */
	public static function plug_directory() {

	  return plugin_dir_url( __FILE__ );

	}
	
	
	
	/*
	 * Custom post extensions
	 *
	 *
	 */
	public static function post_ex() {
	
		require_once 'post-extensions/post-extensions-init.php';

		
	}
	
	
	
	/*
	 * Move template files to your theme directory
	 *
	 *
	 */
	public static function templates() {
		
		
		$filenames = array();
		$filepath = WP_PLUGIN_DIR .'/'.self::get_slug(). '/theme_templates/';
		$themepath = get_stylesheet_directory() . '/';

		foreach ( glob( dirname(__FILE__). "/theme_templates/*") as $file ) {
			$filenames[] = str_replace( dirname(__FILE__). "/theme_templates/", '', $file );
		}	
		
	
		self::init_filesystem();
		global $wp_filesystem;

		foreach ( $filenames as $filename ) {
			if ( ! file_exists( $themepath . $filename ) ) {
				$filecontent = $wp_filesystem->get_contents( $filepath . $filename );
				$wp_filesystem->put_contents(  $themepath . $filename, $filecontent, FS_CHMOD_FILE);
			} 
		}
		
	}
	

	/**
	 * Initialize the WP_Filesystem
	 *
	 */
	public static function init_filesystem() {
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once ( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
	}
	

	/*
	 * Returns current plugin version.
	 *
	 *
	 */
	public static function ver() {
	
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . self::get_slug() );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];


	}
	




	/*
	 * Print Custom Stylesheet
	 *
	 *
	 */
	public static function print_custom_stylesheet() {
	
		$custom_css = get_theme_mod( 'custom_uix_slides_css' );
		$custom_css_wp_customizer = '';
		
		$c_width = ( !empty( get_theme_mod( 'custom_uix_slides_box_width' ) ) && !get_theme_mod( 'custom_uix_slides_box_fullwidth', true ) ) ? 'width:'.get_theme_mod( 'custom_uix_slides_box_width' ).';' : '';
		$c_height = ( !empty( get_theme_mod( 'custom_uix_slides_box_height' ) ) && !get_theme_mod( 'custom_uix_slides_box_autoheight', true ) ) ? 'height:'.get_theme_mod( 'custom_uix_slides_box_height' ).';' : '';
		

	    if ( $c_width != '' || $c_height != '' ) {
			$custom_css_wp_customizer .= '#uix-slides-wrap{'.$c_width.''.$c_height.'}';
		
		}
		
		$custom_css_wp_customizer .= ( !empty( get_theme_mod( 'custom_uix_slides_fsize_t' ) ) ) ? '.uix-slides-homepage-title{font-size:'.get_theme_mod( 'custom_uix_slides_fsize_t' ).';}' : '';
		$custom_css_wp_customizer .= ( !empty( get_theme_mod( 'custom_uix_slides_fsize_c' ) ) ) ? '.uix-slides-homepage-caption{font-size:'.get_theme_mod( 'custom_uix_slides_fsize_c' ).';}' : '';
	
		wp_add_inline_style( self::PREFIX . '-slides-frontend-style', $custom_css.$custom_css_wp_customizer );

	}
		
		
		
	
	/*
	 * Callback function of "do shortcodes"
	 *
	 *
	 */
	public static function do_callback( $str ) {

	  return do_shortcode( $str );
	  

	}



}

add_action( 'plugins_loaded', array( 'UixSlides', 'init' ) );
UixSlides::post_ex();
