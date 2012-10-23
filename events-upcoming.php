<!-- Upcoming Events -->
<?php

$plus_one_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
$plus_two_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+2 month" ) );

$current_month_event_obj = new Events;
$current_events = $current_month_event_obj->getMonth();

// print '<pre>';
// print_r( $current_events );
// die('template coding');

// $next_month_event_obj = new Events;
// $next_month_events = $next_month_event_obj->getMonth( date( 'm', strtotime( $plus_one_month ) ) );


// $next_next_month_obj = new Events;
// $next_next_month_events = $next_next_month_obj->getMonth( date( 'm', strtotime( $plus_two_month ) ) );
?>
<div class="row">
    <h2 class="title">Upcoming Events</h2>
    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#locals-current-month"><?php print date('M'); ?> <span class="count"><?php print $current_events['count']; ?></span></a></li>
            <li><a href="#locals-next-month"><?php print $plus_one_month; ?> <span class="count"><?php print $next_month_events['count']; ?></span></a></li>
        </ul>
        <div id="locals-current-month">
            <div class="row-container">
                <?php if ( $current_events ) : ?>
                    <?php foreach( $current_events as $post ) : setup_postdata($post); ?>
                        <div class="row">
                            <div class="image-container">
                                <a href="<?php the_permalink(); ?>"><img src="" /></a>
                            </div>
                            <div class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_ID(); ?> <?php the_title(); ?></a>
                            </div>
                            <div class="date">
                                <a href="<?php the_permalink(); ?>"><?php print  Events::getDate(); ?></a>
                            </div>
                            <span class="meta"><?php Events::getTrackTitle( $post->ID ); ?> in <?php print Venues::getState(); ?></span>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div id="locals-next-month">
            <div class="row-container">
                here
            </div>
        </div>
    </div>
</div>
<!-- End Upcoming Events -->