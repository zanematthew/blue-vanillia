<?php if ( ! is_user_logged_in() ) header("Location: " . site_url() ); ?>
<?php get_header(); ?>

<?php
global $current_user;
get_currentuserinfo();
$venues = New Venues;

?>
<div class="zm-ev-settings">
    <div class="main-container">
        <form action="" method="POST" id="zm_ev_settings_form">
            <div class="row">
                <label>Default Location</label>
                <input type="text" name="default_location" placeholder="21045" />
            </div>

            <div class="row">
                <label>View only the following Events</label>
                <?php $venues->stateSelect( array( 'current' => get_user_meta( $current_user->ID, 'zm_state_preference', true ),'multiple'=>true) ); ?>
                <?php Events::typeSelectBox( get_user_meta( $current_user->ID, 'zm_type_preference', true ) ); ?>
                <?php print $venues->locationSelect( array( 'current'=>get_user_meta( $current_user->ID, 'zm_venue_preference', true ),'multiple'=>true ) ); ?>
            </div>

            <div class="row">
                <label>Email</label>
                <input type="text" name="user_email" placeholder="<?php print $current_user->user_email; ?>" />
            </div>
        </form>
    </div>
</div>
<?php get_footer(); ?>