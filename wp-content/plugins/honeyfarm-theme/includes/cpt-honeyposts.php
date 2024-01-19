<?php

function honeyposts_cpt(){
    $labels = array(
		'name'                  => _x( 'HoneyPosts', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'HoneyPost', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'HoneyPosts', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'HoneyPost', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New HoneyPost', 'textdomain' ),
		'new_item'              => __( 'New HoneyPost', 'textdomain' ),
		'edit_item'             => __( 'Edit HoneyPost', 'textdomain' ),
		'view_item'             => __( 'View HoneyPost', 'textdomain' ),
		'all_items'             => __( 'All HoneyPosts', 'textdomain' ),	
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
 * Register meta box(es) and calback function for them.
 */
function honeypost_register_meta_boxes() {
	add_meta_box( 'featured', __( 'Is featured?', 'honeyfarm' ), 
				  'honeyposts_featured_metabox_callback', 
				  'honeypost', 
				  'side' );
}
add_action( 'add_meta_boxes', 'honeypost_register_meta_boxes' );


function honeyposts_featured_metabox_callback( $post_id ) {
	$checked = get_post_meta( $post_id->ID, 'is_featured', true);

  	?> 
  	<div>	
		<label for='is-featured'>Is featured?</label>
		<input id='is-featured' name='isfeatured' type='checkbox' value='1' <?php checked( $checked, 1, true ); ?>/>
	</div> <?php
}

function honeyposts_meta_save( $post_id){
	if( empty( $post_id ) ) {
		return;
	}

	$featured = '';

	if( isset ( $_POST['isfeatured'] )) {
		$featured = esc_attr( $_POST['isfeatured'] );
	}
	update_post_meta( $post_id, 'is_featured', $featured );
}

add_action( 'save_post', 'honeyposts_meta_save' );