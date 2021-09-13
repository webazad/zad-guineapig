<?php
/**
*----------------------------
* :: @package azad-x
* :: @version 1.0.0
*----------------------------
*/
namespace Azad_Guineapig;
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Init' ) ) :

    final class Init {
        
        public function __construct() {}

        public static function get_services() {

            return [
                Azad_Supports::class,
                Admin\Azad_Customizer::class,
                Admin\Azad_Widgets::class,
                Admin\Azad_SVG_Icons::class,
                Front\Azad_Shortcodes::class,
                Front\Azad_Vc::class,
                // Azad_Register_Elementor_Widgets::class,
                Enqueue::class,
                Admin\Azad_Custom_Posts::class
            ];   
        }
        
        public static function register_services() {
            foreach ( self::get_services() as $class ) {
                $service = self::instantiate( $class );
                if ( method_exists( $service, 'register' ) ) {
                    $service->register();
                }
            }
        }
        private static function instantiate( $class ) {
            $service = new $class();
            return $service;
        }
        public function __destruct() {}
    }
    
endif;