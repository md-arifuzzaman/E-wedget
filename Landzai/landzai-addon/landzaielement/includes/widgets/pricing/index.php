<?php
namespace Elementor;
use LandzaiElement_Elementor_Addons;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class landzai_pricing_table extends Widget_Base
{

    public function get_name()
    {
        return 'pricing-table';
    }

    public function get_title()
    {
        return __('Pricing Table', 'landzai');
    }

    public function get_categories()
    {
        return ['landzaielement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-sitemap';
    }

    public function render_plain_content($instance = [])
    {
    }

    protected function _register_controls()
    {


        $this->start_controls_section(
            'pm',
            [
                'label' => __('Pricing', 'landzai'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Choose Pricing', 'landzai' ),
            ]
        );
        $this->add_control(
            'sinfo',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                 invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'landzai' ),
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'landzai' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'One', 'landzai' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __( 'Three', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __( 'Four', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'pma',
            [
                'label' => __('Monthly', 'landzai'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Startup', 'landzai'),
            ]
        );
        $repeater->add_control(
            'active',
            [
                'label' => __( 'Active This Table', 'landzai' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Active', 'landzai' ),
                'label_off' => __( 'Inactive', 'landzai' ),
                'return_value' => 'active',
                'default' => 'inactive',
            ]
        );

        $repeater->add_control(
            'sub',
            [
                'label' => __('Sub Title', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Lorem ipsum dolor sit amet, confsectur justo. Massa augue neque proin adipisng.', 'landzai'),
            ]
        );
        $repeater->add_control(
            'price',
            [
                'label' => __('Price', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$29 <sub>/month</sub>', 'landzai'),
            ]
        );
        $repeater->add_control(
            'features',
            [
                'label' => __('Features', 'landzai'),
                'type' => LandzaiElement_Elementor_Addons::LIST_CONTROL,
            ]
        );
        $repeater->add_control(
            'button',
            [
                'label' => __('Button', 'landzai'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Start Free Trial', 'landzai'),
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'price_list',
            [
                'label' => __('Pricing Table', 'landzai'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Startup',
                    ],
                    [
                        'title' => 'Promotional',
                    ],
                    [
                        'title' => 'Enterprise',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'y_pma',
            [
                'label' => __('Yearly', 'landzai'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater2 = new Repeater();
        $repeater2->add_control(
            'y_title',
            [
                'label' => __('Title', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Startup', 'landzai'),
            ]
        );
        $repeater->add_control(
            'y_active',
            [
                'label' => __( 'Active This Table', 'landzai' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Active', 'landzai' ),
                'label_off' => __( 'Inactive', 'landzai' ),
                'return_value' => 'active',
                'default' => 'inactive',
            ]
        );
        $repeater2->add_control(
            'y_sub',
            [
                'label' => __('Sub Title', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Lorem ipsum dolor sit amet, confsectur justo. Massa augue neque proin adipisng.', 'landzai'),
            ]
        );
        $repeater2->add_control(
            'y_price',
            [
                'label' => __('Price', 'landzai'),
                'type' => Controls_Manager::TEXT,
                'default' => __('$29 <sub>/month</sub>', 'landzai'),
            ]
        );
        $repeater2->add_control(
            'y_features',
            [
                'label' => __('Features', 'landzai'),
                'type' => LandzaiElement_Elementor_Addons::LIST_CONTROL,
            ]
        );
        $repeater2->add_control(
            'y_button',
            [
                'label' => __('Button', 'landzai'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Start Free Trial', 'landzai'),
            ]
        );
        $repeater2->add_control(
            'y_link', [
                'label' => __('Link', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'y_price_list',
            [
                'label' => __('Pricing Table', 'landzai'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'y_title' => 'Startup',
                    ],
                    [
                        'y_title' => 'Promotional',
                    ],
                    [
                        'y_title' => 'Enterprise',
                    ],

                ],
                'title_field' => '{{{ y_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'landzai'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-ribbon-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-ribbon-title',
            ]
        );
        $this->add_control(
            'pricing_color',
            [
                'label' => __('Pricing Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-value h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pr_fonts',
                'label' => __('Pricing Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-value h4',
            ]
        );
        $this->add_control(
            'unit_color',
            [
                'label' => __('Unit Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-head .price-value h4 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pruu_fonts',
                'label' => __('Unit Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .price-box .price-head .price-value h4 span',
            ]
        );
        $this->add_control(
            'fe_color',
            [
                'label' => __('Feature Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-info ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fea_fonts',
                'label' => __('Feature Typography', 'landzai'),
                'selector' => '{{WRAPPER}} .price-box .price-info ul li',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => __('Button BG Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => __('Button Hover Color', 'landzai'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-box .price-bottom .btn-6:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_stick',
                'label' => __('Border Sticker', 'landzai'),
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .select_month_wrapper .split',
            ]
        );
        $this->add_responsive_control(
            'bra',
            [
                'label' => __('Border Radius Sticker', 'landzai'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .packege_pricing_area_2 .select_month_wrapper .split' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'borderss_stick',
                'label' => __('Shadow', 'landzai'),
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghhsta',
                'label' => __( 'Box Background', 'landzai' ),
                'types' => [  'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .select_month_wrapper .split',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghhst',
                'label' => __( 'Box Background', 'landzai' ),
                'types' => [  'gradient' ],
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2 .sticker',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bgghh',
                'label' => __( 'Box Background', 'landzai' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .packege_pricing_area_2 .single_pakege_2',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
    echo '    <!-- price-table-area  start here  -->
        <section class="price-table-area section" id="price">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2 class="title">'.$settings['stitle'].'</h2>
                            <p class="sub-title">'.$settings['sinfo'].'</p>
                           </div>
                    </div>
                </div>
                <div class="price-table-list m-b-30">
                    <div class="primary-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">Billed Monthly</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="annually-tab" data-toggle="tab" href="#annually" role="tab" aria-controls="annually" aria-selected="false">Billed Annually</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                <div class="row">';
                        if ($settings['price_list']) {
                            foreach ($settings['price_list'] as $monthly) {
                                echo '<div class="col-lg-4 col-md-6">
                                        <div class="single-price ' . $monthly['active'] . '">
                                            <div class="price-header">
                                                <h2 class="price">' . $monthly['price'] . '</h2>
                                                <h3 class="package-name">' . $monthly['title'] . ' </h3>
                                                <p class="package-desc">' . $monthly['sub'] . '</p>
                                            </div>
                                            <div class="price-body">
                                                <ul class="feature-lsit">';
                                                  landzai_list_control($monthly['features'], '');
                                                echo '</ul>
                                            </div>
                                            <div class="price-footer">
                                                <a ' . get_that_link($monthly['link']) . ' class="primary-btn">' . $monthly['button'] . ' <i class="icon fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        echo '</div>
                            </div>
                            <div class="tab-pane fade" id="annually" role="tabpanel" aria-labelledby="annually-tab">
                                <div class="row">';

                        if ($settings['y_price_list']) {

                            foreach ($settings['y_price_list'] as $yearly) {

                                echo '<div class="col-lg-4 col-md-6">
                                        <div class="single-price ' . $monthly['y_active'] . '">
                                            <div class="price-header">
                                                <h2 class="price">' . $yearly['y_price'] . '</h2>
                                                <h3 class="package-name">' . $yearly['y_title'] . '</h3>
                                                <p class="package-desc">' . $yearly['y_sub'] . '</p>
                                            </div>
                                            <div class="price-body">
                                                <ul class="feature-lsit">';
                                                   landzai_list_control($yearly['y_features'], '');
                                                echo '</ul>
                                            </div>
                                            <div class="price-footer">
                                                <a ' . get_that_link($yearly['y_link']) . ' class="primary-btn">' . $yearly['y_button'] . ' <i class="icon fas fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>';

                                }
                            }
                            echo '</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- price-table-area  end here  -->';
    }


    protected function content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new landzai_pricing_table());
?>