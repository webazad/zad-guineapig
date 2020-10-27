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

if ( ! class_exists( 'Azad_Vc' ) ) :

    class Azad_Vc {

        public static $_instance = null;

        public function __construct() {

            add_action( 'vc_before_init', array( $this, 'azad_vc' ) );
            add_shortcode( 'base_1', array( $this, 'azad_base' ) );
            
        }

        // Options
        public function azad_vc () {
            vc_map(
                array(
                    'name' => "Azad Text Block",
                    'description' => "For test perpose",
                    'base' => "base_1",
                    'category' => "Azad",
                    'icon' => "asdf",
                    'params' => array(
                        array(
                            'param_name' => "title",
                            'type' => "textfield",
                            'heading' => "Title",
                            'value' => "Azad"
                        ),
                        array(
                            'param_name' => "description",
                            'type' => "textarea",
                            'heading' => "Title Color",
                            'value' => "Azad"
                        ),
                        array(
                            'param_name' => "color",
                            'type' => "colorpicker",
                            'heading' => "Description",
                            'value' => "Azad"
                        ),
                        array(
                            'param_name' => "image",
                            'type' => "attach_image",
                            'heading' => "Image",
                            'value' => ""
                        ),
                        array(
                            'param_name' => "icon",
                            'type' => "iconpicker",
                            'heading' => "Image",
                            'value' => "A",
                            'group' => "Icon group"
                        )
                    )
                )
            );
        }

        // Template parts
        public function azad_base( $atts ) {
            extract(
                shortcode_atts(
                            
                    array(
                        'title'    => '24px',
                        'description' => 'red',
                        'image' => 'red',
                        'icon' => 'red'
                    ),
                    $atts
                )
                    );

            ob_start();

            echo '<h2>' . $title . '</h2>';
            echo '<h2>' . $description . '</h2>';
            $image = wp_get_attachment_image_src( $image, 'full' );
            echo '<img src="' . esc_url( $image[0] ) . '"/>';
            $contents = ob_get_contents();

            ob_get_clean();

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

if ( ! function_exists( 'load_azad_vc' ) ) {
    function load_azad_vc() {
        return Azad_Vc::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_vc();