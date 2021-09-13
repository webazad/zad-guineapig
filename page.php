<?php
/**
*------------------------------------
* :: @package azad-guineapig
* :: @version 1.0.0
*------------------------------------
*/
get_header(); ?>

    <!-- # SECTION BEGINS -->
    <section class="azad-section azad-pages">
        <div class="azad-container">
            <div class="page-container">
                
				<?php 
                    the_post_thumbnail_url();
                ?>
				
                <?php 
                    if ( have_posts() ) : 
                        get_template_part( 'template-parts/loop', 'page' );					
                    else:
                        get_template_part( 'template-parts/loop', 'none' );
                    endif;
                ?>

            </div>
        </div>
    </section><!-- ends # section -->
    
<?php get_footer();