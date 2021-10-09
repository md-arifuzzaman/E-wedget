<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class Appal_App_list_Widget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-app-list';
    }

    public function get_icon()
    {

        return 'eicon-apps';
    }

    public function get_title()
    {
        return esc_html__('App List', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_app_list_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_app_list_type',
            [
                'label' => esc_html__('App Type', 'appal'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Free', 'appal'),
                    '2' => esc_html__('Popular', 'appal'),
                    '3' => esc_html__('Most Downloaded', 'appal'),
                ]
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Top Free Apps',
            ]
        );

        $this->add_control(
            'sec_btn_text',
            [
                'label' => esc_html__('Read More Button Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'see more app',
            ]
        );


        $this->add_control(
            'sec_btn_link',
            [
                'label' => esc_html__('Read More Button link', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'sec_number_of_posts',
            [
                'label' => esc_html__('Number of Posts', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '6',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'App_slider_Style',
            [
                'label' => esc_html__('App Slider Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mobile-app-section .section-title .title-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .mobile-app-section .section-title .title-text',
            ]
        );
        $this->add_control(
            'Right_Button_Style',
            [
                'label' => __('Right Button Style', 'appal'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Button_text_colorr',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button_hoverr',
            [
                'label' => __('Button hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $sec_app_list_type = $this->get_settings_for_display('sec_app_list_type');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_btn_text = $this->get_settings_for_display('sec_btn_text');
        $sec_btn_link = $this->get_settings_for_display('sec_btn_link');
        $sec_number_of_posts = $this->get_settings_for_display('sec_number_of_posts');

        ?>

        <section class="mobile-app-section app-list clearfix">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-title clearfix">
                            <h2 class="title-text float-left mb-0"><?php echo esc_html($sec_title); ?></h2>
                            <?php if ($sec_btn_link) { ?>
                                <a class="custom-btn-underline float-right"
                                   href="<?php echo esc_url($sec_btn_link); ?>"><?php echo esc_html($sec_btn_text); ?></a>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    if ($sec_app_list_type == '2') {
                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('product'),
                            'posts_per_page' => $sec_number_of_posts,
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'meta_query' => WC()->query->get_meta_query()

                        );
                    } elseif ($sec_app_list_type == '3') {
                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('product'),
                            'posts_per_page' => $sec_number_of_posts,
                            'orderby' => 'title',
                            'order' => 'DESC',
                            'meta_query' => WC()->query->get_meta_query(),
                            'post__in' => array_merge(array(0), wc_get_product_ids_on_sale())
                        );
                    } else {
                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('product'),
                            'posts_per_page' => $sec_number_of_posts,
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => '_price',
                                    'value' => 0,
                                    'compare' => '<=',
                                    'type' => 'NUMERIC'
                                ),
                                array(
                                    'key' => '_sales_price',
                                    'value' => 0,
                                    'compare' => '<=',
                                    'type' => 'NUMERIC'
                                )
                            )

                        );
                    }


                    // The Query
                    $appal_product_query = new WP_Query($args);

                    // The Loop
                    if ($appal_product_query->have_posts()) {
                        while ($appal_product_query->have_posts()) {
                            $appal_product_query->the_post();
                            $appal_pro_img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_180_180');
                            $appal_user_options = appal_get_user_options();
                            $appal_author_name_id = get_post_meta(get_the_ID(), '_appal_wop_author', true);

                            ?>
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <div class="app-item">
                                    <div class="app-image">
                                        <img src="<?php echo esc_url($appal_pro_img_src['0']); ?>"
                                             alt="<?php echo esc_attr(get_the_title()); ?>"/>
                                        <?php woocommerce_template_loop_add_to_cart(); ?>
                                    </div>
                                    <div class="app-content">
                                        <div class="item-admin">
                                            <?php
                                            echo esc_html__('by ', 'appal');
                                            if ($appal_author_name_id) {
                                                echo esc_html($appal_user_options[$appal_author_name_id]);
                                            } else {
                                                echo esc_html(get_the_author_meta('display_name'));
                                            }
                                            ?>
                                        </div>
                                        <h3 class="item-title">
                                            <a href="<?php the_permalink(); ?>"
                                               class="title-link"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="clearfix"></div>
                                        <?php woocommerce_template_loop_rating(); ?>
                                        <div class="clearfix"></div>
                                        <?php
                                        if (appal_sale_price()) {
                                            echo '<small class="price-text">' . appal_price_currency() . appal_sale_price() . '</small>';
                                        } else {
                                            echo '<small class="free-text">' . esc_html__('Free', 'appal') . '</small>';
                                        }
                                        ?>

                                    </div>
                                </div>
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
        </section>


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Appal_App_list_Widget);
