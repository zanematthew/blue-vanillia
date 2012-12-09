<?php get_header(); ?>
<div class="events-container">

        <div class="W-C">
            <?php get_sidebar(); ?>
            <div class="main-container">

                    <!-- Callout -->
                    <?php dynamic_sidebar( 'main-column-top' ); ?>
                    <!-- -->

                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                        <?php edit_post_link(); ?>
                        <div class="top-container">
                            <!-- Event -->
                            <div class="left">
                                <div id="image-pane">
                                    <div class="image-crop"><?php Venues::staticMap( Events::getVenueId( $post->ID ), 'wide' ); ?></div>
                                </div>
                                <div class="info-overlay">
                                    <div class="content">
                                        <div <?php post_class(); ?>>
                                          <h1><?php the_title(); ?></h1>
                                        </div>
                                        <div class="date"><?php print date('F j, Y', strtotime( Events::getDate() ) ); ?></div>
                                        <span class="entry-container"><span class="currency-symbol">$</span><span class="fee"><?php print get_post_meta( $post->ID, 'events_fee', true ); ?></span></span>
                                        <?php if ( get_option('zm_ev_version') ) zm_ev_venue_address_pane( $post->ID ); ?>
                                    </div>
                                </div>

                                <div class="image-container">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </div>

                                <div <?php post_class(); ?>><?php the_content(); ?></div>
                            </div>
                            <!-- -->

                            <div class="right">
                                <!-- Attend -->
                                <?php if ( get_option('zm_attend_button_version') ) : ?>
                                    <?php zm_attending_button_container(); ?>
                                <?php endif; ?>
                                <!-- -->
                                <!-- Share -->
                                <?php if ( get_option( 'zm_social_version' ) ) : ?>
                                    <?php zm_social_twitter_button( $post->post_title, get_permalink() ); ?>
                                    <?php zm_social_facebook_button( get_permalink() ); ?>
                                <?php endif; ?>
                                <!-- -->

                                <div class="hr"></div>
                                <?php if ( get_option('zm_weather_version') ) : ?>
                                    <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ', ' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
                                <?php endif; ?>

                                <div class="hr"></div>
                                <?php zm_ev_venue_links_pane( $post->ID ); ?>

                            </div>
                            <!-- -->
                        </div>

                        <div class="tabs-container tabs-handle">
                            <ul>
                                <li><a href="#schedule">Events <?php Venues::scheduleCount( Events::getVenueId( $post->ID ) ); ?></a></li>
                                <li><a href="#comments">Comments</a></li>
                                <li><a href="#map">Map</a></li>
                            </ul>

                            <div id="schedule" class="row-container">
                                <?php
                                global $post;
                                $venues = new Venues;
                                $events = $venues->getSchedule( Events::getVenueId( $post->ID ) );
                                if ( $events ) : ?>
                                    <?php while ( $events->have_posts() ) : $events->the_post(); setup_postdata( $post ); ?>
                                        <?php get_template_part('content', 'events' ); ?>
                                    <?php endwhile; ?>
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
                            <div id="map">
                                <?php // if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                </div>
        </div>

</div>
<?php get_footer(); ?>