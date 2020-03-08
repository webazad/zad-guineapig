<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
get_header(); 

$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => '12',
    'post_status'       => 'publish',
);
$custom_query = new WP_Query($args);
?>

    <!-- # SECTION BEGINS -->
    <section class="azad-section">
        <div class="azad-container azad-stretched grid">
        <?php if ( $custom_query->have_posts() ) : ?>
                <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                    <figure class="grid-item" id="<?php echo get_the_id(); ?>">
                        <h2><a href="<?php //the_permalink() ?>"><?php //the_title(); ?></a></h2>
                        <!--div class="meta"><em>Posted on:</em> <?php //the_time('F jS, Y') ?><em>by</em> <?php //the_author() ?></div-->
                        <div class="featured_image">
                            <?php if(has_post_thumbnail()): ?>
                            <?php $url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
                                <!--img src="<?php echo $url; ?>" alt="" width="" height="" /-->
                            <?php //the_post_thumbnail(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="entry">
                            <?php //the_content(); ?>
                            <?php //read_more(30); ?><!--a href="<?php //the_permalink(); ?>">read more</a-->
                        </div>
                        <!--div class="postmetadata">
                            <?php //the_tags('Tags: ', ', ', '<br />'); ?>
                            Posted in <?php //the_category(', ') ?> | 
                            <?php //comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                        </div-->
                    </figure>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </section><!-- ends # section -->

<?php get_footer(); ?>            