<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalSkillWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-how-it-work';
    }

    public function get_icon()
    {

        return 'eicon-skill-bar';
    }

    public function get_title()
    {
        return esc_html__('How it Work', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_how_it_work_content',
            [
                'label' => esc_html__('How It Work Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Sub Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'About Agency',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Creative Awesome Studios',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content ', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blanditLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.',
            ]
        );

        $this->add_control(
            'sec_vid_txt',
            [
                'label' => esc_html__('Video Text ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Watch Video ',
            ]
        );

        $this->add_control(
            'sec_vid_icon',
            [
                'label' => esc_html__('Video Icon ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ti-video-clapper',
            ]
        );

        $this->add_control(
            'sec_vid_url',
            [
                'label' => esc_html__('Video Url', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'https://player.vimeo.com/video/116147791',
            ]
        );

        $this->add_control(
            'sec_image',
            [
                'label' => esc_html__('Section Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_vid_txt = $this->get_settings_for_display('sec_vid_txt');
        $sec_vid_icon = $this->get_settings_for_display('sec_vid_icon');
        $sec_vid_url = $this->get_settings_for_display('sec_vid_url');
        $sec_image = $this->get_settings_for_display('sec_image');
        ?>

        <!-- START HOW IT WORKS -->
        <section class="how-it-work section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="single_how_it_work">
                            <h4><?php echo esc_html($sec_subtitle); ?></h4>
                            <h1><?php echo esc_html($sec_title); ?></h1>
                            <p><?php echo appal_wp_kses($sec_content); ?></p>
                            <a class="video-play"
                               href="<?php echo esc_url($sec_vid_url); ?>"><?php echo esc_html($sec_vid_txt); ?> <i
                                        class="<?php echo esc_attr($sec_vid_icon); ?>"></i></a>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="single_how_it_work_img">
                            <img src="<?php echo esc_url($sec_image['url']); ?>" class="img-fluid"
                                 alt="<?php echo esc_attr($sec_title); ?>"/>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </section>
        <!-- END HOW IT WORKS -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalSkillWidget);
