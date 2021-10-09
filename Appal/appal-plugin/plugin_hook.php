<?php
/*
Plugin Name: Appal Plugin
Plugin URI: http://wp.matethemes.com/appal-landing
Description: After install the Appal WordPress Theme, you must need to install this "AppalAppal Plugin" first to get all functions of appal WP Theme.
Author: MateThemes
Author URI: http://www.themeforest.net/user/mate_themes
Version: 1.9
Text Domain: appal
*/


//define
if (!defined('APPALPLUGINDIR')) {
    define('APPALPLUGINDIR', dirname(__FILE__));
}
if (!defined('APPAL_PLUGIN_URL')) {
    define('APPAL_PLUGIN_URL', plugin_dir_url(__FILE__));
}
if (!defined('APPAL_VERSION')) {
    define('APPAL_VERSION', '1.0');
}
// Add main files

include_once(APPALPLUGINDIR . '/vendor/index.php');
include_once(APPALPLUGINDIR . '/inc/custom_posts.php');
include_once(APPALPLUGINDIR . '/inc/theme-options.php');
include_once(APPALPLUGINDIR . '/inc/appal-shortcodes.php');
include_once(APPALPLUGINDIR . '/inc/appal_metabox.php');;
include_once(APPALPLUGINDIR . '/inc/widgets/latest_post_widget.php');;

// Shortcode Tab Content column
function appal_tabcontent_stom_columns($column, $post_id)
{
    switch ($column) {
        case 'e_shortcode' :
            global $post;
            $slug = '';
            $slug = $post->post_name;
            $shortcode = '<span style="display:inline-block;border:solid 1px lightgray; background:white; padding:0 8px; font-size:13px; line-height:25px; vertical-align:middle;">[apltabcontent name="' . $slug . '"]</span>';
            echo $shortcode;
            break;
    }
}

add_action('manage_tab_content_posts_custom_column', 'appal_tabcontent_stom_columns', 10, 2);

function appal_tabcontent_columns($columns)
{
    unset($columns['date']);
    return array_merge($columns, array('e_shortcode' => 'Shortcode'));

}

add_filter('manage_tab_content_posts_columns', 'appal_tabcontent_columns');

// Shortcode FAQ Column
function appal_faq_content_stom_columns($column, $post_id)
{
    switch ($column) {
        case 'e_shortcode' :
            global $post;
            $slug = '';
            $slug = $post->post_name;
            $shortcode = '<span style="display:inline-block;border:solid 1px lightgray; background:white; padding:0 8px; font-size:13px; line-height:25px; vertical-align:middle;">[fc_shortcode name="' . $slug . '"]</span>';
            echo $shortcode;
            break;
    }
}

add_action('manage_faq_content_posts_custom_column', 'appal_faq_content_stom_columns', 10, 2);

function appal_faq_content_columns($columns)
{
    unset($columns['date']);
    return array_merge($columns, array('e_shortcode' => 'Shortcode'));

}

add_filter('manage_faq_content_posts_columns', 'appal_faq_content_columns');


function appal_appal_builders_columns($column, $post_id)
{
    switch ($column) {
        case 'e_shortcode' :
            global $post;
            $slug = '';
            $slug = $post->ID;
            $shortcode = '<span style="display:inline-block;border:solid 1px lightgray; background:white; padding:0 8px; font-size:13px; line-height:25px; vertical-align:middle;">[INSERT_ELEMENTOR id="' . $slug . '"]</span>';
            echo $shortcode;
            break;
    }
}

add_action('manage_appal_builders_posts_custom_column', 'appal_appal_builders_columns', 10, 2);
function appal_builders_columns($columns)
{
    unset($columns['date']);
    return array_merge($columns, array('e_shortcode' => 'Shortcode'));

}

add_filter('manage_appal_builders_posts_columns', 'appal_builders_columns');

//Initialize Elementor Widget

class APPALElementorCustomWidget
{

    private static $instance = null;

    public static function get_instance()
    {
        if (!self::$instance)
            self::$instance = new self;
        return self::$instance;
    }

    public function init()
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'widgets_registered']);
        add_action('elementor/init', array($this, 'appal_add_elementor_widget_categories'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'register_frontend_styles'), 10);
        add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'register_elementor_editor_css'), 10);
    }

    /**
     * Load Frontend Scripts
     *
     */
    public function register_frontend_scripts()
    {
        wp_enqueue_script('appal-main', APPAL_PLUGIN_URL . 'assets/js/x-appal.js', array('jquery'), APPAL_VERSION, true);
    }

    public function register_elementor_editor_css() {
        wp_enqueue_style( 'elementor-custom-editor', APPAL_PLUGIN_URL . 'assets/css/elementor/elementor-custom-editor.css');
    }
    
    public function register_frontend_styles() {

            wp_enqueue_style( 'appal-core', APPAL_PLUGIN_URL . 'assets/css/appal.css');
    }
    
    public function widgets_registered($widgets_manager)
    {
        $widgets[] = '';
        foreach (glob(APPALPLUGINDIR . '/inc/elementor/elements/*.php') as $file) {
            include_once $file;
        }

    }

    public function appal_add_elementor_widget_categories()
    {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'appal-category',
            array(
                'title' => __('APPAL', 'appal'),
                'icon' => 'fa fa-plug',
            ),
            1);
    }

}

APPALElementorCustomWidget::get_instance()->init();

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');