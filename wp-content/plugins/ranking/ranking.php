<?php

/**
 * The plugin bootstrap file
 *
 * Plugin Name:       Ranking
 * Plugin URI:        n/a
 * Description:       Ranking
 * Version:           1.1
 * Author:            Ivaylo Zahariev
 * Author URI:        n/a
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ns
 * Domain Path:       /languages
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

/*
 * textdomain
 *
 */
if( ! function_exists('ns_load_textdomain') ) {
    function ns_load_textdomain() {
    	load_plugin_textdomain( 'ns-ranking', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }
    add_action( 'init', 'ns_load_textdomain' );
}

/*
 * constants
 *
 */
define( 'NS_PLUGIN', __FILE__ );
define( 'NS_PATH', wp_normalize_path( plugin_dir_path( __FILE__ ) . DIRECTORY_SEPARATOR ) );
define( 'NS_URI', plugin_dir_url( __FILE__ ) );
define( 'NS_VERSION', '1.0' );

/*
 * autoloader
 *
 */
require_once NS_PATH . 'inc/autoloader.php';
