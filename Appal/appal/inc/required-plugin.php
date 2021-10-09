<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 *
 */

add_action('tgmpa_register', 'appal_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function appal_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name' => esc_html__('Redux Framework', 'appal'),

            'slug' => 'redux-framework',

            'required' => true,
        ),

        array(
            'name' => esc_html__('CMB2', 'appal'),

            'slug' => 'cmb2',

            'required' => true,
        ),

        array(
            'name' => esc_html__('WordPress Importer', 'appal'),

            'slug' => 'wordpress-importer',

            'required' => true,
        ),

        array(

            'name' => esc_html__('Appal Plugin', 'appal'),

            'slug' => 'appal-plugin',

            'source' => get_template_directory() . '/inc/plugins/appal-plugin.zip',

            'required' => true,

            'version' => '1.9',

            'force_activation' => false,

            'force_deactivation' => false,

        ),

        array(

            'name' => esc_html__('Envato Market', 'appal'),

            'slug' => 'envato-market',

            'source' => get_template_directory() . '/inc/plugins/envato-market.zip',

            'required' => true,

            'force_activation' => false,

            'force_deactivation' => false,

        ),

        array(

            'name' => esc_html__('Contact Form 7', 'appal'),

            'slug' => 'contact-form-7',

            'required' => false,

        ),


        array(

            'name' => esc_html__('MailChimp for WordPress', 'appal'),

            'slug' => 'mailchimp-for-wp',

            'required' => false,

        ),


        array(

            'name' => esc_html__('Elementor Page Builder', 'appal'),

            'slug' => 'elementor',

            'required' => true,

        ),

        array(

            'name' => esc_html__('One Click Demo Import', 'appal'),

            'slug' => 'one-click-demo-import',

            'required' => true,

            'force_activation' => false,

            'force_deactivation' => false,

        ),

        array(

            'name' => esc_html__('WooCommerce', 'appal'),

            'slug' => 'woocommerce',

            'required' => true,

        ),

        array(

            'name' => esc_html__('Header, Footer & Blocks for Elementor', 'appal'),

            'slug' => 'header-footer-elementor',

            'required' => true,

            'force_activation' => false,

            'force_deactivation' => false,

        ),

        array(

            'name' => esc_html__('Widget Importer & Exporter', 'appal'),

            'slug' => 'widget-importer-exporter',

            'required' => true,

            'force_activation' => false,

            'force_deactivation' => false,

        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.


        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'appal'),
            'menu_title' => esc_html__('Install Plugins', 'appal'),
            'installing' => esc_html__('Installing Plugin: %s', 'appal'), // %s = plugin name.
            'oops' => esc_html__('Something went wrong with the plugin API.', 'appal'),
            'notice_can_install_required' => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe' => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'appal'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                'appal'
            ), // %1$s = plugin name(s).
            'install_link' => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'appal'
            ),
            'update_link' => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'appal'
            ),
            'activate_link' => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'appal'
            ),
            'return' => esc_html__('Return to Required Plugins Installer', 'appal'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'appal'),
            'activated_successfully' => esc_html__('The following plugin was activated successfully:', 'appal'),
            'plugin_already_active' => esc_html__('No action taken. Plugin %1$s was already active.', 'appal'),  // %1$s = plugin name(s).
            'plugin_needs_higher_version' => esc_html__('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'appal'),  // %1$s = plugin name(s).
            'complete' => esc_html__('All plugins installed and activated successfully. %1$s', 'appal'), // %s = dashboard link.
            'contact_admin' => esc_html__('Please contact the administrator of this site for help.', 'appal'),

            'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),

    );

    tgmpa($plugins, $config);
}
