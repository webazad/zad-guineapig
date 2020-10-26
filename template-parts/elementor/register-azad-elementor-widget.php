<?php
class Azad_Elementor_Widgets {
    private static $instance = null;
    public function __construct() {
        //add_action( 'hook', array( $this, 'function' ) );
    }
    public static function get_instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();            
        }
        return self::$instance;
    }
    public function init() {
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
        add_action( 'elementor/elements/categories_registered', array( $this, 'categories_registered' ) );
    }
    public function categories_registered( $elements_manager ) {
        //\Elementor\Plugin::instance()->elements_manager->add_category(
        $elements_manager->add_category(
           'azad_category', array(
                'title' => __( 'Azad', 'azad' ),
                'icon'  => 'fa fa-plug',
            )
        );
    }
    public function widgets_registered() {
        if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
            $widgets_file = get_template_directory() . '/inc/page_builders/create-azad-elementor-widgets.php';
            $template_file = locate_template( $widget_file );
            if ( ! $template_file || ! is_readable( $template_file ) ) {
                $template_file = get_template_directory() . '/inc/page_builders/create-azad-elementor-widgets.php';
            }
            if ( $template_file || is_readable( $template_file ) ) {
                require_once( $template_file );
            }
        }
    }    
}

if ( ! function_exists( 'azad_elementor' ) ) {
    function azad_elementor(){
        Azad_Elementor_Widgets::get_instance()->init();
    }
}
$GLOBALS['azad_elementor']= azad_elementor();