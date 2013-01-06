<?php get_header(); ?>
<?php dynamic_sidebar( 'main-column-top' ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="top-container">
        <!-- Event -->
        <div class="left">
            <div id="image-pane">
                <div class="image-crop">
                    <?php blue_vanillia_content_image( Events::getVenueId( $post->ID ), 'wide'); ?>
                </div>
            </div>
            <div class="info-overlay">
                <div class="content">
                    <div <?php post_class(); ?>>
                      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                      <div class="events-tags"><?php print get_the_term_list( $post->ID, 'events_tag', '', ', ' ); ?></div>
                    </div>
                    <div class="date"><?php print date('F j, Y', strtotime( Events::getDate() ) ); ?></div>
                    <span class="entry-container"><span class="currency-symbol">$</span><span class="fee"><?php print get_post_meta( $post->ID, 'events_fee', true ); ?></span></span>
                    <?php if ( get_option('zm_ev_version') ) zm_ev_venue_address_pane( $post->ID ); ?>
                </div>
            </div>

            <div class="image-container">
                <?php the_post_thumbnail( 'medium' ); ?>
            </div>
            <?php edit_post_link(); ?>

            <div <?php post_class(); ?>><?php the_content(); ?></div>
        </div>
        <!-- -->

        <div class="right">
            <!-- Attend -->
            <?php if ( get_option('zm_attend_button_version') ) : ?>
                <?php zm_attending_button_container(); ?>
                <div class="hr"></div>
            <?php endif; ?>
            <!-- -->

            <!-- Share -->
            <?php if ( function_exists('zm_social_twitter_button') || function_exists('zm_social_facebook_button') ) : ?>
                <?php zm_social_twitter_button( $post->post_title, get_permalink() ); ?>
                <?php zm_social_facebook_button( get_permalink() ); ?>
                <div class="hr"></div>
            <?php endif; ?>
            <!-- -->

            <?php if ( get_option('zm_weather_version') ) : ?>
                <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ', ' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
                <div class="hr"></div>
            <?php endif; ?>


            <?php zm_ev_venue_links_pane( $post->ID ); ?>

        </div>
        <!-- -->
    </div>

    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#schedule">Events <?php Venues::scheduleCount( Events::getVenueId( $post->ID ) ); ?></a></li>
            <li><a href="#comments">Comments</a></li>
        </ul>

        <div id="schedule" class="row-container">
            <?php
            global $post;
            $venues = new Venues;
            $events = $venues->getSchedule( Events::getVenueId( $post->ID ) );
            if ( $events ) : ?>
                <?php while ( $events->have_posts() ) : $events->the_post(); setup_postdata( $post ); ?>
                    <?php get_template_part('content', 'events' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'No events message here','blue_vanillia' ); ?>
            <?php endif; ?>
        </div>

        <div id="comments">
            <?php if ( get_option('zm_ajax_comments_version') ) : ?>
                <div name="comments">
                    <?php zm_comments(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>