<?php
function landzai_welcome_page(){
    require_once 'landzai-welcome.php';
}
function ae_demo_importer_function(){
    admin_url( 'admin.php?page=ae-demo-importer' );
}
add_action( 'admin_menu', 'landzai_admin_meu' );
function landzai_admin_meu() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Landzai', 'Landzai', 'administrator', 'landzai-admin-menu', 'landzai_welcome_page', 'dashicons-smiley', 2 );
    add_submenu_page('landzai-admin-menu', 'Theme Options', 'Theme Options', 'manage_options', 'customize.php' );
    add_submenu_page( 'landzai-admin-menu', esc_html__( 'Demo Importer', 'landzai' ), esc_html__( 'Demo Importer', 'landzai' ), 'administrator', 'ae-demo-importer',  'ae_demo_importer_function');
}