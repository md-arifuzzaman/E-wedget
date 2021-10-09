<?php

namespace Elementor;

if (!function_exists('appal_insert_elementor')) {

    function appal_insert_elementor($atts)
    {
        if (!class_exists('Elementor\Plugin')) {
            return '';
        }
        if (!isset($atts['id']) || empty($atts['id'])) {
            return '';
        }

        $post_id = $atts['id'];

        $response = Plugin::instance()->frontend->get_builder_content_for_display($post_id);
        return $response;
    }

}

add_shortcode('INSERT_ELEMENTOR', 'Elementor\appal_insert_elementor');