<?php

//Appal tabcontent
function appal_tabcontent($atts, $content = null)
{
    // Attributes
    extract(shortcode_atts(
            array(
                'name' => '',
            ), $atts)
    );
    ob_start();
    ?>

    <div class="row justify-content-lg-start justify-content-md-center">

        <?php

        // WP_Query arguments
        $args = array(
            'post_type' => array('tab_content'),
            'name' => $name
        );

        // The Query
        $appal_tab_query = new WP_Query($args);

        // The Loop
        if ($appal_tab_query->have_posts()) {
            while ($appal_tab_query->have_posts()) {
                $appal_tab_query->the_post();
                $appal_tab_heading = get_post_meta(get_the_ID(), '_appal_tab_heading', true);
                $appal_tab_group_field_opt = get_post_meta(get_the_ID(), '_appal_tab_group_field_opt', true);

                ?>
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="feature-content">
                        <h3 class="item-title mb-30">
                            <?php echo appal_wp_kses($appal_tab_heading); ?>
                        </h3>
                        <div class="mb-30">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($appal_tab_group_field_opt) { ?>
                            <div class="instructions-list ul-li-block">
                                <ul class="clearfix">
                                    <?php
                                    foreach ((array)$appal_tab_group_field_opt as $key => $item) {

                                        $feature = '';

                                        if (isset($item['_appal_tab_feature']))
                                            $feature = esc_html($item['_appal_tab_feature']);


                                        ?>
                                        <li><i class="flaticon-checked"></i> <?php echo appal_wp_kses($feature); ?></li>

                                    <?php } ?>

                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="feature-image text-center">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>

                <?php

            }

        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();

        ?>

    </div>
    <!-- // #Tab Content -->

    <?php return ob_get_clean();
}

add_shortcode('apltabcontent', 'appal_tabcontent');

//Appal Faq Content
function appal_faq_content_short($atts, $content = null)
{
    // Attributes
    extract(shortcode_atts(
            array(
                'name' => '',
            ), $atts)
    );
    ob_start();
    ?>

    <?php

    // WP_Query arguments
    $args = array(
        'post_type' => array('faq_content'),
        'name' => $name
    );

    // The Query
    $appal_faq_content_query = new WP_Query($args);

    // The Loop
    if ($appal_faq_content_query->have_posts()) {
        while ($appal_faq_content_query->have_posts()) {
            $appal_faq_content_query->the_post();
            $appal_faq_group_field_opt = get_post_meta(get_the_ID(), '_appal_faq_group_field_opt', true);

            foreach ((array)$appal_faq_group_field_opt as $key => $item) {

                $title = $content = '';

                if (isset($item['_appal_faq_content_title']))
                    $title = esc_html($item['_appal_faq_content_title']);

                if (isset($item['_appal_faq_content']))
                    $content = esc_html($item['_appal_faq_content']);


                ?>

                <div class="queistions-item">
                    <h3 class="item-title mb-15"><?php echo appal_wp_kses($title); ?></h3>
                    <p class="mb-0">
                        <?php echo appal_wp_kses($content); ?>
                    </p>
                </div>

            <?php }

        }

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    ?>


    <?php return ob_get_clean();
}

add_shortcode('fc_shortcode', 'appal_faq_content_short');