<?php
/**
*--------------------------------
* :: @package azad-x
* :: @version 1.0.0
*--------------------------------
*/
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;
get_header(); ?>

    <!-- MAIN SECTION BEGINS -->
    <section class="azad-section azad-search">
        <div class="azad-container">
	
			<?php
				if ( have_posts() ) :
					get_template_part( 'template-parts/loop', 'search' );
				else:
					get_template_part( 'template-parts/loop', 'none' );
				endif;
			?>
				
        </div>
    </section><!-- ends main section -->
	
<?php get_footer();