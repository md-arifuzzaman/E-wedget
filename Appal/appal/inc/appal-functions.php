<?php
function appal_header()
{

    global $appal;

    $appal_header_color_opt = '';
    $appal_sticky_header_color_opt = '';
    $appal_button_opt = '';
    $appal_btn_text = '';
    $appal_btn_link = '';

    if (isset($appal['appal_header_color_opt'])) {
        $appal_header_color_opt = $appal['appal_header_color_opt'];
    }

    if (isset($appal['appal_sticky_header_color_opt'])) {
        $appal_sticky_header_color_opt = $appal['appal_sticky_header_color_opt'];
    }

    if (isset($appal['appal_button_opt'])) {
        $appal_button_opt = $appal['appal_button_opt'];
    }

    if (isset($appal['appal_btn_text'])) {
        $appal_btn_text = $appal['appal_btn_text'];
    }

    if (isset($appal['appal_btn_link'])) {
        $appal_btn_link = $appal['appal_btn_link'];
    }

    $appal_custom_logo_id = get_theme_mod('custom_logo');
    $appal_custom_logo = wp_get_attachment_image_src($appal_custom_logo_id, 'full');
    $appal_meta_upload_logo_img = get_post_meta(get_the_ID(), '_appal_meta_upload_logo_img', true);
    $appal_header_layout = get_post_meta(get_the_ID(), '_appal_header_layout', true);
    $appal_header_styles = get_post_meta(get_the_ID(), '_appal_header_styles', true);
    $appal_sticky_header_styles = get_post_meta(get_the_ID(), '_appal_sticky_header_styles', true);
    $appal_sep_header_opt = get_post_meta(get_the_ID(), '_appal_sep_header_opt', true);

    if ($appal_sep_header_opt == true) {
        echo '<div class="app-details-page-2">';
    }

    ?>


    <!-- header-section - start
    ================================================== -->
    <header id="header-section" class="header-section
<?php

    if ($appal_header_styles) {
        if ($appal_header_styles == '1' && !is_search()) {
            echo esc_attr('black-content');
        } elseif ($appal_header_styles == '2' && !is_search()) {
            echo esc_attr('white-content');
        }
    } else {
        if ($appal_header_color_opt == '1') {
            echo esc_attr('black-content');
        } elseif ($appal_header_color_opt == '2') {
            echo esc_attr('white-content');
        } else {
            echo esc_attr('white-content');
        }
    }
    if ($appal_header_color_opt == '1' && is_search()) {
        echo esc_attr('black-content');
    } elseif ($appal_header_color_opt == '2' && is_search()) {
        echo esc_attr('white-content');
    }

    if ($appal_sticky_header_styles == '2' || $appal_sticky_header_color_opt == '2') {
        echo esc_attr(' pink_sticky_header ');
    } elseif ($appal_sticky_header_styles == '3' || $appal_sticky_header_color_opt == '3') {
        echo esc_attr(' blue_gradient_sticky_header ');
    } elseif ($appal_sticky_header_styles == '4' || $appal_sticky_header_color_opt == '4') {
        echo esc_attr(' black_sticky_header ');
    } elseif ($appal_sticky_header_styles == '5' || $appal_sticky_header_color_opt == '5') {
        echo esc_attr(' blue_pink_gradient_sticky_header ');
    }
    ?> sticky-header clearfix">
        <div class="<?php if ($appal_header_layout == '2') {
            echo esc_attr('container-fluid');
        } else {
            echo esc_attr('container');
        } ?>">
            <div class="row">

                <!-- brand-logo - satrt -->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <div class="brand-logo float-left">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                            <?php if ($appal_meta_upload_logo_img && !is_search()) { ?>
                                <img src="<?php echo esc_url($appal_meta_upload_logo_img); ?>"
                                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            <?php } elseif (get_custom_logo() && isset($appal_custom_logo[0])) { ?>
                                <img src="<?php echo esc_url($appal_custom_logo[0]); ?>"
                                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            <?php } else { ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo/logo-1.png"
                                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            <?php } ?>

                        </a>
                    </div>
                </div>
                <!-- brand-logo - end -->

                <!-- main-menubar - satrt -->
                <div class="<?php if ($appal_button_opt == true) {
                    echo esc_attr('col-xl-8 col-lg-8');
                } else {
                    echo esc_attr('col-xl-10 col-lg-10');
                } ?> col-md-9 col-sm-12">
                    <div id="navigation" class="main-menubar ul-li-right clearfix">
                        <?php appal_main_menu(); ?>
                    </div>

                    <div id="mobile_menu"></div>
                </div>
                <!-- main-menubar - end -->

                <?php if ($appal_button_opt == true) { ?>
                    <!-- btns-group - start -->
                    <div class="col-xl-2 col-lg-2 d-sm-none d-md-none d-lg-block">
                        <div class="btns-group ul-li-right clearfix">
                            <ul class="clearfix">
                                <li><a href="<?php echo esc_url($appal_btn_link); ?>"
                                       class="custom-btn"><?php echo esc_html($appal_btn_text); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- btns-group - end -->
                <?php } ?>
            </div>


        </div>
    </header>
    <?php
}

function appal_header_opt()
{
    global $appal;

    $appal_header_dis_opt = '';

    if (isset($appal['appal_header_dis_opt'])) {
        $appal_header_dis_opt = $appal['appal_header_dis_opt'];
    }
    $appal_disp_header = get_post_meta(get_the_ID(), '_appal_dis_header', true);

    if ($appal_disp_header) {
        if ($appal_disp_header == '1' && !is_404()) {
            appal_header();
        } elseif ($appal_disp_header == '2' && !is_search()) {

        } else {
            appal_header();
        }
    } else {
        if ($appal_header_dis_opt == '1' && !is_404()) {
            appal_header();
        } elseif ($appal_header_dis_opt == '2') {

        } elseif (!is_404()) {
            appal_header();
        }
    }

}

function appal_footer()
{
    global $appal;

    $appal_footer_dis_opt = '';
    $appal_footer_bg_image = '';
    $appal_newsletter_title = '';
    $appal_newsletter_short_id = '';
    $appal_newsletter_notice_text = '';
    $appal_foot_btn_opt = '';
    $appal_foot_apple_btn_icon = '';
    $appal_foot_apple_titletext = '';
    $appal_foot_apple_text = '';
    $appal_foot_apple_link = '';
    $appal_foot_play_btn_icon = '';
    $appal_foot_play_titletext = '';
    $appal_foot_play_text = '';
    $appal_foot_play_link = '';
    $appal_foot_widget_opt = '';
    $appal_copywrite_text = '';

    if (isset($appal['appal_footer_dis_opt'])) {
        $appal_footer_dis_opt = $appal['appal_footer_dis_opt'];
    }

    if (isset($appal['appal_footer_background_image']['url'])) {
        $appal_footer_bg_image = $appal['appal_footer_background_image']['url'];
    }

    if (isset($appal['appal_newsletter_title'])) {
        $appal_newsletter_title = $appal['appal_newsletter_title'];
    }

    if (isset($appal['appal_newsletter_short_id'])) {
        $appal_newsletter_short_id = $appal['appal_newsletter_short_id'];
    }

    if (isset($appal['appal_newsletter_notice_text'])) {
        $appal_newsletter_notice_text = $appal['appal_newsletter_notice_text'];
    }

    if (isset($appal['appal_foot_btn_opt'])) {
        $appal_foot_btn_opt = $appal['appal_foot_btn_opt'];
    }
    if (isset($appal['appal_foot_apple_btn_icon'])) {
        $appal_foot_apple_btn_icon = $appal['appal_foot_apple_btn_icon'];
    }

    if (isset($appal['appal_foot_apple_titletext'])) {
        $appal_foot_apple_titletext = $appal['appal_foot_apple_titletext'];
    }

    if (isset($appal['appal_foot_apple_text'])) {
        $appal_foot_apple_text = $appal['appal_foot_apple_text'];
    }

    if (isset($appal['appal_foot_apple_link'])) {
        $appal_foot_apple_link = $appal['appal_foot_apple_link'];
    }

    if (isset($appal['appal_foot_play_btn_icon'])) {
        $appal_foot_play_btn_icon = $appal['appal_foot_play_btn_icon'];
    }

    if (isset($appal['appal_foot_play_titletext'])) {
        $appal_foot_play_titletext = $appal['appal_foot_play_titletext'];
    }

    if (isset($appal['appal_foot_play_text'])) {
        $appal_foot_play_text = $appal['appal_foot_play_text'];
    }

    if (isset($appal['appal_foot_play_link'])) {
        $appal_foot_play_link = $appal['appal_foot_play_link'];
    }

    if (isset($appal['appal_foot_widget_opt'])) {
        $appal_foot_widget_opt = $appal['appal_foot_widget_opt'];
    }

    if (isset($appal['appal_copywrite_text'])) {
        $appal_copywrite_text = $appal['appal_copywrite_text'];
    }
    $appal_disp_footer = get_post_meta(get_the_ID(), '_appal_disp_footer', true);
    $appal_sep_header_opt = get_post_meta(get_the_ID(), '_appal_sep_header_opt', true);

    if ($appal_sep_header_opt == true) {
        echo '</div>';
    }
    ?>

    <!-- footer-section - start
    ================================================== -->
    <footer id="footer-section"
            class="footer-section clearfix <?php if ($appal_newsletter_short_id == true || $appal_foot_btn_opt == true || $appal_foot_widget_opt == true) {
            } else {
                echo esc_attr('pt_60');
            } ?>" style="background-image: url(<?php echo esc_url($appal_footer_bg_image); ?>);">
        <?php if ($appal_newsletter_short_id) { ?>
            <div class="newsletter-section text-center clearfix">
                <div class="container">

                    <div class="section-title text-center mb-60">
                        <h2 class="title-text"><?php echo esc_html($appal_newsletter_title); ?></h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="newsletter-form mb-30"
                                 style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/newsletter-bg-1.png);">
                                <div class="form-item mb-0">
                                    <?php echo do_shortcode('[mc4wp_form id="' . $appal_newsletter_short_id . '"]'); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <p class="mb-0"><?php echo esc_html($appal_newsletter_notice_text); ?></p>

                </div>
            </div>
        <?php }
        if ($appal_foot_btn_opt == true) { ?>

            <div class="btns-group ul-li-center clearfix mt-120">
                <ul class="clearfix">
                    <?php if ($appal_foot_apple_link) { ?>
                        <li>
                            <a href="<?php echo esc_url($appal_foot_apple_link); ?>" class="store-btn bg-default-blue">
                                <span class="icon"><i
                                            class="<?php echo esc_attr($appal_foot_apple_btn_icon); ?>"></i></span>
                                <strong class="title-text">
                                    <small><?php echo esc_html($appal_foot_apple_titletext); ?></small>
                                    <?php echo esc_html($appal_foot_apple_text); ?>
                                </strong>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($appal_foot_play_link) { ?>
                        <li>
                            <a href="<?php echo esc_url($appal_foot_play_link); ?>" class="store-btn bg-default-pink">
                                <span class="icon"><i
                                            class="<?php echo esc_attr($appal_foot_play_btn_icon); ?>"></i></span>
                                <strong class="title-text">
                                    <small><?php echo esc_html($appal_foot_play_titletext); ?></small>
                                    <?php echo esc_html($appal_foot_play_text); ?>
                                </strong>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        <?php }
        if ($appal_foot_widget_opt) { ?>
            <div class="footer-content clearfix" data-aos="fade-up" data-aos-duration="450" data-aos-delay="200">
                <?php echo do_shortcode($appal_foot_widget_opt); ?>
            </div>
        <?php } ?>

        <div class="container">
            <div class="footer-bottom clearfix">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <p class="copyright-text mb-0">
                            <?php if ($appal_copywrite_text) { ?>
                                <?php echo appal_wp_kses($appal_copywrite_text); ?>
                            <?php } else { ?>
                                <?php echo appal_wp_kses("Copyright @ 2021 <a href='#'>Appal</a> all right reserved."); ?>
                            <?php } ?>

                        </p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="useful-links ul-li-right clearfix">
                            <?php appal_footer_menu(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>
    <!-- footer-section - end
    ================================================== -->

    <?php
}

function appal_footer_opt()
{
    global $appal;

    $appal_footer_dis_opt = '';

    if (isset($appal['appal_footer_dis_opt'])) {
        $appal_footer_dis_opt = $appal['appal_footer_dis_opt'];
    }
    $appal_disp_footer = get_post_meta(get_the_ID(), '_appal_disp_footer', true);

    if ($appal_disp_footer) {
        if ($appal_disp_footer == '1' && !is_404()) {
            appal_footer();
        } elseif ($appal_disp_footer == '2' && !is_search()) {

        } else {
            appal_footer();
        }
    } else {
        if ($appal_footer_dis_opt == '1' && !is_404()) {
            appal_footer();
        } elseif ($appal_footer_dis_opt == '2') {

        } elseif (!is_404()) {
            appal_footer();
        }
    }
}

function appal_banner_img_url()
{
    global $appal;

    $appal_home_theme_opt_banner_img = '';

    if (isset($appal['appal_home_theme_opt_banner_img']['url'])) {
        $appal_home_theme_opt_banner_img = $appal['appal_home_theme_opt_banner_img']['url'];
    }

    $appal_home_banner_img = get_post_meta(get_the_ID(), '_appal_home_banner_img', true);
    $appal_default_banner_img = get_template_directory_uri() . '/assets/images/breadcrumb/bg-image-1.jpg';

    if ($appal_home_banner_img) {
        return $appal_home_banner_img;
    } elseif ($appal_home_theme_opt_banner_img) {
        return $appal_home_theme_opt_banner_img;
    } else {
        return $appal_default_banner_img;
    }
}


function appal_banner_shape()
{
    global $appal;
    $appal_banner_shape_image = '';

    if (isset($appal['appal_banner_shape_image'])) {
        $appal_banner_shape_image = $appal['appal_banner_shape_image'];
    }
    if ($appal_banner_shape_image == true) {
        ?>
        <small class="cross-image-1 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                 alt="image_not_found">
        </small>
        <small class="cross-image-2 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                 alt="image_not_found">
        </small>

        <small class="box-image-1 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                 alt="image_not_found">
        </small>
        <small class="box-image-2 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                 alt="image_not_found">
        </small>

        <small class="flow-image-1 zoominout-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-1.png"
                 alt="image_not_found">
        </small>
        <small class="flow-image-2 zoominout-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                 alt="image_not_found">
        </small>

        <small class="circle-half-1 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                 alt="image_not_found">
        </small>
        <small class="circle-half-2 spin-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                 alt="image_not_found">
        </small>

        <small class="circle-image-1 zoominout-image mma-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle.png"
                 alt="image_not_found">
        </small>
        <?php
    }
}

function appal_banner_images()
{
    global $appal;
    $appal_banner_sec_image = '';

    if (isset($appal['appal_banner_sec_image'])) {
        $appal_banner_sec_image = $appal['appal_banner_sec_image'];
    }

    if ($appal_banner_sec_image == true) { ?>

        <div class="design-image-1 clearfix">
            <small class="image-1" data-aos="fade-up" data-aos-delay="100">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/design-image-1.png"
                     alt="image_not_found">
            </small>
            <small class="man-image-1" data-aos="fade-down" data-aos-delay="300">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-1.png"
                     alt="image_not_found">
            </small>
            <small class="man-image-2" data-aos="fade-down" data-aos-delay="600">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-2.png"
                     alt="image_not_found">
            </small>
            <small class="shape-image-1" data-aos="zoom-in" data-aos-delay="1000">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-5.png"
                     alt="image_not_found">
            </small>
            <small class="medal-image-1" data-aos="flip-left" data-aos-delay="1400">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-3.png"
                     alt="image_not_found">
            </small>
            <small class="shape-image-2" data-aos="zoom-in" data-aos-delay="1100">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-5.png"
                     alt="image_not_found">
            </small>
            <small class="medal-image-2" data-aos="flip-left" data-aos-delay="1500">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/img-4.png"
                     alt="image_not_found">
            </small>
        </div>

        <small class="design-image-2" data-aos="fade-up" data-aos-delay="200">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/breadcrumb/design-image-2.png"
                 alt="image_not_found">
        </small>

    <?php }
}

function appal_blog_banner()
{
    global $appal;

    $appal_blog_sub_title = '';
    $appal_blog_title = '';
    $appal_blog_descrption = '';
    $appal_banner_home_text = '';

    if (isset($appal['appal_blog_sub_title'])) {
        $appal_blog_sub_title = $appal['appal_blog_sub_title'];
    }
    if (isset($appal['appal_blog_title'])) {
        $appal_blog_title = $appal['appal_blog_title'];
    }
    if (isset($appal['appal_blog_descrption'])) {
        $appal_blog_descrption = $appal['appal_blog_descrption'];
    }

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }

    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">

        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15">
                                <?php if ($appal_blog_title) {
                                    echo esc_html($appal_blog_title);
                                } else {
                                    esc_html_e('Blog', 'appal');
                                } ?>
                            </h2>
                            <p class="paragraph-text mb-0">
                                <?php if ($appal_blog_descrption) {
                                    echo esc_html($appal_blog_descrption);
                                } else {

                                } ?>

                            </p>
                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>

                                    </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php if ($appal_blog_sub_title) {
                                        echo esc_html($appal_blog_sub_title);
                                    } else {
                                        esc_html_e('blog post', 'appal');
                                    } ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_single_banner()
{
    global $appal;

    $appal_single_post_subtitle = '';
    $appal_banner_home_text = '';

    if (isset($appal['appal_single_post_subtitle'])) {
        $appal_single_post_subtitle = $appal['appal_single_post_subtitle'];
    }

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }

    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">

        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">


                        <div class="section-title">
                            <h2 class="title-text mb-15"><?php the_title(); ?></h2>

                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php if ($appal_single_post_subtitle) {
                                        echo esc_html($appal_single_post_subtitle);
                                    } else {
                                        echo the_title();
                                    } ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_archive_banner()
{
    global $appal;

    $appal_archive_sub_title = '';
    $appal_banner_home_text = '';

    if (isset($appal['appal_archive_sub_title'])) {
        $appal_archive_sub_title = $appal['appal_archive_sub_title'];
    }

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }
    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15"><?php the_archive_title(); ?></h2>
                            <div class="paragraph-text mb-0">
                                <?php the_archive_description(); ?>
                            </div>
                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php if ($appal_archive_sub_title) {
                                        echo esc_html($appal_archive_sub_title);
                                    } else {
                                        esc_html_e('Archive', 'appal');
                                    } ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_search_banner()
{
    global $appal;

    $appal_search_sub_title = '';
    $appal_banner_home_text = '';

    if (isset($appal['appal_search_sub_title'])) {
        $appal_search_sub_title = $appal['appal_search_sub_title'];
    }

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }
    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15"><?php printf(esc_html__('Search Results for: %s', 'appal'), '<span>' . get_search_query() . '</span>'); ?></h2>

                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php if ($appal_search_sub_title) {
                                        echo esc_html($appal_search_sub_title);
                                    } else {
                                        esc_html_e('Search', 'appal');
                                    } ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}


function appal_404_banner()
{
    global $appal;

    $appal_404_subtitle_text = '';
    $appal_404_title_text = '';
    $appal_banner_home_text = '';

    if (isset($appal['appal_404_subtitle_text'])) {
        $appal_404_subtitle_text = $appal['appal_404_subtitle_text'];
    }
    if (isset($appal['appal_404_title_text'])) {
        $appal_404_title_text = $appal['appal_404_title_text'];
    }

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }
    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15">
                                <?php if ($appal_404_title_text) {
                                    echo esc_html($appal_404_title_text);
                                } else {
                                    esc_html_e('Page not Found', 'appal');
                                } ?>
                            </h2>
                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php if ($appal_404_subtitle_text) {
                                        echo esc_html($appal_404_subtitle_text);
                                    } else {
                                        esc_html_e('404', 'appal');
                                    } ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_shop_banner()
{
    global $appal;

    $appal_banner_home_text = '';

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }
    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15">
                                <?php woocommerce_page_title(); ?>
                            </h2>
                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php woocommerce_page_title(); ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_single_shop_banner()
{
    global $appal;

    $appal_banner_home_text = '';

    if (isset($appal['appal_banner_home_text'])) {
        $appal_banner_home_text = $appal['appal_banner_home_text'];
    }
    ?>

    <!-- breadcrumb-section - start
    ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section mma-container clearfix"
             style="background-image: url(<?php echo esc_url(appal_banner_img_url()); ?>);">
        <?php appal_banner_images(); ?>

        <div class="container">
            <div class="row justify-content-lg-start justify-content-md-center">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="breadcrumb-content">

                        <div class="section-title">
                            <h2 class="title-text mb-15">
                                <?php the_title(); ?>
                            </h2>
                        </div>

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php if ($appal_banner_home_text) {
                                            echo esc_html($appal_banner_home_text);
                                        } else {
                                            esc_html_e('home', 'appal');
                                        } ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php the_title(); ?>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <?php appal_banner_shape(); ?>

    </section>
    <!-- breadcrumb-section - end
    ================================================== -->

    <?php
}

function appal_post_footer()
{
    global $appal;

    $appal_post_social_link_opt = '';

    if (isset($appal['appal_post_social_link_opt'])) {
        $appal_post_social_link_opt = $appal['appal_post_social_link_opt'];
    }

    $appal_tags_list = get_the_tag_list(esc_html__('  ', 'appal'));

    ?>
    <div class="tag-share-links mt-30 clearfix">
        <div class="row">
            <div class="<?php if ($appal_post_social_link_opt == true) {
                echo esc_attr('col-lg-6');
            } else {
                echo esc_attr('col-lg-12');
            } ?> col-md-12 col-sm-12">
                <div class="tag-links ul-li float-left clearfix">
                    <?php if ($appal_tags_list) { ?>
                        <span class="title-text"><?php esc_html_e('tags', 'appal'); ?></span>
                        <?php echo appal_wp_kses($appal_tags_list);
                    }
                    ?>

                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="share-links ul-li float-right clearfix">
                    <?php appal_social_share_post(); ?>
                </div>
            </div>

        </div>
    </div>
    <?php

}

function appal_social_share_post()
{
    global $appal;

    $appal_post_social_link_opt = '';

    if (isset($appal['appal_post_social_link_opt'])) {
        $appal_post_social_link_opt = $appal['appal_post_social_link_opt'];
    }
    if ($appal_post_social_link_opt == true) {
        ?>
        <span class="title-text"><?php esc_html_e('share', 'appal'); ?></span>
        <ul class="clearfix">

            <li>
                <a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;"
                   href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>"><i
                            class="fab fa-facebook-f"></i></a></li>
            <li>
                <a onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo esc_attr($title); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;"
                   href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>"><i
                            class="fab fa-twitter"></i></a></li>
            <li>
                <a onClick="window.open('https://www.linkedin.com/cws/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo esc_attr($title); ?>','Linkedin share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;"
                   href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>"><i
                            class="fab fa-linkedin-in"></i></a></li>
            <li>
                <a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)())"><i
                            class="fab fa-pinterest-p"></i></a></li>
        </ul>
        <?php
    }
}

function appal_page_loop()
{ ?>

    <?php get_template_part('template-parts/content', 'page'); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>
<?php }

function appal_post_loop()
{
    get_template_part('template-parts/content', 'single');
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

}

function appal_post_pagination()
{ ?>
    <!-- pagination - start -->
    <div class="col-lg-12 col-md-12 col-12">
        <div class="pagination-nav ul-li-center clearfix">
            <?php the_posts_pagination(array(
                'show_all' => false,
                'prev_text' => '<i class="uil uil-angle-left"></i>',
                'next_text' => '<i class="uil uil-angle-right"></i>',
                'screen_reader_text' => ' ',
                'before_page_number' => ' ',
                'after_page_number' => ' ',
            )); ?>
        </div>
    </div>
<?php }

function appal_post_style_loop()
{
    $appal_blog_post_column = get_post_meta(get_the_ID(), '_appal_blog_post_column', true);
    $appal_post_per_page = get_post_meta(get_the_ID(), '_appal_post_per_page', true);
    ?>

    <?php if (have_posts()) :
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    query_posts(array(
        'post_type' => 'post',
        'posts_per_page' => $appal_post_per_page,
        'paged' => $paged
    ));

    ?>


    <?php while (have_posts()) : the_post(); ?>
    <?php if ($appal_blog_post_column == '2') { ?>
        <div class="col-lg-6 col-md-6 col-12 post-column-2">
            <?php get_template_part('template-parts/content', get_post_format()); ?>
        </div>
    <?php } elseif ($appal_blog_post_column == '3') { ?>
        <div class="col-lg-4 col-md-6 col-12 post-column-3">
            <?php get_template_part('template-parts/content', get_post_format()); ?>
        </div>
    <?php } else { ?>
        <div class="col-lg-12 col-md-12 col-12">
            <?php get_template_part('template-parts/content', get_post_format()); ?>
        </div>
    <?php } ?>

<?php endwhile; ?>

<?php else : ?>

    <?php get_template_part('template-parts/content', 'none'); ?>

<?php endif;
    appal_post_pagination();

    ?>

    <?php
}

function appal_404_content()
{
    global $appal;

    $appal_404_logo_img = '';
    $appal_404_section_img = '';
    $appal_404_page_title = '';
    $appal_404_page_descrption = '';
    $appal_404_page_home_btn_text = '';
    $appal_404_page_home_btn_link = '';
    $appal_404_page_social_text = '';
    $appal_404_social_opt = '';

    if (isset($appal['appal_404_logo_img']['url'])) {
        $appal_404_logo_img = $appal['appal_404_logo_img']['url'];
    }

    if (isset($appal['appal_404_section_img']['url'])) {
        $appal_404_section_img = $appal['appal_404_section_img']['url'];
    }

    if (isset($appal['appal_404_page_title'])) {
        $appal_404_page_title = $appal['appal_404_page_title'];
    }

    if (isset($appal['appal_404_page_descrption'])) {
        $appal_404_page_descrption = $appal['appal_404_page_descrption'];
    }

    if (isset($appal['appal_404_page_home_btn_text'])) {
        $appal_404_page_home_btn_text = $appal['appal_404_page_home_btn_text'];
    }

    if (isset($appal['appal_404_page_home_btn_link'])) {
        $appal_404_page_home_btn_link = $appal['appal_404_page_home_btn_link'];
    }

    if (isset($appal['appal_404_page_social_text'])) {
        $appal_404_page_social_text = $appal['appal_404_page_social_text'];
    }

    if (isset($appal['appal_404_social_opt'])) {
        $appal_404_social_opt = $appal['appal_404_social_opt'];
    }


    ?>
    <div class="common-page">
        <!-- useless thing - start -->
        <span class="scene d-none">
			<small class="d-none" data-depth="0.2"></small>
		</span>
        <!-- useless thing - end -->

        <!-- brand-logo - start
        ================================================== -->
        <div class="brand-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                <?php if ($appal_404_logo_img) {
                    echo '<img src="' . esc_url($appal_404_logo_img) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '">';
                } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/logo/Logo-2.png" alt="' . esc_attr(get_bloginfo('name', 'display')) . '">';
                } ?>

            </a>
        </div>
        <!-- brand-logo - end
        ================================================== -->


        <!-- error-section - start
        ================================================== -->
        <section id="error-section" class="error-section clearfix">
            <div class="common-container">
                <div class="image-container">
                    <?php if ($appal_404_section_img) {
                        echo '<img src="' . esc_url($appal_404_section_img) . '" alt="' . esc_attr__('404 page image', 'appal') . '">';
                    } else {
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/404.png" alt="' . esc_attr__('404 page image', 'appal') . '">';
                    } ?>

                </div>
            </div>
            <div class="common-container bg-default-blue">
                <div class="item-content">
                    <h2 class="title-text mb-30"><?php
                        if ($appal_404_page_title) {
                            echo esc_html($appal_404_page_title);
                        } else {
                            esc_html_e('404 error not found', 'appal');
                        }


                        ?></h2>
                    <p class="mb-60"><?php
                        if ($appal_404_page_descrption) {
                            echo esc_html($appal_404_page_descrption);
                        } else {
                            esc_html_e('The page you are looking for was moved or renamed or might never existed.', 'appal');
                        } ?>
                    </p>
                    <?php if ($appal_404_page_home_btn_link) {
                        echo '<a href="' . esc_url($appal_404_page_home_btn_link) . '" class="custom-btn">' . esc_html($appal_404_page_home_btn_text) . '</a>';
                    } ?>

                </div>
                <small class="shape-1"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                            alt="Shape Image"></small>
                <small class="shape-2"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-1.png"
                            alt="Shape Image"></small>
                <small class="shape-3"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                            alt="Shape Image"></small>
                <small class="shape-4"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/box.png"
                            alt="Shape Image"></small>
                <small class="shape-5"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                            alt="Shape Image"></small>
                <small class="shape-6"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/cross.png"
                            alt="Shape Image"></small>
                <small class="shape-7"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/flow-2.png"
                            alt="Shape Image"></small>
                <small class="shape-8"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle.png"
                            alt="Shape Image"></small>
                <small class="shape-9"><img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shapes/circle-half.png"
                            alt="Shape Image"></small>
            </div>
        </section>
        <!-- error-section - end
        ================================================== -->

        <!-- social-links - start
        ================================================== -->
        <div class="social-links ul-li clearfix">
            <h3 class="title-text mb-30">
                <?php if ($appal_404_page_social_text) {
                    echo esc_html($appal_404_page_social_text);
                } ?>

            </h3>
            <ul class="clearfix">
                <?php foreach ((array)$appal_404_social_opt as $social) {

                    $icon = $url = '';

                    if (isset($social['title']))
                        $icon = $social['title'];

                    if (isset($social['url']))
                        $link = $social['url'];


                    ?>
                    <li><a href="<?php echo esc_url($link); ?>"><i class="<?php echo esc_attr($icon); ?>"></i></a></li>

                    <?php

                } ?>
            </ul>
        </div>
        <!-- social-links - end
        ================================================== -->

    </div>
    <?php
}

function appal_product_search()
{ ?>

    <div class="search-form">
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <div class="form-item mb-0">
                <input type="search" name="s" placeholder="<?php echo esc_attr__('Type your desire App', 'appal'); ?>">
                <input type="hidden" name="post_type" value="product"/>
                <button type="submit" class="search-btn">
                    <i class="flaticon-musica-searcher"></i>
                </button>
            </div>
        </form>
    </div>
<?php }

function appal_search_banner_bg_img()
{
    global $appal;

    $appal_shop_search_banner_img = '';

    if (isset($appal['appal_shop_search_banner_img']['url'])) {
        $appal_shop_search_banner_img = $appal['appal_shop_search_banner_img']['url'];
    }
    $appal_search_default_banner_img = get_template_directory_uri() . '/assets/images/banner/app-bg-img-1.jpg';

    if ($appal_shop_search_banner_img) {
        return $appal_shop_search_banner_img;
    } else {
        return $appal_search_default_banner_img;
    }
}

function appal_single_product_search_banner()
{
    $appal_banner_text = get_post_meta(get_the_ID(), '_appal_wop_serbtext', true);

    ?>

    <section id="search-section" class="search-section clearfix"
             style="background-image: url(<?php echo esc_url(appal_search_banner_bg_img()); ?>);">
        <div class="overlay-color">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-sm-12">

                        <div class="banner-content text-center">
                            <h1>
                                <?php
                                if ($appal_banner_text) {
                                    echo appal_wp_kses($appal_banner_text);
                                } else {
                                    echo appal_wp_kses('Most Completed App Store Website Search your Desire App');
                                }

                                ?>
                            </h1>
                            <?php appal_product_search(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }