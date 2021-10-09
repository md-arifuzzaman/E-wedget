<?php
function appal_import_files()
{
    return array(

        array(
            'import_file_name' => esc_html__('Demo Import', 'appal'),
            'categories' => array('appal Category'),
            'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo/demo-content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo/widget.wie',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . '/inc/demo/redux.json',
                    'option_name' => 'appal',
                ),
            ),

            'import_notice' => esc_html__('Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'appal'),

        ),


    );


}

add_filter('pt-ocdi/import_files', 'appal_import_files');


function appal_after_import_files()
{

    //Set Menu
    $main_menu = get_term_by('name', 'Main', 'nav_menu');
    $footer_menu = get_term_by('name', 'Footer', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
            'menu-1' => $main_menu->term_id,
            'menu-2' => $footer_menu->term_id,
        )
    );

// Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);

}

add_filter('pt-ocdi/after_import', 'appal_after_import_files');
// Before Import
function appal_clear_before_import() {
    global $wpdb;
    //delete posts
    $tables = ['commentmeta','comments','postmeta','posts','termmeta','terms','term_relationships','term_taxonomy'];

    foreach ( $tables as $table ) {
        $table  = $wpdb->prefix . $table;
        $wpdb->query( "TRUNCATE TABLE $table" );
    }
}
add_action( 'pt-ocdi/before_content_import', 'appal_clear_before_import' );
//Personalize
function appal_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Demo Importer' , 'appal' );
    $default_settings['menu_title']  = esc_html__( 'Demo Importer' , 'appal' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'appal-demo-importer';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'appal_plugin_page_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function appal_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes','appal_mime_types');