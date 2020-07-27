<?php

/*
 * all admin stuff goes here
 *
 */
namespace Ns\Inc\Src;

class Admin {

    use \Ns\Inc\Src\Traits\Singleton;

    function __construct() {

        if( is_admin() ) {

            Admin\Http\Xhr::instance();

        }

    }

}
