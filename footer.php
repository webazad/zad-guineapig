<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
?>
            <!-- FOOTER SECTION BEGINS -->
            <footer class="azad-footer" style="background:<?php echo get_theme_mod('copyright_bg','#e3e3e3'); ?>;color:<?php echo get_theme_mod('copyright_color','#000000'); ?>;">
                <div class="azad-container">
                    <div class="footer-container">
                        <div class="footer-left">
                            <p>&copy; <?php echo date("Y"); ?><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></p>
                        </div>
                        <div class="footer-right">
                            <!--  THE WAY SHOW DYNAMIC SIDEBAR -->
							<?php if ( !dynamic_sidebar( 'footer_widget_two' ) ) : ?>
								<aside id="search" class="widget">
									<p>You need to select a widget to show things.</p>
								</aside>
							<?php endif; // end sidebar widget area ?>
                        </div>
                    </div>
                </div>
            </footer><!-- ends footer -->
        </div><!-- ends big wrapper -->
        <!-- CLICK AUDIO -->
        <audio id="hamburger-hover" src="<?php echo get_template_directory_uri(); ?>/assets/audio/link.mp3" preload="auto"></audio>
		<!-- TO MAKE THE SCRIPTS WORK -->
        <?php wp_footer(); ?>
    </body>
</html>