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
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( "charset" ); ?>" />
        <!-- device code -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <!-- to make the header scripts works -->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <!-- BIG WRAPPER BEGINS -->
        <div class="big-wrapper">
            <header class="azad-header header--fixed hide-from-print">
                <div class="azad-container">
                    <div class="header-container">

                        <div class="title-wrapper">
                            <?php
                                // Check whether the header search is activated in the customizer.
                                $enable_header_search = get_theme_mod( 'header_search_icon', true );

                                if ( true === $enable_header_search ) : ?>
                                    <button class="toggle search-toggle responsive-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                        <span class="toggle-inner">
                                            <?php azad_the_svg( 'search' ); ?>
                                            <span class="toggle-text"><?php _e( 'Search', 'azad-guineapig' ); ?></span>
                                        </span>
                                    </button>
                            <?php endif; ?>
                            <div class="logo">
                                <hgroup><?php azad_site_logo(); ?></hgroup>
                                <div id="hamburger-menu" class="burger-button"><span></span></div>
                            </div>
                            <!-- RESPONSIVE TOGGLE BUTTON BEGINS -->
                            <button class="toggle nav-toggle responsive-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                <span class="toggle-inner">
                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                    <span class="toggle-text"><?php _e( 'Menu', 'azad-guineapig' ); ?></span>
                                </span>
                            </button><!-- ends responsive toggle button -->
                        </div>
                        <div class="azad-nav">
                            <nav class="desktop-menus">
                                <!-- THE WAY TO SHOW NAVIGATION -->
                                <?php								
                                    if ( function_exists( 'wp_nav_menu' ) ) {
                                        $defaults = array(
											'theme_location'  => 'desktop_horizontal',
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
                                        wp_nav_menu( $defaults );
                                    } else {
                                        echo "Pleas set the menu to display here...";
                                    }
                                ?>
                            </nav>
                            
                            <?php if ( true === $enable_header_search || has_nav_menu( 'desktop_expanded' ) ) : ?>                            
                                <!-- ICON BUTTONS BEGIN -->
                                <div class="azad-search-button">
                                    <?php if ( has_nav_menu( 'desktop_expanded' ) ) : ?>                      
                                        <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Menu', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .nav-toggle -->
                                        </div><!-- .nav-toggle-wrapper -->
                                    <?php endif; ?>
                                    <?php if ( true === $enable_header_search ) : ?>                                   
                                        <div class="toggle-wrapper search-toggle-wrapper">
                                            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'search' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Search', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .search-toggle -->
                                        </div>           
                                    <?php endif; ?>
                                </div><!-- ends icon buttons -->                           
                            <?php endif; ?>

                        </div>                        
                    </div><!-- ends header-container -->
                </div><!-- ends azad-container -->
            </header><!-- ends header -->

            <?php
                // Output the search modal (if it is activated in the customizer).
                if ( true === $enable_header_search ) {
                    get_template_part( 'template-parts/modal-search' );
                }
            ?>

            <!-- RESPONSIVE SLIDER MENU BEGINS -->
            <nav class="mobile-menus">
                <!-- THE WAY TO SHOW NAVIGATION -->
                <?php 
                    // if ( function_exists('wp_nav_menu' ) ) {
                    //     if ( has_nav_menu( 'responsive_toggle' ) ) {
                    //         $defaults = array(
                    //             'theme_location'  => 'responsive_toggle',
                    //             'container'       => 'div',
                    //             'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    //             'show_toggles'   => true,
                    //         );
                    //         wp_nav_menu( $defaults );
                    //     } else {
                    //         echo '<ul><li><a href="">Pleas set the menu first</a><li></ul>';
                    //     }
                    // }
                ?>
                
            </nav><!-- ends responsive slider menu -->

            <?php
                // Output the menu modal.
                get_template_part( 'template-parts/modal-menu' );