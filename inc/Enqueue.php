<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------------------------
*/
namespace Inc;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Enqueue' ) ):
    class Enqueue{
        public static $_instance = null;
        public function __construct() {
            add_action('wp_enqueue_scripts',array($this,'azad_enqueue_scripts'));
        }
		public static function azad(){
			echo 'asdf1234';
		}
        public function azad_enqueue_scripts() {
            // LOAD STYLESHEETS
            wp_register_style('main',trailingslashit(get_template_directory_uri()).'assets/css/main-style.min.css',array(),wp_get_theme('azad-x')->get( 'Version' ),'all');
            wp_enqueue_style('main');
            
            wp_register_style('headroom',trailingslashit(get_template_directory_uri()).'assets/css/headroom.css',array(),wp_get_theme('azad-x')->get( 'Version' ),'all');
            wp_enqueue_style('headroom');

            // LOAD JAVASCRIPTS
            wp_register_script('headroom',trailingslashit(get_template_directory_uri()).'assets/js/headroom.min.js',array('jquery'),wp_get_theme('azad-x')->get( 'Version' ),true);
            wp_enqueue_script('headroom');

            wp_register_script('activation',trailingslashit(get_template_directory_uri()).'assets/js/activation.js',array('jquery'),wp_get_theme('azad-x')->get( 'Version' ),true);
            wp_enqueue_script('activation');
        }
    }
endif;
if(! function_exists('load_azad_enqueue')){
    function load_azad_enqueue(){
        return Supports::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_enqueue();