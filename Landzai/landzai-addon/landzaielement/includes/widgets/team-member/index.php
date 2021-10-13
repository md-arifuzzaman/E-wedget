<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class landzai_team extends Widget_Base {

    public function get_name() {
        return 'landzai-team';
    }
 
    public function get_title() {
        return __('Team', 'landzai');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['landzaielement-addons'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Got A Question?', 'landzai' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                 tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'landzai' ),
            ]
        );
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'landzai' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            't_title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Jerome Bell', 'landzai' ),
            ]
        );
        $repeater->add_control(
            't_desig',
            [
                'label' => __( 'Designation', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'UI/UX Designer', 'landzai' ),
            ]
        );
        $repeater->add_control(
			'icon1',
			[
				'label' => __( 'Social Icons 1', 'landzai' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brand',
				],
			]
		);
        $repeater->add_control(
            'link1', [
                'label' => __('Link 1', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
			'icon2',
			[
				'label' => __( 'Social Icons 2', 'landzai' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brand',
				],
			]
		);
        $repeater->add_control(
            'link2', [
                'label' => __('Link 2', 'landzai'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
			'icon3',
			[
				'label' => __( 'Social Icons 3', 'landzai' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'brand',
				],
			]
		);
        $repeater->add_control(
            'link3', [
                'label' => __('Link 3', 'landzai'),
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
            'team_list',
            [
                'label' => __( 'Team List', 'landzai' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        't_title' => __( 'UI/UX Designer', 'landzai' ),
                    ],
                    [
                        't_title' => __( 'UI/UX Designer', 'landzai' ),
                    ],
                    [
                        't_title' => __( 'UI/UX Designer', 'landzai' ),
                    ],

                ],
                'title_field' => '{{{ t_title }}}',
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'General', 'landzai' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'slider_number',
            [
                'label' => __('Slider Number', 'landzai'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titlea_color',
            [
                'label' => __( 'Title Active Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box h4' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .overlay-box p',
            ]
        );
        $this->add_control(
            'hh_caa',
            [
                'label' => __( 'Button Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaaccc',
                'label' => __( 'Button Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box .read-more',
            ]
        );
        $this->add_control(
            'icon_cb',
            [
                'label' => __( 'Overlay BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .overlay-box, 
                    {{WRAPPER}} .why-chooseus .single-item .inner-box .image-box .caption' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();

        echo'<!-- team area start  here  -->
        <div class="team-area section-top pb-90 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section-title-four mb-45 text-center ">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <p class="sub-title">'.$settings['info'].'</p>
                        </div>
                    </div>
                </div>
                <div class="row">';
                if ($settings['team_list']) {
                    foreach ($settings['team_list'] as $team) {
                    echo '<div class="col-lg-4 col-ld-4 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-thumbnail">
                                <a href="#">'.get_that_image($team['image']).'</a>
                            </div>
                            <div class="member-info">
                                <h3><a href="#">'.$team['t_title'].'</a></h3>
                                <h4>'.$team['t_desig'].'</h4>
                                <ul class="member-social-media">
                                    <li><a '.get_that_link($team['link1']).'>';\Elementor\Icons_Manager::render_icon( $team['icon1'], [ 'aria-hidden' => 'true' ] );echo'</a></li>
                                    <li><a '.get_that_link($team['link2']).'>';\Elementor\Icons_Manager::render_icon( $team['icon2'], [ 'aria-hidden' => 'true' ] );echo'</a></li>
                                    <li><a '.get_that_link($team['link3']).'>';\Elementor\Icons_Manager::render_icon( $team['icon3'], [ 'aria-hidden' => 'true' ] );echo'</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>';
                }
            }
            echo '</div>
            </div>
        </div>
        <!-- team area end  here  -->';

    }


}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_team() );