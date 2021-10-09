<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalBannerWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-banner';
    }

    public function get_icon()
    {

        return 'eicon-slider-full-screen';
    }

    public function get_title()
    {
        return esc_html__('Banner', 'appal');
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
                'default' => '2',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                    '3' => esc_html__('3', 'appal'),
                    '4' => esc_html__('4', 'appal'),
                    '5' => esc_html__('5', 'appal'),
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
            'sec_responsive_img',
            [
                'label' => esc_html__('Responsive Section Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_phone_img',
            [
                'label' => esc_html__('Phone Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_commentbar_1',
            [
                'label' => esc_html__('Comment Bar 1 / SMS Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_commentbar_2',
            [
                'label' => esc_html__('Comment Bar 2 / SMS Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->add_control(
            'sec_man_img1',
            [
                'label' => esc_html__('Man Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man_img2',
            [
                'label' => esc_html__('Man Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_man_img3',
            [
                'label' => esc_html__('Man Image 3 - Banner 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_gear_img',
            [
                'label' => esc_html__('Gear Image - Banner 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_message_img',
            [
                'label' => esc_html__('Message Image - Banner 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_leaf_img1',
            [
                'label' => esc_html__('Leaf Image 1 / Tree Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_leaf_img2',
            [
                'label' => esc_html__('Leaf Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We are better then others Turn your business to next level ',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor anagi icdunt ut labore et dolore magna aliqua. ',
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
            'sec_first_btn_icon',
            [
                'label' => esc_html__('First Button Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'flaticon-apple',
            ]
        );

        $this->add_control(
            'sec_first_btn_text',
            [
                'label' => esc_html__('First Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<small>available on</small> apple store',
            ]
        );

        $this->add_control(
            'sec_first_btn_link',
            [
                'label' => esc_html__('First Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'sec_second_btn_icon',
            [
                'label' => esc_html__('Second Button Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'flaticon-google-play',
            ]
        );

        $this->add_control(
            'sec_second_btn_text',
            [
                'label' => esc_html__('Second Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<small>available on</small> google play',
            ]
        );

        $this->add_control(
            'sec_second_btn_link',
            [
                'label' => esc_html__('Second Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
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
            'Banner_Style',
            [
                'label' => esc_html__('Banner Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $sec_banner_style = $this->get_settings_for_display('sec_banner_style');
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_responsive_img = $this->get_settings_for_display('sec_responsive_img');
        $sec_phone_img = $this->get_settings_for_display('sec_phone_img');
        $sec_commentbar_1 = $this->get_settings_for_display('sec_commentbar_1');
        $sec_commentbar_2 = $this->get_settings_for_display('sec_commentbar_2');
        $sec_man_img1 = $this->get_settings_for_display('sec_man_img1');
        $sec_man_img2 = $this->get_settings_for_display('sec_man_img2');
        $sec_man_img3 = $this->get_settings_for_display('sec_man_img3');
        $sec_gear_img = $this->get_settings_for_display('sec_gear_img');
        $sec_message_img = $this->get_settings_for_display('sec_message_img');
        $sec_leaf_img1 = $this->get_settings_for_display('sec_leaf_img1');
        $sec_leaf_img2 = $this->get_settings_for_display('sec_leaf_img2');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_first_btn_icon = $this->get_settings_for_display('sec_first_btn_icon');
        $sec_first_btn_text = $this->get_settings_for_display('sec_first_btn_text');
        $sec_first_btn_link = $this->get_settings_for_display('sec_first_btn_link');
        $sec_second_btn_icon = $this->get_settings_for_display('sec_second_btn_icon');
        $sec_second_btn_text = $this->get_settings_for_display('sec_second_btn_text');
        $sec_second_btn_link = $this->get_settings_for_display('sec_second_btn_link');
        $bg_icon_list = $this->get_settings_for_display('bg_icon_list');
        $sec_newsletter_shortcode = $this->get_settings_for_display('sec_newsletter_shortcode');
        $sec_newsletter_notice = $this->get_settings_for_display('sec_newsletter_notice');

        ?>

        <?php if ($sec_banner_style == '2') { ?>

        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section clearfix">
            <div class="mobile-app-banner-2" style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">

                <?php
                foreach ($bg_icon_list as $item) {
                    if ($item['bg_icon']['url']) {
                        ?>

                        <span class="shape-image-<?php echo esc_attr($item['bg_image_id']); ?>">
			<small data-aos="zoom-in" data-aos-duration="1000" data-delay="800">
				<img src="<?php echo esc_url($item['bg_icon']['url']); ?>" alt="image_not_found"/>
			</small>
		</span>

                        <?php
                    }
                } ?>


                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_responsive_img['url']); ?>"
                                     alt="<?php echo esc_attr($sec_title); ?>">
                            </div>
                            <!-- show on mobile device - end -->

                            <div class="banner-content">
                                <h2>
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>

                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php if ($sec_first_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_first_btn_link); ?>"
                                                   class="store-btn bg-default-black">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_first_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_first_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($sec_second_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_second_btn_link); ?>"
                                                   class="store-btn bg-default-blue">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_second_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_second_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="banner-image scene">
						<span class="phone-image text-center" data-aos="zoom-out" data-aos-duration="1000"
                              data-aos-delay="200">
							<img src="<?php echo esc_url($sec_phone_img['url']); ?>" alt="image_not_found">
						</span>
                                <span class="man-image-1" data-depth="0.1">
							<small data-aos="fade-right" data-aos-duration="500" data-aos-delay="500">
								<img src="<?php echo esc_url($sec_man_img1['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="man-image-2" data-depth="0.1">
							<small data-aos="fade-left" data-aos-duration="500" data-aos-delay="600">
								<img src="<?php echo esc_url($sec_man_img2['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="message-image" data-depth="0.2">
							<small data-aos="fade-down" data-aos-duration="1200" data-aos-delay="900">
								<img src="<?php echo esc_url($sec_message_img['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="leaf-image-1" data-depth="0.2">
							<small data-aos="fade-right" data-aos-duration="1000" data-aos-delay="1200">
								<img src="<?php echo esc_url($sec_leaf_img1['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="leaf-image-2" data-depth="0.2">
							<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1300">
								<img src="<?php echo esc_url($sec_leaf_img2['url']); ?>" alt="image_not_found">
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

    <?php } elseif ($sec_banner_style == '3') { ?>

        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section mb-100 clearfix">
            <div class="mobile-app-banner-4">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_responsive_img['url']); ?>" alt="image_not_found">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2>
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>


                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php if ($sec_first_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_first_btn_link); ?>"
                                                   class="store-btn bg-default-black">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_first_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_first_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($sec_second_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_second_btn_link); ?>"
                                                   class="store-btn bg-default-pink">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_second_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_second_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="banner-image scene">
								<span class="phone-image" data-depth="0.2">
									<small data-aos="fade-down" data-aos-duration="500" data-aos-delay="100">
										<img src="<?php echo esc_url($sec_phone_img['url']); ?>" alt="Phone Image">
									</small>
								</span>
                                <span class="man-image-1" data-depth="0.4">
									<small data-aos="fade-right" data-aos-duration="800" data-aos-delay="500">
										<img src="<?php echo esc_url($sec_man_img1['url']); ?>" alt="Man Image">
									</small>
								</span>
                                <span class="sms-image-1" data-depth="0.3">
									<small data-aos="fade-down" data-aos-duration="600" data-aos-delay="1000">
										<img src="<?php echo esc_url($sec_commentbar_1['url']); ?>" alt="SMS Image">
									</small>
								</span>
                                <span class="man-image-2" data-depth="0.4">
									<small data-aos="fade-left" data-aos-duration="800" data-aos-delay="700">
										<img src="<?php echo esc_url($sec_man_img2['url']); ?>" alt="Man Image">
									</small>
								</span>
                                <span class="sms-image-2" data-depth="0.3">
									<small data-aos="fade-down" data-aos-duration="600" data-aos-delay="1200">
										<img src="<?php echo esc_url($sec_commentbar_2['url']); ?>" alt="SMS Image">
									</small>
								</span>
                                <span class="tree-image" data-depth="0.2">
									<small data-aos="fade-up" data-aos-duration="800" data-aos-delay="1600">
										<img src="<?php echo esc_url($sec_leaf_img1['url']); ?>" alt="Tree Image">
									</small>
								</span>
                            </div>
                        </div>

                    </div>
                </div>
                <span class="bg-shape-image">
					<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
				</span>
            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->


    <?php } elseif ($sec_banner_style == '4') { ?>

        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section clearfix">
            <div class="mobile-app-banner-5" style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_responsive_img['url']); ?>"
                                     alt="Mobile Responsive Image">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2 class="title-text mb-30">
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p class="paragraph-text mb-60">
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>
                                <div class="newsletter-form">
                                    <?php echo do_shortcode($sec_newsletter_shortcode); ?>
                                    <p class="paragraph-text mb-0"><?php echo esc_html($sec_newsletter_notice); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="banner-image scene clearfix">
								<span class="phone-image float-right" data-depth="0.2">
									<small data-aos="zoom-out" data-aos-duration="500" data-aos-delay="200">
										<img src="<?php echo esc_url($sec_phone_img['url']); ?>" alt="phone image">
									</small>
								</span>
                                <span class="commentbar-image-1" data-depth="0.5">
									<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="700">
										<img src="<?php echo esc_url($sec_commentbar_1['url']); ?>" alt="comment bar">
									</small>
								</span>
                                <span class="commentbar-image-2" data-depth="0.5">
									<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">
										<img src="<?php echo esc_url($sec_commentbar_2['url']); ?>" alt="comment bar">
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

    <?php } elseif ($sec_banner_style == '5') { ?>

        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section mb-60 clearfix">
            <div class="mobile-app-banner-6">
                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-7 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_responsive_img['url']); ?>"
                                     alt="Mobile Responsive Image">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2>
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>

                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php if ($sec_first_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_first_btn_link); ?>"
                                                   class="store-btn bg-default-black">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_first_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_first_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($sec_second_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_second_btn_link); ?>"
                                                   class="store-btn bg-default-pink">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_second_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_second_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="banner-image scene clearfix">

								<span class="phone-image float-right" data-depth="0.2">
									<small data-aos="zoom-out" data-aos-duration="500" data-aos-delay="200">
										<img src="<?php echo esc_url($sec_phone_img['url']); ?>" alt="Mobile Image">
									</small>
								</span>
                                <span class="commentbar-image-1" data-depth="0.5">
									<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="700">
										<img src="<?php echo esc_url($sec_commentbar_1['url']); ?>" alt="comment bar">
									</small>
								</span>
                                <span class="commentbar-image-2" data-depth="0.5">
									<small data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">
										<img src="<?php echo esc_url($sec_commentbar_2['url']); ?>" alt="comment bar">
									</small>
								</span>

                            </div>
                        </div>

                    </div>
                </div>
                <span class="shape-bg-image">
					<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="Shape BG Image">
				</span>
            </div>
        </section>
        <!-- banner-section - end
        ================================================== -->

    <?php } else { ?>


        <!-- banner-section - start
        ================================================== -->
        <section id="banner-section" class="banner-section clearfix">
            <div class="mobile-app-banner-1">

                <div class="container">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <!-- show on mobile device - start -->
                            <div class="mobile-banner-image d-none">
                                <img src="<?php echo esc_url($sec_responsive_img['url']); ?>"
                                     alt="<?php echo esc_attr($sec_title); ?>">
                            </div>
                            <!-- show on mobile device - end -->
                            <div class="banner-content">
                                <h2>
                                    <?php echo appal_wp_kses($sec_title); ?>
                                </h2>
                                <p>
                                    <?php echo appal_wp_kses($sec_content); ?>
                                </p>
                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php if ($sec_first_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_first_btn_link); ?>"
                                                   class="store-btn bg-default-black">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_first_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_first_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($sec_second_btn_link) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($sec_second_btn_link); ?>"
                                                   class="store-btn bg-default-blue">
                                                    <span class="icon"><i
                                                                class="<?php echo esc_attr($sec_second_btn_icon); ?>"></i></span>
                                                    <strong class="title-text">
                                                        <?php echo appal_wp_kses($sec_second_btn_text); ?>
                                                    </strong>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Col-->


                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <div class="banner-image scene">
						<span class="bg-image" data-depth="0.2">
							<small data-aos="zoom-in" data-aos-duration="450" data-aos-delay="100">
								<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="phone-image" data-depth="0.2">
							<small data-aos="zoom-out" data-aos-duration="500" data-aos-delay="500">
								<img src="<?php echo esc_url($sec_phone_img['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="man-image-1" data-depth="0.5">
							<small data-aos="fade-right" data-aos-duration="550" data-aos-delay="800">
								<img src="<?php echo esc_url($sec_man_img1['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="man-image-2" data-depth="0.5">
							<small data-aos="fade-left" data-aos-duration="600" data-aos-delay="1000">
								<img src="<?php echo esc_url($sec_man_img2['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="man-image-3" data-depth="0.3">
							<small data-aos="fade-down" data-aos-duration="650" data-aos-delay="1200">
								<img src="<?php echo esc_url($sec_man_img3['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="cog-image" data-depth="0.4">
							<small data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="1500">
								<img src="<?php echo esc_url($sec_gear_img['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="leaf-image-1" data-depth="0.4">
							<small data-aos="fade-left" data-aos-duration="450" data-aos-delay="1500">
								<img src="<?php echo esc_url($sec_leaf_img1['url']); ?>" alt="image_not_found">
							</small>
						</span>
                                <span class="leaf-image-2" data-depth="0.4">
							<small data-aos="fade-right" data-aos-duration="450" data-aos-delay="1500">
								<img src="<?php echo esc_url($sec_leaf_img2['url']); ?>" alt="image_not_found">
							</small>
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

        <!-- banner-section - end -->

    <?php }

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalBannerWidget);
