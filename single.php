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
        <div class="azad-container azad-stretched">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <article id="<?php the_ID(); ?>" class="azad-article">
                    <div class="azad-heading">
                        <!-- <h2><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></h2> -->
                    </div>
                    <div class="azad-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; else: ?>
                <p>No content found for now. You can try <a href="<?php site_url(); ?>"><?php bloginfor('name'); ?></a></p>
            <?php endif; ?>
        </div>
    </section><!-- ends # section -->
<?php get_footer(); ?>            