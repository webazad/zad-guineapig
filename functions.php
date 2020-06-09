<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

define( 'AZAD_GUINEAPIG_NAME', wp_get_theme()->get( 'Name' ) );
define( 'AZAD_GUINEAPIG_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'AZAD_GUINEAPIG_TEXTDOMAIN', wp_get_theme()->get( 'TextDomain' ) );
define( 'AZAD_GUINEAPIG_DIR', trailingslashit( get_template_directory() ) );
define( 'AZAD_GUINEAPIG_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( class_exists( 'Azad_Guineapig\\Init' ) ) : 
    Azad_Guineapig\Init::register_services();
endif;

if ( ! function_exists( 'azad_gutenberg_meta' ) ) :
    function azad_gutenberg_meta(){
        echo 'Follow twentysixteen';
    }
endif;