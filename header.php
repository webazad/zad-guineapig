<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- device code -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <!-- BIG WRAPPER BEGINS -->
        <div class="big-wrapper">
            <header class="azad-header header--fixed hide-from-print">
                <div class="azad-container">
                    <div class="header-container">
                        <div class="logo">
                            <h1>
                                <?php
                                    if(has_custom_logo()){
                                        the_custom_logo();                             
                                    }else{ ?>
                                        <a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                                    <?php }
                                ?>
                            </h1>
                            <div id="hamburger-menu" class="burger-button"><span></span></div>
                        </div>
                        <div class="azad-nav">
                            <nav class="desktop-menus">
                                <!-- THE WAY TO SHOW NAVIGATION -->
                                <?php 
                                    if(function_exists('wp_nav_menu')){
                                        $defaults = array(
                                            'theme_location'  => 'header_main_menu',
                                            'menu'            => '',
                                            'container'       => 'div',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'nav navbar-nav',
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'           => 0,
                                            'walker'          => ''
                                        );
                                        wp_nav_menu($defaults);
                                    }elseif(has_nav_menu('sidebar_widget_one')){
                                        echo "Pleas set the menu first";
                                    }
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>                
            </header>
            <!-- RESPONSIVE SLIDER MENUS BEGINS -->
            <nav class="mobile-menus">
                <div class="responsive-slider-logo">
                    <h1>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod('mobile_slider_logo'); ?>" /></a>
                    </h1>
                </div>
                <!-- THE WAY TO SHOW NAVIGATION -->
                <?php 
                    if(function_exists('wp_nav_menu')){
                        $defaults = array(
                            'theme_location'  => 'responsive_slider_menu',
                            'menu'            => '',
                            'container'       => 'div',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'nav navbar-nav',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu($defaults);
                    }elseif(has_nav_menu('sidebar_widget_one')){
                        echo "Pleas set the menu first";
                    }
                ?>
                <div class="slider-menu-social">
                    <!--  THE WAY SHOW DYNAMIC SIDEBAR -->
                    <?php if ( !dynamic_sidebar( 'slider_menu_widget' ) ) : ?>
                        <aside id="search" class="widget">
                        <p>You need to select a widget to show things.</p>
                        </aside>    
                    <?php endif; // end sidebar widget area ?>
                </div>
            </nav><!-- ends responsive slider menus -->
        