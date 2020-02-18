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
if ( ! class_exists( 'Azad_Supports' ) ):
    class Azad_Supports{
        public static $_instance = null;
        public function __construct() {
            add_action('after_setup_theme',array($this,'azad_supports'));
        }
        public function azad_supports() {
            //  1.. TO SHOW TITLE TAG
            if(function_exists('add_theme_support')){
                add_theme_support('title-tag');
            }
            // 2.. TO ADD CUSTOM HEADER
            if(function_exists('add_theme_support')){
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
            if(function_exists('add_theme_support')){
                add_theme_support( 'post-thumbnails', array( 'post', 'page', 'sliders', 'portfolio', 'promotion' ) );
            }
            // 4.. MULTIPLE MENU REGISTER SYSTEM
            if(function_exists('register_nav_menus')){
                register_nav_menus(array(
                    'header_main_menu'   => __('Header Main Menu', 'azad-x'),
                    'header_stick_menu' => __('Header Stick Menu', 'azad-x'),
                    'responsive_mobile_menu'  => __('Responsive Mobile Menu', 'azad-x'),
                    'responsive_slider_menu'  => __('Responsive Slider Menu', 'azad-x'),
                    'footer_menu'=> __('Footer Menu', 'azad-x'),
                    'left_sidebar_menu'=> __('Left Sidebar Menu', 'azad-x'),
                    'right_sidebar_menu'=> __('Right Sidebar Menu', 'azad-x'),
                    'search_page_menu'=> __('Search Page Menu', 'azad-x'),
                    'no_page_menu'=> __('404 Page Menu', 'azad-x')
                ));
            } 
        }
    }
endif;
if(! function_exists('load_azad_supports')){
    function load_azad_supports(){
        return Supports::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_supports();