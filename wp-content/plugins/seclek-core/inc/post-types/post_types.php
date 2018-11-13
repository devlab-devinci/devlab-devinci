<?php

// Register Custom Post Type
function seclek_post_type() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'seclek' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'seclek' ),
		'menu_name'             => __( 'Portfolio', 'seclek' ),
		'name_admin_bar'        => __( 'Portfolio', 'seclek' ),
		'archives'              => __( 'Item Archives', 'seclek' ),
		'attributes'            => __( 'Item Attributes', 'seclek' ),
		'parent_item_colon'     => __( 'Parent Item:', 'seclek' ),
		'all_items'             => __( 'All Items', 'seclek' ),
		'add_new_item'          => __( 'Add New Item', 'seclek' ),
		'add_new'               => __( 'Add New', 'seclek' ),
		'new_item'              => __( 'New Item', 'seclek' ),
		'edit_item'             => __( 'Edit Item', 'seclek' ),
		'update_item'           => __( 'Update Item', 'seclek' ),
		'view_item'             => __( 'View Item', 'seclek' ),
		'view_items'            => __( 'View Items', 'seclek' ),
		'search_items'          => __( 'Search Item', 'seclek' ),
		'not_found'             => __( 'Not found', 'seclek' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'seclek' ),
		'featured_image'        => __( 'Featured Image', 'seclek' ),
		'set_featured_image'    => __( 'Set featured image', 'seclek' ),
		'remove_featured_image' => __( 'Remove featured image', 'seclek' ),
		'use_featured_image'    => __( 'Use as featured image', 'seclek' ),
		'insert_into_item'      => __( 'Insert into item', 'seclek' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'seclek' ),
		'items_list'            => __( 'Items list', 'seclek' ),
		'items_list_navigation' => __( 'Items list navigation', 'seclek' ),
		'filter_items_list'     => __( 'Filter items list', 'seclek' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'seclek' ),
		'description'           => __( 'Work type or case study for seclek theme', 'seclek' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_controller_class' => 'WP_REST_Folio_Controller',
	);
	register_post_type( 'folio', $args );

}
add_action( 'init', 'seclek_post_type', 0 );

// Register Custom Taxonomy
function seclek_taxonomy() {

	$folio_cat_labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'seclek' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'seclek' ),
		'menu_name'                  => __( 'Category', 'seclek' ),
		'all_items'                  => __( 'All Items', 'seclek' ),
		'parent_item'                => __( 'Parent Item', 'seclek' ),
		'parent_item_colon'          => __( 'Parent Item:', 'seclek' ),
		'new_item_name'              => __( 'New Item Name', 'seclek' ),
		'add_new_item'               => __( 'Add New Item', 'seclek' ),
		'edit_item'                  => __( 'Edit Item', 'seclek' ),
		'update_item'                => __( 'Update Item', 'seclek' ),
		'view_item'                  => __( 'View Item', 'seclek' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'seclek' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'seclek' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'seclek' ),
		'popular_items'              => __( 'Popular Items', 'seclek' ),
		'search_items'               => __( 'Search Items', 'seclek' ),
		'not_found'                  => __( 'Not Found', 'seclek' ),
		'no_terms'                   => __( 'No items', 'seclek' ),
		'items_list'                 => __( 'Items list', 'seclek' ),
		'items_list_navigation'      => __( 'Items list navigation', 'seclek' ),
	);
	$folio_cat_args = array(
		'labels'                     => $folio_cat_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'folio_category', array( 'folio' ), $folio_cat_args );

	$folio_tag_labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'seclek' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'seclek' ),
		'menu_name'                  => __( 'Tags', 'seclek' ),
		'all_items'                  => __( 'All Items', 'seclek' ),
		'parent_item'                => __( 'Parent Item', 'seclek' ),
		'parent_item_colon'          => __( 'Parent Item:', 'seclek' ),
		'new_item_name'              => __( 'New Item Name', 'seclek' ),
		'add_new_item'               => __( 'Add New Item', 'seclek' ),
		'edit_item'                  => __( 'Edit Item', 'seclek' ),
		'update_item'                => __( 'Update Item', 'seclek' ),
		'view_item'                  => __( 'View Item', 'seclek' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'seclek' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'seclek' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'seclek' ),
		'popular_items'              => __( 'Popular Items', 'seclek' ),
		'search_items'               => __( 'Search Items', 'seclek' ),
		'not_found'                  => __( 'Not Found', 'seclek' ),
		'no_terms'                   => __( 'No items', 'seclek' ),
		'items_list'                 => __( 'Items list', 'seclek' ),
		'items_list_navigation'      => __( 'Items list navigation', 'seclek' ),
	);
	$folio_tag_args = array(
		'labels'                     => $folio_tag_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'folio_tag', array( 'folio' ), $folio_tag_args );

}
add_action( 'init', 'seclek_taxonomy', 0 );