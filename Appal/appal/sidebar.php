<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Appal
 */
if ( appal_theme_options('appal_sidebar') ) {
    do_action('appal_sidebar_render');
} else {
if (is_active_sidebar('sidebar-1')) { ?>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <aside id="sidebar-section" class="sidebar-section clearfix">
            <div id="secondary" class="widget-area">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div><!-- #secondary -->
        </aside>
    </div>

<?php } } ?>

  

