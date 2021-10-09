<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalSliderWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-slider';
    }

    public function get_icon()
    {

        return 'eicon-slider-full-screen';
    }

    public function get_title()
    {
        return esc_html__('Slider Banner', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_banner_content',
            [
                'label' => esc_html__('Banner Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'slider_style', [
                'label' => esc_html__('Slider Style ', 'appal'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                ]
            ]
        );

        $repeater->add_control(
            'bg_image', [
                'label' => esc_html__('Background Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_phone_img', [
                'label' => esc_html__('Phone Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_comm_img1', [
                'label' => esc_html__('Comment Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_comm_img2', [
                'label' => esc_html__('Comment Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_subtitle', [
                'label' => esc_html__('Slider Subtitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'More Then an App',
            ]
        );


        $repeater->add_control(
            'slider_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Explore the next generation App for free and become a part of community of like-minded members.',
            ]
        );

        $repeater->add_control(
            'slider_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor anagi icdunt ut labore et dolore magna aliqua. ',
            ]
        );

        $repeater->add_control(
            'sec_newsletter_shortcode',
            [
                'label' => esc_html__('Newsletter Shortcode ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_new_notice',
            [
                'label' => esc_html__('Newsletter Notice', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'We won’t spam you, Pinky Promise !',
            ]
        );

        $this->add_control(
            'slider_list',
            [
                'label' => esc_html__
                ('Slider List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_subtitle' => appal_wp_kses('More Then an App'),
                        'slider_title' => appal_wp_kses('Explore the next generation App for free and become a part of community of like-minded members.'),
                        'slider_content' => appal_wp_kses('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor anagi icdunt ut labore et dolore magna aliqua.'),
                        'sec_new_notice' => appal_wp_kses('We won’t spam you, Pinky Promise !'),
                    ],

                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Slider_Style',
            [
                'label' => esc_html__('Slider Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.first-item h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => __('Border Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.first-item h3' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.first-item h3' => 'backg round-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_colorr',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.first-item h2,
                    {{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tittle_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.first-item h2,
                {{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .title-text',
            ]
        );
        $this->add_control(
            'con_colorr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tittle_fontss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .paragraph-text',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Newsletter_Style',
            [
                'label' => esc_html__('Newsletter Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_colorr',
            [
                'label' => __('Button Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bg-default-blue' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'newsletter_colorr',
            [
                'label' => __('Newsletter Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-item input,
                    {{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .newsletter-form .form-item .email-input' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_colorr',
            [
                'label' => __('Border Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-item input,
                    {{WRAPPER}} .slider-section .mobileapp-main-carousel .item.second-item .slider-content .newsletter-form .form-item .email-input' => 'border-color: {{VALUE}}',
                ],
            ]
        );
         
        $this->end_controls_section();
    }

    protected function render()
    {
        $slider_list = $this->get_settings_for_display('slider_list');

        ?>

        <!-- slider-section - start
        ================================================== -->
        <section id="slider-section" class="slider-section mb-100 clearfix">
            <div id="mobileapp-main-carousel" class="mobileapp-main-carousel owl-carousel owl-theme">

                <?php
                foreach ($slider_list as $item) {

                    if ($item['slider_style'] == '2') { ?>

                        <div class="item second-item"
                             style="background-image: url(<?php echo esc_url($item['bg_image']['url']); ?>);">
                            <div class="container">
                                <div class="row justify-content-lg-between justify-content-md-center">

                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <div class="slider-content">
                                            <h1 class="title-text mb-30">
                                                <?php echo appal_wp_kses($item['slider_title']); ?>
                                            </h1>
                                            <p class="paragraph-text mb-60">
                                                <?php echo appal_wp_kses($item['slider_content']); ?>
                                            </p>
                                            <div class="newsletter-form">
                                                <?php echo do_shortcode($item['sec_newsletter_shortcode']); ?>
                                                <p class="paragraph-text mb-0"><?php echo esc_html($item['sec_new_notice']); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="slider-image scene clearfix">
									<span class="phone-image" data-depth="0.2">
										<small data-aos="zoom-out" data-aos-duration="500" data-aos-delay="200">
											<img src="<?php echo esc_url($item['slider_phone_img']['url']); ?>"
                                                 alt="Phone Image">
										</small>
									</span>
                                            <span class="commentbar-image-1" data-depth="0.5">
										<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="700">
											<img src="<?php echo esc_url($item['slider_comm_img1']['url']); ?>"
                                                 alt="Comment Bar">
										</small>
									</span>
                                            <span class="commentbar-image-2" data-depth="0.5">
										<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">
											<img src="<?php echo esc_url($item['slider_comm_img2']['url']); ?>"
                                                 alt="Comment Bar">
										</small>
									</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="item first-item"
                             style="background-image: url(<?php echo esc_url($item['bg_image']['url']); ?>);">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 col-md-10 col-sm-12">
                                        <div class="slider-content text-center">
                                            <h3><?php echo appal_wp_kses($item['slider_subtitle']); ?></h3>
                                            <h2>
                                                <?php echo appal_wp_kses($item['slider_title']); ?>
                                            </h2>
                                            <div class="subscribe-form">
                                                <?php echo do_shortcode($item['sec_newsletter_shortcode']); ?>
                                                <p><?php echo esc_html($item['sec_new_notice']); ?></p>

                                            </div>
                                            <span class="phone-image">
										<img src="<?php echo esc_url($item['slider_phone_img']['url']); ?>"
                                             alt="Phone Image">
									</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }

                } ?>


            </div>
        </section>
        <!-- slider-section - end
        ================================================== -->


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalSliderWidget);
