<?php

/*
 * main api class
 *
 */
namespace Ns\Inc\Src\Api;

class Init {

    use \Ns\Inc\Src\Traits\Singleton;

    function __construct() {

        // register out api routes
        add_action( 'rest_api_init', [ $this, 'register_routes' ] );

    }

    // register out api routes
    public function register_routes() {

        $version = '1';
        $namespace = sprintf( 'ns/v%s', $version );

        register_rest_route( $namespace, '/customers/all', [
            'methods' => 'GET',
            'callback' => [ $this, 'get_customers' ]
        ]);

    }

    // handler for customers/all api route
    public function get_customers() {

        global $wpdb;

        $results = $wpdb->get_results("
            SELECT *
            FROM {$wpdb->prefix}ns_customers
            LIMIT 10
        ");

        wp_send_json( $results );

    }

}
