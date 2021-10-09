<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ahope_testimonial extends Widget_Base {

    public function get_name() {
        return 'ahope-testimonial';
    }

    public function get_title() {
        return __( 'Testimonial', 'ahope' );
    }
    public function get_categories() {
        return [ 'ahopeelement-addons' ];
    }
    public function get_icon() {
        return 'eicon-person';
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
                'default' => 3,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'ahope' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'One', 'ahope' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __( 'Name', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Patrick Reed', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'member_designation',
            [
                'label' => __( 'Designation', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Chairman, Kollo Company LTD.', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'member_info',
            [
                'label' => __( 'Comment', 'ahope' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Far far away, behind the word mountains, far from the countries 
                                    Vokalia and Consonantia, there live the blinds  and Separated 
                                    they live in Bookmarksgrove right at the coast of the Semantics, 
                                    language ocean. A small river named Duden flows their place and 
                                    it with the necessary regelialia. It is a country.', 'ahope' ),
            ]
        );
        $repeater->add_control(
            'member_photo', [
                'label' => __( 'Photo', 'ahope' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'member_list',
            [
                'label' => __( 'Client List', 'ahope' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __( 'Patrick Reed', 'ahope' ),
                    ],
                    [
                        'member_name' => __( 'Patrick Reed', 'ahope' ),
                    ],
                    [
                        'member_name' => __( 'Patrick Reed', 'ahope' ),
                    ],
                    [
                        'member_name' => __( 'Patrick Reed', 'ahope' ),
                    ],
                    [
                        'member_name' => __( 'Patrick Reed', 'ahope' ),
                    ],

                ],
                'title_field' => '{{{ member_name }}}',
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
                    '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __( 'Title Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial h4',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __( 'Designation Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial h4 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __( 'Designation Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial h4 span',
            ]
        );
        $this->add_control(
            'inf_color',
            [
                'label' => __( 'Info Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'inf_fonts',
                'label' => __( 'Info Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial p',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __( 'Testimonial Background', 'ahope' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bghh',
                'label' => __( 'Team Social BG', 'ahope' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'label' => __( 'Team Social BG', 'ahope' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_wrapper .swiper-slide-active .single_testionial, 
                {{WRAPPER}} .testimonial_wrapper .swiper-slide .single_testionial .ticket',
            ]
        );

        $this->add_control(
            'quote',
            [
                'label' => __( 'Show Quote', 'ahope' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'ahope' ),
                'label_off' => __( 'Hide', 'ahope' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'bullet',
            [
                'label' => __( 'Navigator Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrapper .swiper-pagination-bullet::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bullet-border',
            [
                'label' => __( 'Navigator border', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_wrapper .swiper-pagination-bullet-active' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $option = [
            'item' => $settings['slide_number'],
        ];

        include dirname(__FILE__). '/' . $settings['layout']. '.php';

    }


    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new ahope_testimonial() );
?>