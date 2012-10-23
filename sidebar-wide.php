<div class="sidebar-wide-container">
    <div class="row-container">
        <div class="callout-container">
            <div class="content">
                With over <strong>300 tracks</strong> and <strong>670 events</strong> listed you're sure to find an event to attend!
                <br>
                <a href="/?s=%2B&quot;Maryland&quot;&amp;post_type=events" class="button" data-original-title="">View All Events</a>
                <a href="/?s=&quot;Maryland&quot;&amp;post_type=venues" class="button last" data-original-title="">View All Tracks</a>
            </div>
        </div>
        <div class="row">
            <?php if ( get_option('zm_weather_version') ) : ?>
                <?php zm_weather_venue_target( Venues::getCity() . ',' . Venues::getState() ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>