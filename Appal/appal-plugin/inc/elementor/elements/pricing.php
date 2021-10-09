<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalPricingWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-pricing';
    }

    public function get_icon()
    {

        return 'eicon-price-table';
    }

    public function get_title()
    {
        return esc_html__('Pricing', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(

            'appal_blog_content',
            [
                'label' => esc_html__('Pricing', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_bg_img',
            [
                'label' => esc_html__('Section Background Image', 'appal'),
                'type' => Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Subtitle', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Pricing Plan',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'No more hidden Charge applied! Choose your plan',
            ]
        );

        $this->add_control(
            'sec_menu_text_month',
            [
                'label' => esc_html__('Menu Text - Month', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'monthly',
            ]
        );

        $this->add_control(
            'sec_menu_text_year',
            [
                'label' => esc_html__('Menu Text - Year', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'annualy',
            ]
        );

        $this->add_control(
            'sec_num_of_post',
            [
                'label' => esc_html__('Number of Post', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '3',
            ]
        );

        $this->add_control(
            'sec_btn_text',
            [
                'label' => esc_html__('Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'more pricing plan',
            ]
        );

        $this->add_control(
            'sec_btn_link',
            [
                'label' => esc_html__('Button Link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Pricing_Style',
            [
                'label' => esc_html__('Pricing Header Style', 'appal'),
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
            'Tab_Button',
            [
                'label' => esc_html__('Tab Button Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Tab_button',
            [
                'label' => __('Tab Button Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-tab-nav > ul > li > a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_buttonn',
            [
                'label' => __('Tab Button Active', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-tab-nav > ul > li > .active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tab_buttonnn',
            [
                'label' => __('Tab Border color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-tab-nav > ul' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Pricing_Content',
            [
                'label' => esc_html__('Pricing Content Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_colorrr',
            [
                'label' => __('Pricing Title', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan .plan-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonttsss',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .pricing-section .pricing-plan .plan-title',
            ]
        );
        $this->add_control(
            'title_colorrrr',
            [
                'label' => __('Price color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan .price-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fontttsss',
                'label' => __('Price Typography', 'appal'),
                'selector' => '{{WRAPPER}} .pricing-section .pricing-plan .price-text',
            ]
        );
        $this->add_control(
            'titlee_colorrrr',
            [
                'label' => __('Price list color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan .item-list > ul > li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tittle_fontttsss',
                'label' => __('Price list Typography', 'appal'),
                'selector' => '{{WRAPPER}} .pricing-section .pricing-plan .item-list > ul > li',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Button',
            [
                'label' => esc_html__('Pricing Button Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Button_Normal',
            [
                'label' => __('Button normal', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan .start-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_actiddve',
            [
                'label' => __('Button Active', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan.active-item .start-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_active',
            [
                'label' => __('Active Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan.active-item:hover .start-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_actidve',
            [
                'label' => __('Button Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .pricing-plan:hover .start-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Section Button',
            [
                'label' => esc_html__('Bottom Button Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Button_text_color',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .review-btn .custom-btn-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Buttonn_hoverr',
            [
                'label' => __('Button Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-section .review-btn .custom-btn-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $sec_bg_img = $this->get_settings_for_display('sec_bg_img');
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_menu_text_month = $this->get_settings_for_display('sec_menu_text_month');
        $sec_menu_text_year = $this->get_settings_for_display('sec_menu_text_year');
        $sec_num_of_post = $this->get_settings_for_display('sec_num_of_post');
        $sec_btn_text = $this->get_settings_for_display('sec_btn_text');
        $sec_btn_link = $this->get_settings_for_display('sec_btn_link');

        ?>

        <!-- pricing-section - start
        ================================================== -->
        <section id="pricing-section" class="pricing-section clearfix">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="section-title mb-100 text-center">
                            <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                            <h2 class="title-text mb-0"><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pricing-tab-nav ul-li-center clearfix">
                <ul class="nav" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"
                           href="#monthly"><?php echo esc_html($sec_menu_text_month); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab"
                           href="#annualy"><?php echo esc_html($sec_menu_text_year); ?></a>
                    </li>
                </ul>
            </div>

            <div class="bg-image sec-ptb-160 pt-0 clearfix"
                 style="background-image: url(<?php echo esc_url($sec_bg_img['url']); ?>);">
                <div class="tab-content">
                    <div id="monthly" class="tab-pane active">
                        <div class="container">
                            <div class="row">

                                <?php
                                // WP_Query arguments
                                $args = array(
                                    'post_type' => array('pricing_table'),
                                    'posts_per_page' => $sec_num_of_post
                                );

                                // The Query
                                $appal_pricing_one_query = new WP_Query($args);

                                // The Loop
                                if ($appal_pricing_one_query->have_posts()) {
                                    while ($appal_pricing_one_query->have_posts()) {
                                        $appal_pricing_one_query->the_post();
                                        $appal_pri_ft_plan = get_post_meta(get_the_ID(), '_appal_pri_ft_plan', true);
                                        $appal_pri_offr_txt = get_post_meta(get_the_ID(), '_appal_pri_offr_txt', true);
                                        $appal_pri_currency = get_post_meta(get_the_ID(), '_appal_pri_currency', true);
                                        $appal_pri_mon_price = get_post_meta(get_the_ID(), '_appal_pri_mon_price', true);
                                        $appal_pri_icon = get_post_meta(get_the_ID(), '_appal_pri_icon', true);
                                        $pricing_feature_option = get_post_meta(get_the_ID(), '_appal_pricing_feature_option', true);
                                        $appal_pri_btn_text = get_post_meta(get_the_ID(), '_appal_pri_btn_text', true);
                                        $appal_pri_btn_link = get_post_meta(get_the_ID(), '_appal_pri_btn_link', true);

                                        ?>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="pricing-plan <?php if ($appal_pri_ft_plan) {
                                                echo esc_attr('active-item');
                                            } ?> text-center">
                                                <?php if ($appal_pri_offr_txt) { ?>
                                                    <small class="offer-text"><?php echo esc_html($appal_pri_offr_txt); ?></small>
                                                <?php } ?>
                                                <h3 class="plan-title mb-30"><?php the_title(); ?></h3>
                                                <span class="item-icon mb-30"
                                                      style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/bg-0.png);">
													<i class="<?php echo esc_attr($appal_pri_icon); ?>"></i>
												</span>
                                                <h4 class="price-text mb-0">
                                                    <sup><?php echo esc_html($appal_pri_currency); ?></sup><?php echo esc_html($appal_pri_mon_price); ?>
                                                </h4>
                                                <div class="item-list ul-li-block clearfix">
                                                    <ul class="clearfix">
                                                        <?php
                                                        foreach ((array)$pricing_feature_option as $key => $team_entry) {

                                                            $feature = '';

                                                            if (isset($team_entry['_appal_pricing_feature']))
                                                                $feature = $team_entry['_appal_pricing_feature'];

                                                            ?>

                                                            <li><?php echo esc_html($feature); ?></li>

                                                        <?php } ?>


                                                    </ul>
                                                </div>
                                                <a href="<?php echo esc_url($appal_pri_btn_link); ?>"
                                                   class="start-btn"><?php echo esc_html($appal_pri_btn_text); ?></a>
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

                    <div id="annualy" class="tab-pane fade">
                        <div class="container">
                            <div class="row">
                                <?php
                                // WP_Query arguments
                                $args = array(
                                    'post_type' => array('pricing_table'),
                                    'posts_per_page' => $sec_num_of_post
                                );

                                // The Query
                                $appal_pricing_two_query = new WP_Query($args);

                                // The Loop
                                if ($appal_pricing_two_query->have_posts()) {
                                    while ($appal_pricing_two_query->have_posts()) {
                                        $appal_pricing_two_query->the_post();
                                        $appal_pri_ft_plan = get_post_meta(get_the_ID(), '_appal_pri_ft_plan', true);
                                        $appal_pri_offr_txt = get_post_meta(get_the_ID(), '_appal_pri_offr_txt', true);
                                        $appal_pri_currency = get_post_meta(get_the_ID(), '_appal_pri_currency', true);
                                        $appal_pri_mon_price = get_post_meta(get_the_ID(), '_appal_pri_mon_price', true);
                                        $pricing_feature_option = get_post_meta(get_the_ID(), '_appal_pricing_feature_option', true);
                                        $appal_pri_year_price = get_post_meta(get_the_ID(), '_appal_pri_year_price', true);
                                        $appal_pri_icon = get_post_meta(get_the_ID(), '_appal_pri_icon', true);
                                        $appal_pri_btn_text = get_post_meta(get_the_ID(), '_appal_pri_btn_text', true);
                                        $appal_pri_btn_link = get_post_meta(get_the_ID(), '_appal_pri_btn_link', true);

                                        ?>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="pricing-plan <?php if ($appal_pri_ft_plan) {
                                                echo esc_attr('active-item');
                                            } ?> text-center">
                                                <?php if ($appal_pri_offr_txt) { ?>
                                                    <small class="offer-text"><?php echo esc_html($appal_pri_offr_txt); ?></small>
                                                <?php } ?>
                                                <h3 class="plan-title mb-30"><?php the_title(); ?></h3>
                                                <span class="item-icon mb-30"
                                                      style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/bg-0.png);">
													<i class="<?php echo esc_attr($appal_pri_icon); ?>"></i>
												</span>
                                                <h4 class="price-text mb-0">
                                                    <sup><?php echo esc_html($appal_pri_currency); ?></sup><?php echo esc_html($appal_pri_year_price); ?>
                                                </h4>
                                                <div class="item-list ul-li-block clearfix">
                                                    <ul class="clearfix">
                                                        <?php
                                                        foreach ((array)$pricing_feature_option as $key => $team_entry) {

                                                            $feature = '';

                                                            if (isset($team_entry['_appal_pricing_feature']))
                                                                $feature = $team_entry['_appal_pricing_feature'];

                                                            ?>

                                                            <li><?php echo esc_html($feature); ?></li>

                                                        <?php } ?>


                                                    </ul>
                                                </div>
                                                <a href="<?php echo esc_url($appal_pri_btn_link); ?>"
                                                   class="start-btn"><?php echo esc_html($appal_pri_btn_text); ?></a>
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
                </div>

                <?php if ($sec_btn_link) { ?>
                    <div class="review-btn text-center">
                        <a href="<?php echo esc_html($sec_btn_link); ?>"
                           class="custom-btn-underline"><?php echo esc_html($sec_btn_text); ?></a>
                    </div>
                <?php } ?>
            </div>

        </section>
        <!-- pricing-section - end
        ================================================== -->

        <?php


    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalPricingWidget);
