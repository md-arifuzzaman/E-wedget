<?php

	class ahope_custom_post_type {
		
		function __construct() {
			
			add_action('init', array(&$this,'ahope_builder_post_type'));
			add_action('init', array(&$this,'create_builder_post_taxonomy'));
            add_action('init', array(&$this, 'create_services_cpt'));
            add_action('init', array(&$this, 'services_taxonomy'), 0);
            add_action('init', array(&$this, 'create_features_cpt'));
            add_action('init', array(&$this, 'features_taxonomy'), 0);

        }
	  // Builder Post Type
		function ahope_builder_post_type() {
        $labels = array(
            'name' => __('Ahope Builder', 'ahope'),
            'singular_name' => __('Ahope Builder', 'ahope'),
            'add_new' => __('Add ahope builder', 'ahope'),
            'add_new_item' => __('Add ahope builder', 'ahope'),
            'edit_item' => __('Edit ahope builder', 'ahope'),
            'new_item' => __('New ahope builder', 'ahope'),
            'all_items' => __('All ahope builder', 'ahope'),
            'view_item' => __('View ahope builder', 'ahope'),
            'search_items' => __('Search ahope builder', 'ahope'),
            'not_found' => __('No ahope builder found', 'ahope'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'ahope'),
            'parent_item_colon' => '',
            'menu_name' => __('Ahope Theme Builder', 'ahope')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
            'has_archive' => false,
        );
            register_post_type('ahope_builders', $args);
        }

        function create_builder_post_taxonomy() {
            $labels = array(
                'name' => __('Category', 'ahope'),
                'singular_name' => __('Category', 'ahope'),
                'search_items' => __('Search categories', 'ahope'),
                'all_items' => __('Categories', 'ahope'),
                'parent_item' => __('Parent category', 'ahope'),
                'parent_item_colon' => __('Parent category:', 'ahope'),
                'edit_item' => __('Edit category', 'ahope'),
                'update_item' => __('Update category', 'ahope'),
                'add_new_item' => __('Add category', 'ahope'),
                'new_item_name' => __('New category', 'ahope'),
                'menu_name' => __('Category', 'ahope'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'ahope_builder_cat'),
            );
            register_taxonomy('ahope_builder_cat', 'ahope_builders', $args);
        }

        // Services Post type
        function create_services_cpt() {
            $labels = array(
                'name' => __('Service', 'ahope'),
                'singular_name' => __('Service', 'ahope'),
                'add_new' => __('Add service', 'ahope'),
                'add_new_item' => __('Add service', 'ahope'),
                'edit_item' => __('Edit service', 'ahope'),
                'new_item' => __('New service', 'ahope'),
                'all_items' => __('All service', 'ahope'),
                'view_item' => __('View service', 'ahope'),
                'search_items' => __('Search service', 'ahope'),
                'not_found' => __('No service found', 'ahope'),
                'not_found_in_trash' => __('No portfolio found in the trash', 'ahope'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('Services', 'ahope')
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
                'name' => __('Category', 'ahope'),
                'singular_name' => __('Category', 'ahope'),
                'search_items' => __('Search categories', 'ahope'),
                'all_items' => __('Categories', 'ahope'),
                'parent_item' => __('Parent category', 'ahope'),
                'parent_item_colon' => __('Parent category:', 'ahope'),
                'edit_item' => __('Edit category', 'ahope'),
                'update_item' => __('Update category', 'ahope'),
                'add_new_item' => __('Add category', 'ahope'),
                'new_item_name' => __('New category', 'ahope'),
                'menu_name' => __('Category', 'ahope'),
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

       // Feature Post Type
        function create_features_cpt() {
            $labels = array(
                'name' => __('Features', 'ahope'),
                'singular_name' => __('Feature', 'ahope'),
                'add_new' => __('Add feature', 'ahope'),
                'add_new_item' => __('Add feature', 'ahope'),
                'edit_item' => __('Edit feature', 'ahope'),
                'new_item' => __('New feature', 'ahope'),
                'all_items' => __('All feature', 'ahope'),
                'view_item' => __('View feature', 'ahope'),
                'search_items' => __('Search feature', 'ahope'),
                'not_found' => __('No feature found', 'ahope'),
                'not_found_in_trash' => __('No feature found in the trash', 'ahope'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('Features', 'ahope')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-images-alt',
                'taxonomies' => array('feature_category'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
                'has_archive' => true,
            );
            register_post_type('features', $args);
        }

        function Features_taxonomy() {
            $labels = array(
                'name' => __('Category', 'ahope'),
                'singular_name' => __('Category', 'ahope'),
                'search_items' => __('Search categories', 'ahope'),
                'all_items' => __('Categories', 'ahope'),
                'parent_item' => __('Parent category', 'ahope'),
                'parent_item_colon' => __('Parent category:', 'ahope'),
                'edit_item' => __('Edit category', 'ahope'),
                'update_item' => __('Update category', 'ahope'),
                'add_new_item' => __('Add category', 'ahope'),
                'new_item_name' => __('New category', 'ahope'),
                'menu_name' => __('Category', 'ahope'),
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

    new ahope_custom_post_type();

