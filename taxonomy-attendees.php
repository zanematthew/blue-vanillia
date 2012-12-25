<?php
/**
 * @todo This logic needs to be removed!
 */
if ( ! get_option('zm_attend_button_version') ) {
    wp_die('Please install zM Attend Button Plugin to use this template.');
}

$locals = zm_attendee_schedule();
$tmp_user = get_query_var('term');
$user_term = get_term_by('slug', $tmp_user, 'attendees' );
$user_obj = get_user_by( 'slug', $user_term->slug );
$user_id = $user_obj->ID;
$user = $user_obj->data->user_login;
$fb_id = get_user_meta( $user_id, 'fb_id', true );

?>

<?php get_header(); ?>

<div class="attendee-dashboard-container taxonomy-container" data-owner_id="<?php print $fb_id; ?>">
        <div class="main-container">
            <div class="attendee-container">
                <div class="callout-container">
                    <div class="content">
                        <div class="profile-pic-container">
                            <?php zm_attend_profile_pic( $fb_id ); ?>
                        </div>
                        <div class="bar"></div>

                        <div class="total-container">
                            <span class="count"><?php print zm_attend_count( $user ); ?></span>
                            <span class="label">Total</span>
                        </div>
                        <div class="bar"></div>

                        <div class="type-container">
                            <?php foreach( get_terms('type') as $term ) attending_count( $term->slug, $user ); ?>
                        </div>
                        <div class="bar"></div>

                        <div class="share-container">
                            <?php if ( function_exists('zm_social_twitter_button') || function_exists('zm_social_facebook_button') ) : ?>
                                <?php zm_social_twitter_button( 'Checkout!', site_url() . $_SERVER['REQUEST_URI'] );?>
                                <?php zm_social_facebook_button( site_url() . $_SERVER['REQUEST_URI'] ); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <?php if ( ! empty( $locals ) && $locals->have_posts() ) : ?>
                <table id="archive_table"  style="margin-bottom: 20px;" class="tablesorter">
                    <thead>
                        <tr>
                            <th class="attending">Add</th>
                            <th class="date">Date</th>
                            <th class="title">Event</th>
                            <th class="fee">Fee</th>
                            <th class="type">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ( $locals->have_posts() ) : $locals->the_post(); setup_postdata( $post ); ?>
                    <tr <?php post_class('result')?>>

                        <!-- Add -->
                        <td><?php zm_attend_button_load_template(); ?></td>

                        <!-- Date -->
                        <td class="time meta"><time class="meta"><?php zm_event_date(); ?><time></td>

                        <!-- Event, title, etc -->
                        <td>
                            <h2>
                                <strong class="title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
                                <span class="<?php blue_vanillia_comment_class( $post->ID ); ?>"><a href="<?php the_permalink(); ?>#comments_target" title="<?php comments_number(); ?>"><?php comments_number(' '); ?></a></span>
                            </h2>
                            <div class="meta">
                                <a href="<?php print get_permalink( Events::getVenueId( $post->ID ) ); ?>"><?php print Venues::getAttribute( array( 'key' => 'title', 'echo' => false ) ); ?></a> in <?php Venues::getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
                            </div>
                        </td>

                        <!-- Fee -->
                        <td>$<?php print get_post_meta( $post->ID, 'events_fee', true ); ?></td>

                        <!-- Type -->
                        <td><?php print Events::getType( $post->ID ); ?></td>

                    </tr>
                    <?php endwhile; wp_reset_postdata(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <?php if ( is_user_logged_in() ) : ?>
                    <div class="callout-container">
                        <div class="content">Hey, <?php print $current_user->user_login; ?> Attending a few Locals, thought about going to a National?</div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

</div>
<?php get_footer(); ?>
