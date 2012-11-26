<div class="sidebar-container">
    <div class="padding">

        <?php if ( get_option('zm_weather_version') ) : ?>
            <div class="zm-base-list-terms-container">
                <?php zm_weather_local_target(); ?>
            </div>
        <?php endif; ?>

        <div class="zm-base-list-terms-container">
            <div class="zm-base-item">
                <div class="zm-base-title">Events</div>
                <?php foreach( get_terms('type') as $type ) : ?>
                    <div class="zm-base-item">
                        <?php if ( get_query_var('term') == $type->slug ) $class = 'current'; else $class = null; ?>
                        <a href="<?php print get_term_link($type->slug, 'type'); ?>" class="<?php print $class; ?>"><?php print $type->name; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ( get_option('zm_geo_location_version') ) zm_geo_location_current_location_target(); ?>
            <?php

            global $post;
            $region = get_post_meta( $post->ID, 'venues_state', true );

            if ( empty( $region ) ){
                $region = "MD";
            }
            $tmp = new Venues; if ( $tmp->getVenueByRegion() ) : ?>
            <div class="zm-base-list-terms-container">
                <div class="zm-base-title">Venues</div>
                <?php foreach( $tmp->getVenueByRegion( $region ) as $venue ): ?>
                    <?php if ( get_query_var('name') == $venue->post_name ) $class = 'current'; else $class = null; ?>
                    <div class="zm-base-item"><a href="<?php print get_permalink( $venue->ID ); ?>" class="<?php print $class; ?>"><?php print $venue->post_title; ?></a><br /></div>
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