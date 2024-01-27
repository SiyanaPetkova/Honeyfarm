<?php 

// Register and enqueue the gallery styles

function custom_gallery_enqueue_styles() {
    wp_enqueue_style( 'hf-gallery-style', plugin_dir_url(__FILE__) . 'assets/css/hf-gallery-style.css' );

    wp_enqueue_script( 'gallery-script', plugins_url( 'assets/js/gallery-ajax.js', __FILE__ ), array( 'jquery' ), 1.0 );

    wp_localize_script( 'gallery-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'custom_gallery_enqueue_styles' );

// Register the shortcode
function custom_gallery_shortcode( $atts ) {
    ob_start();

    if ( !isset( $GLOBALS['custom_gallery_shortcode'] ) ) {
        $GLOBALS['custom_gallery_shortcode'] = 1;
    }
         
    $all_images = get_posts( array (
        'post_type' => 'attachment',
        'posts_per_page' => 60,
    ) );

    if ($all_images) {
        echo '<div class="gallery">';
        foreach ($all_images as $image) {
            $image_id = $image->ID;
            $image_url = wp_get_attachment_url($image_id);
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            
            // Get like count from post meta
            //$like_count = get_post_meta($image_id, 'likes', true);

           // echo '<div class="image-container">';
            echo '<img class="hf-gallery" id="' . $image_id . '" src="' . $image_url . '" alt="' . $image_alt . '">';
            // echo '<div class="like-container">';
            // echo '<a class="like-button" href="javascript:void(0)" id="' . $image_id . '"><img src="heart-icon.png" alt="Heart Icon"></a>';
            // echo '<span class="like-counter">' . esc_html($like_count) . '</span>';
            // echo '</div>';
            // echo '</div>';
        }
        echo '</div>';
    }
  
    return ob_get_clean(); 
}

// Register the shortcode with the name 'custom_gallery'
add_shortcode( 'custom_gallery', 'custom_gallery_shortcode' );

function load_large_image() {
    if ( empty( $_POST['action'] ) ) {
        return;
    }

    $image_id = esc_attr( $_POST['image_id'] );

    $likes_number = get_post_meta( $image_id, 'likes', true );

    if ( empty( $likes_number ) ) {
        $likes_number = 0;
    }

    // add custom logit to prevent bad users

    update_post_meta( $image_id, 'likes', $likes_number + 1 );
    
}

add_action('wp_ajax_nopriv_load_large_image', 'load_large_image');
add_action('wp_ajax_load_large_image', 'load_large_image');

?>




jQuery(document).ready(function ($) {
    $('.hf-gallery').on('click', function () {
        var image_id = $(this).attr('id');

        console.log(image_id);

        $.ajax({
            type: 'POST',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'load_large_image',
                dataType: 'json',
                image_id: image_id,
            },
            success: function (response) {
                if (response.success) {
                    // Create a new container with the enlarged image
                    var enlargedContainer = $('<div class="enlarged-image-container"></div>');
                    enlargedContainer.html(response.data);

                    // Prepend the new container to the top of the gallery
                    $('.gallery').prepend(enlargedContainer);
                }
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});