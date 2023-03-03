<?php 

// load plugin textdomain
add_action( 'plugins_loaded', 'CPTLFCF7_load_textdomain' );

function CPTLFCF7_load_textdomain() {
    load_plugin_textdomain( 'custom-post-type-list-field-for-contact-form-7', false, dirname( CPTLFCF7_BASE_NAME ) . '/languages' ); 
}

// load plugin textdomain mofile
function CPTLFCF7_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'custom-post-type-list-field-for-contact-form-7' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( CPTLFCF7_BASE_NAME ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'CPTLFCF7_load_my_own_textdomain', 10, 2 );