<?php
/**
 * Template Name: Page Builder Template
 *
 *
 * @package appal
 */

get_header();

$appal_hide_banner = get_post_meta(get_the_ID(), '_appal_hide_banner', true);

if ($appal_hide_banner == true) {

} else {
    appal_single_banner();
}

?>

<div class="clearfix"></div>

<div id="elementor_page_builder">

    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // End of the loop. ?>

</div><!-- #main -->

<div class="clearfix"></div>

<?php get_footer(); ?>
