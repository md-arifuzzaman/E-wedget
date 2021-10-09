<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalTestimonialsWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-testimonials';
    }

    public function get_icon()
    {

        return 'eicon-product-rating';
    }

    public function get_title()
    {
        return esc_html__('Testimonials', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_testimonials_content',
            [
                'label' => esc_html__('Testimonials Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_testimonials_style',
            [
                'label' => esc_html__('Style', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1', 'appal'),
                    '2' => esc_html__('2', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Customer Review',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Some of our stories of product appal',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'Testimonials_Header_Style',
            [
                'label' => esc_html__('Testimonials Header Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Sub Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .sub-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Review_Style',
            [
                'label' => esc_html__('Review Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Authore_title_color',
            [
                'label' => __('Authore Title', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-carousel .item .testimonial-content .hero-info .hero-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontsssss',
                'label' => __('Authore Typography', 'appal'),
                'selector' => '{{WRAPPER}} .testimonial-section .testimonial-carousel .item .testimonial-content .hero-info .hero-name',
            ]
        );
        $this->add_control(
            'Authore_desig_color',
            [
                'label' => __('Authore Designation', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titlee_fontsssss',
                'label' => __('Designation Typography', 'appal'),
                'selector' => '{{WRAPPER}} .hero-title',
            ]
        );
        $this->add_control(
            'Authore_content_color',
            [
                'label' => __('Authore Content', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section .testimonial-carousel .item .testimonial-content .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titleee_fontsssss',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .testimonial-section .testimonial-carousel .item .testimonial-content .paragraph-text',
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_testimonials_style = $this->get_settings_for_display('sec_testimonials_style');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');

        ?>

        <?php if ($sec_testimonials_style == '2') { ?>

        <!-- testimonial-section - start
        ================================================== -->
        <section id="testimonial-section" class="testimonial-section clearfix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">

                        <div class="section-title mb-100 text-center">
                            <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                            <h2 class="title-text mb-0"><?php echo appal_wp_kses($sec_title); ?></h2>
                        </div>


                        <?php
                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('testimonials'),
                            'posts_per_page' => -1,
                        );

                        // The Query
                        $appal_testi2_query = new WP_Query($args);

                        // The Loop
                        if ($appal_testi2_query->have_posts()) {
                            while ($appal_testi2_query->have_posts()) {
                                $appal_testi2_query->the_post();
                                $appal_test_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_150_150');
                                $appal_test_designation = get_post_meta(get_the_ID(), '_appal_test_designation', true);
                                $appal_test_rating = get_post_meta(get_the_ID(), '_appal_test_rating', true);
                                ?>

                                <div class="review-item clearfix">
                                    <div class="reviewer-image">
                                        <img src="<?php echo esc_url($appal_test_image['0']); ?>"
                                             alt="<?php echo esc_html(get_the_title()); ?>">
                                    </div>
                                    <div class="reviewer-content">
                                        <div class="reviewer-info mb-45">
                                            <h3 class="reviewer-name"><?php the_title(); ?></h3>
                                            <span class="reviewer-title"><?php echo esc_html($appal_test_designation); ?></span>
                                        </div>
                                        <div class="reviewer-comment mb-30">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="rating-star ul-li clearfix">
                                            <ul class="clearfix">
                                                <?php if ($appal_test_rating == '1') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '2') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '3') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '4') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } else { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // do something
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
        </section>
        <!-- testimonial-section - end
        ================================================== -->

    <?php } else { ?>

        <!-- testimonial-section - start
        ================================================== -->
        <section id="testimonial-section" class="testimonial-section clearfix">
            <div class="container">

                <div class="section-title mb-100 text-center">
                    <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                    <h2 class="title-text mb-0"><?php echo esc_html($sec_title); ?></h2>
                </div>

                <div id="testimonial-carousel" class="testimonial-carousel owl-carousel owl-theme">

                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => array('testimonials'),
                        'posts_per_page' => -1,
                    );

                    // The Query
                    $appal_testi_query = new WP_Query($args);

                    // The Loop
                    if ($appal_testi_query->have_posts()) {
                        while ($appal_testi_query->have_posts()) {
                            $appal_testi_query->the_post();
                            $appal_test_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_150_150');
                            $appal_test_designation = get_post_meta(get_the_ID(), '_appal_test_designation', true);
                            $appal_test_rating = get_post_meta(get_the_ID(), '_appal_test_rating', true);
                            ?>

                            <div class="item clearfix">
                                <div class="hero-image">
                                    <img src="<?php echo esc_url($appal_test_image['0']); ?>"
                                         alt="<?php echo esc_html(get_the_title()); ?>">
                                    <span class="icon" data-aos="zoom-in" data-aos-duration="450"><i
                                                class="flaticon-quotation"></i></span>
                                </div>
                                <div class="testimonial-content">
                                    <div class="hero-info">
                                        <h4 class="hero-name"><?php the_title(); ?></h4>
                                        <span class="hero-title"><?php echo esc_html($appal_test_designation); ?></span>
                                        <div class="rating-star ul-li clearfix">
                                            <ul class="clearfix">
                                                <?php if ($appal_test_rating == '1') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '2') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '3') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } elseif ($appal_test_rating == '4') { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } else { ?>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="paragraph-text mb-0">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // do something
                        }
                    } else {
                        // no posts found
                    }

                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </section>
        <!-- testimonial-section - end
        ================================================== -->

    <?php } ?>


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalTestimonialsWidget);
