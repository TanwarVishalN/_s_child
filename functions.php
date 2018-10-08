<?php
/**
*  _s_child Functions and Definitions
*
* @author Vishal Tanwar
*
* @version 0.0.1
*/

// Register Custom Post Type
if( !function_exists( '_s_child_register_tasks' ) ){

 function _s_child_register_tasks() {

	$labels = array(
		'name'                  => _x( 'Tasks', 'Post Type General Name', '_s_child' ),
		'singular_name'         => _x( 'Task', 'Post Type Singular Name', '_s_child' ),
		'menu_name'             => __( 'Tasks', '_s_child' ),
		'name_admin_bar'        => __( 'Task', '_s_child' ),
		'archives'              => __( 'Task Archives', '_s_child' ),
		'attributes'            => __( 'Task Attributes', '_s_child' ),
		'parent_item_colon'     => __( 'Parent Task:', '_s_child' ),
		'all_items'             => __( 'All Tasks', '_s_child' ),
		'add_new_item'          => __( 'Add New Task', '_s_child' ),
		'add_new'               => __( 'Add New', '_s_child' ),
		'new_item'              => __( 'New Task', '_s_child' ),
		'edit_item'             => __( 'Edit Task', '_s_child' ),
		'update_item'           => __( 'Update Task', '_s_child' ),
		'view_item'             => __( 'View Task', '_s_child' ),
		'view_items'            => __( 'View Tasks', '_s_child' ),
		'search_items'          => __( 'Search Task', '_s_child' ),
		'not_found'             => __( 'Not found', '_s_child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_s_child' ),
		'featured_image'        => __( 'Featured Image', '_s_child' ),
		'set_featured_image'    => __( 'Set featured image', '_s_child' ),
		'remove_featured_image' => __( 'Remove featured image', '_s_child' ),
		'use_featured_image'    => __( 'Use as featured image', '_s_child' ),
		'insert_into_item'      => __( 'Insert into task', '_s_child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this task', '_s_child' ),
		'items_list'            => __( 'Tasks list', '_s_child' ),
		'items_list_navigation' => __( 'Tasks list navigation', '_s_child' ),
		'filter_items_list'     => __( 'Filter tasks list', '_s_child' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', '_s_child' ),
		'description'           => __( 'Post Type Description', '_s_child' ),
		'labels'                => $labels,
		'supports'		=> array('title','editor'),
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
    add_meta_box( '_s_child-metaBoxId', __( 'Task Status', '_s_child' ), '_s_child_display_meta_box', 'task' );
}
add_action( 'add_meta_boxes', '_s_child_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function _s_child_display_meta_box( $post ) {
	
// 	Retreiving all post meta data
	$task_status_value =  esc_attr( get_post_meta( $post->ID, '_s_child_task_status', true ) );

    ?>

      <input type="checkbox" id="_s_child-checkbox" class="_s_child-checkbox" name="_s_child_task_status" value="true" <?php checked( $task_status_value ) ;?> />
      <label for="_s_child-checkbox" class="_s_child-custom-checkbox">
        	
     		<span>Task Completed</span>
	  </label>
	
<?php
}
 
/**
 * Save meta box content of _s_child .
 *
 * @param int $post_id Post ID
 */
function _s_child_save_meta_box_data( $post_id ) {
//     Return if WP nonce is not verified
	if( !isset( $_POST['_s_child_task_status'] ) || !wp_verify_nonce( $_POST['_s_child_task_status'], '_s_child_task_status' ) ):
		return;
	endif;
	
// Update The _s_child Task Status 
   $task_status_value = isset( $_POST['_s_child_task_status'] ) ? $_POST['_s_child_task_status'] : "false" ;
	update_post_meta( $post_id, '_s_child_task_status', $task_status_value );
}
// Hook in save_task_post to save meta box data
add_action( 'save_post_task', '_s_child_save_meta_box_data' );

