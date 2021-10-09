<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6'); ?>>
    <div class="single_blog_item_5">
        <?php if (has_post_thumbnail()) : ?>
            <div class="blog_img">
                <a href="<?php echo esc_url(get_permalink()) ?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        <?php endif; ?>
        <div class="blog_content">
            <h2><a href="<?php echo esc_url(get_permalink()) ?>"><?php the_title(); ?></a></h2>
            <div class="blog_meta_list d-flex">
                <a href="<?php echo esc_url(get_day_link(false, false, false)); ?>" class="b_date"><i
                            class="ti-calendar"></i><?php echo get_the_time('j M Y'); ?></a>
                <div class="b_tags"><i class="ti-tag"></i><?php ahope_post_tag(); ?></div>
            </div>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php echo esc_url(get_permalink()) ?>"
               class="boxed_btn"><?php esc_html_e('Learn More', 'ahope'); ?> <i
                        class="ti-angle-double-right"></i></a>
        </div>
    </div>
</div>