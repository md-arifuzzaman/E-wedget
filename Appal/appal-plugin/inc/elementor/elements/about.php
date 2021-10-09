<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class AppalAboutWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-About';
    }

    public function get_icon()
    {

        return 'eicon-lock-user';
    }

    public function get_title()
    {
        return esc_html__('About', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_about',
            [
                'label' => esc_html__('About Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
            'sec_video_url',
            [
                'label' => esc_html__('Enter Video Url', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'http://www.youtube.com/watch?v=ZHomPRxM-0k',
            ]
        );

        $this->add_control(
            'sec_about_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'We are Leading app <br> Company for your Business',

            ]
        );

        $this->add_control(
            'sec_about_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => ' Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound. mistaken you a complete account of the system expound. expound. ',

            ]
        );


        $this->add_control(
            'sec_sign_img',
            [
                'label' => esc_html__('Sign Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'sec_about_name',
            [
                'label' => esc_html__('Name', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Rakib Dewan',

            ]
        );

        $this->add_control(
            'sec_about_designation',
            [
                'label' => esc_html__('Designation', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '- CEO Giant Theme',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'About',
            [
                'label' => esc_html__('About Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_colorr',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .about-content .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .about-section .about-content .title-text',
            ]
        );
        $this->add_control(
            'con_colorr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_bio' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .about_bio',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_video_url = $this->get_settings_for_display('sec_video_url');
        $sec_about_title = $this->get_settings_for_display('sec_about_title');
        $sec_about_content = $this->get_settings_for_display('sec_about_content');
        $sec_sign_img = $this->get_settings_for_display('sec_sign_img');
        $sec_about_name = $this->get_settings_for_display('sec_about_name');
        $sec_about_designation = $this->get_settings_for_display('sec_about_designation');

        ?>

        <!-- about-section - start
        ================================================== -->
        <section id="about-section" class="about-section sec-ptb-160 clearfix">
            <div class="container">
                <div class="row justify-content-lg-between justify-content-md-center">

                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <div class="about-image">
							<span class="item-image">
								<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
							</span>
                            <a class="popup-video" href="<?php echo esc_url($sec_video_url); ?>" data-aos="zoom-in"
                               data-aos-delay="100">
                                <i class='uil uil-play'></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="about-content">
                            <h2 class="title-text mb-45"><?php echo appal_wp_kses($sec_about_title); ?></h2>
                            <div class="about_bio">
                                <?php echo appal_wp_kses($sec_about_content); ?>
                            </div>
                            <div class="hero-content">
                                <small class="hero-signature mb-30">
                                    <img src="<?php echo esc_url($sec_sign_img['url']); ?>" alt="signature_not_found">
                                </small>
                                <span class="hero-name"><?php echo esc_html($sec_about_name); ?> <small
                                            class="hero-title"><?php echo esc_html($sec_about_designation); ?></small></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- about-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalAboutWidget);
