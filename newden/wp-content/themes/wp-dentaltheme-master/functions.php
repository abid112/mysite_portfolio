<?php
/**
 * functions and definitions
 *
 * @package rootstrap
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

if ( ! function_exists( 'rootstrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rootstrap_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'rootstrap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rootstrap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rootstrap' ),
		'seconday' => __( 'Secondary Menu', 'rootstrap' ),
		'footer-links' => __( 'Footer Links', 'rootstrap' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rootstrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rootstrap_setup
add_action( 'after_setup_theme', 'rootstrap_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */


function rootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rootstrap' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
    	'id' => 'home-widget-1',
    	'name' => __( 'Homepage Widget 1', 'rootstrap' ),
    	'description' => __( 'Displays on the Home Page', 'rootstrap' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<p class="widgettitle">',
    	'after_title' => '</p>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-2',
      'name' =>  __( 'Homepage Widget 2', 'rootstrap' ),
      'description' => __( 'Displays on the Home Page', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle">',
      'after_title' => '</p>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-3',
      'name' =>  __( 'Homepage Widget 3', 'rootstrap' ),
      'description' =>  __( 'Displays on the Home Page', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle">',
      'after_title' => '</p>',
    ));	
    
    register_sidebar(array(
    	'id' => 'footer-widget-1',
    	'name' =>  __( 'Footer Widget 1', 'rootstrap' ),
    	'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<p class="widgettitle">',
    	'after_title' => '</p>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-2',
      'name' =>  __( 'Footer Widget 2', 'rootstrap' ),
      'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle">',
      'after_title' => '</p>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-3',
      'name' =>  __( 'Footer Widget 3', 'rootstrap' ),
      'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle">',
      'after_title' => '</p>',
    )); 
    register_sidebar(array(
      'id' => 'footer-widget-4',
      'name' =>  __( 'Footer Widget 4', 'rootstrap' ),
      'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle">',
      'after_title' => '</p>',
    )); 
    register_sidebar(array(
      'id' => 'business-sidebar',
      'name' =>  __( 'Business Sidebar', 'rootstrap' ),
      'description' =>  __( 'Used for Business page template sidebar area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle page_widget_title">',
      'after_title' => '</p>',
    )); 
    register_sidebar(array(
      'id' => 'indivisual-sidebar',
      'name' =>  __( 'indivisual Sidebar', 'rootstrap' ),
      'description' =>  __( 'Used for indivisual page template sidebar area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle page_widget_title">',
      'after_title' => '</p>',
    )); 
    register_sidebar(array(
      'id' => 'industry-sidebar',
      'name' =>  __( 'industry Sidebar', 'rootstrap' ),
      'description' =>  __( 'Used for industry page template sidebar area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="widgettitle page_widget_title">',
      'after_title' => '</p>',
    ));	


    register_widget( 'rootstrap_popular_posts_widget' );
}
add_action( 'widgets_init', 'rootstrap_widgets_init' );

include(get_template_directory() . "/inc/popular-posts-widget.php");

/**
 * adding the rootstrap search form (created in extra.php)
 */

add_filter( 'get_search_form', 'rootstrap_wpsearch' );


/**
 * Enqueue scripts and styles. 
 */
function rootstrap_scripts() {
    wp_enqueue_style( 'rootstrap-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css');
     wp_enqueue_style( 'rootstrap-rootstyle', get_template_directory_uri() . '/inc/css/styles.css');
    wp_enqueue_style( 'rootstrap-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    if( ( is_home() || is_front_page() ) && rootstrap_get_option('rootstrap_slider_checkbox') == 1 ) {
        wp_enqueue_style( 'slider-css', get_template_directory_uri().'/inc/css/slider.css');
    }
    wp_enqueue_style( 'rootstrap-style', get_stylesheet_uri() );

    wp_enqueue_script('jquery', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'),'', true );
    wp_enqueue_script('rootstrap-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'customjs1', get_template_directory_uri() . '/inc/js/jqueryb8ff.js', array('jquery'), '', true  );
    wp_enqueue_script( 'scustomjs2', get_template_directory_uri() . '/inc/js/jquery-migrate.min330a.js', array('jquery'), '', true  );
    wp_enqueue_script( 'stickymenu', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), '', true  );
    wp_enqueue_script('customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array('jquery'), '', true  );    
    wp_enqueue_script( 'rootstrap-bootstrapwp', get_template_directory_uri() . '/inc/js/functions.min.js', array('jquery'), '', true  );
    wp_enqueue_script( 'layerslider', get_template_directory_uri() . '/inc/js/jquery.cslider.js', array('jquery'), '', true );	
    if( ( is_home() || is_front_page() ) && rootstrap_get_option('rootstrap_slider_checkbox') == 1 ) {		
        wp_enqueue_script( 'mordernizer', get_template_directory_uri() . '/inc/js/modernizr.custom.28468.js', array('jquery'), '', true  );
    }	

    wp_enqueue_script( 'rootstrap-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20140222', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rootstrap_scripts' );


/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define('rootstrap_framework_URL', get_template_directory() . '/inc/admin/');
define('rootstrap_framework_DIRECTORY', get_template_directory_uri() . '/inc/admin/');
require_once (rootstrap_framework_URL . 'rootstrap-options.php');



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';


function mycustomize($customize) {
    $customize->add_section('heading-section', array(
        'title' => 'Header Option',
        'priority' => '10',
    ));
    $customize->add_setting('skype', array(
        'default' => 'skype:info@offshore.money?call',
        'transport' => 'refresh',
    ));
    $customize->add_control('skype', array(
        'section' => 'heading-section',
        'label' => 'Skype User',
        'type' => 'text',
    ));
    $customize->add_setting('call', array(
        'default' => '01749677671',
        'transport' => 'refresh',
    ));
    $customize->add_control('call', array(
        'section' => 'heading-section',
        'label' => 'Before Number Text',
        'type' => 'text',
    ));
        $customize->add_setting('phone-number', array(
        'default' => '+1 (888) 558-7655',
        'transport' => 'refresh',
    ));
    $customize->add_control('phone-number', array(
        'section' => 'heading-section',
        'label' => 'Phone Number',
        'type' => 'text',
    ));
   
    $customize->add_setting('logo_upload', array(
        'default' => get_template_directory_uri(). '/images/logo.png',
        'transport' => 'refresh',
    ));
    $customize->add_control(
            new WP_Customize_Image_Control($customize, 'logo_upload', array(
        'section' => 'heading-section',
        'label' => 'Logo alternet text',
        'settings' => 'logo_upload',
            ))
    );
    
    $customize->add_section('footer-section', array(
        'title' => 'Footer Option',
        'priority' => '120',
    ));
    $customize->add_setting('copyright', array(
        'default' => '2016-2017 Offshore Money. All rights reserved.',
        'transport' => 'refresh',
    ));
    $customize->add_control('copyright', array(
        'section' => 'footer-section',
        'label' => 'Copyright Text',
        'type' => 'text',
    ));
}
add_action('customize_register', 'mycustomize');
