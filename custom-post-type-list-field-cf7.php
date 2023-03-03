<?php
/**
* Plugin Name: Custom Post Type List Field For Contact Form 7
* Description: This plugin allows create Custom Post Type List Field For Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2023
* Text Domain: custom-post-type-list-field-for-contact-form-7
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
    die('-1');
}

// Define plugin file
define('CPTLFCF7_PLUGIN_FILE', __FILE__);

// Define plugin dir
define('CPTLFCF7_PLUGIN_DIR',plugins_url('', __FILE__));

// Define base name
define('CPTLFCF7_BASE_NAME', plugin_basename( CPTLFCF7_PLUGIN_FILE ));

// load wordpress plugins file
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Load all includes files
include_once('main/backend/cptlfcf7-post-control.php');
include_once('main/frontend/cptlfcf7-post.php');
include_once('main/resources/cptlfcf7-installation-require.php');
include_once('main/resources/cptlfcf7-language.php');
include_once('main/resources/cptlfcf7-load-js-css.php');

function CPTLFCF7_support_and_rating_links( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ($plugin_file_name !== plugin_basename(__FILE__)) {
      return $links_array;
    }

    $links_array[] = '<a href="https://www.plugin999.com/support/">'. __('Support', 'custom-post-type-list-field-for-contact-form-7') .'</a>';
    $links_array[] = '<a href="https://wordpress.org/support/plugin/custom-post-type-list-field-for-contact-form-7/reviews/?filter=5">'. __('Rate the plugin ★★★★★', 'custom-post-type-list-field-for-contact-form-7') .'</a>';

    return $links_array;

}
add_filter( 'plugin_row_meta', 'CPTLFCF7_support_and_rating_links', 10, 4 );