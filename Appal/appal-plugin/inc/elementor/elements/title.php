<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalTitleWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-title';
    }

    public function get_icon()
    {

        return 'eicon-site-title';
    }

    public function get_title()
    {
        return esc_html__('Title', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_title_style',
            [
                'label' => esc_html__('Title Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Sub Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'any queistions ?',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Working Does Appal Work',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'We would like to take the opportunity to introduce to you our company and services.
				Our Company has an experience of almost 10 years',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'Title',
            [
                'label' => esc_html__('Title', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->add_control(
            'titlee_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titleee_fonts',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_title_style = $this->get_settings_for_display('sec_title_style');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        ?>

        <?php if ($sec_title_style == '2') { ?>

        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="450" data-aos-delay="100">
            <span class="sub-title mb-15"><?php echo appal_wp_kses($sec_subtitle); ?></span>
            <h2 class="title-text mb-30"><?php echo appal_wp_kses($sec_title); ?></h2>
            <p class="paragraph-text mb-0">
                <?php echo appal_wp_kses($sec_content); ?>
            </p>
        </div>

    <?php } else { ?>
        <div class="section-title text-center">
            <h2 class="title-text mb-30"><?php echo appal_wp_kses($sec_title); ?></h2>
            <p class="paragraph-text mb-0">
                <?php echo appal_wp_kses($sec_content); ?>
            </p>
        </div>
        <?php
    }
    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalTitleWidget);
