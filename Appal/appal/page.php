<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Appal
 */

get_header();

while (have_posts()) :
    the_post();

    $appal_hide_banner = get_post_meta(get_the_ID(), '_appal_hide_banner', true);
    $appal_page_layout = get_post_meta(get_the_ID(), '_appal_page_layout', true);

    if ($appal_hide_banner == true) {

    } else {
        appal_single_banner();
    }

    ?>

    <div id="primary" class="content-area ">
    <main id="main" class="site-main">
    <!-- blog-section - start
    ================================================== -->
    <section id="blog-details-section" class="blog-details-section sec-ptb-160 pb-0 clearfix">
    <div class="container">
    <div class="row justify-content-center">

    <?php if ($appal_page_layout == '1') { ?>
    <?php get_sidebar(); ?>
    <div class="col-lg-8 col-md-10 col-sm-12">
        <?php appal_page_loop(); ?>

    </div><!-- End col-lg-8 col-md-10 col-sm-12 -->

<?php } elseif ($appal_page_layout == '3') { ?>
    <div class="col-lg-8 col-md-10 col-sm-12">
        <?php appal_page_loop(); ?>

    </div><!-- End col-lg-8 col-md-10 col-sm-12 -->
<?php } elseif ($appal_page_layout == '4') { ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php appal_page_loop(); ?>

    </div><!-- End col-lg-8 col-md-10 col-sm-12 -->
<?php } else { ?>
    <div class="col-lg-8 col-md-10 col-sm-12">
        <?php appal_page_loop(); ?>

    </div><!-- End col-lg-8 col-md-10 col-sm-12 -->

    <?php get_sidebar(); ?>

<?php } ?>

<?php endwhile; // End of the loop.?>
    </div>
    </div>
    </section>
    </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
