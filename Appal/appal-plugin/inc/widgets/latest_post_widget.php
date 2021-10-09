<?php

class appal_latest_Post_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'appal-latest-post',  // Base ID
            'Appal: Latest Post'   // Name
        );

        add_action('widgets_init', function () {
            register_widget('appal_latest_Post_Widget');
        });

    }


    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $post_number = $instance['number'];
        ?>


        <div class="appal-widget-recent-posts">
            <ul class="posts">
                <?php
                // WP_Query arguments
                $lpargs = array(
                    'post_type' => array('post'),
                    'posts_per_page' => $post_number,
                    'has_password' => false
                );

                // The Query
                $appal_lp_query = new WP_Query($lpargs);

                // The Loop
                if ($appal_lp_query->have_posts()) {
                    while ($appal_lp_query->have_posts()) {
                        $appal_lp_query->the_post();
                        $permalink = get_permalink();
                        $post_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_100_100');
                        if (has_post_thumbnail()) {
                            ?>
                            <li>
                                <a href="<?php echo esc_url($permalink); ?>" class="post_widget_thumb"><img
                                            src="<?php echo esc_url($post_image['0']); ?>"
                                            alt="<?php echo esc_attr(get_the_title()); ?>" class="widget-posts-img"></a>
                                <div class="widget-posts-descr">
                                    <a href="<?php echo esc_url($permalink); ?>" class="title">
                                        <h3><?php the_title(); ?></h3></a>
                                    <div class="date">
                                        <?php
                                        echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . esc_html__('ago');
                                        ?>
                                    </div>
                                </div>
                            </li><!-- ./ single post -->

                            <?php
                        }
                    }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                ?>

            </ul>

        </div>

        <?php

        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Latest Post', 'appal');
        $number = !empty($instance['number']) ? $instance['number'] : esc_html__('3', 'appal');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'appal'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php echo esc_html__('Number of Posts:', 'appal'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text"
                   value="<?php echo esc_attr($number); ?>">
        </p>
        <?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? $new_instance['number'] : '';

        return $instance;
    }

}

$appal_latest_post = new appal_latest_Post_Widget();
?>