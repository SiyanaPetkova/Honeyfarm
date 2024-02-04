<?php 

/**
* This function manipulate the content of the custom post type honeypost with adding quotes to the content .
*/
function custom_plugin_enqueue_styles() {
    if ( is_singular( 'honeypost' ) ) {
        wp_enqueue_style( 'custom-honeypost-style', plugin_dir_url(__FILE__) . '../assets/css/style.css' );
    }
}

add_action( 'wp_enqueue_scripts', 'custom_plugin_enqueue_styles' );


function custom_plugin_modify_honeypost_content( $content ) {
    if ( is_singular( 'honeypost' ) ) {
        $quotes = array(
            '<blockquote class="custom-honeypost-quote">"The flowers are full of honey, but only the bee finds out the sweetness." <cite>Johann Wolfgang von Goethe</cite></blockquote>',
            '<blockquote class="custom-honeypost-quote">"A day without a friend is like a pot without a single drop of honey left inside." <cite>A. A. Milne</cite></blockquote>',
            '<blockquote class="custom-honeypost-quote">"Just as bees make honey from thyme, the strongest and driest of herbs, so do the wise profit from the most difficult of experiences." <cite>Plato</cite></blockquote>',
            '<blockquote class="custom-honeypost-quote">"The busy bee has no time for sorrow." <cite>William Blake</cite></blockquote>',
        );

        $random_quote = $quotes[array_rand( $quotes )];

        $modified_content = $random_quote . $content;

        return $modified_content;
    }

    return $content;
}

add_filter( 'the_content', 'custom_plugin_modify_honeypost_content' );

function flush_rewrite_rules_custom() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'flush_rewrite_rules_custom');

/**
 * Add the top level menu page.
 */
// function honeyposts_options_page() {
// 	add_menu_page(
// 		'Honeyposts Options',
// 		'Honeyposts Options',
// 		'manage_options',
// 		'honeyposts-options',
// 		'honeyposts_options_page_html'
// 	);
// }
// /**
//  * Register our softuni_options_page to the admin_menu action hook.
//  */
// add_action( 'admin_menu', 'honeyposts_options_page' );

// function honeyposts_options_page_html() {
//     include 'includes/options-page.php';
// }