<?php
function ahope_welcome_page(){
    require_once 'ahope-welcome.php';
}
function ahope_demo_importer_function(){
    admin_url( 'admin.php?page=ae-demo-importer' );
}
add_action( 'admin_menu', 'ahope_admin_meu' );
function ahope_admin_meu() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Ahope', 'Ahope', 'administrator', 'ahope-admin-menu', 'ahope_welcome_page', 'dashicons-smiley', 2 );
    add_submenu_page('ahope-admin-menu', 'Theme Options', 'Theme Options', 'manage_options', 'customize.php' );
    add_submenu_page( 'ahope-admin-menu', esc_html__( 'Demo Importer', 'ahope' ), esc_html__( 'Demo Importer', 'ahope' ), 'administrator', 'ae-demo-importer',  'ahope_demo_importer_function');
}