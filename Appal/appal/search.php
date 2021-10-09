<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Appal
 */

get_header();
appal_search_banner();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <!-- blog-section - start
            ================================================== -->
            <section id="blog-section" class="blog-section sec-ptb-160 pb-0 clearfix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 col-sm-12">

                            <?php
                            if (have_posts()) :

                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();

                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', 'search');

                                endwhile; ?>

                                <div class="pagination-nav ul-li-center clearfix">
                                    <div class="pagination clearfix">
                                        <!-- pagination -->
                                        <?php the_posts_pagination(array(
                                            'mid_size' => 2,
                                            'prev_text' => appal_wp_kses('<i class="uil uil-angle-left"></i>'),
                                            'next_text' => appal_wp_kses('<i class="uil uil-angle-right"></i>'),
                                        )); ?>
                                    </div>
                                </div>
                            <?php

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif;
                            ?>
                        </div><!-- End col-lg-8 col-md-10 col-sm-12 -->

                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->


<?php

get_footer();
