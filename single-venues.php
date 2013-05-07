<?php get_header(); ?>
<div class="row-container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
        <div class="padding">

            <!-- Info Pane -->
            <?php if ( is_single() ) : ?>
                <?php if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
                <?php zm_ev_venue_address_pane( $post->ID ); ?>
            <?php endif; ?>
            <!-- -->

            <div class="contact">
                <?php
                $venues = New Venues();
                $email = $venues->getAttribute( array( 'key' => 'email' ) );
                $contact = $venues->getAttribute( array( 'key' => 'phone' ) );
                $website = $venues->getAttribute( array( 'key' => 'website' ) );
                if ( ! empty( $email ) ) : ?>
                    <strong>Email</strong>
                    <a href="mailto:<?php print $email; ?>">
                    <?php print $email; ?></a>
                    <br />
                <?php endif; ?>

                <?php if ( ! empty( $contact ) ) : ?>
                    <strong>Primary Contact</strong>
                    <?php print $contact; ?>
                    <br />
                <?php endif; ?>

                <?php if ( ! empty( $website ) ) : ?>
                    <strong>Website</strong>
                    <a href="<?php print $website; ?>" target="_blank">
                    <?php print $website; ?></a>
                <?php endif; ?>
            </div> <!-- .contact -->

            <div <?php post_class()?>><?php the_content(); ?></div>
            <br /><?php edit_post_link(); ?>
        </div>
    </div>
    <!-- -->

    <!-- Share -->
    <?php if ( function_exists('zm_social_twitter_button') || function_exists('zm_social_facebook_button') ) : ?>
    <div class="row">
        <?php zm_social_twitter_button( $post->post_title, get_permalink() ); ?>
        <?php zm_social_facebook_button( get_permalink() ); ?>
    </div>
    <?php endif; ?>
    <!-- -->

    <!-- Weather -->
    <?php if ( get_option('zm_weather_version') ) : ?>
    <div class="row" id="zm_weather_venue_target">
        <div class="padding">
            <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ',' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
        </div>
    </div>
    <?php endif; ?>
    <!-- -->

    <!-- Schedule  -->
    <div class="tabs-container">
        <div class="row-container">
        <?php
        global $post;
        $venues = new Venues;
        $events = $venues->getSchedule( $post->ID, true );
        if ( ! empty( $events ) && $events->have_posts() ) :
        while ( $events->have_posts() ) : $events->the_post(); setup_postdata( $post ); ?>
            <?php get_template_part('content', 'events-schedule' ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="padding">
                <?php _e('Currently no Events listed', 'blue_vanillia'); ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <!--  -->

    <!-- Comments -->
    <div name="comments">
        <?php if ( function_exists( 'zm_ajax_comments' ) ) zm_ajax_comments(); ?>
    </div>
    <!-- -->

    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
