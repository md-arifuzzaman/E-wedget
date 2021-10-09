<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class AppalFeatureImgThreeWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-feature-img-three';
    }

    public function get_icon()
    {

        return 'eicon-image';
    }

    public function get_title()
    {
        return esc_html__('Feature Image Three', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_feature_img3_content',
            [
                'label' => esc_html__('Feature Image Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_feat_img_3_style',
            [
                'label' => esc_html__('Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Left', 'appal'),
                    '2' => esc_html__('Right', 'appal'),
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
            'sec_big_chart_img',
            [
                'label' => esc_html__('Big Chart Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_circle_img1',
            [
                'label' => esc_html__('Circle Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_circle_img2',
            [
                'label' => esc_html__('Circle Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_circle_img3',
            [
                'label' => esc_html__('Circle Image 3', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_man_image1',
            [
                'label' => esc_html__('Man Image 1', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_man_image2',
            [
                'label' => esc_html__('Man Image 2', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_man_image3',
            [
                'label' => esc_html__('Man Image 3', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_leaf_img',
            [
                'label' => esc_html__('Leaf Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {

        $sec_feat_img_3_style = $this->get_settings_for_display('sec_feat_img_3_style');
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_big_chart_img = $this->get_settings_for_display('sec_big_chart_img');
        $sec_circle_img1 = $this->get_settings_for_display('sec_circle_img1');
        $sec_circle_img2 = $this->get_settings_for_display('sec_circle_img2');
        $sec_circle_img3 = $this->get_settings_for_display('sec_circle_img3');
        $sec_man_image1 = $this->get_settings_for_display('sec_man_image1');
        $sec_man_image2 = $this->get_settings_for_display('sec_man_image2');
        $sec_man_image3 = $this->get_settings_for_display('sec_man_image3');
        $sec_leaf_img = $this->get_settings_for_display('sec_leaf_img');

        ?>
        <div class="feature-item">
            <div class="feature-image-7 <?php if ($sec_feat_img_3_style == '2') {
                echo esc_attr('float-right');
            } else {
                echo esc_attr('float-left');
            } ?>">
				<span class="bg-image" data-aos="zoom-in" data-aos-delay="200">
					<img src="<?php echo esc_url($sec_bg_img['url']); ?>" alt="image_not_found">
				</span>
                <span class="big-chart" data-aos="zoom-out" data-aos-delay="300">
					<img src="<?php echo esc_url($sec_big_chart_img['url']); ?>" alt="image_not_found">
				</span>

                <?php if ($sec_circle_img1['url']) { ?>
                    <span class="circle-chart-1" data-aos="fade-up" data-aos-delay="500">
						<img src="<?php echo esc_url($sec_circle_img1['url']); ?>" alt="image_not_found">
					</span>
                <?php }
                if ($sec_circle_img2['url']) { ?>
                    <span class="circle-chart-2" data-aos="fade-up" data-aos-delay="600">
					<img src="<?php echo esc_url($sec_circle_img2['url']); ?>" alt="image_not_found">
				</span>
                <?php }
                if ($sec_circle_img3['url']) { ?>
                    <span class="circle-chart-3" data-aos="fade-up" data-aos-delay="700">
					<img src="<?php echo esc_url($sec_circle_img3['url']); ?>" alt="image_not_found">
				</span>
                <?php } ?>

                <span class="man-image-1" data-aos="fade-right" data-aos-delay="900">
					<img src="<?php echo esc_url($sec_man_image1['url']); ?>" alt="image_not_found">
				</span>
                <span class="man-image-2" data-aos="fade-right" data-aos-delay="1000">
					<img src="<?php echo esc_url($sec_man_image2['url']); ?>" alt="image_not_found">
				</span>
                <span class="man-image-3" data-aos="fade-left" data-aos-delay="1200">
					<img src="<?php echo esc_url($sec_man_image3['url']); ?>" alt="image_not_found">
				</span>
                <span class="leaf-image" data-aos="flip-left" data-aos-delay="1300">
					<img src="<?php echo esc_url($sec_leaf_img['url']); ?>" alt="image_not_found">
				</span>
            </div>
        </div>
        <?php
    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalFeatureImgThreeWidget);
