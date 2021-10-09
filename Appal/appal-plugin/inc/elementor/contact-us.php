<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalContactUsWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-contact';
    }

    public function get_icon()
    {

        return 'eicon-mail';
    }

    public function get_title()
    {
        return esc_html__('Contact Us', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_contact_content',
            [
                'label' => esc_html__('Contact Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Get in touch',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Contact Today',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('SubTitle ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.',
            ]
        );


        $this->add_control(
            'con_form_shortcode',
            [
                'label' => esc_html__('Contact Form 7 Shortcode', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $con_form_shortcode = $this->get_settings_for_display('con_form_shortcode');

        ?>

        <!-- START CONTACT -->
        <section id="contact" class="contact_us">
            <div class="container">
                <div class="section-title text-center">
                    <h4><?php echo esc_html($sec_subtitle); ?></h4>
                    <h1><?php echo esc_html($sec_title); ?></h1>
                    <p><?php echo appal_wp_kses($sec_content); ?></p>
                </div>
                <div class="row">
                    <div class="offset-lg-1 text-center col-xs-12 col-lg-10">
                        <div class="contact">
                            <div id="contact-form">
                                <?php echo do_shortcode($con_form_shortcode); ?>
                            </div>
                        </div>
                    </div><!-- END COL  -->
                </div><!-- END ROW -->
            </div><!-- END CONTAINER -->
        </section>
        <!-- END CONTACT -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalContactUsWidget);
