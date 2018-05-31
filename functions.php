<?php
/**
* _s_child Functions and Definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package _s_child
*/
// Setup theme _s_child 
if( !function_exists( '_s_child_setup' ){
	function _s_child_setup(){
	   
		//Add Default Posts and Comments rss feed links
		add_theme_support( 'automatic-feed-links' );
		
		//Enable Post Thumbnails on Posts and Pages
		add_theme_support( 'post-thumbnails' );
		
		//Add Theme Support For title document and does not use code <title> tag
		add_theme_support( 'title-tag' );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );		
	}
	
    add_action( 'after_setup_theme', '_s_child_setup');		
}
   
// Register Custom Post Type
if( !function_exists( '_s_child_custom_products' ) ){

 function _s_child_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'product' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'product' ),
		'menu_name'             => __( 'Products', 'product' ),
		'name_admin_bar'        => __( 'Product', 'product' ),
		'archives'              => __( 'Product Archives', 'product' ),
		'attributes'            => __( 'Product Attributes', 'product' ),
		'parent_item_colon'     => __( 'Parent Product:', 'product' ),
		'all_items'             => __( 'All Products', 'product' ),
		'add_new_item'          => __( 'Add New Product', 'product' ),
		'add_new'               => __( 'Add New', 'product' ),
		'new_item'              => __( 'New Product', 'product' ),
		'edit_item'             => __( 'Edit Product', 'product' ),
		'update_item'           => __( 'Update Product', 'product' ),
		'view_item'             => __( 'View Product', 'product' ),
		'view_items'            => __( 'View Products', 'product' ),
		'search_items'          => __( 'Search Product', 'product' ),
		'not_found'             => __( 'Not found', 'product' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'product' ),
		'featured_image'        => __( 'Featured Image', 'product' ),
		'set_featured_image'    => __( 'Set featured image', 'product' ),
		'remove_featured_image' => __( 'Remove featured image', 'product' ),
		'use_featured_image'    => __( 'Use as featured image', 'product' ),
		'insert_into_item'      => __( 'Insert into item', 'product' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'product' ),
		'items_list'            => __( 'Products list', 'product' ),
		'items_list_navigation' => __( 'Products list navigation', 'product' ),
		'filter_items_list'     => __( 'Filter products list', 'product' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', 'product' ),
		'description'           => __( 'Post Type Description', 'product' ),
		'labels'                => $labels,
		'supports'              => false,
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'product', $args );
  }
	add_action( 'init', '_s_child_custom_products', 0 );
}

