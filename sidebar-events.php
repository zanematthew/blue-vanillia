<div class="sidebar-wide-container">
    <div class="row-container">
        <?php if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
        <div class="row">
            <h2 class="title">Venue Information</h2>
            <?php if ( get_option('zm_ev_version') ) : ?>
                <?php zm_ev_venue_info_pane( $post->ID ); ?>
            <?php endif; ?>

            <?php if ( get_option('zm_weather_version') ) : ?>
                <?php zm_weather_venue_target( Venues::getCity() . ',' . Venues::getState() ); ?>
            <?php endif; ?>
        </div>
        <?php get_template_part('events','upcoming'); ?>
    </div>
</div>