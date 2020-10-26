<?php

/**
 *-----------------------------------------------------------
 * :: @package azad-x
 * :: @version 1.0.0
 *-----------------------------------------------------------
 */
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

define('AZAD_GUINEAPIG_NAME', wp_get_theme()->get('Name'));
define('AZAD_GUINEAPIG_VERSION', wp_get_theme()->get('Version'));
define('AZAD_GUINEAPIG_TEXTDOMAIN', wp_get_theme()->get('TextDomain'));
define('AZAD_GUINEAPIG_DIR', trailingslashit(get_template_directory()));
define('AZAD_GUINEAPIG_URI', trailingslashit(esc_url(get_template_directory_uri())));

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (class_exists('Azad_Guineapig\\Init')) :
    Azad_Guineapig\Init::register_services();
endif;

if (!function_exists('azad_gutenberg_meta')) :
    function azad_gutenberg_meta()
    {
        echo 'Follow twentysixteen';
    }
endif;

// Options
function azad_vc () {
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

add_action('vc_before_init', 'azad_vc');

// Template parts
function azad_base( $atts ) {

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

add_shortcode('base_1', 'azad_base');
