<?php
if ( ! class_exists( 'HoneyPostType' ) ) :

	/**
	 * This is our simple HoneyPostType Class for our custom functionality
	 */
class HoneyPostType {

	

	public function __construct() {
		// Register the CPT and taxonomies
		add_action( 'init', array( $this, 'honeyposts_cpt' ) );
		add_action( 'init', array( $this, 'honeyposts_category_taxonomy' ) );

		// Register Metaboxes
		add_action( 'add_meta_boxes', array( $this, 'honeypost_register_meta_boxes' ) );

		// Save Actions
		add_action( 'save_post', array( $this, 'honeyposts_meta_save' ) );
	}


	/**
	* Register custom post type honeypost
	*/
	public function honeyposts_cpt(){
		$domain_name = 'honeyfarm';

		$labels = array(
			'name'                  => _x( 'HoneyPosts', 'Post type general name', $domain_name ),
			'singular_name'         => _x( 'HoneyPost', 'Post type singular name', $domain_name ),
			'menu_name'             => _x( 'HoneyPosts', 'Admin Menu text', $domain_name ),
			'name_admin_bar'        => _x( 'HoneyPost', 'Add New on Toolbar', $domain_name ),
			'add_new'               => __( 'Add New', $domain_name ),
			'add_new_item'          => __( 'Add New HoneyPost', $domain_name ),
			'new_item'              => __( 'New HoneyPost', $domain_name ),
			'edit_item'             => __( 'Edit HoneyPost', $domain_name ),
			'view_item'             => __( 'View HoneyPost', $domain_name ),
			'all_items'             => __( 'All HoneyPosts', $domain_name ),	
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

	/**
	* Register our Category taxonomy for honeypost CPT
	*/
	public function honeyposts_category_taxonomy () {
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

	/**
	 * Register meta box(es) and calback function for them.
	 */
	public function honeypost_register_meta_boxes() {
		add_meta_box( 'featured', __( 'Is featured?', 'honeyfarm' ), 
					array( $this, 'honeyposts_featured_metabox_callback' ), 
					'honeypost', 
					'side' );
	}

	public function honeyposts_featured_metabox_callback( $post ) {
		$checked = get_post_meta( $post->ID, 'is_featured', true );
		?>
		<div>
			<label for='is-featured'>Is featured?</label>
			<input id='is-featured' name='is_featured' type='checkbox' value='1' <?php checked( $checked, '1' ); ?>/>
		</div>
		<?php
	}

	public function honeyposts_meta_save($post_id) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		if ( !current_user_can('edit_post', $post_id ) ) {
			return;
		}

		$featured = isset( $_POST['is_featured'] ) ? sanitize_text_field( $_POST['is_featured'] ) : '';
		update_post_meta( $post_id, 'is_featured', $featured );
	}
}

$honeyposttype_instance = new HoneyPostType();

endif;
