<?php 
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class landzai_nav_builder extends Widget_Base {

    public function get_name() {
        return 'nav-builder';
    }

    public function get_title() {
        return __('Nav Menu Builder', 'landzai');
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return array('landzai-builder');
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Main Nav', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'landzai'),
                'type' => Controls_Manager::SELECT2,
                'options' =>  king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'main_m_nav',
            [
                'label' => __('Mobile Menu', 'landzai'),
                'type' => Controls_Manager::SELECT2,
                'options' =>  king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'menu_align',
            [
                'label' => __( 'Menu Alignment', 'landzai' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Left', 'landzai' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'landzai' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Right', 'landzai' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #medi-main-builder-header' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'menu_style',
            [
                'label' => __( 'Main Menu', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __( 'Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navigation-main-area ul > li a, 
                    {{WRAPPER}} .navigation-main-area ul > .dropdown:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fonts',
                'label' => __( 'Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li a',
            ]
        );
        $this->add_responsive_control(
            'sdpda',
            [
                'label' =>   esc_html__('Item Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navigation-main-area ul > li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'sdpd',
            [
                'label' =>   esc_html__('Item Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navigation-main-area ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sub_menu_style',
            [
                'label' => __( 'Sub Menu', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_color',
            [
                'label' => __( 'Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu > li > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hsub_color',
            [
                'label' => __( 'Hover Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu > li > a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_fonts',
                'label' => __( 'Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu > li > a',
            ]
        );
        $this->add_control(
            'droph',
            [
                'label' => __( 'DropDown Hover BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgh',
                'label' => __( 'Main BG', 'landzai' ),
                'types' => [ 'classic', 'gradient' ],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Menu Border', 'landzai' ),
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu li',
            ]
        );
        $this->add_responsive_control(
            'dropwi',
            [
                'label' => __( 'DropDown Width', 'landzai' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'drop',
            [
                'label' => __( 'DropDown BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbg',
                'label' => __( 'Main BG', 'landzai' ),
                'types' => [ 'classic', 'gradient' ],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'droborder',
                'label' => __( 'Main Border', 'landzai' ),
                'selector' => '{{WRAPPER}} .navigation-main-area ul > li .dropdown-menu',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_style',
            [
                'label' => __( 'Mobile Menu', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'm_color',
            [
                'label' => __( 'Main Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile_menu_content .mobile-main-navigation .navbar-nav > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'm_fonts',
                'label' => __( 'Main Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .mobile_menu_content .mobile-main-navigation .navbar-nav > li a',
            ]
        );
        $this->add_control(
            's_color',
            [
                'label' => __( 'Sub Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile_menu .mobile_menu_content .mobile-main-navigation .navbar-nav .dropdown-menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 's_fonts',
                'label' => __( 'Sub Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .mobile_menu .mobile_menu_content .mobile-main-navigation .navbar-nav .dropdown-menu li a',
            ]
        );
        $this->add_control(
            'tgcolor',
            [
                'label' => __( 'Toggle Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile_menu_button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tgbg',
            [
                'label' => __( 'Mobile Menu BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tbg',
                'label' => __( 'Main BG', 'landzai' ),
                'types' => [ 'classic', 'gradient' ],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .mobile_menu_content',
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render() {

        $settings = $this->get_settings();

        $main_menu = $settings['main_nav'];
        $mobile_menu = $settings['main_m_nav'];

        ?>

<!-- Start of header section
	============================================= -->

        <header id="medi-main-builder-header" class="medi-main-header">
                        <!--Main Menu-->
                        <div class="navigation-main-area">
                            <nav class="ul-li">
                                <?php
                                echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'],
                                    wp_nav_menu( array(
                                            'echo' => false,
                                            'menu' => $main_menu,
                                            'items_wrap' => '<ul>%3$s</ul>',
                                        )
                                    ));
                                ?>
                            </nav>
                        </div>
                        <!--Mobile Menu-->
                        <div class="mobile_menu position-relative">
                            <div class="mobile_menu_button open_mobile_menu">
                                <i class="fas fa-bars"></i>
                            </div>
                            <div class="mobile_menu_wrap">
                                <div class="mobile_menu_overlay open_mobile_menu"></div>
                                <div class="mobile_menu_content">
                                    <div class="mobile_menu_close open_mobile_menu">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="m-brand-logo">
                                        <?php landzai_logo();?>
                                    </div>
                                    <nav class="mobile-main-navigation  clearfix ul-li">
                                        <?php
                                        echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'],
                                            wp_nav_menu( array(
                                                    'echo' => false,
                                                    'menu' => $mobile_menu,
                                                    'items_wrap' => '<ul class="navbar-nav text-capitalize clearfix">%3$s</ul>',
                                                )
                                            ));
                                        ?>
                                    </nav>

                                </div>
                            </div>
                        </div>
                        <!--Mobile Menu-->
        </header>
<!-- End of header section
	============================================= -->

  <?php  }

}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_nav_builder() );