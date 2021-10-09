<?php

// File Security Check
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit;
}


class appalBlogWidget extends Elementor\Widget_Base
{
    public function get_name()
    {

        return 'appal-blog';
    }

    public function get_icon()
    {

        return 'eicon-sidebar';
    }

    public function get_title()
    {
        return esc_html__('Blog', 'appal');
    }

    public function get_categories()
    {
        return ['appal-category'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'appal_blog_content',
            [
                'label' => esc_html__('Blog Content', 'appal'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sec_subtitle',
            [
                'label' => esc_html__('Sub Title ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'blog post',
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__('Title', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Recent News Update',
            ]
        );


        $this->add_control(
            'sec_read_more_text',
            [
                'label' => esc_html__('Read More Text', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
            ]
        );

        $this->add_control(
            'number_of_post',
            [
                'label' => esc_html__('Number of Post ', 'appal'),
                'type' => Controls_Manager::TEXT,
                'default' => '-1',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'Blog',
            [
                'label' => esc_html__('Blog Header Style', 'appal'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Sub_title_color',
            [
                'label' => __('Sub Title Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .sub-title',
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
                'name' => 'title_typographyy',
                'label' => __('Typography', 'appal'),
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );
        $this->add_control(
            'blog_colorr',
            [
                'label' => __('Blog Title', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-section .big-blog-item .blog-content .blog-title .title-link, .blog-section .blog-grid-item .blog-content .blog-title .title-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'blogg_colorr',
            [
                'label' => __('Blog Title Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-section .big-blog-item .blog-content .blog-title .title-link, .blog-section .blog-grid-item .blog-content .blog-title .title-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_typographyy',
                'label' => __('Blog Typography', 'appal'),
                'selector' => '{{WRAPPER}} .blog-section .big-blog-item .blog-content .blog-title .title-link, .blog-section .blog-grid-item .blog-content .blog-title .title-link',
            ]
        );
        $this->add_control(
            'Button_text_color',
            [
                'label' => __('Button Text Color', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-section .blog-grid-item .blog-content .custom-btn-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Buttonn_hoverr',
            [
                'label' => __('Button Hover', 'appal'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-section .blog-grid-item .blog-content .custom-btn-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $sec_subtitle = $this->get_settings_for_display('sec_subtitle');
        $sec_title = $this->get_settings_for_display('sec_title');
        $sec_read_more_text = $this->get_settings_for_display('sec_read_more_text');
        $number_of_post = $this->get_settings_for_display('number_of_post');

        ?>


        <!-- blog-section - start
        ================================================== -->
        <section id="blog-section" class="blog-section paddingtop-0 clearfix">
            <div class="container">

                <div class="section-title mb-100 text-center">
                    <span class="sub-title mb-15"><?php echo esc_html($sec_subtitle); ?></span>
                    <h2 class="title-text mb-0"><?php echo esc_html($sec_title); ?></h2>
                </div>

                <div id="blog-carousel" class="blog-carousel owl-carousel owl-theme">

                    <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type' => array('post'),
                        'posts_per_page' => $number_of_post,
                    );

                    // The Query
                    $appal_blog_query = new WP_Query($args);

                    // The Loop
                    if ($appal_blog_query->have_posts()) {
                        while ($appal_blog_query->have_posts()) {
                            $appal_blog_query->the_post();
                            $appal_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_368_239');
                            $appal_categories_list = get_the_category_list(esc_html__('  ', 'appal'));

                            ?>

                            <div class="item">
                                <div class="blog-grid-item clearfix">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="blog-image">
                                            <img src="<?php echo esc_url($appal_blog_image[0]) ?>"
                                                 alt="<?php echo esc_attr(get_the_title()); ?>">
                                            <div class="post-category">
                                                <?php echo appal_wp_kses($appal_categories_list); ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="blog-content">
                                        <div class="post-meta blog-det-meta clearfix">
                                            <p class="float-left">
                                                <?php esc_html_e('Posted By ', 'appal'); ?> <a
                                                        href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html((get_the_author_meta('display_name'))); ?></a>
                                            </p>

                                            <p class="float-right">
                                                <i class='ti-comment'></i> <?php comments_popup_link('0 Comments', '1 Comment ', '% Comments ', 'comments-link', ' 0 Comments '); ?>
                                            </p>

                                        </div>


                                        <h3 class="blog-title mb-0">
                                            <a href="<?php the_permalink(); ?>"
                                               class="title-link"><?php the_title(); ?></a>
                                        </h3>

                                        <a href="<?php the_permalink(); ?>"
                                           class="custom-btn-underline"><?php echo esc_html($sec_read_more_text); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // do something
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
        <!-- blog-section - end
        ================================================== -->


        <?php

    }

}

Elementor\Plugin::instance()->widgets_manager->register_widget_type(new appalBlogWidget);
