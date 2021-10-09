<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ahope_whybest extends Widget_Base {

    public function get_name() {
        return 'ahope-whybest';
    }

    public function get_title() {
        return __( 'Why Best', 'ahope' );
    }
    public function get_categories() {
        return [ 'ahopeelement-addons' ];
    }
    public function get_icon() {
        return 'eicon-thumbnails-half';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ahope' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slide_number',
            [
                'label' => __('Slide Number', 'ahope'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'ahope' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'one' => [
                        'title' => __( 'One', 'ahope' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'two' => [
                        'title' => __( 'Two', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'one',
                'toggle' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'heading',
            [
                'label' => __( 'Heading', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'SSD Server', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'info',
            [
                'label' => __( 'Info', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We have many server stetion all over the world, thats why we can provide smooth
                                    hosting service, We have', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'feature',
            [
                'label' => __( 'Feature', 'ahope' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<li>Free Website Builder</li>
                                    <li>Free Domain Registration</li>
                                    <li>24/7 Quality Support</li>', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'photo', [
                'label' => __( 'Photo', 'ahope' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'ahope' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ahope' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'feature_list',
            [
                'label' => __( 'Feature List', 'ahope' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],
                    [
                        'heading' => __( 'SSD Server', 'ahope' ),
                    ],

                ],
                'title_field' => '{{{ heading }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'ahope' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item .author .title h5, 
                    {{WRAPPER}} .testimonial-style2 .testimonial-item .author .title h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __( 'Title Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial .testimonial-item .author .title h5, 
                {{WRAPPER}} .testimonial-style2 .testimonial-item .author .title h5',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __( 'Designation Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item .author .title p, 
                    {{WRAPPER}} .testimonial-style2 .testimonial-item .author .title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __( 'Designation Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial .testimonial-item .author .title p, 
                {{WRAPPER}} .testimonial-style2 .testimonial-item .author .title p',
            ]
        );
        $this->add_control(
            'inf_color',
            [
                'label' => __( 'Info Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item .content p, 
                    {{WRAPPER}} .testimonial-style2 .testimonial-item .content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'inf_fonts',
                'label' => __( 'Info Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial .testimonial-item .content p, 
                {{WRAPPER}} .testimonial-style2 .testimonial-item .content p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __( 'Nav BG', 'ahope' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'label' => __( 'Team Social BG', 'ahope' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial .owl-nav button:hover i, 
                {{WRAPPER}} .testimonial-style2 .owl-dots .owl-dot span',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $option = [
            'item' => $settings['slide_number'],
        ];
    ?>
    <section class="service_carousel_area_2" data-ahope='<?php echo wp_json_encode($option) ?>'>
       <?php
       echo ' <!-- Start Offer Section -->
            <div class="row">
                <div class="swiper-container service_carousel">
                    <div class="swiper-wrapper">';
                    if ($settings['feature_list']) {
                        foreach ($settings['feature_list'] as $feature) {
                            echo '<div class="swiper-slide">
                            <div class="single_service_item_6">
                                <h3>' . $feature['heading'] . '</h3>
                                <p>' . $feature['info'] . '</p>
                                <ul class="service_list">
                                    ' . $feature['feature'] . '
                                </ul>
                                <a href="' . get_that_link($feature['link']) . '" class="boxed_btn"><span>Get It!</span><i
                                        class="ti-angle-double-right"></i></a>
                                ' . get_that_image($feature['photo']) . '
                            </div>
                        </div>';
                        }
                    }
                    echo '</div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
    </section>
    <!-- End Offer Section -->
    ';

    }


    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new ahope_whybest() );
?>