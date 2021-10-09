<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalFeatureContentWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-feature-content';
    }

    public function get_icon()
    {

        return 'eicon-post-content';
    }

    public function get_title()
    {
        return esc_html__('Feature Content', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_feature_content',
            [
                'label' => esc_html__('Feature Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('SubTitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Features #1',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Control your Customer data from one place',
            ]
        );

        $this->add_control(
            'sec_feat_title_margin',
            [
                'label' => esc_html__('Title Margin Bottom', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Margin Bottom 30', 'appal'),
                    '2' => esc_html__('Margin Bottom 60', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_feat_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,

            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_feat_list_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'sec_feat_list_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'sec_feat_list_text',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,
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

        $this->add_control(
            'sec_first_btn_text',
            [
                'label' => esc_html__('First Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'try it free',
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
            'sec_second_btn_text',
            [
                'label' => esc_html__('Second Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'See All Features',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'Feature_style',
            [
                'label' => esc_html__('Feature Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content .section-title .sub-title',
            ]
        );
        $this->add_control(
            'Feature_title_color',
            [
                'label' => __('Feature Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Feature_content_color',
            [
                'label' => __('Feature Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main_feat_content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Feature_button',
            [
                'label' => esc_html__('Feature Button Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Left_Button_Style',
            [
                'label' => __('Left Button Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
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
                    '{{WRAPPER}} .custom-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_hover',
            [
                'label' => __('Button hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Right_Button_Style',
            [
                'label' => __('Right Button Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Button_text_colorr',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_hoverr',
            [
                'label' => __('Button hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Feature_Tab',
            [
                'label' => esc_html__('Feature Tab Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tab_head',
            [
                'label' => __('Tab header', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .info-list > ul > li .info-text h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content .info-list > ul > li .info-text h4',
            ]
        );
        $this->add_control(
            'tab_content',
            [
                'label' => __('Tab content', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-content .info-list > ul > li .info-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .feature-content .info-list > ul > li .info-text',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_feat_title_margin = $this->get_settings_for_display('sec_feat_title_margin');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_feat_content');
        $sec_feature_list = $this->get_settings_for_display('sec_feature_list');
        $sec_first_btn_text = $this->get_settings_for_display('sec_first_btn_text');
        $sec_first_btn_link = $this->get_settings_for_display('sec_first_btn_link');
        $sec_second_btn_text = $this->get_settings_for_display('sec_second_btn_text');
        $sec_second_btn_link = $this->get_settings_for_display('sec_second_btn_link');

        ?>


        <div class="feature-content">

            <div class="section-title <?php if ($sec_feat_title_margin == '2') {
                echo esc_attr('mb-60');
            } else {
                echo esc_attr('mb-30');
            } ?>">
                <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                <h2 class="title-text mb-0"><?php echo appal_wp_kses($sec_title); ?></h2>
            </div>

            <div class="main_feat_content">
                <?php echo appal_wp_kses($sec_content); ?>
            </div>

            <?php if ($sec_feature_list) { ?>
                <div class="info-list ul-li-block mb-45 clearfix">
                    <ul class="clearfix">
                        <?php
                        foreach ($sec_feature_list as $item) {
                            ?>

                            <li>
                                <small class="icon"><img
                                            src="<?php echo esc_url($item['sec_feat_list_icon']['url']); ?>"
                                            alt="<?php echo esc_attr($item['sec_feat_list_title']); ?>"/></small>
                                <span class="info-text">
						<h4><?php echo appal_wp_kses($item['sec_feat_list_title']); ?></h4>
						<?php echo appal_wp_kses($item['sec_feat_list_text']); ?>
					</span>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
            <?php } ?>

            <div class="btns-group ul-li clearfix">
                <ul class="clearfix">
                    <?php if ($sec_first_btn_link) { ?>
                        <li><a href="<?php echo esc_url($sec_first_btn_link); ?>"
                               class="custom-btn"><?php echo esc_html($sec_first_btn_text); ?></a></li>
                    <?php }
                    if ($sec_second_btn_link) { ?>
                        <li><a href="<?php echo esc_url($sec_second_btn_link); ?>"
                               class="custom-btn-underline"><?php echo esc_html($sec_second_btn_text); ?></a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalFeatureContentWidget);
