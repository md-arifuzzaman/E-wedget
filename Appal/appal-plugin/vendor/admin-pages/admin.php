<?php
function appal_welcome_page()
{
    require_once 'appal-welcome.php';
}

function appal_demo_importer_function()
{
    admin_url('admin.php?page=appal-demo-importer');
}
function appal_theme_options_function()
{
    admin_url('themes.php?page=Appal');
}
add_action('admin_menu', 'appal_admin_meu');
function appal_admin_meu()
{
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Appal', 'Appal', 'administrator', 'appal-admin-menu', 'appal_welcome_page', 'dashicons-smiley', 2);
    add_submenu_page('appal-admin-menu', esc_html__('Demo Importer', 'appal'), esc_html__('Demo Importer', 'appal'), 'administrator', 'appal-demo-importer', 'appal_demo_importer_function');
    add_submenu_page('appal-admin-menu', esc_html__('Theme Options', 'appal'), esc_html__('Theme Options', 'appal'), 'administrator', 'Appal', 'appal_theme_options_function');
}