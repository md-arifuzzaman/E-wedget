<?php
function appal_movers_custom_css()
{
    global $appal;

    if (!is_admin()) :
        ?>

        <?php

        $appal_theme_color_opt = '';
        $appal_custom_css_opt = '';
        $appal_menu_text_color = '';
        $appal_menu_text_hover_color = '';
        $appal_sticky_menu_bg_color = '';
        $appal_sticky_menu_text_color = '';
        $appal_sticky_menu_text_hover_color = '';
        $appal_submenu_bg_color = '';
        $appal_submenu_text_color = '';
        $appal_submenu_hover_text_color = '';
        $appal_submenu_hover_border_color = '';
        $appal_footer_header_text_color = '';
        $appal_footer_text_color = '';
        $appal_footer_link_color = '';
        $appal_footer_btm_link_color = '';
        $appal_footer_social_icon_color = '';
        $appal_footer_social_bg_color = '';
        $appal_footer_social_hover_text_color = '';
        $appal_footer_social_hover_bg_color = '';
        $appal_footer_address_icon_color = '';
        $appal_spinner_bg_img = '';
        $appal_spinner_bgcolor = '';
        $appal_banner_color = '';
        $appal_scroll_up_col_icon = '';
        $appal_scroll_up_col_bg = '';


        if (isset($appal['appal_theme_color_opt'])) {
            $appal_theme_color_opt = $appal['appal_theme_color_opt'];
        }

        if (isset($appal['appal_custom_css_opt'])) {
            $appal_custom_css_opt = $appal['appal_custom_css_opt'];
        }
        if (isset($appal['appal_menu_text_color'])) {
            $appal_menu_text_color = $appal['appal_menu_text_color'];
        }
        if (isset($appal['appal_menu_text_hover_color'])) {
            $appal_menu_text_hover_color = $appal['appal_menu_text_hover_color'];
        }
        if (isset($appal['appal_sticky_menu_bg_color'])) {
            $appal_sticky_menu_bg_color = $appal['appal_sticky_menu_bg_color'];
        }
        if (isset($appal['appal_sticky_menu_text_color'])) {
            $appal_sticky_menu_text_color = $appal['appal_sticky_menu_text_color'];
        }
        if (isset($appal['appal_sticky_menu_text_hover_color'])) {
            $appal_sticky_menu_text_hover_color = $appal['appal_sticky_menu_text_hover_color'];
        }

        if (isset($appal['appal_submenu_bg_color'])) {
            $appal_submenu_bg_color = $appal['appal_submenu_bg_color'];
        }

        if (isset($appal['appal_submenu_text_color'])) {
            $appal_submenu_text_color = $appal['appal_submenu_text_color'];
        }

        if (isset($appal['appal_submenu_hover_text_color'])) {
            $appal_submenu_hover_text_color = $appal['appal_submenu_hover_text_color'];
        }

        if (isset($appal['appal_submenu_hover_border_color'])) {
            $appal_submenu_hover_border_color = $appal['appal_submenu_hover_border_color'];
        }

        if (isset($appal['appal_footer_header_text_color'])) {
            $appal_footer_header_text_color = $appal['appal_footer_header_text_color'];
        }

        if (isset($appal['appal_footer_text_color'])) {
            $appal_footer_text_color = $appal['appal_footer_text_color'];
        }

        if (isset($appal['appal_footer_link_color'])) {
            $appal_footer_link_color = $appal['appal_footer_link_color'];
        }

        if (isset($appal['appal_footer_btm_link_color'])) {
            $appal_footer_btm_link_color = $appal['appal_footer_btm_link_color'];
        }

        if (isset($appal['appal_footer_social_icon_color'])) {
            $appal_footer_social_icon_color = $appal['appal_footer_social_icon_color'];
        }

        if (isset($appal['appal_footer_social_bg_color'])) {
            $appal_footer_social_bg_color = $appal['appal_footer_social_bg_color'];
        }

        if (isset($appal['appal_footer_social_hover_bg_color'])) {
            $appal_footer_social_hover_bg_color = $appal['appal_footer_social_hover_bg_color'];
        }

        if (isset($appal['appal_footer_social_hover_text_color'])) {
            $appal_footer_social_hover_text_color = $appal['appal_footer_social_hover_text_color'];
        }


        if (isset($appal['appal_footer_address_icon_color'])) {
            $appal_footer_address_icon_color = $appal['appal_footer_address_icon_color'];
        }

        if (isset($appal['appal_spinner_bg_img']['url'])) {
            $appal_spinner_bg_img = $appal['appal_spinner_bg_img']['url'];
        }

        if (isset($appal['appal_spinner_bgcolor'])) {
            $appal_spinner_bgcolor = $appal['appal_spinner_bgcolor'];
        }

        if (isset($appal['appal_banner_bg_color'])) {
            $appal_banner_bg_color = $appal['appal_banner_bg_color'];
        }

        if (isset($appal['appal_banner_color'])) {
            $appal_banner_color = $appal['appal_banner_color'];
        }

        if (isset($appal['appal_scroll_up_col_bg'])) {
            $appal_scroll_up_col_bg = $appal['appal_scroll_up_col_bg'];
        }

        if (isset($appal['appal_scroll_up_col_icon'])) {
            $appal_scroll_up_col_icon = $appal['appal_scroll_up_col_icon'];
        }


        if ($appal_custom_css_opt == true) {

            wp_enqueue_style('appal-custom-css', get_template_directory_uri() . '/css/custom-style.css');

            //add custom css
            $appal_custom_css = "

		body a,
		body a:hover,
		body a:focus,
		body .custom-btn-underline:hover,
		body .custom-btn-underline:focus,
		body .blog-section .big-blog-item:hover .blog-content .blog-title .title-link,
		body .blog-section .blog-grid-item:hover .blog-content .blog-title .title-link,
		body .blog-section .big-blog-item .blog-content .blog-title .title-link:hover,
		body .pagination-nav > .pagination a, 		
		body .woocommerce nav.woocommerce-pagination ul li a, 
		body .woocommerce nav.woocommerce-pagination ul li span,
		body .post-meta > ul > li i,
		body .blog-details-section .blog-details-content .features-list > ul > li .icon,
		body .blog-details-section .blog-details-content .tag-share-links .tag-links a,
		body .blog-details-section .blog-details-content .tag-share-links .share-links > ul > li > a:hover,
		body .sidebar-section .widget_archive > ul > li:hover > a, 
		body .sidebar-section .widget_categories > ul > li:hover > a,
		body .widget a:hover, 
		body .widget a:focus{
			
			color: {$appal_theme_color_opt};
		}	
		
		body .pagination-nav > .pagination a, 		 
		body .woocommerce nav.woocommerce-pagination ul li a
		{
			color: {$appal_theme_color_opt};
			border-color: {$appal_theme_color_opt};
		}
		body .pagination-nav > .pagination span, 
		body .pagination-nav > .pagination a:hover, 
		body .pagination-nav > .pagination a:focus, 
		body .woocommerce nav.woocommerce-pagination ul li a:focus, 
		body .woocommerce nav.woocommerce-pagination ul li a:hover, 
		body .woocommerce nav.woocommerce-pagination ul li span.current {
			background-color: {$appal_theme_color_opt};
			border-color: {$appal_theme_color_opt};
		}
		body #commentform .form-control:focus{
			border-color: {$appal_theme_color_opt};
		}
		body .sidebar-section .widget_title:before,
		body .sidebar-section .widget_archive > ul > li > a::before, 
		body .sidebar-section .widget_categories > ul > li > a::before,
		body .widget_tag_cloud a:hover,
		body .widget_tag_cloud a:focus,
		body .sidebar-section .widget_search .form-item .search-btn, 
		body #searchform .form-item .search-btn
		{
			background-color: {$appal_theme_color_opt};
		}
		body .widget_tag_cloud a:hover,
		body .widget_tag_cloud a:focus{
			border-color: {$appal_theme_color_opt};
			color: #fff;
		}
		body #preloader{
			background-color: {$appal_spinner_bgcolor};
		}	
		
		body #preloader{
			background-image: url({$appal_spinner_bg_img});
		}			
					
		
		body .header-section .main-menubar > ul > li > a
		{
			color: {$appal_menu_text_color}!important;
		}		
		body .header-section .main-menubar > ul > li:hover > a,
		body .header-section .main-menubar > ul > li:focus > a
		{
			color: {$appal_menu_text_hover_color}!important;
		}	
		
		body .sticky-header.stuck:before{
			background-color: {$appal_sticky_menu_bg_color}!important;
		}		
		body .sticky-header.stuck.header-section .main-menubar > ul > li > a{
			color: {$appal_sticky_menu_text_color}!important;
		}	
		body .sticky-header.stuck.header-section .main-menubar > ul > li:hover > a,
		body .sticky-header.stuck.header-section .main-menubar > ul > li:focus > a

		{
			color: {$appal_sticky_menu_text_hover_color};
		}		
		
		
		body .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > .menu-item-has-children > .sub-menu, .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu .menu-item-has-children .sub-menu
		{
			background-color: {$appal_submenu_bg_color}!important;
		}		
		
		body .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li > a{
			color: {$appal_submenu_text_color};
		}
				
		body  .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li:hover > a
		{
			color: {$appal_submenu_hover_text_color}!important;
		}	
		
		body .header-section .main-menubar > ul > .menu-item-has-children > .sub-menu > li:hover > a:before
		{
			background-color: {$appal_submenu_hover_border_color}!important;
		}

	
		body .breadcrumb-section .breadcrumb-content .page-name,
		body .breadcrumb-section .section-title .title-text,
		body .breadcrumb-section .section-title .paragraph-text,
		body .breadcrumb-section .breadcrumb-nav > .breadcrumb > .breadcrumb-item:before,
		body .breadcrumb-section .breadcrumb-nav > .breadcrumb > .breadcrumb-item > a,
		body .breadcrumb-section .breadcrumb-nav > .breadcrumb > .breadcrumb-item
		
		{
			color:  {$appal_banner_color}!important;
		}	
		
		body #footer-section .section-title .title-text{
			color:  {$appal_footer_header_text_color};
		}		
		
		body #footer-section .about-content,
		body #footer-section .contact-info .info-text
		{
			color:  {$appal_footer_text_color};
		}	
		
		body .footer-section .footer-content ul > li > a,
		body .footer-section .footer-bottom .useful-links > ul > li > a
		{
			color:  {$appal_footer_link_color};
		}		
		
		
		body #footer-section .social-links > ul > li > a
		
		{
			color:  {$appal_footer_social_icon_color};
			background-color:  {$appal_footer_social_bg_color};
		}	
		
		body #footer-section .social-links > ul > li > a:before
		
		{
			
			background-color:  {$appal_footer_social_hover_bg_color};
		}			
		body #footer-section .social-links > ul > li > a:hover,		
		body #footer-section .social-links > ul > li > a:hover	{
			color:  {$appal_footer_social_hover_text_color}!important;
		}	
		body #footer-section.footer-section .footer-content .contact-info > ul > li .icon
		{
			color:  {$appal_footer_address_icon_color};
		}		
		
		body #footer-section .copyright-text a
		{
			color:  {$appal_footer_btm_link_color};
		}	
				
		body #backtotop
		{
	
			background-color:  {$appal_scroll_up_col_bg};
		}		

		body #backtotop #scroll
		{
			color:  {$appal_scroll_up_col_icon};
		}	
		
		
	";

            //Add the above custom CSS via wp_add_inline_style
            wp_add_inline_style('appal-custom-css', $appal_custom_css); //Pass the variable into the main style sheet ID
        }

    endif;
}

add_action('wp_enqueue_scripts', 'appal_movers_custom_css');