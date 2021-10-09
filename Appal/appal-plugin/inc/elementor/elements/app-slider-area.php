<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalAppSliderArea extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-app-slider-area';
    }

    public function get_icon() 
    {

        return 'eicon-slides';
    }

    public function get_title()
    {
        return esc_html__('App Slider', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_app_slider',
            [
                'label' => esc_html__('Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_apple_btn_icon',
            [
                'label' => esc_html__('Apple Button Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'flaticon-apple',
            ]
        );

        $this->add_control(
            'sec_apple_btn_text',
            [
                'label' => esc_html__('Apple Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<small>available on</small> apple store',
            ]
        );

        $this->add_control(
            'sec_apple_btn_link',
            [
                'label' => esc_html__('Apple Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'sec_gplay_btn_icon',
            [
                'label' => esc_html__('Google Play Button Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'fab fa-google-play',
            ]
        );

        $this->add_control(
            'sec_gplay_btn_text',
            [
                'label' => esc_html__('Google Play Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<small>available on</small> google play',
            ]
        );

        $this->add_control(
            'sec_gplay_btn_link',
            [
                'label' => esc_html__('Google Play Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'sec_winstore_btn_icon',
            [
                'label' => esc_html__('Windows Store Button Icon', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'fab fa-windows',
            ]
        );

        $this->add_control(
            'sec_winstore_btn_text',
            [
                'label' => esc_html__('Windows Store Button Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '<small>available on</small> windows store',
            ]
        );

        $this->add_control(
            'sec_winstore_btn_link',
            [
                'label' => esc_html__('Windows Store Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'slider_bg_image', [
                'label' => esc_html__('Background Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'slider_sec_image', [
                'label' => esc_html__('Section Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_respon_image', [
                'label' => esc_html__('Responsive Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_title', [
                'label' => esc_html__('Slider Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slider_content', [
                'label' => esc_html__('Slider Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'slider_item',
            [
                'label' => esc_html__
                ('Slide List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_title' => appal_wp_kses('Date Anywhere App Available for free all Platform'),
                        'slider_content' => appal_wp_kses('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor anagi icdunt ut labore et dolore magna aliqua. '),
                    ],

                ],
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'App_slider_Style',
            [
                'label' => esc_html__('App Slider Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .appstore-main-carousel .item .item-content h1' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .slider-section .appstore-main-carousel .item .item-content h1',
            ]
        );
        $this->add_control(
            'title_colorrr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .appstore-main-carousel .item .item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .slider-section .appstore-main-carousel .item .item-content p',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_apple_btn_icon = $this->get_settings_for_display('sec_apple_btn_icon');
        $sec_apple_btn_text = $this->get_settings_for_display('sec_apple_btn_text');
        $sec_apple_btn_link = $this->get_settings_for_display('sec_apple_btn_link');
        $sec_gplay_btn_icon = $this->get_settings_for_display('sec_gplay_btn_icon');
        $sec_gplay_btn_text = $this->get_settings_for_display('sec_gplay_btn_text');
        $sec_gplay_btn_link = $this->get_settings_for_display('sec_gplay_btn_link');
        $sec_winstore_btn_icon = $this->get_settings_for_display('sec_winstore_btn_icon');
        $sec_winstore_btn_text = $this->get_settings_for_display('sec_winstore_btn_text');
        $sec_winstore_btn_link = $this->get_settings_for_display('sec_winstore_btn_link');
        $slider_item = $this->get_settings_for_display('slider_item');
        ?>

        <!-- slider-section - start
        ================================================== -->
        <section id="slider-section" class="slider-section clearfix">
            <div id="appstore-main-carousel" class="appstore-main-carousel owl-carousel owl-theme">

                <?php foreach ($slider_item as $item) { ?>


                    <div class="item">
                        <div class="container">
                            <div class="row justify-content-lg-start justify-content-md-center">

                                <div class="col-lg-7 col-md-8 col-sm-12">
                                    <!-- show on mobile device - start -->
                                    <div class="mobile-banner-image d-none">
                                        <img src="<?php echo esc_url($item['slider_respon_image']['url']); ?>"
                                             alt="mobile slider image">
                                    </div>
                                    <!-- show on mobile device - start -->
                                    <div class="item-content">
                                        <h1 class="title-text">
                                            <?php echo esc_html($item['slider_title']); ?>
                                        </h1>
                                        <p>
                                            <?php echo esc_html($item['slider_content']); ?>
                                        </p>
                                        <div class="btns-group ul-li clearfix">
                                            <ul class="clearfix">
                                                <?php if ($sec_apple_btn_link) { ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($sec_apple_btn_link); ?>"
                                                           class="store-btn bg-default-black">
                                                            <span class="icon"><i
                                                                        class="<?php echo esc_attr($sec_apple_btn_icon); ?>"></i></span>
                                                            <strong class="title-text">
                                                                <?php echo appal_wp_kses($sec_apple_btn_text); ?>
                                                            </strong>
                                                        </a>
                                                    </li>
                                                <?php }
                                                if ($sec_gplay_btn_link) { ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($sec_gplay_btn_link); ?>"
                                                           class="store-btn bg-default-pink">
                                                            <span class="icon"><i
                                                                        class="<?php echo esc_attr($sec_gplay_btn_icon); ?>"></i></span>
                                                            <strong class="title-text">
                                                                <?php echo appal_wp_kses($sec_gplay_btn_text); ?>
                                                            </strong>
                                                        </a>
                                                    </li>
                                                <?php }
                                                if ($sec_winstore_btn_link) { ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($sec_winstore_btn_link); ?>"
                                                           class="store-btn bg-default-blue">
                                                            <span class="icon"><i
                                                                        class="<?php echo esc_attr($sec_winstore_btn_icon); ?>"></i></span>
                                                            <strong class="title-text">
                                                                <?php echo appal_wp_kses($sec_winstore_btn_text); ?>
                                                            </strong>
                                                        </a>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="item-image text-center">
									<span class="bg-image aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
										<img src="<?php echo esc_url($item['slider_bg_image']['url']); ?>"
                                             alt="shape image">
									</span>
                                        <span class="phone-image-2 aos-init aos-animate" data-aos="zoom-out"
                                              data-aos-delay="300">
										<img src="<?php echo esc_url($item['slider_sec_image']['url']); ?>"
                                             alt="section image">
									</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </section>
        <!-- slider-section - end
        ================================================== -->


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalAppSliderArea);
