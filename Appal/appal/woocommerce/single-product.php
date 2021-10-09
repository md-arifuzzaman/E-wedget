<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header('shop');

$appal_pro_img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_180_180');
$appal_wop_banner_opt = get_post_meta(get_the_ID(), '_appal_wop_banner_opt', true);
$appal_user_options = appal_get_user_options();
$appal_author_name_id = get_post_meta(get_the_ID(), '_appal_wop_author', true);

if ($appal_wop_banner_opt == '2') {
    appal_single_product_search_banner();
} else {
    appal_single_shop_banner();
}
?>

    <section id="app-details-section" class="app-details-section sec-ptb-160 pb-0 clearfix">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="app-details-content clearfix">
                            <div class="app-item">
                                <div class="app-image">
                                    <img src="<?php echo esc_url($appal_pro_img_src['0']); ?>"
                                         alt="<?php echo esc_attr(get_the_title()); ?>"/>
                                </div>
                                <div class="app-content clearfix">
                                    <div class="item-admin">
                                        <?php
                                        echo esc_html__('by ', 'appal');
                                        if ($appal_author_name_id) {
                                            echo esc_html($appal_user_options[$appal_author_name_id]);
                                        } else {
                                            echo esc_html(get_the_author_meta('display_name'));
                                        }

                                        ?>
                                    </div>
                                    <h3 class="item-title"><?php the_title(); ?></h3>

                                    <div class="item-tag ul-li clearfix">
                                        <ul class="clearfix">
                                            <?php $cat_name = get_the_terms(get_the_id(), 'product_cat');
                                            if (!empty($cat_name) && !is_wp_error($cat_name)) {
                                                foreach ($cat_name as $term) {
                                                    echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>' . '  ';
                                                }

                                            } ?>
                                        </ul>
                                    </div>
                                    <?php
                                    if (appal_sale_price()) {
                                        echo '<small class="free-text">' . appal_price_currency() . appal_sale_price() . '</small>';
                                    } else {
                                        echo '<small class="free-text">' . esc_html__('Free', 'appal') . '</small>';
                                    }
                                    ?>
                                </div>
                                <div class="btns-group ul-li clearfix">
                                    <ul class="clearfix">
                                        <li><?php woocommerce_template_loop_add_to_cart(); ?></li>
                                    </ul>
                                </div>
                                <div class="rating-star ul-li clearfix">
                                    <?php woocommerce_template_single_rating(); ?>
                                </div>
                            </div>

                            <div class="overall-review">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="overall-review-nav ul-li clearfix">
                                            <ul class="nav" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab"
                                                       href="#about-pane"><?php echo esc_html__('about', 'appal'); ?></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                       href="#overview-pane"><?php echo esc_html__('overview', 'appal'); ?></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-toggle="tab"
                                                       href="#review-pane"><?php echo esc_html__('reviews', 'appal'); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="write-review-btn text-right">
                                            <a href="#reviews"><?php echo esc_html__('write a review', 'appal'); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="about-pane" class="tab-pane active">
                                        <?php the_content(); ?>
                                    </div>
                                    <div id="overview-pane" class="tab-pane fade">
                                        <?php woocommerce_template_single_excerpt(); ?>
                                    </div>

                                    <div id="review-pane" class="tab-pane fade">
                                        <?php woocommerce_output_product_data_tabs(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; // end of the loop. ?>

                <?php get_sidebar('shop2'); ?>


            </div>
        </div>
    </section>


    <!-- app-details-page-2 - end -->
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
