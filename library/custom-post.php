<?php 

// TESTIMONIALS CUSTOM POST TYPE
function custom_post_testimonials() {
	// creating (registering) the custom type 
	register_post_type( 'testimonial', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Testimonials', 'txs'), /* This is the Title of the Group */
			'singular_name' => __('Testimonials', 'txs'), /* This is the individual type */
			'all_items' => __('All Testimonials', 'txs'), /* the all items menu item */
			'add_new' => __('Add New', 'txs'), /* The add new menu item */
			'add_new_item' => __('Add New Testimonial', 'txs'), /* Add New Display Title */
			'edit' => __( 'Edit', 'txs' ), /* Edit Dialog */
			'edit_item' => __('Edit Testimonial', 'txs'), /* Edit Display Title */
			'new_item' => __('New Testimonial', 'txs'), /* New Display Title */
			'view_item' => __('View Testimonials', 'txs'), /* View Display Title */
			'search_items' => __('Search Testimonials', 'txs'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'txs'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'txs'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Testimonials', 'txs' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 30, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-quote', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'testimonial', 'with_front' => false ), /* you can specify its url slug */
			// 'has_archive' => 'testimonials', /* you can rename the slug here */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			// 'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	);
}

add_action( 'init', 'custom_post_testimonials');


// SERVICES CUSTOM POST TYPE
function custom_post_services() {
	// creating (registering) the custom type 
	register_post_type( 'service', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Services', 'txs'), /* This is the Title of the Group */
			'singular_name' => __('Services', 'txs'), /* This is the individual type */
			'all_items' => __('All Services', 'txs'), /* the all items menu item */
			'add_new' => __('Add New', 'txs'), /* The add new menu item */
			'add_new_item' => __('Add New Service', 'txs'), /* Add New Display Title */
			'edit' => __( 'Edit', 'txs' ), /* Edit Dialog */
			'edit_item' => __('Edit Service', 'txs'), /* Edit Display Title */
			'new_item' => __('New Service', 'txs'), /* New Display Title */
			'view_item' => __('View Services', 'txs'), /* View Display Title */
			'search_items' => __('Search Services', 'txs'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'txs'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'txs'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Services', 'txs' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 30, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-admin-page', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'services', 'with_front' => false ), /* you can specify its url slug */
			// 'has_archive' => 'testimonials', /* you can rename the slug here */
			'capability_type' => 'post',
			// 'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	);
}

add_action( 'init', 'custom_post_services');