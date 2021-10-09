<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class appal_nav_builder extends Widget_Base
{

    public function get_name()
    {
        return 'nav-builder';
    }

    public function get_title()
    {
        return __('Nav Menu Builder', 'appal');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return array('appal-category');
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Main Nav', 'appal'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'appal'),
                'type' => Controls_Manager::SELECT2,
                'options' => appal_menu_query(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
            [
                'label' => __('Menu Alignment', 'appal'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'appal'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'appal'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'appal'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .appal-nav-builder .main-menubar' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'menu_style',
            [
                'label' => __('Main Menu', 'appal'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __('Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > li > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fonts',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .header-section .main-menubar > ul > li > a',
            ]
        );
        $this->add_responsive_control(
            'sdpda',
            [
                'label' => esc_html__('Item Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'sdpd',
            [
                'label' => esc_html__('Item Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sub_menu_style',
            [
                'label' => __('Sub Menu', 'appal'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_color',
            [
                'label' => __('Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li > a' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'hsub_color',
            [
                'label' => __('Hover Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li > a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_fonts',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li > a',
            ]
        );
        $this->add_control(
            'droph',
            [
                'label' => __('DropDown Hover BG', 'appal'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgh',
                'label' => __('Main BG', 'appal'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li:hover > a:hover',
            ]
        );
        $this->add_responsive_control(
            'dropwi',
            [
                'label' => __('DropDown Width', 'appal'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-section .main-menubar > ul > li.menu-item-has-children > ul.sub-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'drop',
            [
                'label' => __('DropDown BG', 'appal'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbg',
                'label' => __('Main BG', 'appal'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .header-section .main-menubar > ul > li.menu-item-has-children > ul.sub-menu',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'droborder',
                'label' => __('Main Border', 'appal'),
                'selector' => '{{WRAPPER}} .header-section .main-menubar > ul > li.menu-item-has-children > ul.sub-menu',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_style',
            [
                'label' => __('Mobile Menu', 'appal'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'm_color',
            [
                'label' => __('Main Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile-menu-wrap .menu-wrapper > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'm_fonts',
                'label' => __('Main Typography', 'appal'),
                'selector' => '{{WRAPPER}} .mobile-menu-wrap .menu-wrapper > li a',
            ]
        );
        $this->add_control(
            's_color',
            [
                'label' => __('Sub Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile-menu-wrap .menu-wrapper > li > ul > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 's_fonts',
                'label' => __('Sub Typography', 'appal'),
                'selector' => '{{WRAPPER}} .mobile-menu-wrap .menu-wrapper > li > ul > li a',
            ]
        );
        $this->add_control(
            'tgcolor',
            [
                'label' => __('Toggle Color', 'appal'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .appal-nav-builder .slicknav_btn .slicknav_nav_icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tgbg',
            [
                'label' => __('Mobile Menu BG', 'appal'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tbg',
                'label' => __('Main BG', 'appal'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .slicknav_menu',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings();

        $main_menu = $settings['main_nav'];
        ?>

        <!-- Start of header section
            ============================================= -->
        <header id="<?php the_ID();?>" class="appal-nav-builder header-section">
            <div id="navigation" class="main-menubar">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => $main_menu,
                        'depth' => 5,
                        'container' => false,
                        'menu_class' => 'clearfix menu-wrapper',
                        'fallback_cb' => 'appal_navwalker::fallback',
                    )
                );
                ?>
            </div>
            <div id="mobile_menu" class="mobile-menu-wrap"></div>
        </header>
        <!-- End of header section
            ============================================= -->

    <?php }

}

Plugin::instance()->widgets_manager->register_widget_type(new appal_nav_builder());