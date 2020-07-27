<?php

namespace Ns\Inc\Utils;

use \Ns\Inc\Src\Form\Component as Form;

/*
 * main helper, holds useful methods, that can be called on the go
 *
 */
class Helper {

    use \Ns\Inc\Src\Traits\Singleton;

    function __construct() {
        // ..
    }

    // get plugin template path
    public function plugin_template_path( $name ) {

        $template_path = sprintf( '%stemplates/%s.php', NS_PATH, str_replace( 'masterdir/', '', $name ) ); NS_PATH . "templates/{$name}.php";

        if( file_exists( $template_path ) ) {
            return $template_path;
        }

        return null;

    }

    // return template
    public function the_template( $name ) {
        echo $this->get_template( $name );
    }

    // get plugin templates
    public function get_template( $name ) {

        ob_start();

        $plugin_template_path = $this->plugin_template_path( $name );

        if( $plugin_template_path ) {
            include $plugin_template_path;
        }

        return ob_get_clean();

    }

    // escape and sanitize any input
    public function sanitize( $data ) {

        if( is_array( $data ) ) {
            foreach( $data as $k => $v ) {
                $data[ $k ] = is_array( $v ) ? $this->sanitize( $v ) : sanitize_text_field( $v );
            }
        }else{
            $data = sanitize_text_field( $data );
        }
        return $data;

    }

}
