<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalContactInfoWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-contact-info';
    }

    public function get_icon()
    {

        return 'eicon-info-circle';
    }

    public function get_title()
    {
        return esc_html__('Contact Info', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_contact_info_content',
            [
                'label' => esc_html__('Contact Info', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Can’t find answer? Mail us at',
            ]
        );


        $this->add_control(
            'sec_email_address',
            [
                'label' => esc_html__('Email Address ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'xyz@gmail.com',
            ]
        );

        $this->add_control(
            'sec_call_text',
            [
                'label' => esc_html__('Call Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'or call',
            ]
        );

        $this->add_control(
            'sec_phone_number',
            [
                'label' => esc_html__('Phone Number', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '+880 924 920 940',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_email_address = $this->get_settings_for_display('sec_email_address');
        $sec_call_text = $this->get_settings_for_display('sec_call_text');
        $sec_phone_number = $this->get_settings_for_display('sec_phone_number');

        ?>

        <div class="contact-info text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="450"
             data-aos-delay="500">
            <p class="mb-0">
                <?php echo appal_wp_kses($sec_content); ?> <a
                        href="mailto:<?php echo esc_attr($sec_email_address); ?>"><?php echo esc_html($sec_email_address); ?></a>
                <br><?php echo esc_html($sec_call_text); ?> <a
                        href="tel:<?php echo esc_attr($sec_phone_number); ?>"><?php echo esc_html($sec_phone_number); ?></a>
            </p>
        </div>

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalContactInfoWidget);
