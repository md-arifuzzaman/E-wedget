<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class landzai_content_section extends Widget_Base
{

    public function get_name()
    {
        return 'landzai-content-section';
    }

    public function get_title()
    {
        return __('Content Section', 'landzai');
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
                'default' => __('Built The App That Everyone Will Love.', 'landzai'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Enim adipi svsciang pellentesque curabitur at tellus pharetra non. Natoque 
                dosnec quis felis nunc, amet. Integer venenatis at velit malesuada vestibulum tempor vitae. Eu sed proin eget
                 aliquet varius in quis. Volutpat turpis quis quis posues re.', 'landzai'),
            ]
        );
        $this->add_control(
            'button',
            [
                'label' => __('Button', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Learn More', 'landzai'),
            ]
        );
        $this->add_control(
            'link', [
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
            'image',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title3',
            [
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Cloud Service', 'landzai'),
            ]
        );
        $repeater->add_control(
            'image3',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'content_list3',
            [
                'label' => __( 'Brand List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'layout' => 'layout3',
                ],
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                    [
                        'title' => __( 'Landzai', 'landzai' ),
                    ],
                ],
                'title_field' => '{{{ title3 }}}',
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
                    'layout5' => [
                        'title' => __( 'Five', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
            'title5',
            [
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Cloud Service', 'landzai'),
            ]
        );
        $this->add_control(
            'content_list5',
            [
                'label' => __( 'content List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'layout' => 'layout5',
                ],
                'fields' => $repeater2->get_controls(),
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
                'title_field' => '{{{ title5 }}}',
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
            'dghdfh',
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
                'name' => 'con_lay4',
                'label' => __('Icon Image', 'landzai'),
                'types' => ['classic', 'gradient'],
                'condition' => [
                    'layout' => 'layout4',
                ],
                'selector' => '{{WRAPPER}} .fantastic-area .fantastic-image:before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'con_lay44',
                'label' => __('Icon Image', 'landzai'),
                'types' => ['classic', 'gradient'],
                'condition' => [
                    'layout' => 'layout4',
                ],
                'selector' => '{{WRAPPER}} .fantastic-area .fantastic-image:after',
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

Plugin::instance()->widgets_manager->register_widget_type(new landzai_content_section());
?>