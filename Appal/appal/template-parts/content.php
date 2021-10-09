<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Appal
 */
$appal_categories_list = get_the_category_list(esc_html__('  ', 'appal'));
$appal_blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_767_430');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="big-blog-item clearfix">
        <?php if (has_post_thumbnail()) { ?>
            <div class="blog-image">
                <img src="<?php echo esc_url($appal_blog_image['0']); ?>"
                     alt="<?php echo esc_html(get_the_title()); ?>"/>
                <div class="post-category">
                    <?php echo appal_wp_kses($appal_categories_list); ?>
                </div>
            </div>
        <?php } ?>

        <div class="blog-content">
            <div class="post-meta blog-det-meta clearfix">
                <p class="float-left">
                    <?php esc_html_e('Posted By ', 'appal'); ?> <a
                            href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html((get_the_author_meta('display_name'))); ?></a> <?php esc_html_e('on ', 'appal'); ?>
                    <span><?php echo esc_html(get_the_time(get_option('date_format'))); ?></span>
                </p>

                <p class="float-right">
                    <i class='ti-comment'></i> <?php comments_popup_link('0 Comments', '1 Comment ', '% Comments ', 'comments-link', ' 0 Comments '); ?>
                </p>

            </div>

            <h3 class="blog-title mb-30">
                <a href="<?php the_permalink(); ?>" class="title-link"><?php the_title(); ?></a>
            </h3>
            <div class="item-paragraph mb-20">
                <?php the_excerpt(); ?>
                <?php wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'appal'),
                    'after' => '</div>',
                )); ?>
            </div>
            <a href="<?php the_permalink(); ?>"
               class="custom-btn-underline"><?php esc_html_e('read more', 'appal'); ?></a>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
