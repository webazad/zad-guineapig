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
                    'param_name' => "title_1",
                    'type' => "textfield",
                    'heading' => "base_1",
                    'value' => "Azad"
                ),
                array(
                    'param_name' => "title_2",
                    'type' => "textarea",
                    'heading' => "base_1",
                    'value' => "Azad"
                )
            )
        )
    );
}

add_action('vc_before_init', 'azad_vc');

// Template parts
function azad_base($atts, $content = null) {

    extract(
        shortcode_atts(
            array(
                'title_1'    => '24px',
                'title_2' => 'red'
            ),
            $atts
        )
    );

    ob_start();

    echo '<h2 style="color:' . $color . '; font-size:' . $fs . ';">' . $content . '</h2>';

    $contents = ob_get_contents();

    ob_get_clean();

    return $contents;
}

add_shortcode('base_1', 'azad_base');
