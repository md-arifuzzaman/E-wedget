<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
appal_shop_banner(); ?>
    <section id="mobile-app-section" class="mobile-app-section clearfix">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <!-- blog-section - start
                ================================================== -->
                <section id="shop-page" class="sec-ptb-160 pb-0 clearfix">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <?php
                                /**
                                 * Hook: woocommerce_before_main_content.
                                 *
                                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                                 * @hooked woocommerce_breadcrumb - 20
                                 * @hooked WC_Structured_Data::generate_website_data() - 30
                                 */
                                do_action('woocommerce_before_main_content');

                                ?>


                                <?php
                                if (woocommerce_product_loop()) { ?>


                                    <div class="row justify-content-lg-between">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h3 class="tab-pane-title mb-0"><?php woocommerce_result_count(); ?></h3>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="option-form">
                                                <?php woocommerce_catalog_ordering(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    woocommerce_product_loop_start();

                                    if (wc_get_loop_prop('total')) {
                                        while (have_posts()) {
                                            the_post();

                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action('woocommerce_shop_loop');

                                            wc_get_template_part('content', 'product');
                                        }
                                    }

                                    woocommerce_product_loop_end();

                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    do_action('woocommerce_after_shop_loop');
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action('woocommerce_no_products_found');
                                }

                                /**
                                 * Hook: woocommerce_after_main_content.
                                 *
                                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                                 */
                                do_action('woocommerce_after_main_content'); ?>
                            </div><!-- End col-lg-9 col-md-12 col-sm-12 -->
                            <?php get_sidebar('shop'); ?>
                        </div>
                    </div>
                </section>
            </main><!-- #main -->
        </div><!-- #primary -->
    </section>
<?php
get_footer('shop');
