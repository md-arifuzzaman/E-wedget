<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class appal_builder_template extends Widget_Base
{

    public function get_name()
    {
        return 'appal-builder-template';
    }

    public function get_title()
    {
        return __('Builder Template', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Builder Template', 'appal'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'id_query',
            [
                'label' => __('Template', 'appal'),
                'type' => Controls_Manager::SELECT2,
                'options' => appal_post_query('appal_builders'),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

       $id = !empty($settings['id_query']) ? $settings['id_query'] : null;
        echo appal_render_template($id);

    }

    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new appal_builder_template());
?>