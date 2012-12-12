<?php if ( ! empty( $post_type ) && $post_type == 'venues' ) : ?>
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
    </div>
<?php endif; ?>

</div> <!-- End W-C -->

<div class="bottom-wrapper">
    <div class="bottom-container">
        <div class="left">
            <div class="quote-container">
                <span class="html-quote">&ldquo;</span><?php print get_bloginfo('description'); ?><span class="html-quote">&rdquo;</span>
                <br /><cite>&mdash; <?php print get_bloginfo('name'); ?></cite>
            </div>
            <div class="info">
                <?php dynamic_sidebar( 'footer-large-area' ); ?>
            </div>
            <div class="peach"></div>
            <nav role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
            </nav>
        </div>
        <div class="right">
            <?php dynamic_sidebar( 'footer-row-1' ); ?>
            <div class="peach"></div>

            <?php dynamic_sidebar( 'footer-row-2' ); ?>
            <div class="peach"></div>

            <?php dynamic_sidebar( 'footer-row-3' ); ?>
            <br />
        </div>
    </div>
</div>

<div class="footer-container meta">
  <em>Disclaimer &ndash; Please contact your local track for official date, location and additional information.</em><br />
    &copy; <?php print date('Y'); ?> <?php bloginfo('name'); ?> &ndash; <?php bloginfo('description'); ?>
    &bull; Listing <strong><?php Events::eventCount(); ?></strong>
    at <strong><?php Venues::venueCount(); ?></strong>.
    <br /><a href="/contact">Contact</a>
</div>

<div id="bmx_rs_dialog" class="dialog-container" title="Login">
    <div id="bmx_rs_login_target" style="display: none;" class="bmx-rs-login-dialog"></div>
</div>

<div id="fb-root"></div>

<?php wp_footer(); ?>
</body>
</html>