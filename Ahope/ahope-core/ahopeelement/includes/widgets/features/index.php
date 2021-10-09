<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class features_block extends Widget_Base {

    public function get_name() {
        return 'features-block';
    }
 
    public function get_title() {
        return __('Features block', 'ahope');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['ahopeelement-addons'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Features', 'ahope' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => __('Query type', 'ahope'),
                'type' => Controls_Manager::SELECT,
                'default' => 'individual',
                'options' => [
                    'category' => __('Category', 'ahope'),
                    'individual' => __('Individual', 'ahope'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => __('Category', 'ahope'),
                'type' => Controls_Manager::SELECT2,
                'options' => ahope_drop_cat('feature_category'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                ],
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => __('Posts', 'ahope'),
                'type' => Controls_Manager::SELECT2,
                'options' => ahope_drop_posts('features'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'ahope'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'ahope' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'Layout 1', 'ahope' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Layout 2', 'ahope' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __( 'Layout 3', 'ahope' ),
                        'icon' => 'eicon-posts-masonry',
                    ],
                    'layout4' => [
                        'title' => __( 'Layout 4', 'ahope' ),
                        'icon' => 'eicon-time-line',
                    ],
                    'layout5' => [
                        'title' => __( 'Layout 5', 'ahope' ),
                        'icon' => 'eicon-time-line',
                    ],
                    'layout6' => [
                        'title' => __( 'Layout 6', 'ahope' ),
                        'icon' => 'eicon-time-line',
                    ],
                    'layout7' => [
                        'title' => __( 'Layout 7', 'ahope' ),
                        'icon' => 'eicon-time-line',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_settings',
            [
                'label' => __( 'General', 'ahope' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .single_feature_item_4 h3',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_colors',
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single_feature_item_4 h3',
            ]
        );
        $this->add_control(
            'hh_ca',
            [
                'label' => __( 'Info Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_feature_item_4 p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaaccc',
                'label' => __( 'Info Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .single_feature_item_4 p',
            ]
        );
        $this->add_control(
            'hh_cabtn',
            [
                'label' => __( 'Button Color', 'ahope' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_feature_item_4 .boxed_btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'titleaa_colors',
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single_feature_item_4 h3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaaccabc',
                'label' => __( 'Button Typography', 'ahope' ),
                'selector' => '{{WRAPPER}} .single_feature_item_4 .boxed_btn:hover',
            ]
        );
        $this->add_control(
			'Border Radius',
			[
				'label' => __( 'Border Radius', 'ahope' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .single_feature_item_3:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();

        $per_page = $settings['posts_per_page'];
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];


        if($settings['query_type'] == 'category'){
            $query_args = array(
                'post_type' => 'features',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'feature_category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ) ,
                ) ,
            );
        }

        if($settings['query_type'] == 'individual'){
            $query_args = array(
                'post_type' => 'features',
                'posts_per_page' => $per_page,
                'post__in' =>$id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);

        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new features_block() );