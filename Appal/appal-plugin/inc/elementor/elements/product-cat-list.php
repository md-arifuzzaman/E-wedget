<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class Appal_Product_Cat_List_Widget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-product-cat-list';
    }

    public function get_icon()
    {

        return 'eicon-text-area';
    }

    public function get_title()
    {
        return esc_html__('Product Category List', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_product_cat_content',
            [
                'label' => esc_html__('Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Search our all app by Categories',
            ]
        );

        $this->add_control(
            'sec_sub_title',
            [
                'label' => esc_html__('Sub Title', 'appal'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'We would like to take the opportunity to introduce to you our company and services.Our Company has an experience of almost 10 years ',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'Product_Cat_List',
            [
                'label' => esc_html__('Product Cat List', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->add_control(
            'titlee_color',
            [
                'label' => __('Content Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .paragraph-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titleee_fonts',
                'label' => __('Content Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .paragraph-text',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_sub_title = $this->get_settings_for_display('sec_sub_title');

        ?>

        <section id="app-Category-section" class="app-Category-section clearfix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8 col-sm-12">
                        <div class="section-title mb-60 text-center">
                            <h2 class="title-text mb-30"><?php echo esc_html($sec_title); ?></h2>
                            <p class="paragraph-text mb-0">
                                <?php echo appal_wp_kses($sec_sub_title); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <?php
                    $terms = get_terms('product_cat');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) { ?>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="category-item clearfix">
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?>
                                        (<?php echo esc_html($term->count); ?>)</a>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </section>


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Appal_Product_Cat_List_Widget);
