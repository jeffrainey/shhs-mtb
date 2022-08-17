<?php

// 1 - Custom Post Types
// 2 - Taxonomies for Custom Post Types

// 1. Custom Post Types

// Article POST TYPE
////////////////////////////
function shhsmbt_Articles() {

    $labels = array(
        'name' => __( 'Program', 'Post Type General Name', 'sero' ),
        'singular_name' => __( 'Program', 'Post Type Singular Name', 'sero' ),
        'menu_name' => __( 'Programs', 'sero' ),
        'name_admin_bar' => __( 'Program', 'sero' ),
        'archives' => __( 'Program Archives', 'sero' ),
        'attributes' => __( 'Program Attributes', 'sero' ),
        'parent_item_colon' => __( 'Parent Programs:', 'sero' ),
        'all_items' => __( 'All Programs', 'sero' ),
        'add_new_item' => __( 'Add New Program', 'sero' ),
        'add_new' => __( 'Add New Program', 'sero' ),
        'new_item' => __( 'New Program', 'sero' ),
        'edit_item' => __( 'Edit Program', 'sero' ),
        'update_item' => __( 'Update Program', 'sero' ),
        'view_item' => __( 'View Program', 'sero' ),
        'view_items' => __( 'View Programs', 'sero' ),
        'search_items' => __( 'Search Programs', 'sero' ),
        'not_found' => __( 'Not found', 'sero' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'sero' ),
        'featured_image' => __( 'Featured Image', 'sero' ),
        'set_featured_image' => __( 'Set featured image', 'sero' ),
        'remove_featured_image' => __( 'Remove featured image', 'sero' ),
        'use_featured_image' => __( 'Use as featured image', 'sero' ),
        'insert_into_item' => __( 'Insert into Programs', 'sero' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Program', 'sero' ),
        'items_list' => __( 'Programs list', 'sero' ),
        'items_list_navigation' => __( 'Program list navigation', 'sero' ),
        'filter_items_list' => __( 'Filter Programs list', 'sero' ),
    );
    $args = array(
        'label' => __( 'Programs', 'sero' ),
        'description' => __( '', 'sero' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-media',
        'supports' => array('thumbnail', 'title'),
//        'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest'       => true,
        'query_var'         => true,
        'rest_base'          => 'article',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    );
    register_post_type( 'article', $args );

}
add_action( 'init', 'shhsmbt_articles', 0 );



// 2. Taxonomies for Custom Post Types
function custom_taxonomies() {

	$project_labels = array(
		'name'              => _x( 'Provider Specialties', 'taxonomy general name' ),
		'singular_name'     => _x( 'Provider Specialty', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Provider Specialties' ),
		'all_items'         => __( 'All Provider Specialties' ),
		'parent_item'       => __( 'Parent Provider Specialty' ),
		'parent_item_colon' => __( 'Parent Provider Specialty:' ),
		'edit_item'         => __( 'Edit Provider Specialty' ),
		'update_item'       => __( 'Update Provider Specialty' ),
		'add_new_item'      => __( 'Add New Provider Specialty' ),
		'new_item_name'     => __( 'New Provider Specialty Name' ),
		'menu_name'         => __( 'Provider Specialties' ),
	);

	register_taxonomy('providers_areas',
		array(
			'providers'
		),
		array(
			'hierarchical'      => true,
			'labels'            => $project_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'providers_area' ),
			'show_in_rest'      => true,
		));
}

add_action( 'init', 'custom_taxonomies', 0 );
