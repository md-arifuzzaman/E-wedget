<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalFeatureWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-feature';
    }

    public function get_icon()
    {

        return 'eicon-posts-ticker';
    }

    public function get_title()
    {
        return esc_html__('Features', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_feature',
            [
                'label' => esc_html__('Feature Content', 'appal'),
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
                'default' => 'http://www.youtube.com/watch?v=7HKoqNJtMTQ',
            ]
        );

        $this->add_control(
            'sec_feat_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'More then an app <br> that perfect fit for your business',

            ]
        );

        $this->add_control(
            'sec_feat_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => ' Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound. mistaken you a complete account of the system expound. expound. ',

            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_feat_bg_icon',
            [
                'label' => esc_html__('Background Icon ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'sec_feat_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'uil uil-lightbulb-alt',
            ]
        );

        $repeater->add_control(
            'sec_feat_cont_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Full Integradtions',
            ]
        );

        $repeater->add_control(
            'sec_feat_content_text',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' Expound the actual teachings of the great explorer of the truth, the aster of human happiness. No one rejects. ',
            ]
        );

        $this->add_control(
            'sec_feature_list',
            [
                'label' => esc_html__
                ('Feature List', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Feature_Style',
            [
                'label' => esc_html__('Feature Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .feature-item-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content .feature-item-title',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content > p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_fonts',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content > p',
            ]
        );
        $this->add_control(
            'Icon_content_Style',
            [
                'label' => __('Icon Content Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_colorr',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .service-list > ul > li .item-content .item-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content .service-list > ul > li .item-content .item-title',
            ]
        );
        $this->add_control(
            'title_colorrr',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-content > p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .item-content > p',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_video_url = $this->get_settings_for_display('sec_video_url');
        $sec_feat_title = $this->get_settings_for_display('sec_feat_title');
        $sec_feat_content = $this->get_settings_for_display('sec_feat_content');
        $sec_feature_list = $this->get_settings_for_display('sec_feature_list');

        ?>

        <!-- features-section - start
        ================================================== -->
        <section class="features-section clearfix">
            <div class="container">

                <div class="feature-item">
                    <div class="row justify-content-lg-between justify-content-md-center">

                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <div class="feature-image-2 text-center">
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
                            <div class="feature-content p-0">
                                <h2 class="feature-item-title"><?php echo appal_wp_kses($sec_feat_title); ?></h2>
                                <p class="mb-0">
                                    <?php echo appal_wp_kses($sec_feat_content); ?>
                                </p>

                                <div class="service-list ul-li clearfix">
                                    <ul class="clearfix">
                                        <?php
                                        foreach ($sec_feature_list as $item) {
                                            ?>

                                            <li>
                                                <div class="item-icon"
                                                     style="background-image: url(<?php echo esc_url($item['sec_feat_bg_icon']['url']); ?>);">
                                                    <i class='<?php echo esc_attr($item['sec_feat_icon']); ?>'></i>
                                                </div>
                                                <div class="item-content">
                                                    <h3 class="item-title mb-15"><?php echo esc_html($item['sec_feat_cont_title']); ?></h3>
                                                    <p class="mb-0">
                                                        <?php echo appal_wp_kses($item['sec_feat_content_text']); ?>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- features-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalFeatureWidget);
