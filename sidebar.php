<div class="sidebar-container">
    <div class="padding">

        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="zm-base-list-terms-container">
                <?php zm_weather_local_target(); ?>
            </div>
        <?php endif; ?>

        <?php if ( get_option('zm_geo_location_version') ) zm_geo_location_current_location_target(); ?>

<?php

global $post;
$region = get_post_meta( $post->ID, 'venues_state', true );

if ( empty( $region ) ){
    $region = "Maryland";
}
$tmp = new Venues; if ( $tmp->getVenueByRegion() ) : ?>
    <div class="zm-base-list-terms-container">
        <div class="zm-base-title">Venues</div>
        <?php foreach( $tmp->getVenueByRegion( $region ) as $venue ): ?>
            <div class="zm-base-item"><a href="<?php print get_permalink( $venue->ID ); ?>"><?php print $venue->post_title; ?></a><br /></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

        <!-- Share -->
        <?php if ( get_option( 'zm_social_version' ) ) : ?>
        <div class="row">
            <?php zm_social_twitter_button(); ?>
            <?php zm_social_facebook_button(); ?>
        </div>
        <?php endif; ?>
        <!-- -->

    </div>
</div>