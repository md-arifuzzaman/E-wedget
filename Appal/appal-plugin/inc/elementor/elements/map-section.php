<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalMapSectionWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-map-section';
    }

    public function get_icon()
    {

        return 'eicon-google-maps';
    }

    public function get_title()
    {
        return esc_html__('Map Section', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_map_section_content',
            [
                'label' => esc_html__('Map Section', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'map_embed_code',
            [
                'label' => esc_html__('Map Embed Code ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'map_cont_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'get in touch',
            ]
        );

        $this->add_control(
            'map_cont_form',
            [
                'label' => esc_html__('Contact Form Shortcode', 'appal'),
                'type' => Controls_Manager::TEXT,

            ]
        );


        $this->end_controls_section();


    }

    protected function render()
    {
        $map_embed_code = $this->get_settings_for_display('map_embed_code');
        $map_cont_title = $this->get_settings_for_display('map_cont_title');
        $map_cont_form = $this->get_settings_for_display('map_cont_form');

        ?>

        <!-- map-section - start
        ================================================== -->
        <section id="map-section" class="map-section clearfix">
            <div id="gmap" class="google-map">
                <?php echo $map_embed_code ?>
            </div>
            <div class="contact-form">
                <h2 class="title-text mb-30"><?php echo esc_html($map_cont_title); ?></h2>
                <?php echo do_shortcode($map_cont_form); ?>
            </div>
        </section>
        <!-- map-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalMapSectionWidget);
