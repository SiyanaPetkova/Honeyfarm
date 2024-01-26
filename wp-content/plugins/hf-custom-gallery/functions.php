
<?php 

// Register and enqueue the gallery styles
function custom_gallery_enqueue_styles() {
    wp_enqueue_style('hf-gallery-style', plugin_dir_url(__FILE__) . 'includes/hf-gallery-style.css');
}
add_action('wp_enqueue_scripts', 'custom_gallery_enqueue_styles');

// Register the shortcode
function custom_gallery_shortcode($atts) {
    ob_start(); // Start output buffering

    // Check if we are processing the shortcode
    if (!isset($GLOBALS['custom_gallery_shortcode'])) {
        $GLOBALS['custom_gallery_shortcode'] = 1;

        // Add styling only once
        echo '
        <style>
            /* Add some basic styling for better presentation */
            .gallery {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin: 20px;
            }

            .gallery img {
                width: 30%;
                margin-bottom: 20px;
                box-sizing: border-box;
            }
        </style>';
    }

    // Check if there are attachments
    $all_images = get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
    ));

    if ($all_images) {
        echo '<div class="gallery">';
        foreach ($all_images as $image) {
            // Display each image from the entire website
            echo '<img src="' . wp_get_attachment_url($image->ID) . '" alt="' . get_post_meta($image->ID, '_wp_attachment_image_alt', true) . '">';
        }
        echo '</div>';
    }

    return ob_get_clean(); // Return the buffered content
}

// Register the shortcode with the name 'custom_gallery'
add_shortcode('custom_gallery', 'custom_gallery_shortcode');
?>
