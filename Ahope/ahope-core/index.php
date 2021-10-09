<?php
/*
Plugin Name: Ahope Core
Plugin URI: https://matethemes.com/
Description: Ahope core plugins which contains all the core features of the ahope theme.
Author: Mate_Themes
Author URI: https://themeforest.net/user/mate_themes
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;
define( 'AHOPE_VERSION', '1.0.0' );
define( 'AHOPE_PLUG_DIR', dirname(__FILE__).'/' );
define('AHOPE_PLUG_URL', plugin_dir_url(__FILE__));
define('AHOPE_DEMO_FILES', plugin_dir_url(__FILE__). 'vendor/demo/data/xml/');
define('AHOPE_DEMO_SLIDER', plugin_dir_path(__FILE__). 'vendor/demo/data/xml/');

function cs_framework_init_check() {

    if( ! function_exists( 'cs_framework_init' ) && ! class_exists( 'CSFramework' ) ) {
         
          require_once AHOPE_PLUG_DIR .'/vendor/codestar-framework/codestar-framework.php';
          require_once AHOPE_PLUG_DIR .'/vendor/configstar/customiser.php';
          require_once AHOPE_PLUG_DIR .'/vendor/configstar/pagemeta.php';
          require_once AHOPE_PLUG_DIR . '/vendor/configstar/servicemeta.php';
          require_once AHOPE_PLUG_DIR . '/vendor/configstar/featuresmeta.php';
          require_once AHOPE_PLUG_DIR .'/vendor/configstar/profile.php';
          require_once AHOPE_PLUG_DIR .'/vendor/admin-pages/admin.php';
          require_once AHOPE_PLUG_DIR . '/vendor/demo/includes/demo-importer.php';

    }
 
    if( ! class_exists( 'AhopeElement_Elementor_Addons' ) ) {
        require_once AHOPE_PLUG_DIR .'/ahopeelement/index.php';
        require_once AHOPE_PLUG_DIR. '/helper/customiser-extra.php';
        require_once AHOPE_PLUG_DIR. '/helper/cpt.php';
    }

}

add_action( 'plugins_loaded', 'cs_framework_init_check' );

function ahopeelement_footer_select($type='') {

        $type = $type ? $type :'elementor_library';
        global $post;
        $args = array('numberposts' => -1,'post_type' => $type,);
        $posts = get_posts($args);  
        $categories = array(
        ''  => __( 'Select', 'ahope' ),
        );
        foreach ($posts as $pn_cat) {
            $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
        }
        return $categories;   
}


if (class_exists('ELEMENTOR')){
    add_action( 'template_redirect', function() {
        $instance = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' );
        remove_action( 'template_redirect', [ $instance, 'block_template_frontend' ] );
    }, 9 );
}

?>