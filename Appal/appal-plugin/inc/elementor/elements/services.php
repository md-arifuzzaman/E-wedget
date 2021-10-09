<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class AppalServicesWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-services';
    }

    public function get_icon()
    {

        return 'eicon-post';
    }

    public function get_title()
    {
        return esc_html__('Services', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_services_content',
            [
                'label' => esc_html__('Services Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Meet Appal. The simple, intuitive and powerful app to manage your work. Explore app of the next generation for free and become a part of community of like-minded members.',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'con_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-section .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .service-section .section-title .paragraph-text',
            ]
        );
        $this->add_control(
            'con_colorrr',
            [
                'label' => __('Services Content', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-section .service-carousel .item .service-item .item-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Services Typography', 'appal'),
                'selector' => '{{WRAPPER}} .service-section .service-carousel .item .service-item .item-title',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $sec_title = $this->get_settings_for_display('sec_title');
        ?>

        <!-- service-section - start
        ================================================== -->
        <div id="service-section" class="service-section pt-0 clearfix">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-60">
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_title); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="service-carousel" class="service-carousel owl-carousel owl-theme">
                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => array('service'),
                        'posts_per_page' => -1,
                    );

                    // The Query
                    $appal_services_query = new WP_Query($args);

                    // The Loop
                    if ($appal_services_query->have_posts()) {
                        while ($appal_services_query->have_posts()) {
                            $appal_services_query->the_post();
                            $appal_ser_bg_img = get_post_meta(get_the_ID(), '_appal_ser_bg_img', true);
                            $appal_ser_icon = get_post_meta(get_the_ID(), '_appal_ser_icon', true);
                            $appal_ser_link = get_post_meta(get_the_ID(), '_appal_ser_link', true);
                            ?>

                            <div class="item">
                                <a href="<?php echo esc_url($appal_ser_link); ?>" class="service-item">
									<span class="item-icon"
                                          style="background-image: url(<?php echo esc_url($appal_ser_bg_img); ?>);">
										<i class='<?php echo esc_attr($appal_ser_icon); ?>'></i>
									</span>
                                    <small class="item-title"><?php the_title(); ?></small>
                                </a>
                            </div>

                        <?php }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                </div>

            </div>
        </div>
        <!-- service-section - end
        ================================================== -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new AppalServicesWidget);
