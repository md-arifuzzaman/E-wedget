<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalSoftwareSectionWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-software-section';
    }

    public function get_icon()
    {

        return 'eicon-plug';
    }

    public function get_title()
    {
        return esc_html__('Software Section', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_software_content',
            [
                'label' => esc_html__('Software Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_bg_img',
            [
                'label' => esc_html__('Background Image ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_shape_img1',
            [
                'label' => esc_html__('Shape Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_shape_img2',
            [
                'label' => esc_html__('Shape Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '5+ M Active User',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Integrate anywhere you want',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' We would like to take the opportunity to introduce to you our company and services. Our Company has an experience of almost 10 years ',
            ]
        );


        $repeater = new Repeater();


        $repeater->add_control(
            'sec_soft_icon', [
                'label' => esc_html__('Software Icon', 'appal'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sec_soft_link', [
                'label' => esc_html__('Software Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sec_bg_img_list',
            [
                'label' => esc_html__
                ('Background img List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_soft_link' => appal_wp_kses('#'),
                    ],

                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'soft_setting_section',
            [
                'label' => __('Settings', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'soft_subtitle_color',
            [
                'label' => __('Subtitle Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'soft_title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .software-section .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'soft_para_color',
            [
                'label' => __('Title Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .software-section .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {

        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_shape_img1 = $this->get_settings_for_display('sec_shape_img1');
        $sec_shape_img2 = $this->get_settings_for_display('sec_shape_img2');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_bg_img_list = $this->get_settings_for_display('sec_bg_img_list');

        ?>

        <!-- software-section - start
        ================================================== -->
        <section id="software-section" class="software-section sec-ptb-160 clearfix"
                 style="background-image: url(<?php echo esc_url($sec_bg_img['url']) ?>);">
			<span class="shape-img-1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
				<img src="<?php echo esc_url($sec_shape_img1['url']) ?>" alt="logo_not_found">
			</span>

            <span class="shape-img-2" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
				<img src="<?php echo esc_url($sec_shape_img2['url']) ?>" alt="logo_not_found">
			</span>

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="section-title mb-100 text-center">
                            <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                            <h2 class="title-text mb-30"><?php echo appal_wp_kses($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_content); ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="software-container">
                            <?php
                            foreach ($sec_bg_img_list as $item) {
                                if ($item['sec_soft_icon']['url']) {
                                    ?>


                                    <div class="software-item" data-aos="zoom-in" data-aos-duration="1000"
                                         data-aos-delay="200">
                                        <a class="software-logo" href="<?php echo esc_url($item['sec_soft_link']) ?>">
                                            <img src="<?php echo esc_url($item['sec_soft_icon']['url']); ?>"
                                                 alt="logo_not_found">
                                        </a>
                                    </div>
                                    <?php
                                }
                            } ?>


                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- software-section - end
        ================================================== -->
        <?php
    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalSoftwareSectionWidget);
