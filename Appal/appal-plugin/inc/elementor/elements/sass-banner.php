<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalSassBannerWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-sass-banner';
    }

    public function get_icon()
    {

        return 'eicon-slider-full-screen';
    }

    public function get_title()
    {
        return esc_html__('Sass Banner', 'appal');
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

        $this->add_control(
            'sec_banner_style',
            [
                'label' => esc_html__('Banner Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                    '3' => esc_html__('3', 'appal'),
                    '4' => esc_html__('4', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_bg_img',
            [
                'label' => esc_html__('Background Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_res_img',
            [
                'label' => esc_html__('Responsive Section Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_laptop_img',
            [
                'label' => esc_html__('Laptop Image / Big Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_shape_img',
            [
                'label' => esc_html__('Shape / Share Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->add_control(
            'sec_man1_img',
            [
                'label' => esc_html__('Man 1 Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man2_img', 
            [
                'label' => esc_html__('Man 2 Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man3_img',
            [
                'label' => esc_html__('Man 3 Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man4_img',
            [
                'label' => esc_html__('Man 4 Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man5_img',
            [
                'label' => esc_html__('Man 5 Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->add_control(
            'sec_sass_sm1_img',
            [
                'label' => esc_html__('Small Image 1 / Child Image / Leaf Image 1 ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_sm2_img',
            [
                'label' => esc_html__('Small Image 2 / Child Image /  Leaf Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_sm3_img',
            [
                'label' => esc_html__('Small Image 3 / Child Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_comn_img',
            [
                'label' => esc_html__('Comment Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_cloud_img1',
            [
                'label' => esc_html__('Coud Image 1 ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_cloud_img2',
            [
                'label' => esc_html__('Coud Image 2 ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_cloud_img3',
            [
                'label' => esc_html__('Coud Image 3', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_cloud_img4',
            [
                'label' => esc_html__('Coud Image 4', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_sass_cloud_img5',
            [
                'label' => esc_html__('Coud Image 5', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Any time, anywhere, make your remote team more faster',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'The most powerful software & app landing page for any kind of app marketing Business. It does’t matter how big or small your business. ',
            ]
        );

        $this->add_control(
            'sec_ytv_link',
            [
                'label' => esc_html__('Youtube vide Url', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'http://www.youtube.com/watch?v=ZHomPRxM-0k',
            ]
        );

        $this->add_control(
            'sec_newsletter_shortcode',
            [
                'label' => esc_html__('Newsletter Shortcode ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'sec_newsletter_notice',
            [
                'label' => esc_html__('Newsletter Notice', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'We won’t spam you, Pinky Promise !',
            ]
        );


        $this->add_control(
            'sass_btn_text',
            [
                'label' => esc_html__('Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'try it free',
            ]
        );

        $this->add_control(
            'sass_btn_link',
            [
                'label' => esc_html__('Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );


        $this->add_control(
            'sass_btn_subtitle',
            [
                'label' => esc_html__('Button Subtitle', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '30 Days free trial, <span>No credit card required*</span>',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'bg_image_id', [
                'label' => esc_html__('Background Image id', 'appal'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                    '3' => esc_html__('3', 'appal'),
                    '4' => esc_html__('4', 'appal'),
                    '5' => esc_html__('5', 'appal'),
                    '6' => esc_html__('6', 'appal'),
                    '7' => esc_html__('7', 'appal'),
                ]
            ]
        );

        $repeater->add_control(
            'bg_icon', [
                'label' => esc_html__('Upload Image/Icon', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'bg_icon_list',
            [
                'label' => esc_html__
                ('Background Icon List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'bg_image_id' => appal_wp_kses('1'),
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sass_banner_Style',
            [
                'label' => esc_html__('SASS Banner Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_colorrr',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.sass-banner-1 .banner-content .title-text,
                    {{WRAPPER}} .banner-section .sass-banner-2 .banner-content .title-text,
                    {{WRAPPER}} .banner-section .sass-banner-3 .banner-content .title-text,
                    {{WRAPPER}} .banner-section .sass-banner-4 .banner-content .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .banner-section.sass-banner-1 .banner-content .title-text,
                {{WRAPPER}} .banner-section .sass-banner-2 .banner-content .title-text,
                {{WRAPPER}} .banner-section .sass-banner-3 .banner-content .title-text,
                {{WRAPPER}} .banner-section .sass-banner-4 .banner-content .title-text',
            ]
        );
        $this->add_control(
            'content_colorrr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section.sass-banner-1 .banner-content p,
                    {{WRAPPER}} .banner-section .sass-banner-2 .banner-content p,
                    {{WRAPPER}} .banner-section .sass-banner-3 .banner-content p,
                    {{WRAPPER}} .banner-section .sass-banner-4 .banner-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_fontsss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .banner-section.sass-banner-1 .banner-content p,
                {{WRAPPER}} .banner-section .sass-banner-2 .banner-content p,
                {{WRAPPER}} .banner-section .sass-banner-3 .banner-content p,
                {{WRAPPER}} .banner-section .sass-banner-4 .banner-content p',
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

        $this->start_controls_section(
            'Button_Style',
            [
                'label' => esc_html__('Button Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Button_text_color',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_color',
            [
                'label' => __('Button Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn,
                    {{WRAPPER}} .banner-section .sass-banner-4 .banner-content .btns-group > ul > li .custom-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_hover',
            [
                'label' => __('Button hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn:before,
                    {{WRAPPER}} .banner-section .sass-banner-4 .banner-content .btns-group > ul > li .custom-btn:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_banner_style = $this->get_settings_for_display('sec_banner_style');
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_res_img = $this->get_settings_for_display('sec_res_img');
        $sec_laptop_img = $this->get_settings_for_display('sec_laptop_img');
        $sec_shape_img = $this->get_settings_for_display('sec_shape_img');
        $sec_man1_img = $this->get_settings_for_display('sec_man1_img');
        $sec_man2_img = $this->get_settings_for_display('sec_man2_img');
        $sec_man3_img = $this->get_settings_for_display('sec_man3_img');
        $sec_man4_img = $this->get_settings_for_display('sec_man4_img');
        $sec_man5_img = $this->get_settings_for_display('sec_man5_img');
        $sec_sass_sm1_img = $this->get_settings_for_display('sec_sass_sm1_img');
        $sec_sass_sm2_img = $this->get_settings_for_display('sec_sass_sm2_img');
        $sec_sass_sm3_img = $this->get_settings_for_display('sec_sass_sm3_img');
        $sec_sass_comn_img = $this->get_settings_for_display('sec_sass_comn_img');
        $sec_sass_cloud_img1 = $this->get_settings_for_display('sec_sass_cloud_img1');
        $sec_sass_cloud_img2 = $this->get_settings_for_display('sec_sass_cloud_img2');
        $sec_sass_cloud_img3 = $this->get_settings_for_display('sec_sass_cloud_img3');
        $sec_sass_cloud_img4 = $this->get_settings_for_display('sec_sass_cloud_img4');
        $sec_sass_cloud_img5 = $this->get_settings_for_display('sec_sass_cloud_img5');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_ytv_link = $this->get_settings_for_display('sec_ytv_link');
        $sass_btn_text = $this->get_settings_for_display('sass_btn_text');
        $sass_btn_link = $this->get_settings_for_display('sass_btn_link');
        $sass_btn_subtitle = $this->get_settings_for_display('sass_btn_subtitle');
        $bg_icon_list = $this->get_settings_for_display('bg_icon_list');
        $sec_newsletter_shortcode = $this->get_settings_for_display('sec_newsletter_shortcode');
        $sec_newsletter_notice = $this->get_settings_for_display('sec_newsletter_notice');

        ?>

        <?php if ($sec_banner_style == '2') { ?>

        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section clearfix">
            <div class="sass-banner-4 clearfix">

                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-7 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_res_img['url']); ?>" alt="Mobile banner Image"/>
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h1 class="title-text mb-30">
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h1>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>
                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php if ($sass_btn_link) { ?>
                                            <li><a href="<?php echo esc_url($sass_btn_link); ?>"
                                                   class="custom-btn"><?php echo appal_wp_kses($sass_btn_text); ?></a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <p class="info-text mb-0">
                                                <?php echo appal_wp_kses($sass_btn_subtitle); ?>
                                            </p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="banner-item-image">
								<span class="laptop-image" data-aos="fade-left" data-aos-delay="100">
									<img src="<?php echo esc_url($sec_laptop_img['url']); ?>" alt="Laptop Image">
								</span>
                                <span class="bg-image">
									<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="Background Image">
								</span>
                                <span class="shape-image" data-aos="zoom-in" data-aos-delay="300">
									<img src="<?php echo esc_url($sec_shape_img['url']); ?>" alt="Shape Image">
								</span>
                                <a class="popup-video" href="<?php echo esc_url($sec_ytv_link); ?>" data-aos="zoom-in"
                                   data-aos-delay="900">
                                    <i class='uil uil-play'></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                foreach ($bg_icon_list as $item) {
                    if ($item['bg_icon']['url']) {
                        ?>

                        <span class="shape-<?php echo esc_attr($item['bg_image_id']); ?>"><img
                                    src="<?php echo esc_url($item['bg_icon']['url']); ?>"
                                    alt="cross_shape_image"></span>

                        <?php
                    }
                } ?>

            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->

    <?php } elseif ($sec_banner_style == '3') { ?>
        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section sass-banner-1 clearfix">
            <div class="sass-banner-1 clearfix"
                 style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_res_img['url']); ?>" alt="Mobile Banner">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content text-center">
                                <h2 class="title-text mb-15">
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>

                                <div class="newsletter-form">
                                    <?php echo do_shortcode($sec_newsletter_shortcode); ?>
                                    <div class="info-list ul-li-center mb-30 clearfix">
                                        <ul class="clearfix">
                                            <?php echo appal_wp_kses($sec_newsletter_notice); ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-item-image">
                        <img src="<?php echo esc_url($sec_laptop_img['url']); ?>" alt="Laptop Image">
                        <span class="child-img-1" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
							<img src="<?php echo esc_url($sec_sass_sm1_img['url']); ?>" alt="Banner Child Image">
						</span>
                        <span class="child-img-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
							<img src="<?php echo esc_url($sec_sass_sm2_img['url']); ?>" alt="Banner Child Image">
						</span>
                        <span class="child-img-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
							<img src="<?php echo esc_url($sec_sass_sm3_img['url']); ?>" alt="Banner Child Image">
						</span>
                    </div>

                </div>
            </div>
            <div class="decoration-items">
                <span class="big-circle-shape"></span>
                <small class="cross-image"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                            alt="shape image"></small>
                <small class="flow-image-1"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-1.png"
                            alt="shape image"></small>
                <small class="flow-image-2"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                            alt="shape image"></small>
                <small class="circle-image-1"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                            alt="shape image"></small>
                <small class="flow-image-3"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                            alt="shape image"></small>
                <small class="circle-image-2"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                            alt="shape image"></small>
                <small class="circle-image-3"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle.png"
                            alt="shape image"></small>
                <small class="box-image"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                            alt="shape image"></small>

            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->

    <?php } elseif ($sec_banner_style == '4') { ?>
        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section bg-light-gray clearfix">
            <div class="sass-banner-2 clearfix">
                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_res_img['url']); ?>" alt="Responsive Image">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2 class="title-text mb-30">
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>

                                <div class="newsletter-form">
                                    <?php echo do_shortcode($sec_newsletter_shortcode); ?>
                                    <p class="mb-0"><?php echo appal_wp_kses($sec_newsletter_notice); ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="banner-item-image scene">
								<span class="bg-image" data-aos="zoom-in">
									<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="BG image">
								</span>
                                <span class="big-image" data-depth="0.2">
									<small data-aos="zoom-out" data-aos-delay="200">
										<img src="<?php echo esc_url($sec_laptop_img['url']); ?>" alt="Big Image">
									</small>
								</span>
                                <span class="man-image-1" data-depth="0.5">
									<small data-aos="fade-right" data-aos-delay="500">
										<img src="<?php echo esc_url($sec_man1_img['url']); ?>" alt="man image">
									</small>
								</span>
                                <span class="man-image-2" data-depth="0.5">
									<small data-aos="fade-left" data-aos-delay="700">
										<img src="<?php echo esc_url($sec_man2_img['url']); ?>" alt="man image">
									</small>
								</span>
                                <span class="man-image-3" data-depth="0.5">
									<small data-aos="fade-left" data-aos-delay="800">
										<img src="<?php echo esc_url($sec_man3_img['url']); ?>" alt="man image">
									</small>
								</span>
                                <span class="man-image-4" data-depth="0.5">
									<small data-aos="fade-right" data-aos-delay="900">
										<img src="<?php echo esc_url($sec_man4_img['url']); ?>" alt="man image">
									</small>
								</span>
                                <span class="man-image-5" data-depth="0.5">
									<small data-aos="fade-up" data-aos-delay="1000">
										<img src="<?php echo esc_url($sec_man5_img['url']); ?>" alt="man image">
									</small>
								</span>
                                <span class="leaf-image-1" data-depth="0.3">
									<small data-aos="flip-right" data-aos-delay="800">
										<img src="<?php echo esc_url($sec_sass_sm1_img['url']); ?>" alt="Leaf Image">
									</small>
								</span>
                                <span class="leaf-image-2" data-depth="0.3">
									<small data-aos="zoom-in" data-aos-delay="1150">
										<img src="<?php echo esc_url($sec_sass_sm2_img['url']); ?>" alt="Leaf Image">
									</small>
								</span>
                                <span class="comment-image" data-depth="0.6">
									<small data-aos="fade-down" data-aos-delay="1050">
										<img src="<?php echo esc_url($sec_sass_comn_img['url']); ?>"
                                             alt="Comment Image">
									</small>
								</span>
                                <span class="share-image" data-depth="0.6">
									<small data-aos="fade-down" data-aos-delay="1100">
										<img src="<?php echo esc_url($sec_shape_img['url']); ?>" alt="Share Image">
									</small>
								</span>
                                <span class="cloud-image-1" data-depth="0.2">
									<small data-aos="fade-down" data-aos-delay="1200">
										<img src="<?php echo esc_url($sec_sass_cloud_img1['url']); ?>"
                                             alt="Cloud Image">
									</small>
								</span>
                                <span class="cloud-image-2" data-depth="0.3">
									<small data-aos="fade-up" data-aos-delay="1300">
										<img src="<?php echo esc_url($sec_sass_cloud_img2['url']); ?>"
                                             alt="Cloud Image">
									</small>
								</span>
                                <span class="cloud-image-3" data-depth="0.3">
									<small data-aos="fade-up" data-aos-delay="1350">
										<img src="<?php echo esc_url($sec_sass_cloud_img3['url']); ?>"
                                             alt="Cloud Image">
									</small>
								</span>
                                <span class="cloud-image-4" data-depth="0.3">
									<small data-aos="fade-up" data-aos-delay="1400">
										<img src="<?php echo esc_url($sec_sass_cloud_img4['url']); ?>"
                                             alt="Cloud Image">
									</small>
								</span>
                                <span class="cloud-image-5" data-depth="0.3">
									<small data-aos="fade-up" data-aos-delay="1450">
										<img src="<?php echo esc_url($sec_sass_cloud_img5['url']); ?>"
                                             alt="Cloud Image">
									</small>
								</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->
    <?php } else { ?>

        <!-- banner-section - start
            ================================================== -->
        <section id="banner-section" class="banner-section clearfix">
            <div class="sass-banner-3 clearfix"
                 style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">

                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-7 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_res_img['url']); ?>" alt="Mobile banner Image"/>
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2 class="title-text mb-30">
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>
                                <div class="btns-group ul-li clearfix">

                                    <ul class="clearfix">
                                        <?php if ($sass_btn_link) { ?>
                                            <li><a href="<?php echo esc_url($sass_btn_link); ?>"
                                                   class="custom-btn"><?php echo appal_wp_kses($sass_btn_text); ?></a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <p class="info-text mb-0">
                                                <?php echo appal_wp_kses($sass_btn_subtitle); ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <div class="banner-item-image">
								<span class="laptop-image" data-aos="zoom-out" data-aos-delay="100">
									<img src="<?php echo esc_url($sec_laptop_img['url']); ?>" alt="image_not_found">
								</span>

                                <span class="child-image-1" data-aos="fade-up" data-aos-delay="500">
									<img src="<?php echo esc_url($sec_sass_sm1_img['url']); ?>" alt="image_not_found">
								</span>

                                <span class="child-image-2" data-aos="fade-up" data-aos-delay="500">
									<img src="<?php echo esc_url($sec_sass_sm2_img['url']); ?>" alt="image_not_found">
								</span>


                            </div>
                        </div>

                    </div>
                </div>

                <?php
                foreach ($bg_icon_list as $item) {
                    if ($item['bg_icon']['url']) {
                        ?>

                        <small class="shape-<?php echo esc_attr($item['bg_image_id']); ?>"><img
                                    src="<?php echo esc_url($item['bg_icon']['url']); ?>"
                                    alt="cross_shape_image"></small>

                        <?php
                    }
                } ?>

            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->

    <?php } ?>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalSassBannerWidget);
