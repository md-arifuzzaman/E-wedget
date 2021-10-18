<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class landzai_faq extends Widget_Base {

    public function get_name() {
        return 'landzai-faq';
    }
 
    public function get_title() {
        return __('FAQ', 'landzai');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['landzaielement-addons'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Got A Question?', 'landzai' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                 tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'landzai' ),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'f_title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
            ]
        );
        $repeater->add_control(
            'f_info',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor tempus sit id commu
                 tincidunt. Tempor etiam at in nisl ac tortor, ut vitae fermentum. Nibh eget blandit suscipit
                  ornare donec eget semper orci. Malesuada tortor neque, posuere egtnhet viverra auctor ac
                   egestas tellus. Turpis venenatis, viverra nisi aliquet diam 
                odio condimentum. In vel consectetur auctor interdum pulvinar tortor. Duis turpis in sit', 'landzai' ),
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label' => __( 'Faq List One', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],

                ],
                'title_field' => '{{{ f_title }}}',
            ]
        );
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
            'f_title2',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
            ]
        );
        $repeater2->add_control(
            'f_info2',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor tempus sit id commu
                 tincidunt. Tempor etiam at in nisl ac tortor, ut vitae fermentum. Nibh eget blandit suscipit
                  ornare donec eget semper orci. Malesuada tortor neque, posuere egtnhet viverra auctor ac
                   egestas tellus. Turpis venenatis, viverra nisi aliquet diam 
                odio condimentum. In vel consectetur auctor interdum pulvinar tortor. Duis turpis in sit', 'landzai' ),
            ]
        );
        $this->add_control(
            'faq_list2',
            [
                'label' => __( 'Faq List Two', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],
                    [
                        'f_title' => __( 'How Can I Integrate Avocode To My Current Tool Stack?', 'landzai' ),
                    ],

                ],
                'title_field' => '{{{ f_title2 }}}',
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'landzai' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'Layout 1', 'landzai' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Layout 2', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'General', 'landzai' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'slider_number',
            [
                'label' => __('Slider Number', 'landzai'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titlea_color',
            [
                'label' => __( 'Title Active Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box h4' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p',
            ]
        );
        $this->add_control(
            'hh_caa',
            [
                'label' => __( 'Button Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaaccc',
                'label' => __( 'Button Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more',
            ]
        );
        $this->add_control(
            'icon_cb',
            [
                'label' => __( 'Overlay BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box, 
                    {{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_faq() );