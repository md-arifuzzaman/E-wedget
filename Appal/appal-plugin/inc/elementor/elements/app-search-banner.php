<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class AppalAppSearchBanner extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-app-search-banner';
    }

    public function get_icon()
    {

        return 'eicon-site-search';
    }

    public function get_title()
    {
        return esc_html__('App Search Banner', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_app_search_banner_content',
            [
                'label' => esc_html__('Content', 'appal'),
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
            'sec_search_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Most Completed App Store Website Search your Desire App'

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'app_search_banner',
            [
                'label' => esc_html__('App Search Banner', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
           
        $this->add_control(
            'form_Style',
            [
                'label' => __('Form Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'form_text_color',
            [
                'label' => __('Form Text color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-item search' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'form_color',
            [
                'label' => __('Form color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-item input' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => __('Border color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form-item input' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submit_color',
            [
                'label' => __('Submit color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-section .banner-content .search-form .form-item .search-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_search_title = $this->get_settings_for_display('sec_search_title');
        ?>

        <!-- Serch Section - start
        ================================================== -->
        <section id="search-section" class="search-section clearfix"
                 style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">
            <div class="overlay-color">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="banner-content text-center">
                                <h1>
                                    <?php echo appal_wp_kses($sec_search_title); ?>
                                </h1>
                                <?php appal_product_search(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Serch Section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalAppSearchBanner);
