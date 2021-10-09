<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Appal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="big-blog-item clearfix">

        <div class="blog-content">
            <div class="post-meta ul-li mb-30 clearfix">

                <ul class="clearfix">
                    <li>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                           class="post-admin">
                            <span class="admin-image"><?php echo get_avatar(get_the_author_meta('user_email'), 89); ?></span>
                            <?php echo esc_html((get_the_author_meta('display_name'))); ?>
                        </a>
                    </li>
                    <li>
                        <i class='uil uil-stopwatch'></i> <?php echo esc_html(get_the_time(get_option('date_format'))); ?>
                    </li>
                </ul>
            </div>
            <div class="post-tags ul-li clearfix tag-link">
            </div>
            <h3 class="blog-title mb-30">
                <a href="<?php the_permalink(); ?>" class="title-link"><?php the_title(); ?></a>
            </h3>
            <div class="item-paragraph mb-45">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>"
               class="custom-btn-underline"><?php esc_html_e('read more', 'appal'); ?></a>
        </div>

        <?php wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'appal'),
            'after' => '</div>',
        )); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->