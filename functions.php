<?php
/**
*  _s_child Functions and Definitions
*
* @author Vishal Tanwar
*
* @version 0.0.1
*/

// Setup theme _s_child
if( !function_exists( '_s_child_setup' ) ) {
	function _s_child_setup() {

		//Add Default Posts and Comments rss feed linksdd_theme_support( 'automatic-feed-links' );

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
if( !function_exists( '_s_child_register_tasks' ) ){

 function _s_child_register_tasks() {

	$labels = array(
		'name'                  => _x( 'Tasks', 'Post Type General Name', 'task' ),
		'singular_name'         => _x( 'Task', 'Post Type Singular Name', 'task' ),
		'menu_name'             => __( 'Tasks', 'task' ),
		'name_admin_bar'        => __( 'Task', 'task' ),
		'archives'              => __( 'Task Archives', 'task' ),
		'attributes'            => __( 'Task Attributes', 'task' ),
		'parent_item_colon'     => __( 'Parent Task:', 'task' ),
		'all_items'             => __( 'All Tasks', 'task' ),
		'add_new_item'          => __( 'Add New Task', 'task' ),
		'add_new'               => __( 'Add New', 'task' ),
		'new_item'              => __( 'New Task', 'task' ),
		'edit_item'             => __( 'Edit Task', 'task' ),
		'update_item'           => __( 'Update Task', 'task' ),
		'view_item'             => __( 'View Task', 'task' ),
		'view_items'            => __( 'View Tasks', 'task' ),
		'search_items'          => __( 'Search Task', 'task' ),
		'not_found'             => __( 'Not found', 'task' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'task' ),
		'featured_image'        => __( 'Featured Image', 'task' ),
		'set_featured_image'    => __( 'Set featured image', 'task' ),
		'remove_featured_image' => __( 'Remove featured image', 'task' ),
		'use_featured_image'    => __( 'Use as featured image', 'task' ),
		'insert_into_item'      => __( 'Insert into task', 'task' ),
		'uploaded_to_this_item' => __( 'Uploaded to this task', 'task' ),
		'items_list'            => __( 'Tasks list', 'task' ),
		'items_list_navigation' => __( 'Tasks list navigation', 'task' ),
		'filter_items_list'     => __( 'Filter tasks list', 'task' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', 'task' ),
		'description'           => __( 'Post Type Description', 'task' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 40,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'task', $args );
  }
	add_action( 'init', '_s_child_register_tasks', 0 );
}

/**
 * Register meta box
 */
function _s_child_register_meta_boxes() {
    add_meta_box( '_s_child-metaBoxId', __( '_s_child Meta Box', 'textdomain' ), '_s_child_my_display_callback', 'task' );
}
add_action( 'add_meta_boxes', '_s_child_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function _s_child_my_display_callback( $post ) {
	?>
   <label for="input-task"> Input Task </label>
	    <input type="checkbox" value="Input Task" id="input-task" name="input-task" />
<?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function _s_child_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', '_s_child_save_meta_box' );
