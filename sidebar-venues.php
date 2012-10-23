<div class="sidebar-wide-container">
    <div class="row-container">
        <div class="row">
            <h2 class="title">Contact Info</h2>
            <strong>Email</strong> <a href="mailto:<?php Venues::getMetaField('email'); ?>"><?php print Venues::getMetaField('email'); ?></a>
            <br />
            <strong>Primary Contact</strong> <?php print Venues::getMetaField('primary_contact'); ?>
            <br />
            <strong>Website</strong> <a href="<?php print Venues::getWebsite(); ?>" target="_blank"><?php print Venues::getWebsite( $post->ID ); ?></a>
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
                <?php zm_ev_venue_info_pane( $post->ID ); ?>
            </div>
        <?php endif; ?>
        <!-- -->

        <!-- Weather -->
        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="row">
                <h2 class="title">Weather Conditions</h2>
                <?php zm_weather_venue_target( Venues::getCity() . ',' . Venues::getState() ); ?>
            </div>
        <?php endif; ?>
        <!-- -->
    </div>
</div>