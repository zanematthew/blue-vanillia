<?php get_header(); ?>

<?php
global $current_user;
get_currentuserinfo();
$venues = New Venues;

$default_obj = get_term_by( 'id', get_user_meta( $current_user->ID, 'zm_type_preference', true ), 'type' );
$default = $default_obj->name;
?>
<div class="zm-ev-settings">
    <div class="main-container">
        <form action="" method="POST" id="zm_ev_settings_form">
            <div class="row">
                <label>Default Location</label>
                <input type="text" name="default_location" placeholder="21045" />
            </div>

            <div class="row">
                <label>View Only the Following Events</label>
                <?php $venues->stateSelect( get_user_meta( $current_user->ID, 'zm_state_preference', true ) ); ?>
                <?php Events::typeSelectBox( $default ); ?>
                <?php print $venues->locationDropDown(get_user_meta( $current_user->ID, 'zm_venues_id_preference', true )); ?>
            </div>

            <div class="row">
                <label>Email</label>
                <input type="text" name="user_email" placeholder="<?php print $current_user->user_email; ?>" />
            </div>
        </form>
    </div>
</div>
<?php get_footer(); ?>