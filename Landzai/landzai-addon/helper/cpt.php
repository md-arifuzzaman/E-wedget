<?php

	class landzai_custom_post_type {
		
		function __construct() {
			
			add_action('init', array(&$this,'landzai_builder_post_type'));
			add_action('init', array(&$this,'create_builder_post_taxonomy'));
            add_action('init', array(&$this, 'create_services_cpt'));
            add_action('init', array(&$this, 'services_taxonomy'), 0);
            add_action('init', array(&$this, 'create_features_cpt'));
            add_action('init', array(&$this, 'features_taxonomy'), 0);

        }
	  // Builder Post Type
		function landzai_builder_post_type() {
        $labels = array(
            'name' => __('Landzai Builder', 'landzai'),
            'singular_name' => __('Landzai Builder', 'landzai'),
            'add_new' => __('Add landzai builder', 'landzai'),
            'add_new_item' => __('Add landzai builder', 'landzai'),
            'edit_item' => __('Edit landzai builder', 'landzai'),
            'new_item' => __('New landzai builder', 'landzai'),
            'all_items' => __('All landzai builder', 'landzai'),
            'view_item' => __('View landzai builder', 'landzai'),
            'search_items' => __('Search landzai builder', 'landzai'),
            'not_found' => __('No landzai builder found', 'landzai'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'landzai'),
            'parent_item_colon' => '',
            'menu_name' => __('Landzai Theme Builder', 'landzai')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
            'has_archive' => false,
        );
            register_post_type('landzai_builders', $args);
        }

        function create_builder_post_taxonomy() {
            $labels = array(
                'name' => __('Category', 'landzai'),
                'singular_name' => __('Category', 'landzai'),
                'search_items' => __('Search categories', 'landzai'),
                'all_items' => __('Categories', 'landzai'),
                'parent_item' => __('Parent category', 'landzai'),
                'parent_item_colon' => __('Parent category:', 'landzai'),
                'edit_item' => __('Edit category', 'landzai'),
                'update_item' => __('Update category', 'landzai'),
                'add_new_item' => __('Add category', 'landzai'),
                'new_item_name' => __('New category', 'landzai'),
                'menu_name' => __('Category', 'landzai'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'landzai_builder_cat'),
            );
            register_taxonomy('landzai_builder_cat', 'landzai_builders', $args);
        }

        // Services Post type
        function create_services_cpt() {
            $labels = array(
                'name' => __('Service', 'landzai'),
                'singular_name' => __('Service', 'landzai'),
                'add_new' => __('Add service', 'landzai'),
                'add_new_item' => __('Add service', 'landzai'),
                'edit_item' => __('Edit service', 'landzai'),
                'new_item' => __('New service', 'landzai'),
                'all_items' => __('All service', 'landzai'),
                'view_item' => __('View service', 'landzai'),
                'search_items' => __('Search service', 'landzai'),
                'not_found' => __('No service found', 'landzai'),
                'not_found_in_trash' => __('No portfolio found in the trash', 'landzai'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('Services', 'landzai')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-megaphone',
                'taxonomies' => array('service_category'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
                'has_archive' => true,
            );
            register_post_type('services', $args);
        }

        function services_taxonomy() {
            $labels = array(
                'name' => __('Category', 'landzai'),
                'singular_name' => __('Category', 'landzai'),
                'search_items' => __('Search categories', 'landzai'),
                'all_items' => __('Categories', 'landzai'),
                'parent_item' => __('Parent category', 'landzai'),
                'parent_item_colon' => __('Parent category:', 'landzai'),
                'edit_item' => __('Edit category', 'landzai'),
                'update_item' => __('Update category', 'landzai'),
                'add_new_item' => __('Add category', 'landzai'),
                'new_item_name' => __('New category', 'landzai'),
                'menu_name' => __('Category', 'landzai'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'service_category'),
            );
            register_taxonomy('service_category', 'services', $args);
        }

       // Doctor Post Type
        function create_features_cpt() {
            $labels = array(
                'name' => __('Features', 'landzai'),
                'singular_name' => __('Doctor', 'landzai'),
                'add_new' => __('Add feature', 'landzai'),
                'add_new_item' => __('Add feature', 'landzai'),
                'edit_item' => __('Edit feature', 'landzai'),
                'new_item' => __('New feature', 'landzai'),
                'all_items' => __('All feature', 'landzai'),
                'view_item' => __('View feature', 'landzai'),
                'search_items' => __('Search feature', 'landzai'),
                'not_found' => __('No feature found', 'landzai'),
                'not_found_in_trash' => __('No feature found in the trash', 'landzai'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('Features', 'landzai')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-plus-alt',
                'taxonomies' => array('feature_category'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
                'has_archive' => true,
            );
            register_post_type('features', $args);
        }

        function Features_taxonomy() {
            $labels = array(
                'name' => __('Category', 'landzai'),
                'singular_name' => __('Category', 'landzai'),
                'search_items' => __('Search categories', 'landzai'),
                'all_items' => __('Categories', 'landzai'),
                'parent_item' => __('Parent category', 'landzai'),
                'parent_item_colon' => __('Parent category:', 'landzai'),
                'edit_item' => __('Edit category', 'landzai'),
                'update_item' => __('Update category', 'landzai'),
                'add_new_item' => __('Add category', 'landzai'),
                'new_item_name' => __('New category', 'landzai'),
                'menu_name' => __('Category', 'landzai'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'feature_category'),
            );
            register_taxonomy('feature_category', 'features', $args);
        }
					
	}  

    new landzai_custom_post_type();

