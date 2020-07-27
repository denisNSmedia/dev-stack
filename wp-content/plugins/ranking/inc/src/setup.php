<?php

/*
 * main plugin setup class
 *
 */
namespace Ns\Inc\Src;

class Setup {

    use \Ns\Inc\Src\Traits\Singleton;

    function __construct() {

        Api\Init::instance();

    }

}
