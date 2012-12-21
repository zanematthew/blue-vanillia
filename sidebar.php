<div class="sidebar-container">
    <div class="padding">

        <?php if ( get_option('zm_weather_version') ) : ?>
            <?php zm_weather_local_target(); ?>
        <?php endif; ?>

        <?php if ( get_option('zm_geo_location_version') ) zm_geo_location_current_location_target(); ?>

            <?php

            global $post;

            if ( empty( $post ) ){
                $region = "MD";
            } else {
                if ( $post->post_type == 'venues' ){
                    $region = get_post_meta( $post->ID, 'venues_state', true );
                } else {
                    $venues_id = get_post_meta( $post->ID, 'venues_id', true );
                    $region = get_post_meta( $venues_id, 'venues_state', true );
                }
            }

            $venues = new Venues;

            $auto_expando = 4;
            $i = 0;
            $len = count( $venues->getVenueByRegion( $region ) );
            $trigger = 6; // Number to trigger "auto expando"

            if ( $venues->getVenueByRegion( $region ) ) : ?>
            <div class="zm-base-list-terms-container">
                <div class="zm-base-title">Venues</div>
                <?php foreach( $venues->getVenueByRegion( $region ) as $venue ): ?>
                    <?php if ( get_query_var('name') == $venue->post_name ) $class = 'current'; else $class = null; ?>

                    <?php
                    // Open our wrapper on the number from auto expando
                    if ( $len >= $trigger ) {
                        $tmp = $auto_expando - 1;

                        if ( $i == $tmp ) {
                            print '<div class="auto-expando-container">';
                            print '<div class="auto-expando-target" style="display: none;">';
                        }
                    }
                    ?>

                    <div class="zm-base-item"><a href="<?php print get_permalink( $venue->ID ); ?>" class="<?php print $class; ?>"><?php print $venue->post_title; ?></a><br /></div>

                    <?php
                    // auto expando and last add closing div
                    if ( $len >= $trigger ) {
                        if ( $i == $len - 1 ) {
                            print '</div>';
                            print '<a href="#" class="auto-expando-handle">More</a>';
                            print '<span class="arrow"></span>';
                            print '</div>';
                        }
                    }
                    $i++;
                    ?>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

<a href="#redline-cup" class="sample">sample</a>

        <div class="zm-base-list-terms-container">
            <div class="zm-base-item">
                <div class="zm-base-title">Type</div>
                <?php foreach( get_terms('type') as $type ) : ?>
                    <div class="zm-base-item">
                        <?php if ( get_query_var('term') == $type->slug ) $class = 'current'; else $class = null; ?>
                        <a href="<?php print get_term_link($type->slug, 'type'); ?>" class="<?php print $class; ?>"><?php print $type->name; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!-- Share -->
        <?php if ( function_exists('zm_social_twitter_button') || function_exists('zm_social_facebook_button') ) : ?>
        <div class="row">
            <?php zm_social_twitter_button(); ?>
            <?php zm_social_facebook_button(); ?>
        </div>
        <?php endif; ?>
        <!-- -->

    </div>
</div>