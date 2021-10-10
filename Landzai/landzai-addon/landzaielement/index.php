<?php

if (!defined('ABSPATH')) {
    exit;
}
if (class_exists('ELEMENTOR')){
    return;
}
if (!class_exists('LandzaiElement_Elementor_Addons')) :

    /**
     * Main LandzaiElement_Elementor_Addons Class
     *
     */
    final class LandzaiElement_Elementor_Addons {

        /** Singleton *************************************************************/
        const LIST_CONTROL = 'landzai_lists_control';
        private static $instance;

        /**
         * Main LandzaiElement_Elementor_Addons Instance
         *
         * Insures that only one instance of LandzaiElement_Elementor_Addons exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance() {

            if (!isset(self::$instance) && !(self::$instance instanceof LandzaiElement_Elementor_Addons)) {

                self::$instance = new LandzaiElement_Elementor_Addons;

                self::$instance->setup_constants();

                self::$instance->includes();

                self::$instance->hooks();

            }
            return self::$instance;
        }

        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'landzaielement'), LANDZAI_VERSION);
        }

        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'landzaielement'), LANDZAI_VERSION);
        }

        /**
         * Setup plugin constants
         *
         */
        private function setup_constants() {

            // Plugin Folder Path
            if (!defined('Landzai_PLUGIN_DIR')) {
                define('Landzai_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('Landzai_PLUGIN_URL')) {
                define('Landzai_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder Path
            if (!defined('Landzai_ADDONS_DIR')) {
                define('Landzai_ADDONS_DIR', plugin_dir_path(__FILE__) . 'includes/widgets/');
            }

            // Plugin Folder Path
            if (!defined('LLandzai_ADDONS_URL')) {
                define('LLandzai_ADDONS_URL', plugin_dir_url(__FILE__) . 'includes/widgets/');
            }

        }

        /**
         * Include required files
         *
         */
        private function includes() {


            require_once Landzai_PLUGIN_DIR . 'includes/helper-functions.php';
            require_once Landzai_PLUGIN_DIR . 'includes/query-functions.php';
            require_once Landzai_PLUGIN_DIR . 'includes/template-lib.php';

        }

        /**
         * Load Plugin Text Domain
         *
         * Looks for the plugin translation files in certain directories and loads
         * them to allow the plugin to be localised
         */
        public function load_plugin_textdomain() {


        }

        /**
         * Setup the default hooks and actions
         */
        private function hooks() {

            add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
            add_action('elementor/controls/controls_registered', array($this, 'init_controls'), 10);
            add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array($this, 'register_frontend_styles'), 10);
            add_action('elementor/editor/before_enqueue_scripts', array($this, 'register_elementor_editor_css'), 10);
            add_action('elementor/init', array($this, 'add_elementor_category'));
            add_action('elementor/widgets/widgets_registered', array($this, 'include_widgets'));
            add_filter( 'elementor/icons_manager/additional_tabs', array($this, 'add_material_icons_tabs' ) );

        }
        public function init_controls()
        {

            require_once Landzai_PLUGIN_DIR . 'includes/class-control-list.php';

            $controls_manager = \Elementor\Plugin::$instance->controls_manager;

            $controls_manager->register_control(self::LIST_CONTROL, new Landzai_Lists_Control());
        }
        public function add_material_icons_tabs( $tabs = array() ) {

            $tabs['landzaiicon'] = array(
                'name'          => 'landzaiicon',
                'label'         => esc_html__( 'Landzai', 'landzai' ),
                'labelIcon'     => 'icon-chart',
                'prefix'        => 'icon-',
                'displayPrefix' => 'landzai',
                'url'           => Landzai_PLUGIN_URL . 'assets/css/landzai/landzai.css',
                'fetchJson'     => Landzai_PLUGIN_URL . 'assets/css/landzai/fonts/landzai.json',
                'ver'           => '3.0.1',
            );
            return $tabs;
        } 

        /**
         * Load Frontend Scripts
         *
         */
        public function register_frontend_scripts() {
            foreach( glob( LANDZAI_PLUG_DIR. 'landzaielement/assets/js/*.js' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_script( $filename, Landzai_PLUGIN_URL . 'assets/js/'.$filename, array('jquery'), LANDZAI_VERSION, true);
            }
        }

        public function register_elementor_editor_css() {
            wp_enqueue_style( 'elementor-custom-editor', Landzai_PLUGIN_URL . 'assets/css/elementor/elementor-custom-editor.css');
        }

        public function register_frontend_styles() {

            foreach( glob( LANDZAI_PLUG_DIR. 'landzaielement/assets/css/*.css' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_style( $filename, Landzai_PLUGIN_URL . 'assets/css/'.$filename);
                wp_enqueue_style( 'landzai-icon', Landzai_PLUGIN_URL . 'assets/css/landzai/landzai.css');
            }
        }
        public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'landzaielement-addons',
                array(
                    'title' => __('Landzai Addons', 'landzaielement'),
                    'icon' => 'fa fa-plug',
                ),
                1);

            \Elementor\Plugin::instance()->elements_manager->add_category(
                'landzai-builder',
                array(
                    'title' => __('Landzai Builder', 'landzai'),
                    'icon' => 'fa fa-plug',
                ),
                1);
        }
        
        public function include_widgets($widgets_manager) {
            $widgets[] = '';
            foreach( glob( LANDZAI_PLUG_DIR. 'landzaielement/includes/widgets/*' ) as $file ) {

                $widgets[] = substr($file, strrpos($file, '/') + 1);
            }

            if (is_array($widgets)){
                $widgets = array_filter($widgets);
                foreach ($widgets as $key => $value){
                    if (!empty($value)) {
                        require_once Landzai_ADDONS_DIR . ''.$value.'/index.php';
                    }
                    
                }

            }
                                                                    
        }

    }

endif; // End if class_exists check


/**
 * The main function responsible for returning the one true LandzaiElement_Elementor_Addons
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $ae = Landzai(); ?>
 */
function Landzai() {
    return LandzaiElement_Elementor_Addons::instance();
}

// Get Landzai Running
Landzai();





