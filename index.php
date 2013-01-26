<?php get_header(); $my_cpt = array('events','venues'); ?>

<div class="tabs-container tabs-handle">
    <ul>
        <?php foreach( $my_cpt as $cpt ) : ?>
            <li><a href="#<?php print $cpt; ?>-tab"><?php print ucfirst( $cpt ); ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php foreach( $my_cpt as $cpt ) : ?>
        <div id="<?php print $cpt; ?>-tab">
            <div class="row-container" id="search_target">

<?php

// get our user state pref.
$zm_state_preference = get_user_meta( $current_user->ID, 'zm_state_preference', true );
print "states: ";
print_r( $zm_state_preference );

$zm_venues_id_preference = get_user_meta( $current_user->ID, 'zm_venue_preference', true );
print "<br />venues id: ";
print_r( $zm_venues_id_preference );

// start our shared arguments
$args = array(
    'post_status' => 'publish'
    );

// state is set and this is a venues post type
if ( ! empty( $zm_state_preference ) && $cpt == 'venues' ){

    $args['post_type'] = 'venues';
    $args['meta_query'] = array(
        array(
            'key' => 'venues_state',
            'value' => $zm_state_preference,
            'compare' => 'IN'
            )
        );
}

if ( ! empty( $zm_state_preference ) && $cpt == 'events' ){
    $args['post_type'] = 'venues';
    $args['meta_query'] = array(
        array(
            'key' => 'venues_state',
            'value' => $zm_state_preference,
            'compare' => 'IN'
            )
        );

    $venues_by_region = New WP_Query( $args );
    $tmp_venues_ids = array();
    foreach( $venues_by_region->posts as $venues ){
        $tmp_venues_ids[] = $venues->ID;
    }
    unset( $args['meta_query'] );
    wp_reset_postdata();

    $args['post_type'] = $cpt;
    $args['meta_query'] = array(
        array(
            'key' => 'venues_id',
            'value' => $tmp_venues_ids,
            'compare' => 'IN'
            )
        );
    $args['orderby'] = 'meta_value';
    $args['meta_key'] = 'events_start-date';
    $args['order'] = 'ASC';
}

$new = array_intersect( $tmp_venues_ids, $zm_venues_id_preference );

// veneus id is present
if ( ! empty( $new ) ){
    $args['meta_query'] = array(
        array(
            'key' => 'venues_id',
            'value' => $new,
            'compare' => 'IN'
            )
        );
    $args['orderby'] = 'meta_value';
    $args['meta_key'] = 'events_start-date';
    $args['order'] = 'ASC';
} else {
    print "widen your state and venue criteria";
}



if ( empty( $zm_state_preference ) ) {
    $args['post_type'] = $cpt;
}

?>
                <?php  foreach( get_posts( $args ) as $post ) : setup_postdata( $post ); ?>
                    <?php get_template_part( 'content', $cpt ); ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php get_footer(); ?>