<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class landzai_banner4 extends Widget_Base
{

    public function get_name()
    {
        return 'landzai-banner4';
    }

    public function get_title()
    {
        return __('Banner4', 'landzai');
    }

    public function get_categories()
    {
        return ['landzaielement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-person';
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
                'default' => __('We Will Help You For <span class="color-one">Growing</span> <span class="color-two">Your</span>  Business Well', 'landzai'),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, dui, lacus non massa id tellus amet tincidunt. Lacus ut integer blandit diam nibh pulvinar.', 'landzai'),
            ]
        );
        $this->add_control(
            'button',
            [
                'label' => __('Button', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('More About Us', 'landzai'),
            ]
        );
        $this->add_control(
            'link', [
                'label' => __('Link', 'landzai'),
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
            'button1',
            [
                'label' => __('Button1', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Learn More', 'landzai'),
            ]
        );
        $this->add_control(
            'link1', [
                'label' => __('Link1', 'landzai'),
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
            'image1',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'brand_list',
            [
                'label' => __( 'Brand List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
                'name' => 'team_socials_bg',
                'label' => __('Team Social BG', 'landzai'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .accordion .acc-btn.collapsed .toggle-icon',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
    
        echo'<!-- hero banner area start here  -->
        <section class="banner-area-v4">';
        if ($settings['brand_list']){
            $loop = 0;
            foreach ($settings['brand_list'] as $shape){
                $loop++;
            echo'<img class="ellipse'.$loop.'" src="'.$shape['image1']['url'].'" alt="ellipse'.$loop.'" />';
            }
        }
           
            echo'<div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-info">
                            <h2>'.$settings['title'].'</h2>
                            <p>'.$settings['info'].'</p>
                            <ul class="banner-btn-list">
                                <li><a class="primary-btn-four" '.get_that_link($settings['link']).'>'.$settings['button'].'</a></li>
                                <li><a '.get_that_link($settings['link1']).' class="primary-btn-four video-btn popup-video" data-autoplay="true" data-vbtype="video"><i class="icon fas fa-play"></i>'.$settings['button1'].'</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-image">
                        '.get_that_image($settings['image']).'
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero banner area end here  -->';
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new landzai_banner4());
?>