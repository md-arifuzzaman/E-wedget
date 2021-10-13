<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class landzai_banner extends Widget_Base
{

    public function get_name()
    {
        return 'landzai-banner';
    }

    public function get_title()
    {
        return __('Banner', 'landzai');
    }

    public function get_categories()
    {
        return ['landzaielement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'landzai'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Reinvent Yourself With Oursalves By Useing Landzai', 'landzai'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Amet, dui, lacus in non massa id tellus amet tincidunt. Lacus ut integer
                 blandit diam nibh pulvinar. Ultrices phasellus', 'landzai'),
            ]
        );
        $this->add_control(
            'button1',
            [
                'label' => __('Button 1', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Download Landzai', 'landzai'),
            ]
        );
        $this->add_control(
            'link1', [
                'label' => __('Link 1', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'button2',
            [
                'label' => __('Button 2', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Watch A Demo', 'landzai'),
            ]
        );
        $this->add_control(
            'link2', [
                'label' => __('Link 2', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'top-left-image',
            [
                'label' => __( 'top-left-image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => ['layout2','layout3'],
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'top-right-image',
            [
                'label' => __( 'top-right-image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => ['layout2','layout3'],
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'bottom-left-image',
            [
                'label' => __( 'bottom-left-image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => ['layout2','layout3'],
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'bottom-right-image',
            [
                'label' => __( 'bottom-right-image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon_title',
            [
                'label' => __( 'Icon', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Landzai', 'landzai' ),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'icon_list',
            [
                'label' => __( 'Icon List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'layout' => 'layout4',
                ],
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'List', 'landzai' ),
                    ],
                    [
                        'title' => __( 'List', 'landzai' ),
                    ],
                    [
                        'title' => __( 'List', 'landzai' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'landzai' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'One', 'landzai' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __( 'Three', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __( 'Four', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'landzai'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'landzai'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion .acc-btn p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .accordion .acc-btn p',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Content Color', 'landzai'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .accordion .acc-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Content Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .accordion-box .accordion .acc-content p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __('Box BG', 'landzai'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'banner-area-v3',
                'label' => __('banner-area-v3', 'landzai'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .banner-area-v3',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new landzai_banner());
?>