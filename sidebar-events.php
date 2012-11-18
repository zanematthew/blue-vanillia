<div class="sidebar-wide-container">
    <div class="row-container">

        <div class="row">
            <h2 class="title">Venue Information</h2>
            <?php if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
            <?php if ( get_option('zm_ev_version') ) : ?>
                <?php zm_ev_venue_info_pane( $post->ID ); ?>
            <?php endif; ?>
        </div>

        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="row">
                <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ', ' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
            </div>
        <?php endif; ?>

        <?php get_template_part('events','upcoming'); ?>
    </div>
</div>