<div class="sidebar-wide-container">
    <div class="row-container">

        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="row">
                <?php zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ', ' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
            </div>
        <?php endif; ?>

        <?php get_template_part('events','upcoming'); ?>
    </div>
</div>