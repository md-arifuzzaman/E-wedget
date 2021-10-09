<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalCompanyWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'about-company-widget';
    }

    public function get_icon()
    {

        return 'eicon-info-box';
    }

    public function get_title()
    {
        return esc_html__('About - Widget', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_about_company',
            [
                'label' => esc_html__('About Company', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_comp_logo',
            [
                'label' => esc_html__('Logo', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'sec_appal_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' Appal is most powerful software & app landing page for any kind of app marketing Business. ',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_ab_com_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_ab_com_link',
            [
                'label' => esc_html__('Link ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'about_comp_social_opt',
            [
                'label' => esc_html__
                ('Social Link', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_ab_com_icon' => 'fab fa-facebook-f',
                        'sec_ab_com_link' => '#',
                    ],

                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_comp_logo = $this->get_settings_for_display('sec_comp_logo');
        $sec_appal_content = $this->get_settings_for_display('sec_appal_content');
        $about_comp_social_opt = $this->get_settings_for_display('about_comp_social_opt');
        ?>

        <div class="about-content">
            <div class="brand-logo mb-30">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                    <img src="<?php echo esc_url($sec_comp_logo['url']); ?>"
                         alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </a>
            </div>
            <p class="mb-30">
                <?php echo appal_wp_kses($sec_appal_content); ?>
            </p>
            <div class="social-links ul-li clearfix">
                <ul class="clearfix">
                    <?php

                    foreach ($about_comp_social_opt as $item) {

                        ?>
                        <li><a href="<?php echo esc_url($item['sec_ab_com_link']); ?>"><i
                                        class="<?php echo esc_attr($item['sec_ab_com_icon']); ?>"></i></a></li>
                        <?php
                    } ?>

                </ul>
            </div>
        </div>
        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalCompanyWidget);
