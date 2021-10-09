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
    echo '  <!-- banner area start here  -->
        <section class="banner-area">
            <div class="round-shape">
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
            </div>
            <div class="trangle-shape">
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="banner-text-wrap">
                            <h1 class="banner-title">'.$settings['title'].'</h1>
                            <p class="banner-content">'.$settings['info'].'</p>
                            <ul class="button-lsit">
                                <li><a '.get_that_link($settings['link1']).' class="primary-btn active">'.$settings['button1'].' <i class="icon fas fa-angle-right"></i></a></li>
                                <li><a '.get_that_link($settings['link2']).' class="primary-btn video-btn popup-video" data-autoplay="true" data-vbtype="video">'.$settings['button2'].' <i class="icon fas fa-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-img text-center">
                            '.get_that_image($settings['image'], 'phone-image').'
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end here  -->';
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