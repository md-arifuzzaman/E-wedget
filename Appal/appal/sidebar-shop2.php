<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Appal
 */

if (is_active_sidebar('sidebar-3')) : ?>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <aside id="sidebar-section" class="sidebar-section app-details-sidebar clearfix">
            <div id="secondary" class="widget-area">
                <?php dynamic_sidebar('sidebar-3'); ?>
            </div><!-- #secondary -->
        </aside>
    </div>

<?php endif; ?>

  

