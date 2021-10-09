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
$permalink = get_permalink(get_the_ID());
$title = get_the_title();
$appal_embede_code = get_post_meta(get_the_ID(), '_appal_embed_code', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-details-content big-blog-item clearfix">

        <?php if ($appal_embede_code) { ?>

            <div class="blog-image">
                <div class="post_audio_video embed-responsive embed-responsive-16by9">
                    <?php echo appal_wp_kses($appal_embede_code); ?>
                </div>
            </div>

        <?php } elseif (has_post_thumbnail()) { ?>
            <div class="blog-image">
                <img src="<?php echo esc_url($appal_blog_image['0']); ?>"
                     alt="<?php echo esc_html(get_the_title()); ?>"/>

            </div>
        <?php } ?>

        <div class="blog-content blog-details-content clearfix">
            <div class="post-meta ul-li mb-30">

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


            <div class="item-paragraph ">
                <?php the_content(); ?>
                <?php wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'appal'),
                    'after' => '</div>',
                )); ?>
            </div>

            <div class="clearfix"></div>

            <?php appal_post_footer(); ?>


        </div>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
