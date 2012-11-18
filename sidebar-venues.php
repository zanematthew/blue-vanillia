<div class="sidebar-wide-container">
    <div class="row-container">
        <div class="row">
            <h2 class="title">Contact Info</h2>

            <strong>Email</strong>
            <a href="mailto:<?php Venues::getAttribute( array( 'key' => 'email', 'echo' => true ) ); ?>">
            <?php Venues::getAttribute( array( 'key' => 'email', 'echo' => true ) ); ?></a>
            <br />

            <strong>Primary Contact</strong>
            <?php Venues::getAttribute( array( 'key' => 'phone', 'echo' => true ) ); ?>
            <br />

            <strong>Website</strong>
            <a href="<?php Venues::getAttribute( array( 'key' => 'website', 'echo' => true ) ); ?>" target="_blank">
            <?php Venues::getAttribute( array( 'key' => 'website', 'echo' => true ) ); ?></a>

        </div>

        <!-- Share -->
        <?php if ( get_option( 'zm_social_version' ) ) : ?>
            <div class="row">
                <h2 class="title">Share</h2>
                <?php do_action('zm_social_twitter_button'); ?>
                <?php do_action('zm_social_facebook_button'); ?>
            </div>
        <?php endif; ?>
        <!-- -->

        <!-- Info Pane -->
        <?php if ( get_option('zm_ev_version') && is_single() ) : ?>
            <div class="row">
                <h2 class="title">Venue Information</h2>
                <?php if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
                <?php zm_ev_venue_info_pane( $post->ID ); ?>
            </div>
        <?php endif; ?>
        <!-- -->

        <!-- Weather -->
        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="row">
                <h2 class="title">Weather Conditions</h2>
                <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ',' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
            </div>
        <?php endif; ?>
        <!-- -->
    </div>
</div>