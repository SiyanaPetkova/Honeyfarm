<?php
/*
Plugin Name:  Honeyfarm Plugin
Plugin URI:   https://www.honeyfarm.com
Description:  My first plugin for honeyfarm.
Version:      1.0.0
Author:       Siyana Petkova
Author URI:   https://www.honeyfarm.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  honeyfarm
Domain Path:  /languages
*/
// if ( ! defined( 'HONEYPOSTS_FACTORY_PLUGIN_DIR' ) ) {
//     define( 'HONEYPOSTS_FACTORY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) . 'includes' );
// }

// if ( ! defined( 'HONEYPOSTS_FACTORY_PLUGIN_INCLUDES_DIR' ) ) {
//     define( 'HONEYPOSTS_FACTORY_PLUGIN_INCLUDES_DIR', plugin_dir_path( __FILE__ ) . 'includes' );
// }


// if ( ! defined( 'HONEYPOSTS_FACTORY_PLUGIN_ASSETS_DIR' ) ) {
//     define( 'HONEYPOSTS_FACTORY_PLUGIN_ASSETS_DIR', plugins_url( 'assets', __FILE__ ) );
// }

// // load our important files
// require HONEYPOSTS_FACTORY_PLUGIN_INCLUDES_DIR . '/functions.php' ;
// require HONEYPOSTS_FACTORY_PLUGIN_INCLUDES_DIR . '/class-HONEYPOSTS.php' ;
include 'includes/cpt-honeyposts.php';
include 'includes/functions.php';