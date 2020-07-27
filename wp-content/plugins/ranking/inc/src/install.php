<?php

/*
 * fire after plugin installation
 *
 */
namespace Ns\Inc\Src;

use \Ns\Inc\Src\Traits\Singleton;

class Install {

    use Singleton;

    // database version
    public $version = '1.0';

    function __construct() {

        // hook to fire after plugin installation
        register_activation_hook( NS_PLUGIN, [ $this, 'install' ] );

    }

    // handle database
    public function install() {

        $this->create_table_visits();
        $this->insert_table_data();
        $this->update_db_version();

    }

    // create tables
    public function create_table_visits() {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ns_customers';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "
            CREATE TABLE IF NOT EXISTS $table_name (
                CustomerId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                EntityId INT(6),
                LocationId INT(6),
                Title VARCHAR(30) NOT NULL,
                FirstName VARCHAR(30) NOT NULL,
                LastName VARCHAR(30) NOT NULL,
                CommonName VARCHAR(30) NULL,
                Gender VARCHAR(6) NULL,
                Position VARCHAR(25) NULL,
                Icon VARCHAR(6) NULL,
                Institution VARCHAR(50) NULL,
                IndustrySector VARCHAR(50) NULL,
                Qualification VARCHAR(250) NULL,
                NsMediaBrands VARCHAR(250) NULL,
                Children VARCHAR(30) NULL,
                Sponsred BIT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) $charset_collate;
        ";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

    }

    // check if our table is empty
    public function is_clients_empty() {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ns_customers';

        $count = $wpdb->get_var("
            SELECT COUNT(*)
            FROM {$table_name} WHERE CustomerId IS NOT NULL"
        );

        return $count == 0;

    }

    // make sure the table is not empty
    public function insert_table_data() {

        global $wpdb;

        if( ! $this->is_clients_empty() ) {
            return;
        }

        $dummies = [
            [
                'EntityId' => 12,
                'LocationId' => 13,
                'Title' => 'Dr',
                'FirstName' => 'Test',
                'LastName' => 'Test',
                'CommonName' => 'Test Company',
                'Gender' => 'M',
                'Position' => 'Test',
                'Icon' => '1',
                'Institution' => 'FDI',
                'IndustrySector' => 'FDI',
                'Qualification' => 'MA',
                'NsMediaBrands' => 'N/A',
                'Children' => 'None',
                'Sponsred' => true,
            ],
            [
                'EntityId' => 12,
                'LocationId' => 13,
                'Title' => 'Dr',
                'FirstName' => 'Test2',
                'LastName' => 'Test2',
                'CommonName' => 'Test Company',
                'Gender' => 'F',
                'Position' => 'Test',
                'Icon' => '1',
                'Institution' => 'FDI',
                'IndustrySector' => 'FDI',
                'Qualification' => 'MA',
                'NsMediaBrands' => 'N/A',
                'Children' => 'None',
                'Sponsred' => true,
            ]
        ];

        foreach( $dummies as $dummy ) {
            $wpdb->insert( 'wp_ns_customers', $dummy );
        }

    }

    // insert our db version
    public function update_db_version() {
        update_option( 'ns_db_version', $this->version );
    }

}
