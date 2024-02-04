<?php

/**
* Add the options page to the admin menu
*/ 
function custom_gallery_options_page() {
    add_menu_page(
        'Gallery Settings',
        'Gallery Settings',
        'manage_options',
        'custom_gallery_options',
        'custom_gallery_options_page_html'
    );
}

add_action( 'admin_menu', 'custom_gallery_options_page' );

/**
* Render the options page HTML
*/  
function custom_gallery_options_page_html() {
    ?>
    <div class="wrap">
        <h2>Gallery Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'custom_gallery_options' );
            do_settings_sections( 'custom_gallery_options' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
* Register and define the settings
*/  
function custom_gallery_settings() {
    register_setting( 'custom_gallery_options', 'gallery_images_per_page', 'intval' );

    add_settings_section(
        'custom_gallery_section',
        'Gallery Settings',
        'custom_gallery_section_callback',
        'custom_gallery_options'
    );

    add_settings_field(
        'gallery_images_per_page',
        'Number of Images Per Page',
        'custom_gallery_images_per_page_callback',
        'custom_gallery_options',
        'custom_gallery_section'
    );
}

add_action( 'admin_init', 'custom_gallery_settings' );

/**
* Section callback function
*/  
function custom_gallery_section_callback() {
    echo '<p>Configure the number of images to display in the gallery.</p>';
}

/**
* Field callback function
*/  
function custom_gallery_images_per_page_callback() {
    $value = get_option( 'gallery_images_per_page', 4 );
    echo '<input type="number" name="gallery_images_per_page" value="' . esc_attr( $value ) . '" />';
}