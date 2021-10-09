<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class Appal_AppContent_Widget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-app-content';
    }

    public function get_icon()
    {

        return 'eicon-text-area';
    }

    public function get_title()
    {
        return esc_html__('App Content', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_app_content',
            [
                'label' => esc_html__('App Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('SubTitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Over 5M+ active user',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Get your copy today, make your life easier with Appal',
            ]
        );

        $this->add_control(
            'sec_feat_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::WYSIWYG,

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
            'sec_first_btn_heading_text',
            [
                'label' => esc_html__('First Button Heading Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'available on',
            ]
        );

        $this->add_control(
            'sec_first_btn_text',
            [
                'label' => esc_html__('First Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'apple store',
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
            'sec_second_btn_heading_text',
            [
                'label' => esc_html__('Second Button Heading Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'available on',
            ]
        );

        $this->add_control(
            'sec_second_btn_text',
            [
                'label' => esc_html__('Second Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'google play',
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
            'App_content',
            [
                'label' => esc_html__('App Content Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .sub-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .app-content .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typographyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .app-content .section-title .title-text',
            ]
        );
        $this->add_control(
            'con_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typographyyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_feat_content');
        $sec_first_btn_icon = $this->get_settings_for_display('sec_first_btn_icon');
        $sec_first_btn_heading_text = $this->get_settings_for_display('sec_first_btn_heading_text');
        $sec_first_btn_text = $this->get_settings_for_display('sec_first_btn_text');
        $sec_first_btn_link = $this->get_settings_for_display('sec_first_btn_link');
        $sec_second_btn_icon = $this->get_settings_for_display('sec_second_btn_icon');
        $sec_second_btn_heading_text = $this->get_settings_for_display('sec_second_btn_heading_text');
        $sec_second_btn_text = $this->get_settings_for_display('sec_second_btn_text');
        $sec_second_btn_link = $this->get_settings_for_display('sec_second_btn_link');

        ?>

        <div class="app-content">
            <div class="section-title mb-60">
                <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                <h2 class="title-text mb-30"><?php echo appal_wp_kses($sec_title); ?></h2>
                <div class="paragraph-text mb-0">
                    <?php echo appal_wp_kses($sec_content); ?>
                </div>
            </div>

            <div class="btns-group ul-li clearfix">
                <ul class="clearfix">
                    <?php if ($sec_first_btn_link) { ?>
                        <li>
                            <a href="<?php echo esc_url($sec_first_btn_link); ?>" class="store-btn bg-default-blue">
                                <span class="icon"><i class="<?php echo esc_attr($sec_first_btn_icon); ?>"></i></span>
                                <strong class="title-text">
                                    <small><?php echo esc_html($sec_first_btn_heading_text); ?></small>
                                    <?php echo esc_html($sec_first_btn_text); ?>
                                </strong>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($sec_second_btn_link) { ?>
                        <li>
                            <a href="<?php echo esc_url($sec_second_btn_link); ?>" class="store-btn bg-default-pink">
                                <span class="icon"><i class="<?php echo esc_attr($sec_second_btn_icon); ?>"></i></span>
                                <strong class="title-text">
                                    <small><?php echo esc_html($sec_second_btn_heading_text); ?></small>
                                    <?php echo esc_html($sec_second_btn_text); ?>
                                </strong>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Appal_AppContent_Widget);
