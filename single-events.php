<?php get_header(); ?>
<div class="events-container">
    <div class="single-container">
        <div class="W-C">
            <?php get_sidebar(); ?>
            <div class="main-container">
                <div class="padding">

                    <!-- Callout -->
                    <?php dynamic_sidebar( 'main-column-top' ); ?>
                    <!-- -->

                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                        <div <?php post_class('row-container'); ?>>

                        <!-- Event -->
                        <div class="row">
                            <h2 class="title">Event <?php edit_post_link(); ?></h2>
                            <div class="image-container">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div <?php post_class('result')?>>
                                <?php do_action( 'fancy_date', $post->ID ); ?>
                                <h1><?php the_title(); ?></h1>

<div class="entry-container">
    <span class="currency-symbol">$</span><span class="fee"><?php print get_post_meta( $post->ID, 'events_fee', true ); ?></span>
</div>

                                <?php the_content(); ?>
                            </div>
                        </div>
                        <!-- -->

                        <div class="row">
                            <?php if ( get_option('zm_attend_button_version') ) : ?>
                                <?php zm_attending_button_container(); ?>
                            <?php endif; ?>
                            <!-- Share -->
                            <?php if ( get_option( 'zm_social_version' ) ) : ?>
                                <?php zm_social_twitter_button( $post->post_title, get_permalink() ); ?>
                                <?php zm_social_facebook_button( get_permalink() ); ?>
                            <?php endif; ?>
                        </div>
                        <!-- -->


                        <!-- Comments -->
                        <?php if ( get_option('zm_ajax_comments_version') ) : ?>
                        <div name="comments">
                            <?php zm_comments(); ?>
                        </div>
                        <?php endif; ?>
                        <!-- -->

                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php get_sidebar( 'events' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>