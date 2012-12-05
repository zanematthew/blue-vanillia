<div class="sidebar-wide-container">
    <div class="row-container">
        <div class="row">
            <h2 class="title">Contact Info</h2>


<?php
$venues = New Venues();
$email = $venues->getAttribute( array( 'key' => 'email' ) );
$contact = $venues->getAttribute( array( 'key' => 'phone' ) );
$website = $venues->getAttribute( array( 'key' => 'website' ) );
?>
            <?php if ( ! empty( $email ) ) : ?>
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

        </div>


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

        <?php get_template_part('events','upcoming'); ?>
    </div>
</div>