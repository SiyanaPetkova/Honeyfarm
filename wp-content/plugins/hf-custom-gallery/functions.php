<?php 

/**
* Register and enqueue the gallery styles and scripts.
*/
function custom_gallery_enqueue_styles() {
    wp_enqueue_style( 'hf-gallery-style', plugin_dir_url(__FILE__) . 'assets/css/hf-gallery-style.css' );

    wp_enqueue_script( 'gallery-script', plugins_url( 'assets/js/gallery-ajax.js', __FILE__ ), array( 'jquery' ), 1.0 );

    wp_localize_script( 'gallery-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'custom_gallery_enqueue_styles' );

/**
* Register the shortcode for the gallery.
*/
function custom_gallery_shortcode( $atts ) {
    ob_start();

    if ( !isset( $GLOBALS['custom_gallery_shortcode'] ) ) {
        $GLOBALS['custom_gallery_shortcode'] = 1;
    }
    
    $paged = isset( $_POST['paged'] ) ? $_POST['paged'] : 1;
         
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'orderby'        => 'post_date',
        'posts_per_page' =>  4,
        'paged'          => $paged
    );

    $query_images = new WP_Query( $query_images_args );

    error_log( 'Query Result: ' . print_r( $query_images, true ) );

    echo '<div class="gallery">';

    if( $query_images->have_posts()) : 
        while( $query_images->have_posts() ) : 
            $query_images->the_post(); ?>
            
            <?php echo $images = wp_get_attachment_image( $query_images->ID, 'thumbnail' ); ?>            

        <?php endwhile; ?>
    <?php else : ?>
        <p>There are no images yet</p>
    <?php endif;

    echo '</div>';

    wp_reset_postdata(); 

    echo '<div class="btn__wrapper">';
    echo '<a href="#!" class="btn btn__primary" id="load-more">Load more</a>';
    echo '</div>';
  
    return ob_get_clean(); 
}

add_shortcode( 'custom_gallery', 'custom_gallery_shortcode' );

/**
* Callback function for the ajax request.
*/
function gallery_load_more() {
  
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image,video',
        'post_status'    => 'inherit',
        'orderby'        => 'post_date',
        'posts_per_page' =>  4,
        'paged' => $_POST['paged'],
    );

    $query_images = new WP_Query( $query_images_args );

    $max_pages = $query_images->max_num_pages;

    if ( $query_images->have_posts() ) :
        while ( $query_images->have_posts() ) :
            $query_images->the_post(); ?>
                
                <?php
                $image_id = get_the_ID();              
                $images = wp_get_attachment_image( $image_id, 'thumbnail' );               
                echo $images;
                ?>    

        <?php endwhile; ?>

    <?php else : ?>
        <p>There are no images yet</p>
    <?php endif;

    echo '<div class="max-pages" data-max-pages="' . esc_attr( $max_pages ) . '"></div>';
   
    exit;
}

add_action( 'wp_ajax_gallery_load_more', 'gallery_load_more' );
add_action( 'wp_ajax_nopriv_gallery_load_more', 'gallery_load_more' );