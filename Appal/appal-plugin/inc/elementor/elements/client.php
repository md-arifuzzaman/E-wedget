<?php

// File Security Check
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}


class appalClientWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-client';
    }

    public function get_icon()
    {

        return 'eicon-person';
    }

    public function get_title()
    {
        return esc_html__('Client', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_client_content',
            [
                'label' => esc_html__('Client Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {


        ?>

        <!-- client-section - start -->
        <div id="client-section" class="client-section pb-0 clearfix">
            <div class="container">
                <div id="client-carousel" class="client-carousel owl-carousel owl-theme">
                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => array('client'),
                        'posts_per_page' => '-1',
                    );

                    // The Query
                    $appal_query = new WP_Query($args);

                    // The Loop
                    if ($appal_query->have_posts()) {
                        while ($appal_query->have_posts()) {
                            $appal_query->the_post();
                            $appal_work_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), '');
                            $appal_website_url = get_post_meta(get_the_ID(), '_appal_client_url', true);
                            ?>
                            <div class="item">
                                <a class="client-logo" href="<?php echo esc_url($appal_website_url); ?>">
                                    <span class="before-image"><img src="<?php echo esc_url($appal_work_image['0']); ?>"
                                                                    alt="<?php echo esc_attr(get_the_title()); ?>"></span>
                                    <span class="after-image"><img src="<?php echo esc_url($appal_work_image['0']); ?>"
                                                                   alt="<?php echo esc_attr(get_the_title()); ?>"></span>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>


                </div>
            </div>
        </div>
        <!-- client-section - end -->

        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalClientWidget);
