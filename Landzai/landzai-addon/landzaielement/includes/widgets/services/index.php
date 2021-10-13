<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class landzai_services extends Widget_Base {

   public function get_name() {
      return 'landzai-services';
   }

   public function get_title() {
      return __( 'Landzai Services', 'landzai' );
   }
    public function get_categories() {
		return [ 'landzaielement-addons' ];
	}
   public function get_icon() { 
        return 'eicon-posts-group';
   }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Services', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Useful Features', 'landzai' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __('Info', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Amet, dui, lacus in non massa id tellus amet tincidunt. Lacus ut integer
                 blandit diam nibh pulvinar. Ultrices phasellus', 'landzai'),
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => __('Query type', 'landzai'),
                'type' => Controls_Manager::SELECT,
                'default' => 'category',
                'options' => [
                    'category' => __('Category', 'landzai'),
                    'individual' => __('Individual', 'landzai'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => __('Category', 'landzai'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('service_category'),
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
                'label' => __('Posts', 'landzai'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('services'),
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
                'label' => __('Posts Per Page', 'landzai'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => __( 'Button Icon', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('VIEW', 'landzai'),
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
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __( 'Style', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titleh_color',
            [
                'label' => __( 'Title Hover Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item h4:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .service .item h4',
            ]
        );
        $this->add_control(
            'post_in_color',
            [
                'label' => __( 'Info Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihii',
                'label' => __( 'Info Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .service .item p',
            ]
        );
        $this->add_control(
            'icon_c',
            [
                'label' => __( 'Icon Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_cl',
            [
                'label' => __( 'Icon Hover', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg',
            [
                'label' => __( 'Icon Hover Background', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .hexagon:before, 
                    {{WRAPPER}} .service .item:hover .hexagon:after, {{WRAPPER}} .service .item:hover .hexagon' => 'border-color: {{VALUE}}; background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btnt',
                'label' => __( 'Button Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .service .item .thm-btn',
            ]
        );
        $this->add_control(
            'btn_c',
            [
                'label' => __( 'Button Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg',
            [
                'label' => __( 'Button Background', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hc',
            [
                'label' => __( 'Button Hover Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bgh',
            [
                'label' => __( 'Button Hover Background', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __( 'Row Gap', 'landzai' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $per_page = $settings['posts_per_page'];
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];


        if($settings['query_type'] == 'category'){
            $query_args = array(
                'post_type' => 'services',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service_category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ) ,
                ) ,
            );
        }

        if($settings['query_type'] == 'individual'){
            $query_args = array(
                'post_type' => 'services',
                'posts_per_page' => $per_page,
                'post__in' =>$id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);

        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


    protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_services() );
?>