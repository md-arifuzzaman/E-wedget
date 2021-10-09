<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit;
}


class AppalContactUsWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'contact-us-widget';
    }

    public function get_icon()
    {

        return 'eicon-check-circle';
    }

    public function get_title()
    {
        return esc_html__('Contact Info - Widget', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_contact_us_widget',
            [
                'label' => esc_html__('Contact Info Widget', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_appal_contact_wid_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Address',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'sec_cont_info_icon',
            [
                'label' => esc_html__('Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'sec_cont_info_text',
            [
                'label' => esc_html__('Info ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'about_cont_info_opt',
            [
                'label' => esc_html__
                ('Social Link', 'appal'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sec_cont_info_icon' => 'uil uil-phone-pause',
                        'sec_cont_info_text' => '+448 955 744 333',
                    ],

                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_appal_contact_wid_title = $this->get_settings_for_display('sec_appal_contact_wid_title');
        $about_cont_info_opt = $this->get_settings_for_display('about_cont_info_opt');
        ?>

        <div class="contact-info ul-li-block clearfix">
            <h3 class="item-title"><?php echo esc_html($sec_appal_contact_wid_title); ?></h3>
            <ul class="clearfix">
                <?php
                foreach ($about_cont_info_opt as $item) {

                    ?>
                    <li>
                        <small class="icon"><i class='<?php echo esc_attr($item['sec_cont_info_icon']); ?>'></i></small>
                        <span class="info-text"><?php echo esc_html($item['sec_cont_info_text']); ?></span>
                    </li>
                    <?php
                } ?>

            </ul>
        </div>


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalContactUsWidget);
