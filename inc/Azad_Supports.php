<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------------------------
*/
namespace Azad_Guineapig;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Azad_Supports' ) ) :

    class Azad_Supports {

        public static $_instance = null;

        public function __construct() {

            add_action( 'after_setup_theme', array( $this, 'azad_supports' ) );
        }

        public function azad_supports() {
            //  1.. TO SHOW TITLE TAG
            if ( function_exists( 'add_theme_support' ) ) {
                add_theme_support('title-tag');
            }
            // 2.. TO ADD CUSTOM HEADER
            if ( function_exists( 'add_theme_support' ) ) {
                $defaults = array(
                    'height'      => 100,
                    'width'       => 400,
                    'flex-height' => true,
                    'flex-width'  => true,
                    'header-text' => array( 'site-title', 'site-description' )
                );
                add_theme_support('custom-logo', $defaults);
            }
            // 3.. TO SUPPORT FEATURED IMAGES
            if ( function_exists( 'add_theme_support' ) ) {
                add_theme_support( 'post-thumbnails', array( 'post', 'page', 'sliders', 'portfolio', 'promotion' ) );
            }
            // 4. TO ADD POST FORMAT
			if ( function_exists( 'add_theme_support' ) ) {
				add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
			}
            // 5. MULTIPLE MENU REGISTER SYSTEM
            if ( function_exists( 'register_nav_menus' ) ) {
                register_nav_menus( array(
                    'desktop_horizontal'   	=> __( 'Desktop Horizontal Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'desktop_sticky' 		=> __( 'Desktop Sticky Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'desktop_expanded'  	=> __( 'Desktop Expanded Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'responsive_toggle'  	=> __( 'Responsive Toggle Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'responsive_expanded'	=> __( 'Responsive Expanded Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'footer'				=> __( 'Footer Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'left_sidebar'			=> __( 'Left Sidebar Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'right_sidebar'			=> __( 'Right Sidebar Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'search_page'			=> __( 'Search Page Menu', AZAD_GUINEAPIG_TEXTDOMAIN ),
                    'no_page'				=> __( '404 Page Menu', AZAD_GUINEAPIG_TEXTDOMAIN )
                ) );
            } 
        }

        public static function get_instance() {
            if ( is_null( self::$_instance ) && ! isset( self::$_instance ) && ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();            
            }
            return self::$_instance;
        }

        public function __destruct() {}

    }

endif;

if ( ! function_exists( 'load_azad_supports' ) ) {
    function load_azad_supports() {
        return Supports::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_supports();