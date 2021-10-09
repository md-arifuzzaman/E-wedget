<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalFreeTrailWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-free-trail';
    }

    public function get_icon()
    {

        return 'eicon-click';
    }

    public function get_title()
    {
        return esc_html__('Free Trail', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(

            'appal_free_trail_content',
            [
                'label' => esc_html__('Free Trail', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_bg_img',
            [
                'label' => esc_html__('Section Background Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '10M+ Peoples Using our App',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Take Control of your work ? <span>Check out <small>30 days free trail</small> version</span>',
            ]
        );

        $this->add_control(
            'sec_free_trail_shortcode',
            [
                'label' => esc_html__('Newsletter Shortcode', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'sec_notice_text',
            [
                'label' => esc_html__('Notice Text', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '*No credit card Required.',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_free_trail_shortcode = $this->get_settings_for_display('sec_free_trail_shortcode');
        $sec_notice_text = $this->get_settings_for_display('sec_notice_text');

        ?>

        <!-- free-trail-section - start
    ================================================== -->
        <section id="free-trail-section" class="free-trail-section clearfix">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="section-title mb-100 text-center">
                            <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                            <h2 class="title-text mb-0">
                                <?php echo appal_wp_kses($sec_title); ?>
                            </h2>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <div class="free-trail-form text-center"
                             style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">
                            <?php echo do_shortcode($sec_free_trail_shortcode); ?>
                            <p class="mb-0"><?php echo esc_html($sec_notice_text); ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- free-trail-section - end
        ================================================== -->

        <?php


    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalFreeTrailWidget);
