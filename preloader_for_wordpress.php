<?php
/**
 * Plugin Name: Preloader for Wordpress
 * Plugin URI:  https://github.com/wpwebguru/wp_preloader
 * Author:      Sunny Hossain
 * Author URI:  https://www.fiverr.com/ictsunny
 * Description: Preloader for Wordpress Website.
 * Version:     1.0.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: pre_loader
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'WPCPL_VERSION' ) ) {
	define( 'WPCPL_VERSION', '1.0.0' ); // Version of plugin
}

if( ! defined( 'WPCPL_DIR' ) ) {
	define( 'WPCPL_DIR', dirname( __FILE__ ) ); // Plugin dir
}

if( ! defined( 'WPCPL_URL' ) ) {
	define( 'WPCPL_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}

// Public file
require_once( WPCPL_DIR . '/classes/public_class.php' );


add_action( 'wp_enqueue_scripts', 'WP_PRE_Loader_style_script' );

function WP_PRE_Loader_style_script() {

	// Registring public style
	wp_register_style( 'wp_pre_loader_style', WPCPL_URL.'assets/css/public.css', null, WPCPL_VERSION );
	wp_enqueue_style('wp_pre_loader_style');

	// Registring public script
	wp_register_script( 'wp_pre_loader_script', WPCPL_URL."assets/js/public.js", array('jquery'), WPCPL_VERSION, true );
}

