<?php
/**
*------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*------------------------------------
*/
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

define( 'AZPIG_NAME', wp_get_theme()->get( 'Name' ) );
define( 'AZPIG_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'AZPIG_TEXTDOMAIN', wp_get_theme()->get( 'TextDomain' ) );
define( 'AZPIG_DIR', trailingslashit( get_template_directory() ) );
define( 'AZPIG_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( file_exists(dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( class_exists( 'Azad_Guineapig\\Init' ) ) :
    Azad_Guineapig\Init::register_services();
endif;