<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'ahope_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ahope_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'ahope' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ahope', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
 
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'ahope' ),
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		) );
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ahope_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'ahope_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ahope_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ahope_content_width', 640 );
}
add_action( 'after_setup_theme', 'ahope_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ahope_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ahope' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ahope' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Services Sidebar', 'ahope' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'ahope' ),
		'before_widget' => '<div id="%1$s" class="sr-sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'ahope_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ahope_scripts() {

	wp_enqueue_style('ahope-rubik-fonts',  'https://fonts.googleapis.com/css?family=Rubik:400,500,700');
	wp_enqueue_style('ahope-fira-sans-fonts',  'https://fonts.googleapis.com/css?family=Fira+Sans:300,400,400i,500,700');
	wp_enqueue_style('ahope-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('ahope-animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('ahope-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
    wp_enqueue_style('ahope-themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css');
    wp_enqueue_style('ahope-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css');
    wp_enqueue_style('ahope-colorbox', get_template_directory_uri() . '/assets/css/colorbox.css');
    wp_enqueue_style('ahope-unit', get_template_directory_uri() . '/assets/css/unit.css', 'media', ahope_theme_version());
    wp_enqueue_style('ahope-default', get_template_directory_uri() . '/assets/css/default.css', 'media', ahope_theme_version());
    wp_enqueue_style('ahope-main', get_template_directory_uri() . '/assets/css/main.css', 'media', ahope_theme_version());
    wp_enqueue_style('ahope-responsive', get_template_directory_uri() . '/assets/css/responsive.css', 'media', ahope_theme_version());

	wp_enqueue_script('ahope-popper',get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), ahope_theme_version(), true);
	wp_enqueue_script('ahope-bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-isotope',get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-swiper',get_template_directory_uri() . '/assets/js/swiper.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-jquery-waypoints',get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-jquery-counterup',get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-jquery-colorbox',get_template_directory_uri() . '/assets/js/jquery.colorbox-min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-particles',get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-app',get_template_directory_uri() . '/assets/js/app.js', array('jquery'), ahope_theme_version(), true);
    wp_enqueue_script('ahope-main',get_template_directory_uri() . '/assets/js/main.js', array('jquery'), ahope_theme_version(), true);

    wp_enqueue_style('ahope-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'ahope_scripts');

function ahope_admin_css() {
    wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin.css', 'media', ahope_theme_version() );
}
add_action( 'admin_enqueue_scripts', 'ahope_admin_css' );

function ahope_theme_version(){
    $ahopetheme = wp_get_theme();
    $ahope_version = esc_html($ahopetheme->get( 'Version' ));
    return $ahope_version;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which loaded from plugin.
 */
require get_template_directory() . '/inc/plug-dependent.php';

/**
 * Load plugin recommendation.
 */
 
require_once get_template_directory() . '/inc/plugin-recommendations.php';

require_once get_template_directory() . '/helper/customiser-extra.php';

