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
    echo '<!-- built app area start here  -->
        <section class="built-app-area section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="bulit-app-content">
                            <h2>'.$settings['title'].'</h2>
                            <p>'.$settings['info'].'</p>
                            <a '.get_that_link($settings['link']).' class="primary-btn">'.$settings['button'].' <i class="icon fas fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bulit-app-img">
                              '.get_that_image($settings['image']).'
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- built app area end here  -->';
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