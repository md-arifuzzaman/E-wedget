<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class AppalAppImgWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-app-img';
    }

    public function get_icon()
    {

        return 'eicon-image-bold';
    }

    public function get_title()
    {
        return esc_html__('App Image', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_app_img_content',
            [
                'label' => esc_html__('App Image Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'sec_app_img_style',
            [
                'label' => esc_html__('Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                ]
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
            'sec_img',
            [
                'label' => esc_html__('Section Image', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'app_shape_img_1',
            [
                'label' => esc_html__('Shape Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'app_shape_img_2',
            [
                'label' => esc_html__('Shape Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'app_shape_img_3',
            [
                'label' => esc_html__('Shape Image 3', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_app_img_style = $this->get_settings_for_display('sec_app_img_style');
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_img = $this->get_settings_for_display('sec_img');
        $sec_shape_img_1 = $this->get_settings_for_display('app_shape_img_1');
        $sec_shape_img_2 = $this->get_settings_for_display('app_shape_img_2');
        $sec_shape_img_3 = $this->get_settings_for_display('app_shape_img_3');

        if ($sec_app_img_style == '2') {
            ?>

            <div class="app-image-2 float-right clearfix">
				<span class="bg-image" data-aos="zoom-in" data-aos-delay="200">
					<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
				</span>
                <span class="phone-image" data-aos="zoom-out" data-aos-delay="600">
					<img src="<?php echo esc_url($sec_img['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-1" data-aos="fade-left" data-aos-delay="1000">
					<img src="<?php echo esc_url($sec_shape_img_1['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-2" data-aos="fade-right" data-aos-delay="1250">
					<img src="<?php echo esc_url($sec_shape_img_2['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-3" data-aos="fade-left" data-aos-delay="1500">
					<img src="<?php echo esc_url($sec_shape_img_3['url']); ?>" alt="image_not_found">
				</span>
            </div>

            <?php
        } else { ?>

            <div class="app-image float-right">
			<span class="circle-image">
				<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
			</span>

                <span class="phone-image float-right" data-aos="zoom-out" data-aos-delay="400">
			<img src="<?php echo esc_url($sec_img['url']); ?>" alt="image_not_found">
			</span>
            </div>

        <?php }

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalAppImgWidget);
