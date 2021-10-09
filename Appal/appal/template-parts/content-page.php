<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Appal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-details-content big-blog-item clearfix">

        <?php if (has_post_thumbnail()) { ?>
            <div class="blog-image">
                <img src="<?php echo esc_url($appal_blog_image['0']); ?>"
                     alt="<?php echo esc_html(get_the_title()); ?>"/>

            </div>
        <?php } ?>

        <div class="blog-content blog-details-content clearfix">

            <div class="item-paragraph ">
                <?php the_content(); ?>
                <?php wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'appal'),
                    'after' => '</div>',
                )); ?>
            </div>

            <div class="clearfix"></div>

        </div>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->
