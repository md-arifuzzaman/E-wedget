<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalFAQTWOWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-faq-two';
    }

    public function get_icon()
    {

        return 'eicon-help';
    }

    public function get_title()
    {
        return esc_html__('FAQ Two', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_faq_two',
            [
                'label' => esc_html__('FAQ Two Content ', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'any queistions ?',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Freequently Asked Questions',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound. ',
            ]
        );

        $this->add_control(
            'sec_faq_two_contact_info',
            [
                'label' => esc_html__('Contact Info', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<p>Can’t find answer? <br> Mail us at <a href="#!">xyz@gmail.com</a> <br>call <a href="#!">+880 924 920 940</a></p> ',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_faq_two_active',
            [
                'label' => esc_html__('Active', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Yes', 'appal'),
                    '2' => esc_html__('No', 'appal'),
                ]
            ]
        );

        $repeater->add_control(
            'sec_faq_two_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_faq_two_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'faq_two_item_list',
            [
                'label' => esc_html__
                ('FAQ Two Item List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_faq_two_title' => esc_html__('General', 'appal'),
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'faq',
            [
                'label' => esc_html__('FAQ Header Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .sub-title',
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
                'name' => 'title_typographyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->add_control(
            'con_color',
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
                'name' => 'title_typographyyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'faqq',
            [
                'label' => esc_html__('FAQ Tab Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Tab_menu_color',
            [
                'label' => __('Tab Menu Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .faq-tabs-nav > .nav > .nav-item > .nav-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_menu_colorr',
            [
                'label' => __('Tab Active', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .faq-tabs-nav > .nav > .nav-item > .nav-link.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_menu_colorrr',
            [
                'label' => __('Tab Active Border', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-section .faq-tabs-nav > .nav > .nav-item > .nav-link:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_element',
            [
                'label' => __('Tab Element', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'titlee_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .queistions-item .item-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titlee_typographyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .queistions-item .item-title',
            ]
        );
        $this->add_control(
            'conn_colorrrr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .queistions-item p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'conn_typographyyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .queistions-item p',
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_faq_two_active = $this->get_settings_for_display('sec_faq_two_active');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_faq_two_contact_info = $this->get_settings_for_display('sec_faq_two_contact_info');
        $sec_content = $this->get_settings_for_display('sec_content');
        $faq_two_item_list = $this->get_settings_for_display('faq_two_item_list');
        ?>

        <!-- faq-section - start
        ================================================== -->
        <section id="faq-section" class="faq-section clearfix">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8 col-sm-12">
                        <div class="section-title mb-100 text-center" data-aos="fade-up" data-aos-duration="450"
                             data-aos-delay="100">
                            <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                            <h2 class="title-text mb-30"><?php echo esc_html($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo esc_html($sec_content); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-lg-start justify-content-md-center">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="faq-tabs-nav ul-li-block clearfix" data-aos="fade-right" data-aos-duration="450"
                             data-aos-delay="300">
                            <ul class="nav" role="tablist">

                                <?php
                                $number = 1;
                                foreach ($faq_two_item_list as $item) {

                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if ($item['sec_faq_two_active'] == '1') {
                                            echo esc_attr('active');
                                        } ?>" data-toggle="tab"
                                           href="#faq_two-<?php echo esc_attr($number); ?>"><?php echo appal_wp_kses($item['sec_faq_two_title']); ?></a>
                                    </li>

                                    <?php
                                    $number++;
                                } ?>

                            </ul>

                            <div class="contact-info clearfix">
                                <?php echo appal_wp_kses($sec_faq_two_contact_info); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="tab-content">
                            <?php
                            $number = 1;
                            foreach ($faq_two_item_list as $item) {

                                ?>

                                <div id="faq_two-<?php echo esc_attr($number); ?>"
                                     class="tab-pane <?php if ($item['sec_faq_two_active'] == '1') {
                                         echo esc_attr('active');
                                     } else {
                                         echo esc_attr('fade');
                                     } ?>">
                                    <div class="queistions-container">
                                        <?php echo $item['sec_faq_two_content']; ?>
                                    </div>
                                </div>
                                <?php
                                $number++;
                            } ?>


                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- faq-section - end
        ================================================== -->


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalFAQTWOWidget);
