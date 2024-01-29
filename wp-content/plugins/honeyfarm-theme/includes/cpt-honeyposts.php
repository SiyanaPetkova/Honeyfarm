<?php

/**
* Register custom post type honeypost
*/
function honeyposts_cpt(){
    $labels = array(
		'name'                  => _x( 'HoneyPosts', 'Post type general name', 'honeyfarm' ),
		'singular_name'         => _x( 'HoneyPost', 'Post type singular name', 'honeyfarm' ),
		'menu_name'             => _x( 'HoneyPosts', 'Admin Menu text', 'honeyfarm' ),
		'name_admin_bar'        => _x( 'HoneyPost', 'Add New on Toolbar', 'honeyfarm' ),
		'add_new'               => __( 'Add New', 'honeyfarm' ),
		'add_new_item'          => __( 'Add New HoneyPost', 'honeyfarm' ),
		'new_item'              => __( 'New HoneyPost', 'honeyfarm' ),
		'edit_item'             => __( 'Edit HoneyPost', 'honeyfarm' ),
		'view_item'             => __( 'View HoneyPost', 'honeyfarm' ),
		'all_items'             => __( 'All HoneyPosts', 'honeyfarm' ),	
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 
            'title', 
            'editor', 
            'author', 
            'thumbnail', 
            'excerpt', 
            'comments' ),
        'show_in_rest '      => true
	);

	register_post_type( 'honeypost', $args );
}

add_action( 'init', 'honeyposts_cpt' );

/**
* Register our Category taxonomy for honeypost CPT
*/
function honeypost_category_taxonomy () {
	$labels = array(
		'name' => 'Categories',
		'singular_name' => 'Category',
	);

	$args = array(
		'labels'       => $labels,
		'show_in_rest' => true,
		'hierarchical' => true,
	);

	register_taxonomy( 'honeypost-category', 'honeypost', $args );
}

add_action('init', 'honeypost_category_taxonomy');

/**
 * Register meta box(es) and calback function for them.
 */
function honeypost_register_meta_boxes() {
	add_meta_box( 'featured', __( 'Is featured?', 'honeyfarm' ), 
				  'honeyposts_featured_metabox_callback', 
				  'honeypost', 
				  'side' );
}
add_action( 'add_meta_boxes', 'honeypost_register_meta_boxes' );


function honeyposts_featured_metabox_callback( $post ) {
	$checked = get_post_meta( $post->ID, 'is_featured', true );
	?>
	<div>
		<label for='is-featured'>Is featured?</label>
		<input id='is-featured' name='is_featured' type='checkbox' value='1' <?php checked( $checked, '1' ); ?>/>
	</div>
	<?php
}

function honeyposts_meta_save($post_id) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
		return;
	}

	if ( !current_user_can('edit_post', $post_id ) ) {
		return;
	}

	$featured = isset( $_POST['is_featured'] ) ? sanitize_text_field( $_POST['is_featured'] ) : '';
	update_post_meta( $post_id, 'is_featured', $featured );
}

add_action( 'save_post', 'honeyposts_meta_save' );
