<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------------------------
*/
namespace Azad_Guineapig\Front;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Azad_Shortcodes' ) ) :

    class Azad_Shortcodes {

        public static $_instance = null;

        public function __construct() {

            add_shortcode( 'header', array( $this, 'theme_slider' ) );
            add_filter( 'widget_text', 'do_shortcode' );

        }

        public function theme_slider( $atts, $content = null ) {

            extract( 
                shortcode_atts( 
                    array(
                        'fs'    => '24px',
                        'color' => 'red'
                    ), 
                    $atts 
                )
            );
            
            ob_start(); 
            
            echo '<h2 style="color:' . $color . '; font-size:' . $fs . ';">' . $content . '</h2>';
            
            $contents = ob_get_contents();

            ob_end_clean();

            return $contents;

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

if ( ! function_exists( 'load_azad_shortcodes' ) ) {
    function load_azad_shortcodes() {
        return Azad_Shortcodes::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_shortcodes();