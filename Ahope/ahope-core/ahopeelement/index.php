<?php

if (!defined('ABSPATH')) {
    exit;
}
if (class_exists('ELEMENTOR')){
    return;
}
if (!class_exists('AhopeElement_Elementor_Addons')) :

    /**
     * Main AhopeElement_Elementor_Addons Class
     *
     */
    final class AhopeElement_Elementor_Addons {

        /** Singleton *************************************************************/
        const LIST_CONTROL = 'ahope_lists_control';

        private static $instance;

        /**
         * Main AhopeElement_Elementor_Addons Instance
         *
         * Insures that only one instance of AhopeElement_Elementor_Addons exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance() {

            if (!isset(self::$instance) && !(self::$instance instanceof AhopeElement_Elementor_Addons)) {

                self::$instance = new AhopeElement_Elementor_Addons;

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
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'ahopeelement'), AHOPE_VERSION);
        }

        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'ahopeelement'), AHOPE_VERSION);
        }

        /**
         * Setup plugin constants
         *
         */
        private function setup_constants() {

            // Plugin Folder Path
            if (!defined('Ahope_PLUGIN_DIR')) {
                define('Ahope_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('Ahope_PLUGIN_URL')) {
                define('Ahope_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder Path
            if (!defined('Ahope_ADDONS_DIR')) {
                define('Ahope_ADDONS_DIR', plugin_dir_path(__FILE__) . 'includes/widgets/');
            }

        }

        /**
         * Include required files
         *
         */
        private function includes() {


            require_once Ahope_PLUGIN_DIR . 'includes/helper-functions.php';
            require_once Ahope_PLUGIN_DIR . 'includes/query-functions.php';
            require_once Ahope_PLUGIN_DIR . 'includes/template-lib.php';

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
            add_action('elementor/controls/controls_registered', array($this, 'init_controls'), 10);
            add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
            add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array($this, 'register_frontend_styles'), 10);
            add_action('elementor/editor/before_enqueue_scripts', array($this, 'register_elementor_editor_css'), 10);
            add_action('elementor/init', array($this, 'add_elementor_category'));
            add_action('elementor/widgets/widgets_registered', array($this, 'include_widgets'));
            add_filter( 'elementor/icons_manager/additional_tabs', array($this, 'add_material_icons_tabs' ) );
        }

        public function init_controls()
        {

            require_once Ahope_PLUGIN_DIR . 'includes/class-control-list.php';

            $controls_manager = \Elementor\Plugin::$instance->controls_manager;

            $controls_manager->register_control(self::LIST_CONTROL, new Ahope_Lists_Control());
        }
            
        public function add_material_icons_tabs( $tabs = array() ) {

            $tabs['ahopeicon'] = array(
                'name'          => 'ahopeicon',
                'label'         => esc_html__( 'Ahope Consulting', 'icon-element' ),
                'labelIcon'     => 'icon-chart',
                'prefix'        => 'icon-',
                'displayPrefix' => 'ahope',
                'url'           => Ahope_PLUGIN_URL . 'assets/css/ahope/ahope.css',
                'fetchJson'     => Ahope_PLUGIN_URL . 'assets/css/ahope/fonts/ahope.json',
                'ver'           => '3.0.1',
            );
            return $tabs;
        } 

        /**
         * Load Frontend Scripts
         *
         */
        public function register_frontend_scripts() {
            foreach( glob( AHOPE_PLUG_DIR. 'ahopeelement/assets/js/*.js' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_script( $filename, Ahope_PLUGIN_URL . 'assets/js/'.$filename, array('jquery'), AHOPE_VERSION, true);
            }
        }

        public function register_elementor_editor_css() {
            wp_enqueue_style( 'elementor-custom-editor', Ahope_PLUGIN_URL . 'assets/css/elementor/elementor-custom-editor.css');
        }

        public function register_frontend_styles() {

            foreach( glob( AHOPE_PLUG_DIR. 'ahopeelement/assets/css/*.css' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_style( $filename, Ahope_PLUGIN_URL . 'assets/css/'.$filename);
                wp_enqueue_style( 'ahope-icon', Ahope_PLUGIN_URL . 'assets/css/ahope/ahope.css');
                wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
                wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
            }
        }
        public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'ahopeelement-addons',
                array(
                    'title' => __('Ahope Addons', 'ahopeelement'),
                    'icon' => 'fa fa-plug',
                ),
                1);

            \Elementor\Plugin::instance()->elements_manager->add_category(
                'ahope-header',
                array(
                    'title' => __('Ahope Header', 'ahope'),
                    'icon' => 'fa fa-plug',
                ),
                1);

            \Elementor\Plugin::instance()->elements_manager->add_category(
                'ahope-footer',
                array(
                    'title' => __('Ahope Footer', 'ahope'),
                    'icon' => 'fa fa-plug',
                ),
                1);
        }
        
        public function include_widgets($widgets_manager) {
            $widgets[] = '';
            foreach( glob( AHOPE_PLUG_DIR. 'ahopeelement/includes/widgets/*' ) as $file ) {

                $widgets[] = substr($file, strrpos($file, '/') + 1);
            }

            if (is_array($widgets)){
                $widgets = array_filter($widgets);
                foreach ($widgets as $key => $value){
                    if (!empty($value)) {
                        require_once Ahope_ADDONS_DIR . ''.$value.'/index.php';
                    }
                    
                }

            }
                                                                    
        }

    }

endif; // End if class_exists check


/**
 * The main function responsible for returning the one true AhopeElement_Elementor_Addons
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $ae = Ahope(); ?>
 */
function Ahope() {
    return AhopeElement_Elementor_Addons::instance();
}

// Get Ahope Running
Ahope();





