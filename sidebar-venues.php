<div class="sidebar-wide-container">
    <div class="row-container">
        <!-- Info Pane -->
        <?php if ( get_option('zm_ev_version') && is_single() ) : ?>
            <?php if ( get_option('zm_gmaps_version') ) zm_gmaps_mini(); ?>
            <?php zm_ev_venue_address_pane( $post->ID ); ?>
        <?php endif; ?>
        <!-- -->
        <?php get_template_part('events','upcoming'); ?>
    </div>
</div>