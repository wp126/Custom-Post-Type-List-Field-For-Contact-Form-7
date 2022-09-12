<?php

// Check plugin activted or not
add_action('admin_init', 'CPTLFCF7_check_plugin_state');
function CPTLFCF7_check_plugin_state(){
    if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
        set_transient( get_current_user_id() . 'cptlfcf7error', 'message' );
    }
}

// Show admin notice for plugin require
add_action( 'admin_notices', 'CPTLFCF7_show_notice');
function CPTLFCF7_show_notice() {
    if ( get_transient( get_current_user_id() . 'cptlfcf7error' ) ) {
        deactivate_plugins( CPTLFCF7_BASE_NAME );

        delete_transient( get_current_user_id() . 'cptlfcf7error' );

        echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=contact+form+7">Contact Form 7</a> plugin installed and activated.</p></div>';
    }
}
