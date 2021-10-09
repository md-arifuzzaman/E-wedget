<?php
class ahope_theme_hooks
{

    function __construct()
    {
        add_action('wp_body_open', array(&$this, 'render_preloader'));
        add_action('wp_body_open', array(&$this, 'render_scroll_top'));
        add_action('ahope_header',array(&$this,'ahope_render_header'));
        add_action('ahope_footer',array(&$this,'ahope_render_footer'));
        add_action('ahope_sidebar',array(&$this,'ahope_render_sidebar'));
    }

    function render_preloader()
    {
        if( ahope_theme_options('enb_pre') ){
            echo ' <div class="preloader">
                <div class="loader">
                    <div class="loader_inner"></div>
                    <div class="loader_inner"></div>
                </div>
            </div>';
        }
    }

    function render_scroll_top()
    {
        if( ahope_theme_options('enb_scroll') ){
            echo '<button class="scrolltop"><span class="fa fa-angle-up"></span></button>';
        }
    }

    function ahope_render_sidebar(){

        $cust_header = ahope_theme_options('sidebar');
        echo do_shortcode('[INSERT_ELEMENTOR id="'.$cust_header.'"]');

    }

    function ahope_render_footer(){

        $meta_switch = ahope_theme_meta('footer_switch');
        $meta_footer = ahope_theme_meta('meta_footer');
        $footer = $meta_switch ? $meta_footer : '';
        if ($footer) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $footer . '"]');
        }
    }

    function ahope_render_header(){
        $meta_switch = ahope_theme_meta('header_switch');
        $meta_header = ahope_theme_meta('meta_header');
        $header = $meta_switch ? $meta_header : '';
        if ($header) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $header . '"]');
        }
    }

}

new ahope_theme_hooks();
