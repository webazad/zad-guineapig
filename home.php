<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
get_header(); ?>
    <!-- # SECTION BEGINS -->
    <section class="azad-section">
        <div class="azad-container">
            <?php get_template_part('template-parts/content',get_post_format()); ?>                        
        </div>
    </section><!-- ends # section -->
<?php get_footer(); ?>            