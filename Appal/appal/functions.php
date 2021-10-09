<?php
/**
 * Appal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Appal
 */
// Define
define('APPALDIRPATH', get_template_directory_uri());

if (!function_exists('appal_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function appal_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Appal, use a find and replace
         * to change 'appal' to the name of your theme in all the template files.
         */
        load_theme_textdomain('appal', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('appal_image_330_418', 330, 418, true);
        add_image_size('appal_image_368_239', 368, 239, true);
        add_image_size('appal_image_767_430', 767, 430, true);
        add_image_size('appal_image_572_859', 572, 859, true);
        add_image_size('appal_image_100_100', 100, 100, true);
        add_image_size('appal_image_180_180', 180, 180, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'appal'),
            'menu-2' => esc_html__('Footer', 'appal'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        add_theme_support('post-formats', array(
            'audio',
            'video',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('appal_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        /*
         * Set woocommerce support
         *
         */
        add_theme_support('woocommerce');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add theme support for header footer elementor
        add_theme_support('header-footer-elementor');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        // Load regular editor styles into the new block-based editor.
        add_theme_support('editor-styles');

        // Load default block styles.
        add_theme_support('wp-block-styles');

        add_editor_style(array('assets/css/editor-style.css', appal_google_fonts_url()));
    }
endif;
add_action('after_setup_theme', 'appal_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function appal_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('appal_content_width', 640);
}

add_action('after_setup_theme', 'appal_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function appal_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'appal'),
        'id' => 'sidebar-1',
        'description' => esc_html__(' ', 'appal'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'appal'),
        'id' => 'sidebar-2',
        'description' => esc_html__(' ', 'appal'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Single Shop Sidebar', 'appal'),
        'id' => 'sidebar-3',
        'description' => esc_html__(' ', 'appal'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'appal_widgets_init');


/**
 * Main Menu
 */
function appal_main_menu()
{
    wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'depth' => 5,
            'container' => false,
            'menu_class' => 'clearfix',
            'fallback_cb' => 'appal_navwalker::fallback',
        )
    );
}


/**
 * Footer Menu
 */
function appal_footer_menu()
{
    wp_nav_menu(array(
            'theme_location' => 'menu-2',
            'depth' => 5,
            'container' => false,
            'menu_class' => 'clearfix',
            'fallback_cb' => 'appal_navwalker::fallback',

        )
    );
}

/**
 *
 * Registering Google Fonts
 *
 */

function appal_google_fonts_url()
{

    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'appal')) {
        $font_url = add_query_arg('family', urlencode('Quicksand:400,500,600,700&subset=latin,latin-ext'), "//fonts.googleapis.com/css");
    }

    return $font_url;

}

/**
 * Enqueue scripts and styles.
 */
function appal_scripts()
{
    // All CSS Files
    wp_enqueue_style('appal-google-fonts', appal_google_fonts_url(), array(), '1.0.0');
    wp_enqueue_style('bootstrap', APPALDIRPATH . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('unicons', APPALDIRPATH . '/assets/css/unicons.css');
    wp_enqueue_style('themify-icons', APPALDIRPATH . '/assets/css/themify-icons.css');
    wp_enqueue_style('slicknav', APPALDIRPATH . '/assets/css/slicknav.css');
    wp_enqueue_style('flaticon', APPALDIRPATH . '/assets/css/flaticon.css');
    wp_enqueue_style('fontawesome-all', APPALDIRPATH . '/assets/css/fontawesome-all.css');
    wp_enqueue_style('animate', APPALDIRPATH . '/assets/css/animate.css');
    wp_enqueue_style('owl-carousel', APPALDIRPATH . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-default', APPALDIRPATH . '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('magnific-popup', APPALDIRPATH . '/assets/css/magnific-popup.css');
    wp_enqueue_style('aos', APPALDIRPATH . '/assets/css/aos.css');
    wp_enqueue_style('appal-main-style', APPALDIRPATH . '/assets/css/style.css');
    wp_enqueue_style('appal-style', get_stylesheet_uri());

    // All JS Files
    wp_enqueue_script('html5shiv', APPALDIRPATH . '/js/html5shiv.min.js', array(), '3.7.2');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 10');
    wp_enqueue_script('respond', APPALDIRPATH . '/js/respond.min.js', array(), '1.4.2');
    wp_script_add_data('respond', 'conditional', 'lt IE 10');

    wp_enqueue_script('bootstrap', APPALDIRPATH . '/assets/js/bootstrap.min.js', array('jquery'), '54495', true);
    wp_enqueue_script('jquery-slicknav', APPALDIRPATH . '/assets/js/jquery.slicknav.js', array('jquery'), '54495', true);
    wp_enqueue_script('popper', APPALDIRPATH . '/assets/js/popper.min.js', array('jquery'), '54495', true);
    wp_enqueue_script('owl-carousel', APPALDIRPATH . '/assets/js/owl.carousel.min.js', array('jquery'), '54495', true);
    wp_enqueue_script('magnific-popup', APPALDIRPATH . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '54495', true);
    wp_enqueue_script('aos', APPALDIRPATH . '/assets/js/aos.js', array('jquery'), '54495', true);
    wp_enqueue_script('instafeed', APPALDIRPATH . '/assets/js/instafeed.min.js', array('jquery'), '54495', true);
    wp_enqueue_script('jquery-countdown', APPALDIRPATH . '/assets/js/jquery.countdown.js', array('jquery'), '54495', true);
    wp_enqueue_script('appear', APPALDIRPATH . '/assets/js/jquery.appear.js', array('jquery'), '54495', true);
    wp_enqueue_script('count-to', APPALDIRPATH . '/assets/js/count-to.js', array('jquery'), '54495', true);
    wp_enqueue_script('custom-scrollbar', APPALDIRPATH . '/assets/js/jquery.mCustomScrollbar.js', array('jquery'), '54495', true);
    wp_enqueue_script('appal-custom', APPALDIRPATH . '/assets/js/custom.js', array('jquery'), '54495', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'appal_scripts');
function appal_admin_css() {
    wp_enqueue_style( 'admin-style', APPALDIRPATH . '/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'appal_admin_css' );

function appal_excerpt_length($length)
{
    return 40;
}

add_filter('excerpt_length', 'appal_excerpt_length', 999);

// modify search widget
function appal_my_search_form($form)
{
    $form = '
		
			
			<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url('/')) . '" >
				<div class="form-item mb-0">
					<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" class="search_field" placeholder="' . esc_attr__('Enter Your Keyword', 'appal') . '">
					<button type="submit" class="search-btn"><i class="uil uil-search"></i></button>
				</div>
			</form>
			
		
        ';
    return $form;
}

add_filter('get_search_form', 'appal_my_search_form');


/**
 * woo_custom_product_searchform
 */

add_filter('get_product_search_form', 'appal_woo_custom_product_searchform');

function appal_woo_custom_product_searchform($form)
{

    $form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url('/')) . '">
		<div class="form-item mb-0">
			<label class="screen-reader-text" for="s">' . esc_html__('Search for:', 'appal') . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Enter Your Keyword', 'appal') . '" />
			<button type="submit" class="search-btn"><i class="uil uil-search"></i></button>
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';

    return $form;

}

// comment list modify

function appal_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <div class="comment-item">
            <?php if (get_avatar($comment)) { ?>
                <div class="hero-image">
                    <?php echo get_avatar($comment, 200); ?>
                </div>
            <?php } ?>

            <div class="comment-content">
                <div class="hero-info">
                    <h4 class="hero-name"><?php comment_author_link() ?></h4>
                    <span class="comment-time"><?php echo esc_html(get_comment_date('F j, Y')); ?></span>
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <p><em><?php esc_html_e('Your comment is awaiting moderation.', 'appal'); ?></em></p>
                <?php endif; ?>

                <div class="paragraph-text mb-0">
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
    </li>


<?php }

// comment box title change
add_filter('comment_form_defaults', 'appal_remove_comment_form_allowed_tags');
function appal_remove_comment_form_allowed_tags($defaults)
{

    $defaults['comment_notes_after'] = '';
    $defaults['comment_notes_before'] = '';
    return $defaults;

}

function appal_comment_reform($arg)
{

    $arg['title_reply'] = esc_html__('Leave a comment', 'appal');
    $arg['comment_field'] = '<div class="row"><div class="form-group col-md-12"><div class="form-textarea"><label for="comment" class="comment_label">Comment *</label> <br><textarea id="comment" class="comment_field form-control" name="comment" cols="77" rows="3" placeholder="' . esc_attr__("", "appal") . '" aria-required="true"></textarea></div></div></div>';


    return $arg;

}

add_filter('comment_form_defaults', 'appal_comment_reform');

// comment form modify

function appal_modify_comment_form_fields($fields)
{
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');

    $fields['author'] = '<div class="row"><div class="form-group col-md-6"><div class="form-item"><label for="author" class="comment_label">Name *</label> <br> <input type="text" name="author" id="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_attr__("", "appal") . '" size="22" tabindex="1"' . ($req ? 'aria-required="true"' : '') . ' class="input-name form-control" /></div></div>';

    $fields['email'] = '<div class="form-group col-md-6"><div class="form-item"><label for="email" class="comment_label">Email *</label> <br><input type="text" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_attr__("", "appal") . '" size="22" tabindex="2"' . ($req ? 'aria-required="true"' : '') . ' class="input-email form-control"  /></div></div>';

    $fields['url'] = '<div class="form-group col-md-12"><div class="form-item"><label for="url" class="comment_label">Website </label> <br><input type="text" name="url" id="url" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . esc_attr__("", "appal") . '" size="22" tabindex="2"' . ($req ? 'aria-required="false"' : '') . ' class="input-url form-control"  /></div></div></div>';

    return $fields;
}

add_filter('comment_form_default_fields', 'appal_modify_comment_form_fields');

// comment Move Field
function appal_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'appal_move_comment_field_to_bottom');

/**
 * Appal WP Kses
 */

function appal_wp_kses($val)
{
    return wp_kses($val, array(

        'p' => array(
            'class' => array()
        ),
        'span' => array(),
        'small' => array(),
        'div' => array(),
        'strong' => array(),
        'b' => array(),
        'br' => array(),
        'h1' => array(),
        'i' => array(
            'class' => array()
        ),
        'ul' => array(
            'class' => array()
        ),
        'ul' => array(
            'id' => array()
        ),
        'li' => array(
            'class' => array()
        ),
        'li' => array(
            'id' => array()
        ),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'a' => array('href' => array(), 'target' => array()),
        'iframe' => array('src' => array(), 'height' => array(), 'width' => array()),

    ), '');
}

/**
 * Price Currency  */

function appal_price_currency()
{
    global $woocommerce;
    $currency = get_woocommerce_currency_symbol();
    return $currency;

}

/**
 * Sale price
 */
function appal_sale_price()
{
    global $woocommerce;
    $price = get_post_meta(get_the_ID(), '_sale_price', true);
    return $price;
}

/**
 * Regular price
 */
function appal_reg_price()
{
    global $woocommerce;
    $price = get_post_meta(get_the_ID(), '_regular_price', true);
    return $price;
}

/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'appal_remove_product_tabs', 98);

function appal_remove_product_tabs($tabs)
{

    unset($tabs['description']);        // Remove the description tab
    unset($tabs['additional_information']);    // Remove the additional information tab

    return $tabs;
}

/**
 * Query Users from Database
 */
function appal_get_user_options()
{

    $users = get_users();

    $user_options = array();

    if ($users) {
        foreach ($users as $user) {
            $user_options[$user->ID] = $user->display_name;
        }
    }

    return $user_options;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/template-object.php';

/**
 * Customizer additions.php
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * navwalker.php
 */
require get_template_directory() . '/inc/navwalker.php';
/**
 * appal-functions.php
 */
require get_template_directory() . '/inc/appal-functions.php';
/**
 * class-tgm-plugin-activation.php
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * required-plugin.php
 */
require get_template_directory() . '/inc/required-plugin.php';
/**
 * demo_install.php
 */
require get_template_directory() . '/inc/demo_install.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}