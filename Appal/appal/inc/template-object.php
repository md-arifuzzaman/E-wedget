<?php

class appal_theme_hooks
{

    function __construct()
    {
        add_action('wp_body_open', array(&$this, 'render_preloader'));
        add_action('wp_body_open', array(&$this, 'render_scroll_top'));
        add_action('appal_header', array(&$this, 'appal_render_header'));
        add_action('appal_footer', array(&$this, 'appal_render_footer'));
        add_action('appal_sidebar_render', array(&$this, 'appal_render_sidebar'));
    }

    public function render_preloader()
    {
        if (appal_theme_options('appal_preloader_opt')) {
            echo ' <!-- preloader - start -->
        <div id="preloader"></div>
        <!-- preloader - end -->';
        }
    }

    public function render_scroll_top()
    {
        if (appal_theme_options('appal_scroll_up_opt')) {
            echo '<!-- backtotop - start -->
	<div id="thetop"></div>
	<div id="backtotop">
		<a href="#" id="scroll">
			<i class="fas fa-arrow-up"></i>
		</a>
	</div>
	<!-- backtotop - end -->';
        }
    }

    public function appal_render_sidebar()
    {

        $cust_header = appal_theme_options('appal_sidebar');
        echo do_shortcode('[INSERT_ELEMENTOR id="' . $cust_header . '"]');

    }

    public function appal_render_footer()
    {

        $meta_switch = appal_theme_meta('meta_footer_switch');
        $meta_footer = appal_theme_meta('meta_footer');
        $footer = $meta_switch ? $meta_footer : '';
        if ($footer) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $footer . '"]');
        }
    }

    public function appal_render_header()
    {
        $meta_switch = appal_theme_meta('meta_header_switch');
        $meta_header = appal_theme_meta('meta_header');
        $header = $meta_switch ? $meta_header : '';
        if ($header) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $header . '"]');
        }
    }

}

new appal_theme_hooks();