<?php
/**
 * Template Name: Blog Style
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Appal
 */

get_header();
appal_blog_banner();
$appal_page_layout = get_post_meta(get_the_ID(), '_appal_page_layout', true);
?>

    <div id="primary" class="content-area blog-style-page">
        <main id="main" class="site-main">
            <!-- blog-section - start
                ================================================== -->
            <section id="blog-section" class="blog-section clearfix">
                <div class="container">
                    <div class="row justify-content-center">

                        <?php if ($appal_page_layout == '1') { ?>
                            <?php get_sidebar(); ?>
                            <div class="col-lg-8 col-md-10 col-sm-12">
                                <div class="row">
                                    <?php appal_post_style_loop(); ?>
                                </div>
                            </div><!-- End col-lg-8 col-md-10 col-sm-12 -->

                        <?php } elseif ($appal_page_layout == '3') { ?>
                            <div class="col-lg-8 col-md-10 col-sm-12">
                                <div class="row">
                                    <?php appal_post_style_loop(); ?>
                                </div>
                            </div><!-- End col-lg-8 col-md-10 col-sm-12 -->
                        <?php } elseif ($appal_page_layout == '4') { ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <?php appal_post_style_loop(); ?>
                                </div>
                            </div><!-- End col-lg-8 col-md-10 col-sm-12 -->
                        <?php } else { ?>
                            <div class="col-lg-8 col-md-10 col-sm-12">
                                <div class="row">
                                    <?php appal_post_style_loop(); ?>
                                </div>
                            </div><!-- End col-lg-8 col-md-10 col-sm-12 -->

                            <?php get_sidebar(); ?>

                        <?php } ?>

                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
