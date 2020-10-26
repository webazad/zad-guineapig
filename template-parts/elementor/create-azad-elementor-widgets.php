<?php
namespace Elementor;
class FirstWidget extends Widget_Base {
    //public function __construct() {}
    public function get_name() {
        return 'Azad';
    }
    public function get_title() {
        return 'Azad Widget';
    }
    public function get_icon() {
        return 'eicon-lock-user';
    }
    public function get_categories() {
        return ['azad_category'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'section_1', array(
                'label'     => __( 'Content', 'azad' ),
                'tab'       => Controls_Manager::TAB_CONTENT
            )
        );
        $this->add_control(
            'title', array(
                'label'         => __( 'Section One Title', 'azad' ),
                'type'          => Controls_Manager::TEXT,
                'input_type'    => 'text',
                'placeholder'   => __( 'Insert the title here', 'azad' ),
            )
        );
        $this->add_control(
            'select', array(
                'label'         => __( 'Select the view', 'azad' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => array(
                    'default'   => 'default',
                    'yes'       => __( 'Yes', 'azad' ),
                    'no'        => __( 'No', 'azad' ),
                ),
                'default'    => 'default',
            )
        );
        $this->add_control(
            'image', array(
                'label'         => __( 'Select the view', 'azad' ),
                'type'          => Controls_Manager::MEDIA,
                //'default'    => 'default',
            )
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_2', array(
                'label'     => __( 'Content', 'azad' ),
                'tab'       => Controls_Manager::TAB_CONTENT
            )
        );
        $this->add_control(
            'section_2_title', array(
                'label'         => __( 'Section One Title', 'azad' ),
                'type'          => Controls_Manager::TEXT,
                'input_type'    => 'text',
                'placeholder'   => __( 'Insert the title here', 'azad' ),
            )
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_3', array(
                'label'     => __( 'Content with Style', 'azad' ),
                'tab'       => Controls_Manager::TAB_STYLE
            )
        );
        $this->add_control(
            'alignment', array(
                'label'         => __( 'Select the view', 'azad' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => array(
                    'default'   => 'default',
                    'yes'       => __( 'Yes', 'azad' ),
                    'no'        => __( 'No', 'azad' ),
                ),
                'default'    => 'default',
            )
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="" style="background:blue;"><?php echo $settings['title']; ?></div>        
            <img src="<?php echo $settings['image']['url']; ?>" />
            <div class="" style="background:blue;"><?php echo $settings['section_2_title']; ?></div>        
        <?php
    }
    protected function _content_template() {
        ?>
        <div class="" style="background:blue;">{{{settings.title}}}</div>
        <img src="{{{settings.image.url}}}" />
        <div class="" style="background:blue;">{{{settings.section_2_title}}}</div>                
        <?php
    }
    //public function __destruct() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new FirstWidget );