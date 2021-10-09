<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "appal";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('appal/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */


/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,

    'disable_tracking' => true,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Appal Options', 'appal'),
    'page_title' => esc_html__('Appal Options', 'appal'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => 3,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

);


// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(esc_html__('', 'appal'), $v);
} else {
    $args['intro_text'] = esc_html__('', 'appal');
}

// Add content after the form.
$args['footer_text'] = esc_html__('', 'appal');

Redux::set_Args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */


/*
 * ---> START HELP TABS
 */

$tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => esc_html__('Theme Information 1', 'appal'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'appal')
    ),
    array(
        'id' => 'redux-help-tab-2',
        'title' => esc_html__('Theme Information 2', 'appal'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'appal')
    )
);
Redux::set_Help_Tab($opt_name, $tabs);

// Set the help sidebar
$content = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'appal');
Redux::set_help_sidebar($opt_name, $content);


/*
 * <--- END HELP TABS
 */


/*
 *
 * ---> START SECTIONS
 *
 */

/*

    As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


 */

// -> START Basic Fields

Redux::set_section($opt_name, array(
    'title' => esc_html__('General Settings', 'appal'),
    'id' => 'appal-general-setting',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_header_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Header Section', 'appal'),
        ),

        array(
            'id' => 'appal_header_dis_opt',
            'type' => 'select',
            'title' => esc_html__('Dispaly Header ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => array(
                '1' => 'Show',
                '2' => 'Hide',
            ),
            'default' => '1',
        ),

        array(
            'id' => 'appal_header_color_opt',
            'type' => 'select',
            'title' => esc_html__('Header', 'appal'),
            'subtitle' => esc_html__('Select header here', 'appal'),
            'options' => array(
                '0' => 'Default',
                '1' => 'Black',
                '2' => 'White',
            ),
            'default' => '0',
        ),

        array(
            'id' => 'appal_sticky_header_color_opt',
            'type' => 'select',
            'title' => esc_html__('Sticky Header Color', 'appal'),
            'subtitle' => esc_html__('Select header here', 'appal'),
            'options' => array(
                '0' => 'Default',
                '1' => 'Blue',
                '2' => 'Pink',
                '3' => 'Blue Gradient',
                '4' => 'Black',
                '5' => 'Blue Pink Gradient',
            ),
            'default' => '0',
        ),

        array(
            'id' => 'appal_button_opt',
            'type' => 'switch',
            'title' => esc_html__('Display Button', 'appal'),
            'subtitle' => esc_html__('If yes then click the checkbox.', 'appal'),
            'default' => '1'// 1 = on | 0 = off
        ),

        array(
            'id' => 'appal_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'appal'),
            'default' => 'Sign Up Free',
            'required' => array('appal_button_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_btn_link',
            'type' => 'text',
            'title' => esc_html__('Button Link', 'appal'),
            'default' => '#',
            'required' => array('appal_button_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_preloader_opt',
            'type' => 'switch',
            'title' => esc_html__('Display Preloader', 'appal'),
            'subtitle' => esc_html__('If yes then click the checkbox.', 'appal'),
            'default' => '1'// 1 = on | 0 = off
        ),

        array(
            'id' => 'appal_scroll_up_opt',
            'type' => 'switch',
            'title' => esc_html__('Scroll Up', 'appal'),
            'subtitle' => esc_html__('If yes then click the checkbox.', 'appal'),
            'default' => '1'// 1 = on | 0 = off
        ),

        array(
            'id' => 'appal_homepage_opt',
            'type' => 'checkbox',
            'title' => esc_html__('Only Enable Home Page', 'appal'),
            'default' => '0',
            'subtitle' => esc_html__('if check this option preloader only will be enable for home page', 'appal'),
            'required' => array('appal_preloader_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_post_social_link_opt',
            'type' => 'switch',
            'title' => esc_html__('Display Social Share in Post Details page', 'appal'),
            'subtitle' => esc_html__('On/Off Option', 'appal'),
            'default' => '1'// 1 = on | 0 = off
        ),
    )
));

Redux::set_section($opt_name, array(
    'title' => esc_html__('Header Footer Settings', 'appal'),
    'id' => 'appal-header-footer-setting',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_home_header',
            'type' => 'select',
            'title' => esc_html__('Home Header ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => appal_post_query('appal_builders'),
        ),
        array(
            'id' => 'appal_page_header',
            'type' => 'select',
            'title' => esc_html__('Inner Page Header ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => appal_post_query('appal_builders'),
        ),
        array(
            'id' => 'appal_global_footer',
            'type' => 'select',
            'title' => esc_html__('Global Footer ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => appal_post_query('appal_builders'),
        ),
        array(
            'id' => 'appal_sidebar',
            'type' => 'select',
            'title' => esc_html__('Sidebar ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => appal_post_query('appal_builders'),
        ),
    )
));

Redux::set_section($opt_name, array(
    'title' => esc_html__('Banner Settings', 'appal'),
    'id' => 'appal-banner-setting',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_home_theme_opt_banner_img',
            'type' => 'media',
            'compiler' => true,
            'title' => esc_html__('Main Banner Image', 'appal'),
            'subtitle' => esc_html__('upload banner image here', 'appal'),
            'default' => array(
                'url' => esc_url(get_template_directory_uri()) . '/assets/images/breadcrumb/bg-image-1.jpg'
            ),
        ),


        array(
            'id' => 'appal_shop_search_banner_img',
            'type' => 'media',
            'compiler' => true,
            'title' => esc_html__('Shop Search Banner Image', 'appal'),
            'subtitle' => esc_html__('upload banner image here', 'appal'),
            'default' => array(
                'url' => esc_url(get_template_directory_uri()) . '/assets/images/banner/app-bg-img-1.jpg'
            ),
        ),

        array(
            'id' => 'appal_banner_sec_image',
            'type' => 'checkbox',
            'title' => esc_html__('Banner Section Images', 'appal'),
            'subtitle' => esc_html__('Show/Hide', 'appal'),
            'default' => '1'
        ),

        array(
            'id' => 'appal_banner_shape_image',
            'type' => 'checkbox',
            'title' => esc_html__('Banner Shape Images', 'appal'),
            'subtitle' => esc_html__('Show/Hide', 'appal'),
            'default' => '1'
        ),

        array(
            'id' => 'appal_banner_text_info',
            'type' => 'info',
            'title' => esc_html__('Banner Text Options', 'appal'),
            'style' => 'success',
        ),

        array(
            'id' => 'appal_blog_sub_title',
            'type' => 'text',
            'title' => esc_html__('Blog Page Sub Title', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'blog post'
        ),

        array(
            'id' => 'appal_blog_title',
            'type' => 'text',
            'title' => esc_html__('Blog Page Title', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'Blog Post Standard'
        ),

        array(
            'id' => 'appal_blog_descrption',
            'type' => 'textarea',
            'title' => esc_html__('Blog Description', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => ' The most powerful software & app landing page for any kind of app marketing Business '
        ),

        array(
            'id' => 'appal_single_post_subtitle',
            'type' => 'text',
            'title' => esc_html__('Single Post SubTitle', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'blog details'
        ),

        array(
            'id' => 'appal_archive_sub_title',
            'type' => 'text',
            'title' => esc_html__('Archive Page Subtitle', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'Archive'
        ),

        array(
            'id' => 'appal_search_sub_title',
            'type' => 'text',
            'title' => esc_html__('Search Page Subtitle', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'Search'
        ),

        array(
            'id' => 'appal_404_title_text',
            'type' => 'text',
            'title' => esc_html__('404 Page Title Text', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'Page not Found'
        ),

        array(
            'id' => 'appal_404_subtitle_text',
            'type' => 'text',
            'title' => esc_html__('404 Page Sub Title Text', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => '404'
        ),

        array(
            'id' => 'appal_banner_home_text',
            'type' => 'text',
            'title' => esc_html__('Home Text', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'Home'
        ),
    )
));

Redux::set_section($opt_name, array(
    'title' => esc_html__('404 Page Settings', 'appal'),
    'id' => 'appal-404-page-setting',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_404_logo_img',
            'type' => 'media',
            'compiler' => true,
            'title' => esc_html__('Logo Image', 'appal'),
            'subtitle' => esc_html__('upload Logo here', 'appal'),
            'default' => array(
                'url' => esc_url(get_template_directory_uri()) . '/assets/images/logo/Logo-2.png'
            ),
        ),

        array(
            'id' => 'appal_404_section_img',
            'type' => 'media',
            'compiler' => true,
            'title' => esc_html__('Section Image', 'appal'),
            'subtitle' => esc_html__('upload image here', 'appal'),
            'default' => array(
                'url' => esc_url(get_template_directory_uri()) . '/assets/images/404.png'
            ),
        ),


        array(
            'id' => 'appal_404_page_title',
            'type' => 'textarea',
            'title' => esc_html__('Page Title', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => '404 error not found'
        ),

        array(
            'id' => 'appal_404_page_descrption',
            'type' => 'textarea',
            'title' => esc_html__('Page Description', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => ' The most powerful software & app landing page for any kind of app marketing Business '
        ),

        array(
            'id' => 'appal_404_page_home_btn_text',
            'type' => 'text',
            'title' => esc_html__('Home Button Text', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'take me home'
        ),

        array(
            'id' => 'appal_404_page_home_btn_link',
            'type' => 'text',
            'title' => esc_html__('Home Button Link', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => '#'
        ),

        array(
            'id' => 'appal_404_page_social_text',
            'type' => 'text',
            'title' => esc_html__('Social Text', 'appal'),
            'subtitle' => esc_html__('enter text here ', 'appal'),
            'transparent' => false,
            'default' => 'follow us:'
        ),

        array(
            'id' => 'appal_404_social_opt',
            'type' => 'slides',
            'title' => esc_html__('Social Setting', 'appal'),
            'placeholder' => array(
                'title' => esc_html__('Enter Icon Name', 'appal'),
                'url' => esc_html__('Enter Social Link', 'appal'),
            ),
            'show' => array(
                'title' => true,
                'url' => true,
                'description' => false,
                'thumb' => false,
            ),
        ),

    )
));

Redux::set_section($opt_name, array(
    'title' => esc_html__('Custom Css Settings', 'appal'),
    'id' => 'appal-custom-css-setting',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_custom_css_opt',
            'type' => 'switch',
            'title' => esc_html__('Custom Css Option', 'appal'),
            'subtitle' => esc_html__('Show / hide banner Image', 'appal'),
            'default' => '0'// 1 = on | 0 = off
        ),


        array(
            'id' => 'appal_theme_color_opt',
            'type' => 'color',
            'title' => esc_html__('Theme Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd',
        ),

        array(
            'id' => 'appal_header_col_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Header Color', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),


        array(
            'id' => 'appal_menu_text_color',
            'type' => 'color',
            'title' => esc_html__('Menu Text Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),
        array(
            'id' => 'appal_menu_text_hover_color',
            'type' => 'color',
            'title' => esc_html__('Menu Text Hover', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),
        array(
            'id' => 'appal_sticky_menu_bg_color',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Backgrund Color', 'appal'),
            'subtitle' => esc_html__('choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

        array(
            'id' => 'appal_sticky_menu_text_color',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Text Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),
        array(
            'id' => 'appal_sticky_menu_text_hover_color',
            'type' => 'color',
            'title' => esc_html__('Menu Sticky Text Hover / Active Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),

        array(
            'id' => 'appal_submenu_bg_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Background Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#ffffff'
        ),

        array(
            'id' => 'appal_submenu_text_color',
            'type' => 'color',
            'title' => esc_html__('Submenu text Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#272d3a'
        ),

        array(
            'id' => 'appal_submenu_hover_text_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Hover text Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#ffffff'
        ),

        array(
            'id' => 'appal_submenu_hover_border_color',
            'type' => 'color',
            'title' => esc_html__('Submenu Hover Border Color', 'appal'),
            'subtitle' => esc_html__('Choice color here', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

        array(
            'id' => 'appal_spinning_col_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Preloader Color', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_spinner_bgcolor',
            'type' => 'color',
            'title' => esc_html__('Preloader Background Color', 'appal'),
            'subtitle' => esc_html__('choice color here', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
            'transparent' => false,
            'default' => '#ffffff'
        ),


        array(
            'id' => 'appal_spinner_bg_img',
            'type' => 'media',
            'title' => esc_html__('Preloader Image', 'appal'),
            'subtitle' => esc_html__('upload image here', 'appal'),
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/preloader.gif',
            ),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_banner_color_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Banner Color', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),


        array(
            'id' => 'appal_banner_color',
            'type' => 'color',
            'title' => esc_html__('Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),

        array(
            'id' => 'appal_footer_col_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Footer Color', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_footer_header_text_color',
            'type' => 'color',
            'title' => esc_html__('Footer Backgrund Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#272d3a'
        ),


        array(
            'id' => 'appal_footer_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#535e72'
        ),
        array(
            'id' => 'appal_footer_link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#535e72'
        ),

        array(
            'id' => 'appal_footer_social_icon_color',
            'type' => 'color',
            'title' => esc_html__('Social Icon Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#8d96a6'
        ),

        array(
            'id' => 'appal_footer_social_bg_color',
            'type' => 'color',
            'title' => esc_html__('Social Background Icon Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#e3e8fe'
        ),

        array(
            'id' => 'appal_footer_social_hover_bg_color',
            'type' => 'color',
            'title' => esc_html__('Social Hover Background Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

        array(
            'id' => 'appal_footer_social_hover_text_color',
            'type' => 'color',
            'title' => esc_html__('Social Hover Icon Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),

        array(
            'id' => 'appal_footer_address_icon_color',
            'type' => 'color',
            'title' => esc_html__('Address Icon Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

        array(
            'id' => 'appal_footer_btm_link_color',
            'type' => 'color',
            'title' => esc_html__('Footer Bottom Link Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

        array(
            'id' => 'appal_scroll_up_col_opt',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Scrollup Color', 'appal'),
            'required' => array('appal_custom_css_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_scroll_up_col_icon',
            'type' => 'color',
            'title' => esc_html__('Icon Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#fff'
        ),

        array(
            'id' => 'appal_scroll_up_col_bg',
            'type' => 'color',
            'title' => esc_html__('Background Color', 'appal'),
            'subtitle' => esc_html__('Please use color ', 'appal'),
            'transparent' => false,
            'required' => array('appal_custom_css_opt', '=', '1'),
            'default' => '#138afd'
        ),

    )
));


Redux::set_section($opt_name, array(
    'title' => esc_html__('Footer Settings', 'appal'),
    'id' => 'appal-foooter-setting',
    'icon' => 'el el-stop-alt',
    'customizer_width' => '400px',
    'fields' => array(

        array(
            'id' => 'appal_footer_dis_opt',
            'type' => 'select',
            'title' => esc_html__('Dispaly Footer ', 'appal'),
            'subtitle' => esc_html__('Select option here', 'appal'),
            'options' => array(
                '1' => 'Show',
                '2' => 'Hide',
            ),
            'default' => '1',
        ),
        array(
            'id' => 'appal_footer_background_image',
            'type' => 'media',
            'title' => esc_html__('Footer Background Image', 'appal'),
            'subtitle' => esc_html__('upload image here.', 'appal'),
        ),

        array(
            'id' => 'appal_newsletter_title',
            'type' => 'text',
            'title' => esc_html__('Newsletter Title', 'appal'),
            'subtitle' => esc_html__('write text here.', 'appal'),
            'default' => 'Get the latest updates ! mailed to you',
        ),

        array(
            'id' => 'appal_newsletter_short_id',
            'type' => 'text',
            'title' => esc_html__('Newsletter Shortcode', 'appal'),
            'subtitle' => esc_html__('Select here', 'appal'),
            'type' => 'select',
            'data' => 'posts',
            'args' => array(

                'post_type' => 'mc4wp-form',
            )
        ),


        array(
            'id' => 'appal_newsletter_notice_text',
            'type' => 'text',
            'title' => esc_html__('Notice Text', 'appal'),
            'subtitle' => esc_html__('write text here.', 'appal'),
            'default' => 'We won’t spam you, Pinky Promise',
        ),

        array(
            'id' => 'appal_foot_btn_opt',
            'type' => 'switch',
            'title' => esc_html__('Footer Button Option', 'appal'),
            'subtitle' => esc_html__('Show / hide banner Image', 'appal'),
            'default' => '1'// 1 = on | 0 = off
        ),


        array(
            'id' => 'appal_foot_apple_btn_icon',
            'type' => 'text',
            'title' => esc_html__('Apple Button Icon', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'flaticon-apple',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_apple_titletext',
            'type' => 'text',
            'title' => esc_html__('Apple Button Titletext', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'available on',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_apple_text',
            'type' => 'text',
            'title' => esc_html__('Apple Button Text', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'apple store',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_apple_link',
            'type' => 'text',
            'title' => esc_html__('Apple Button Link', 'appal'),
            'subtitle' => esc_html__('enter link here.', 'appal'),
            'default' => '#',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_play_btn_icon',
            'type' => 'text',
            'title' => esc_html__('Play Button Icon', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'flaticon-google-play',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_play_titletext',
            'type' => 'text',
            'title' => esc_html__('Play Button Titletext', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'available on',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_play_text',
            'type' => 'text',
            'title' => esc_html__('Google Play Button Text', 'appal'),
            'subtitle' => esc_html__('enter text here.', 'appal'),
            'default' => 'google play',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_play_link',
            'type' => 'text',
            'title' => esc_html__('Google Play Button Link', 'appal'),
            'subtitle' => esc_html__('enter link here.', 'appal'),
            'default' => '#',
            'required' => array('appal_foot_btn_opt', '=', '1'),
        ),

        array(
            'id' => 'appal_foot_widget_opt',
            'type' => 'text',
            'title' => esc_html__('Elementor Footer Widget', 'appal'),
            'subtitle' => esc_html__('enter id here.', 'appal'),
        ),

        array(
            'id' => 'appal_copywrite_text',
            'type' => 'editor',
            'title' => esc_html__('CopyWrite Text', 'appal'),
            'subtitle' => esc_html__('Write Copywrite text here.', 'appal'),
            'default' => '	Copyright @ 2019 <a href="#">Appal</a> all right reserved.',
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 4
            )
        )

    )
));


Redux::set_section($opt_name, array(
    'icon' => 'el el-list-alt',
    'title' => esc_html__('Customizer Only', 'appal'),
    'desc' => esc_html__('<p class="description">This Section should be visible only in Customizer</p>', 'appal'),
    'customizer_only' => true,
    'fields' => array(
        array(
            'id' => 'opt-customizer-only',
            'type' => 'select',
            'title' => esc_html__('Customizer Only Option', 'appal'),
            'subtitle' => esc_html__('The subtitle is NOT visible in customizer', 'appal'),
            'desc' => esc_html__('The field desc is NOT visible in customizer.', 'appal'),
            'customizer_only' => true,
            //Must provide key => value pairs for select options
            'options' => array(
                '1' => esc_html__('Opt 1', 'appal'),
                '2' => esc_html__('Opt 2', 'appal'),
                '3' => esc_html__('Opt 3', 'appal')
            ),
            'default' => '2'
        ),
    )
));

if (file_exists(get_template_directory() . '/../README.md')) {
    $section = array(
        'icon' => 'el el-list-alt',
        'title' => esc_html__('Documentation', 'appal'),
        'fields' => array(
            array(
                'id' => '17',
                'type' => 'raw',
                'markdown' => true,
                'content_path' => get_template_directory() . '/../README.md', // FULL PATH, not relative please
                //'content' => 'Raw content here',
            ),
        ),
    );
    Redux::set_section($opt_name, $section);
}
/*
 * <--- END SECTIONS
 */


//define


include_once(APPALPLUGINDIR . '/inc/custom_css.php');