<div class="sidebar-container">
    <div class="padding">

        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="zm-base-list-terms-container">
                <?php zm_weather_local_target(); ?>
            </div>
        <?php endif; ?>

        <?php if ( get_option('zm_geo_location_version') ) zm_geo_location_current_location_target(); ?>

        <!-- Share -->
        <?php if ( get_option( 'zm_social_version' ) ) : ?>
        <div class="row">
            <?php do_action('zm_social_twitter_button'); ?>
            <?php do_action('zm_social_facebook_button'); ?>
        </div>
        <?php endif; ?>
        <!-- -->

    </div>
</div>