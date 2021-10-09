<?php
namespace Elementor;
use AhopeElement_Elementor_Addons;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class pricing_table extends Widget_Base
{

    public function get_name()
    {
        return 'pricing-table';
    }

    public function get_title()
    {
        return __('Pricing Table', 'ahope');
    }

    public function get_categories()
    {
        return ['ahopeelement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-sitemap';
    }

    public function render_plain_content($instance = [])
    {
    }

    protected function _register_controls()
    {


        $this->start_controls_section(
            'pm',
            [
                'label' => __('Pricing', 'ahope'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'ahope' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'One', 'ahope' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __( 'Three', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __( 'Four', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'pma',
            [
                'label' => __('Monthly', 'ahope'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Basic', 'ahope'),
            ]
        );
        $repeater->add_control(
            'sub',
            [
                'label' => __('Sub Title', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Per User/Month Billed Yearly', 'ahope'),
            ]
        );
        $repeater->add_control(
            'price',
            [
                'label' => __('Price', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$75', 'ahope'),
            ]
        );
        $repeater->add_control(
            'features',
            [
                'label' => __('Features', 'ahope'),
                'type' => AhopeElement_Elementor_Addons::LIST_CONTROL,
            ]
        );
        $repeater->add_control(
            'button',
            [
                'label' => __('Button', 'ahope'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Get Started', 'ahope'),
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'ahope'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'photo', [
                'label' => __('Photo', 'ahope'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'price_list',
            [
                'label' => __('Pricing Table', 'ahope'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Primary Plan',
                    ],
                    [
                        'title' => 'Basic Plan',
                    ],
                    [
                        'title' => 'Premium Plan',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'y_pma',
            [
                'label' => __('Yearly', 'ahope'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'y_title',
            [
                'label' => __('Title', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Basic', 'ahope'),
            ]
        );
        $repeater2->add_control(
            'y_sub',
            [
                'label' => __('Sub Title', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Per User/Month Billed Yearly', 'ahope'),
            ]
        );
        $repeater2->add_control(
            'y_price',
            [
                'label' => __('Price', 'ahope'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$75', 'ahope'),
            ]
        );
        $repeater2->add_control(
            'y_features',
            [
                'label' => __('Features', 'ahope'),
                'type' => AhopeElement_Elementor_Addons::LIST_CONTROL,
            ]
        );
        $repeater2->add_control(
            'y_button',
            [
                'label' => __('Button', 'ahope'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Get Started', 'ahope'),
            ]
        );
        $repeater2->add_control(
            'y_link', [
                'label' => __('Link', 'ahope'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater2->add_control(
            'y_photo', [
                'label' => __('Photo', 'ahope'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'y_price_list',
            [
                'label' => __('Pricing Table', 'ahope'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'y_title' => 'Primary Plan',
                    ],
                    [
                        'y_title' => 'Basic Plan',
                    ],
                    [
                        'y_title' => 'Premium Plan',
                    ],

                ],
                'title_field' => '{{{ y_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'ahope'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-ribbon-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-ribbon-title',
            ]
        );
        $this->add_control(
            'pricing_color',
            [
                'label' => __('Pricing Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-value h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pr_fonts',
                'label' => __('Pricing Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-value h4',
            ]
        );
        $this->add_control(
            'unit_color',
            [
                'label' => __('Unit Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-value h4 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pruu_fonts',
                'label' => __('Unit Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-value h4 span',
            ]
        );
        $this->add_control(
            'fe_color',
            [
                'label' => __('Feature Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-info ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fea_fonts',
                'label' => __('Feature Typography', 'ahope'),
                'selector' => '{{WRAPPER}} .price-box .price-info ul li',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => __('Button BG Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => __('Button Hover Color', 'ahope'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_stick',
                'label' => __('Border Sticker', 'ahope'),
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .select_month_wrapper .split',
            ]
        );
        $this->add_responsive_control(
            'bra',
            [
                'label' => __('Border Radius Sticker', 'ahope'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .packege_pricing_area_2 .select_month_wrapper .split' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'borderss_stick',
                'label' => __('Shadow', 'ahope'),
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghhsta',
                'label' => __( 'Box Background', 'ahope' ),
                'types' => [  'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .select_month_wrapper .split',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghhst',
                'label' => __( 'Box Background', 'ahope' ),
                'types' => [  'gradient' ],
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2 .sticker',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghh',
                'label' => __( 'Box Background', 'ahope' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2',
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

}

Plugin::instance()->widgets_manager->register_widget_type(new pricing_table());
?>