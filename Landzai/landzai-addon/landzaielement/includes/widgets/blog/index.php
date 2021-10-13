<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class landzai_blog extends Widget_Base {

   public function get_name() {
      return 'landzai-blog';
   }

   public function get_title() {
      return __( 'Blog', 'landzai' );
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
                'label' => __( 'Blog', 'landzai' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Read The Latest News Here', 'landzai' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'landzai' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                 invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'landzai' ),
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => __('Query type', 'landzai'),
                'type' => Controls_Manager::SELECT,
                'default' => 'individual',
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
                'options' => ae_drop_cat('category'),
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
                'options' => ae_drop_posts('post'),
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
                'default' => 3,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'landzai' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'Layout 1', 'landzai' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Layout 2', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout3' => [
                        'title' => __( 'Layout 3', 'landzai' ),
                        'icon' => 'eicon-post-slider',
                    ],
                    'layout4' => [
                        'title' => __( 'Layout 4', 'landzai' ),
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
                    '{{WRAPPER}} .default-blog .caption a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .default-blog .caption a',
            ]
        );
        $this->add_control(
            'post_inhaa_color',
            [
                'label' => __( 'Meta Color', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .default-blog .post-meta span, 
                    {{WRAPPER}} .default-blog .post-meta i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __( 'Meta Typography', 'landzai' ),
                'selector' => '{{WRAPPER}} .default-blog .post-meta span, 
                {{WRAPPER}} .default-blog .post-meta i',
            ]
        );
        $this->add_control(
            'post_bg',
            [
                'label' => __( 'Post BG', 'landzai' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .default-blog .caption' => 'background: {{VALUE}}',
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
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ) ,
                ) ,
            );
        }

        if($settings['query_type'] == 'individual'){
            $query_args = array(
                'post_type' => 'post',
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
Plugin::instance()->widgets_manager->register_widget_type( new landzai_blog() );
?>