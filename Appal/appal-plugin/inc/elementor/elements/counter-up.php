<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class appalCounterupWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-counter-up';
    }

    public function get_icon()
    {

        return 'eicon-counter-circle';
    }

    public function get_title()
    {
        return esc_html__('Counter Up', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_counter_up',
            [
                'label' => esc_html__('Counter Up', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'fun facts',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Over 1,30,00,000+ Happy User being with us Still thay Love our App',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'counter_icon', [
                'label' => esc_html__('Icon', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'counter_number', [
                'label' => esc_html__('Number', 'appal'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'counter_text', [
                'label' => esc_html__('Counter Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counter_up_list',
            [
                'label' => esc_html__
                ('Counter Up List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'counter_number' => appal_wp_kses('13'),
                        'counter_number_text' => appal_wp_kses('M+'),
                        'counter_text' => appal_wp_kses('total download'),
                    ],

                ],
            ]
        );

        $this->add_control(
            'sec_button_text',
            [
                'label' => esc_html__('Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'see all review',
            ]
        );

        $this->add_control(
            'sec_button_link',
            [
                'label' => esc_html__('Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Counter_Up',
            [
                'label' => esc_html__('Counter Up Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-section .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Sub Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .funfact-section .section-title .sub-title',
            ]
        );
        $this->add_control(
            'Heading',
            [
                'label' => __('Title color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-section .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .funfact-section .section-title .title-text',
            ]
        );
        $this->add_control(
            'Counter',
            [
                'label' => __('Counter color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-section .counter-items-list > ul > li > h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_Style',
            [
                'label' => __('Button Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Button_text_colorr',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_hoverr',
            [
                'label' => __('Button hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $counter_up_list = $this->get_settings_for_display('counter_up_list');
        $sec_button_text = $this->get_settings_for_display('sec_button_text');
        $sec_button_link = $this->get_settings_for_display('sec_button_link');

        ?>

        <!-- funfact-section - start
        ================================================== -->
        <section id="funfact-section" class="funfact-section clearfix">
            <div class="container">
                <div class="bg-image">

                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 col-sm-12">
                            <div class="section-title mb-100 text-center">
                                <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                                <h2 class="title-text mb-0"><?php echo appal_wp_kses($sec_title); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="counter-items-list ul-li-center clearfix">
                        <ul class="clearfix">
                            <?php
                            foreach ($counter_up_list as $item) { ?>

                                <li>
                                    <div class="counter_icon"><img
                                                src="<?php echo esc_url($item['counter_icon']['url']); ?>"
                                                alt="<?php echo esc_attr($item['counter_text']); ?>"></div>
                                    <h4><span class="count-text"
                                              data-to="<?php echo esc_html($item['counter_number']); ?>"
                                              data-speed="3000"><?php echo esc_html($item['counter_number']); ?></span+
                                    </h4>
                                    <small class="counter-title"><?php echo esc_html($item['counter_text']); ?></small>
                                </li>

                            <?php } ?>

                        </ul>
                    </div>

                    <?php if ($sec_button_link) { ?>
                        <div class="review-btn text-center">
                            <a href="<?php echo esc_url($sec_button_link); ?>"
                               class="custom-btn-underline"><?php echo esc_html($sec_button_text); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- funfact-section - end
        ================================================== -->

    <?php }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalCounterupWidget);
