<?php
/**
*------------------------------------
* :: @package azad-guineapig
* :: @version 1.0.0
*------------------------------------
*/
get_header(); ?>

    <!-- MAIN SECTION BEGINS -->
    <section class="azad-section">
        <div class="azad-container">
            <div class="blog-container">

                <?php 
                    if ( have_posts() ) : 
                        get_template_part( 'template-parts/loop', get_post_format() );					
                    else:
                        get_template_part( 'template-parts/loop', 'none' );
                    endif;
                ?>

            </div>
        </div>
    </section><!-- ends main section -->

<?php get_footer();