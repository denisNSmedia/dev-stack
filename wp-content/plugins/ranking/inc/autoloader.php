<?php

use \Ns\Inc\Utils\Register;
use \Ns\Inc\Utils\Helper;
use \Ns\Inc\Utils\Component_Manager;

if ( ! defined('ABSPATH') ) {
	exit;
}

/*
 * human readable dump
 *
 */
if( ! function_exists('d') ) {
    function d( $what = '' ) {
        print '<pre>';
        print_r( $what );
        print '</pre>';
    }
}

/*
 * autoloader
 *
 */
spl_autoload_register( function( $class ) {

    if ( strpos( $class, 'Ns' ) === false ) { return; }

    $file_parts = explode( '\\', $class );

    $namespace = '';
    for( $i = count( $file_parts ) - 1; $i > 0; $i-- ) {

        $current = strtolower( $file_parts[ $i ] );
        $current = str_ireplace( '_', '-', $current );

        if( count( $file_parts ) - 1 === $i ) {
            $file_name = "{$current}.php";
        }else{
            $namespace = '/' . $current . $namespace;
        }
    }

    $filepath  = trailingslashit( dirname( dirname( __FILE__ ) ) . $namespace );
    $filepath .= $file_name;

    if( file_exists( $filepath ) ) {
        include_once( $filepath );
    }

});

/*
 * register utils
 *
 */
if( ! function_exists('NsMediaGroup') ) {
    function NsMediaGroup() {
        return Register::instance();
    }
}

if( ! function_exists('Ns') ) {
    function Ns() {
    	return NsMediaGroup()->helper();
    }
    NsMediaGroup()->register( 'helper', Helper::instance() );
}

/*
 * initializer
 *
 */
Ns\Inc\Init::instance();
