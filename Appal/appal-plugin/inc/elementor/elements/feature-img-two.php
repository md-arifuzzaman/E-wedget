<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class AppalFeatureImgTwoWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-feature-img-two';
    }

    public function get_icon()
    {

        return 'eicon-image';
    }

    public function get_title()
    {
        return esc_html__('Feature Image Two', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_feature_img_content',
            [
                'label' => esc_html__('Feature Image Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_feat_img_2_style',
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
                'label' => esc_html__('Background Image . Size - 571*596px', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_mobile_img',
            [
                'label' => esc_html__('Phone Image Size - 433*768px', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_comment_img_1',
            [
                'label' => esc_html__('Comment Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_comment_img_2',
            [
                'label' => esc_html__('Comment Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_shape_img_1',
            [
                'label' => esc_html__('Shape Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_shape_img_2',
            [
                'label' => esc_html__('Shape Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'sec_shape_img_3',
            [
                'label' => esc_html__('Shape Image 3', 'appal'),
                'type' => Controls_Manager::MEDIA,

            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {

        $sec_feat_img_2_style = $this->get_settings_for_display('sec_feat_img_2_style');
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_mobile_img = $this->get_settings_for_display('sec_mobile_img');
        $sec_comment_img_1 = $this->get_settings_for_display('sec_comment_img_1');
        $sec_comment_img_2 = $this->get_settings_for_display('sec_comment_img_2');
        $sec_shape_img_1 = $this->get_settings_for_display('sec_shape_img_1');
        $sec_shape_img_2 = $this->get_settings_for_display('sec_shape_img_2');
        $sec_shape_img_3 = $this->get_settings_for_display('sec_shape_img_3');

        ?>

        <div class="feature-item">
            <div class="feature-image-2 <?php if ($sec_feat_img_2_style == '2') {
                echo esc_attr('feat_img_style2');
            } ?>">
				<span class="bg-image" data-aos="zoom-in" data-aos-delay="200">
					<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
				</span>
                <span class="phone-image" data-aos="zoom-out" data-aos-delay="500">
					<img src="<?php echo esc_url($sec_mobile_img['url']); ?>" alt="image_not_found">
				</span>
                <span class="comment-image-1" data-aos="fade-left" data-aos-delay="700">
					<img src="<?php echo esc_url($sec_comment_img_1['url']); ?>" alt="image_not_found">
				</span>
                <span class="comment-image-2" data-aos="fade-left" data-aos-delay="900">
					<img src="<?php echo esc_url($sec_comment_img_2['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-1" data-aos="fade-right" data-aos-delay="1100">
					<img src="<?php echo esc_url($sec_shape_img_1['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-2" data-aos="fade-left" data-aos-delay="1200">
					<img src="<?php echo esc_url($sec_shape_img_2['url']); ?>" alt="image_not_found">
				</span>
                <span class="shape-image-3" data-aos="fade-right" data-aos-delay="1300">
					<img src="<?php echo esc_url($sec_shape_img_3['url']); ?>" alt="image_not_found">
				</span>
            </div>
        </div>


        <?php
    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalFeatureImgTwoWidget);
