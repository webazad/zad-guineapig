<?php
/**
*------------------------------------
* :: @package azad-guineapig
* :: @version 1.0.0
*------------------------------------
*/
get_header(); ?>

    <!-- # SECTION BEGINS -->
    <section class="azad-section azad-front">
        <div class="azad-container azad-stretched">

            <?php 
                if ( have_posts() ) : 
                    get_template_part( 'template-parts/loop', get_post_format() );					
                else:
                    get_template_part( 'template-parts/loop', 'none' );
                endif;
            ?>
            
        </div>
    </section><!-- ends # section -->

<?php get_footer();