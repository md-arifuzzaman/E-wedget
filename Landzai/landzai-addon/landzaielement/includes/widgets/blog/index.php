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
                'label' => __('Title', 'landzai'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('How It Works', 'landzai'),
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
                'default' => 6,
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
                ],
                'default' => 'layout1',
                'toggle' => true,
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
        $layout = $settings['layout'];


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
if ($layout == 'layout1') {
    
echo'<!-- blog ara start here  -->
<section class="blog-area section pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">' . $settings['title'] . '</h2>
                    <p class="sub-title">' . $settings['info'] . '</p>
                </div>
            </div>
        </div>
        <div class="row">';
        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                echo '<div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="' . get_the_permalink() . '">';
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        }
                        echo '</a>
                    </div>
                    <div class="blog-info">
                        <h3 class="blog-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                        <ul class="blog-meta">
                            <li><a href="#"><i class="far fa-calendar"></i> 21st September,2020</a></li>
                            <li><a href="#"><i class="far fa-clock"></i> 10 Min To Read</a></li>
                        </ul>
                        <p class="blog-cotent">' . get_the_excerpt() . '</p>
                        <a href="single-blog.html" class="blog-btn">Read More</a>
                    </div>
                </div>
            </div>
            ';
        }
        wp_reset_postdata();
    }
    echo ' 
        </div>
    </div>
</section>
<!-- blog ara end here  -->';
}else {
    echo '<section class="small-post-column">
       <div class="post-list">';
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            echo '<div class="post">
                <div class="post-thumb">
                    <a href="' . get_the_permalink() . '">';
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                echo '</a>
                </div>
            <a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>
            <div class="post-info"><i class="far fa-clock"></i>   ' . get_the_date('M j') . '</div>
        </div>';
        }
        wp_reset_postdata();
    }
    echo '</div>
            </section>';
}
    }
    protected function _content_template() {}

    protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new landzai_blog() );
?>