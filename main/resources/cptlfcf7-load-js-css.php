<?php 

// load css and js in backend
add_action('admin_enqueue_scripts', 'CPTLFCF7_load_admin_script_style' );
function CPTLFCF7_load_admin_script_style() {
    wp_enqueue_script( 'cptlfcf7-back-js', CPTLFCF7_PLUGIN_DIR . '/assets/js/back.js', false, '1.0.0', true );
    wp_enqueue_style( 'cptlfcf7-admin-css', CPTLFCF7_PLUGIN_DIR . '/assets/css/admin.css', false, '1.0.0' );
}


// load css and js in frontend
add_action( 'wp_enqueue_scripts', 'CPTLFCF7_load_frontend_script_style' );
function CPTLFCF7_load_frontend_script_style() {
    wp_enqueue_script( 'cptlfcf7-front-js', CPTLFCF7_PLUGIN_DIR . '/assets/js/front.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'cptlfcf7-select2-js', CPTLFCF7_PLUGIN_DIR . '/assets/js/select2.js', false, '1.0.0', true );
    wp_enqueue_style( 'cptlfcf7-select2-css', CPTLFCF7_PLUGIN_DIR . '/assets/css/select2.css', false, '1.0.0' );
    wp_enqueue_style( 'cptlfcf7-front-css', CPTLFCF7_PLUGIN_DIR . '/assets/css/front.css', false, '1.0.0' );
}    
