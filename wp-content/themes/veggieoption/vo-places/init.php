<?php
/*
Plugin Name: VO Placess
Description:
Version: 1.0
Author: Yigit Harut
Author URI: http://yigitharut.com
 */
// function to create the DB / Options / Defaults
// function ss_options_install() {

//     global $wpdb;

//     $table_name = "vo_places";
//     $charset_collate = $wpdb->get_charset_collate();
//     $sql = "CREATE TABLE `vo_places` (
//         `id` int(11) NOT NULL AUTO_INCREMENT,
//         `place_status` varchar(50) CHARACTER SET utf8 NOT NULL,
//         `title` varchar(100) CHARACTER SET utf8 NOT NULL,
//         `content` text CHARACTER SET utf8,
//         `category` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
//         `author` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
//         `date_created` datetime NOT NULL,
//         `date_updated` datetime DEFAULT NULL,
//         `location` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `phone_number` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `mobile_number` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `website` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `rating` float DEFAULT NULL,
//         `when_to_go` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `budget` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `which_mood` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `to_go_with` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `reservation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `cuisine` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `remarks` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `meta_title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `meta_description` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
//         `entity_status` varchar(50) CHARACTER SET utf8 NOT NULL,
//         PRIMARY KEY (`id`)
//        ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";

//     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//     dbDelta($sql);
// }

// // run the install scripts upon plugin activation
// register_activation_hook(__FILE__, 'ss_options_install');

add_action('admin_menu', 'vo_places_modifymenu');
function vo_places_modifymenu()
{

    //this is the main item for the menu
    add_menu_page('Places', //page title
        'Places', //menu title
        'manage_options', //capabilities
        'vo_places_list', //menu slug
        'vo_places_list', //function
        'dashicons-carrot' //
    );

    //this is a submenu
    add_submenu_page('vo_places_list', //parent slug
        'Add New Place', //page title
        'Add New', //menu title
        'manage_options', //capability
        'vo_places_create', //menu slug
        'vo_places_create'); //function

    //this submenu is HIDDEN, however, we need to add it anyways
    add_submenu_page(null, //parent slug
        'Update Place', //page title
        'Update', //menu title
        'manage_options', //capability
        'vo_places_update', //menu slug
        'vo_places_update'); //function
}
define('ROOTDIR', get_template_directory() . '/vo-places/');
require_once ROOTDIR . 'places-list.php';
require_once ROOTDIR . 'places-create.php';
require_once ROOTDIR . 'places-update.php';


