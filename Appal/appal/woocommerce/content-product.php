<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$appal_pro_img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'appal_image_180_180');
$appal_user_options = appal_get_user_options();
$appal_author_name_id = get_post_meta(get_the_ID(), '_appal_wop_author', true);

?>

<div <?php wc_product_class('col-lg-3 col-md-4 col-sm-12', $product); ?>>
    <div class="app-item">
        <div class="app-image">
            <img src="<?php echo esc_url($appal_pro_img_src['0']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"/>
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
        <div class="app-content">
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
            <h3 class="item-title">
                <a href="<?php the_permalink(); ?>" class="title-link"><?php the_title(); ?></a>
            </h3>
            <div class="clearfix"></div>
            <?php woocommerce_template_loop_rating(); ?>
            <div class="clearfix"></div>
            <?php
            if (appal_sale_price()) {
                echo '<small class="price-text">' . appal_price_currency() . appal_sale_price() . '</small>';
            } else {
                echo '<small class="free-text">' . esc_html__('Free', 'appal') . '</small>';
            }
            ?>

        </div>
    </div>
</div>
