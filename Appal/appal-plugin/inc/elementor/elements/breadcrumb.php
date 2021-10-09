<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalBreadcrumbWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-breadcrumb';
    }

    public function get_icon()
    {

        return 'eicon-accordion';
    }

    public function get_title()
    {
        return esc_html__('Breadcrumb', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_breadcrumb_content',
            [
                'label' => esc_html__('Breadcrumb Content ', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_page_name',
            [
                'label' => esc_html__('Page Name', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Testimonials',
            ]
        );

        $this->add_control(
            'sec_page_title',
            [
                'label' => esc_html__('Page Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'See what our customers say about us',
            ]
        );

        $this->add_control(
            'sec_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' The most powerful software & app landing page for any kind of app marketing Business ',
            ]
        );

        $this->add_control(
            'sec_home_text',
            [
                'label' => esc_html__('Home Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Home',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'breadcrumb',
            [
                'label' => esc_html__('breadcrumb Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('breadcrumb Title', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('breadcrumb Typography', 'appal'),
                'selector' => '{{WRAPPER}} .breadcrumb-section .section-title .title-text',
            ]
        );
        $this->add_control(
            'title_colorr',
            [
                'label' => __('breadcrumb content', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .breadcrumb-section .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_page_name = $this->get_settings_for_display('sec_page_name');
        $sec_page_title = $this->get_settings_for_display('sec_page_title');
        $sec_content = $this->get_settings_for_display('sec_content');
        $sec_home_text = $this->get_settings_for_display('sec_home_text');

        ?>

        <!-- breadcrumb-section - start
        ================================================== -->
        <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
                 style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">

            <?php appal_banner_images(); ?>

            <div class="container">
                <div class="row justify-content-lg-start justify-content-md-center">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="breadcrumb-content">

                            <div class="section-title">
                                <h2 class="title-text mb-15">
                                    <?php if ($sec_page_title) {
                                        echo esc_html($sec_page_title);
                                    } else {
                                        esc_html_e('Page Title', 'appal');
                                    } ?>
                                </h2>
                                <p class="paragraph-text mb-0">
                                    <?php if ($sec_content) {
                                        echo esc_html($sec_content);
                                    } else {
                                        esc_html_e('The most powerful software & app landing page for any kind of app marketing Business', 'appal');
                                    } ?>

                                </p>
                            </div>

                            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php if ($sec_home_text) {
                                                echo esc_html($sec_home_text);
                                            } else {
                                                esc_html_e('home', 'appal');
                                            } ?>

                                        </a>
                                    </li>

                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?php if ($sec_page_name) {
                                            echo esc_html($sec_page_name);
                                        } else {
                                            esc_html_e('Page Name', 'appal');
                                        } ?>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>

            <?php appal_banner_shape(); ?>

        </section>
        <!-- breadcrumb-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalBreadcrumbWidget);
