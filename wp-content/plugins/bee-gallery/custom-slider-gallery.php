<?php
/*
Plugin Name: Custom Slider Gallery
Description: A simple slider gallery plugin using Slick slider.
Version: 1.0
Author: Your Name
*/

// Enqueue scripts and styles
function custom_slider_gallery_scripts() {
   // Enqueue Slick styles
   wp_enqueue_style('slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
   wp_enqueue_style('slick-theme-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
   
   // Enqueue custom styles
   wp_enqueue_style('custom-slider-gallery-style', plugin_dir_url(__FILE__) . 'css/style.css');
   
   // Enqueue Slick script
   wp_enqueue_script('slick-script', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true);
   
   // Enqueue custom script
   wp_enqueue_script('custom-slider-gallery-script', plugin_dir_url(__FILE__) . 'js/script.js', array('slick-script'), '', true);
}
add_action('wp_enqueue_scripts', 'custom_slider_gallery_scripts');

// Shortcode to display the slider
function custom_slider_gallery_shortcode() {
   ob_start();
   include(plugin_dir_path(__FILE__) . 'slider-gallery.php');
   return ob_get_clean();
}
add_shortcode('custom_slider_gallery', 'custom_slider_gallery_shortcode');