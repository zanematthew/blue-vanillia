<?php if ( ! is_user_logged_in() ) header("Location: " . site_url() ); ?>
<?php get_header(); ?>

<?php
global $current_user;
get_currentuserinfo();
$venues = New Venues;
$events = New Events;
wp_enqueue_script('zm-chosen-script');
wp_enqueue_style('zm-chosen-style');
?>
<div class="zm-ev-settings">
    <div class="padding">
        <form action="" method="POST" id="zm_ev_settings_form" class="zm-form">
            <div class="row">
                <label>Default Location</label>
                <input type="text" name="default_location" placeholder="10805" value="<?php print get_user_meta( $current_user->ID, 'default_location', true ); ?>" />
            </div>

            <div class="row">
                <label>States</label>
                <?php $venues->stateSelect( get_user_meta( $current_user->ID, 'state', true ), false ); ?>

                <label>Types</label>
                <?php $events->typeSelectBox( get_user_meta( $current_user->ID, 'type', true ) ); ?>

                <label>Venues</label>
                <?php $venues->locationSelect( get_user_meta( $current_user->ID, 'venues', true ) ); ?>
            </div>

            <div class="row">
                <label>Email</label>
                <input type="text" name="user_email" placeholder="<?php print $current_user->user_email; ?>" value="<?php print $current_user->user_email; ?>" />
            </div>
            <div class="button-pane">
                <input type="submit" value="Save" />
            </div>
        </form>
    </div>
</div>
<?php get_footer(); ?>