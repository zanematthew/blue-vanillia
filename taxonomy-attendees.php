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

    <div class="W-C">
        <div class="attendee-container">
            <div class="callout-container">
                <div class="content">
                    <div class="left">
                        <span class="profile-pic-container">
                            <?php zm_attend_profile_pic( $fb_id ); ?>
                        </span>
                        <div class="profile-meta">
                            <span class="name">
                                <?php print $user_obj->name; ?>
                            </span>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="left">
                        <div class="count-container total-container" style="float: left; width: auto; margin-left: 20px; text-align: center;">
                            <span class="count"><?php print zm_attend_count( $user ); ?></span>
                            <span class="label">Total</span>
                        </div>
                        <div style="float: left; width: 115px;">
                            <?php attending_count( 'national', $user ); ?>
                            <?php attending_count( 'redline-cup', $user ); ?>
                            <?php attending_count( 'state-cup', $user ); ?>
                        </div>
                        <div style="float: left; width: 125px;">
                            <?php attending_count( 'earned-double', $user ); ?>
                            <?php attending_count( 'race-for-life', $user ); ?>
                        </div>
                    </div>
                    <div class="left share-container">
                        <?php if ( get_option( 'zm_social_version' ) ) : ?>
                            <?php zm_social_twitter_button( 'Checkout!', site_url() . $_SERVER['REQUEST_URI'] );?>
                            <div class="clear" style="height: 1px; margin: 0 0 10px;"></div>
                            <?php zm_social_facebook_button( site_url() . $_SERVER['REQUEST_URI'] ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php get_sidebar(); ?>
        <div class="main-container">
            <div class="padding">
                <?php if ( ! empty( $locals ) && $locals->have_posts() ) : ?>
                    <table id="archive_table"  style="margin-bottom: 20px;" class="tablesorter">
                        <thead>
                            <tr>
                                <td colspan="5" class="my-header" style="text-align: center;">Schedule</td>
                            </tr>
                            <tr>
                                <th class="attending" style="width: 22%;">Add</th>
                                <th class="date" style="width: 20%;">Date</th>
                                <th class="title">Event</th>
                                <th class="type">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ( $locals->have_posts() ) : $locals->the_post(); setup_postdata( $post ); ?>
                        <tr <?php post_class('result')?>>

                            <!-- Add -->
                            <td>
                                <div class="utility-container">
                                    <?php zm_attend_button_load_template(); ?>
                                </div>
                            </td>

                            <!-- Date -->
                            <td class="time meta">
                                <time class="meta"><?php zm_event_date(); ?><time>
                            </td>

                            <!-- Even, title, etc -->
                            <td>
                                <h2>
                                    <strong class="title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
                                    <span class="commentClass( $post->ID );"><a href="<?php the_permalink(); ?>#comments_target" title="<?php comments_number(); ?>"><?php comments_number(' '); ?></a></span>
                                </h2>
                            </td>

                            <!-- Type -->
                            <td>
                                <?= Events::getType( $post->ID ); ?>
                            </td>
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
    </div>
</div>

<?php get_footer(); ?>