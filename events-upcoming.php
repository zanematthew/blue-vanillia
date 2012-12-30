<?php

$event_obj = new Events;
$current_events = $event_obj->getMonth();

// One month out
$plus_one_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
$plus_one_month_date = '2013-' . date('m', strtotime( $plus_one_month ) );
$next_month_events = $event_obj->getMonth( $plus_one_month_date, null, 'national' );

// Three months out
$plus_three_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+2 month" ) );
$plus_three_month_date = '2013-' . date('m', strtotime( $plus_three_month ) );
$three_months_out = $event_obj->getMonth( $plus_three_month_date, null, 'national' );

$upcoming_events[ date('Y-m') ] = $current_events;
$upcoming_events[ $plus_one_month_date ] = $next_month_events;
$upcoming_events[ $plus_three_month_date ] = $three_months_out;

?>
<div class="tabs-container tabs-handle">
    <ul>
        <?php foreach( $upcoming_events as $date => $e ) : $date = date('M', strtotime( $date ) ); ?>
            <li><a href="#<?php print strtolower( $date ); ?>"><?php print $date; ?> <span class="count"><?php print $e['count']; ?></span></a></li>
        <?php endforeach; ?>
    </ul>
    <?php foreach( $upcoming_events as $date => $events ) : $date = date('M', strtotime( $date ) ); ?>
        <div id="<?php print strtolower( $date ); ?>" class="row-container">
            <?php foreach( $events['items'] as $event ) : ?>
                <div class="row">
                    <div class="padding">
                        <?php blue_vanillia_content_image( Events::getVenueId( $event->ID ), 'small' ); ?>
                        <div class="title">
                            <a href="<?php print get_permalink( $event->ID ); ?>"><?php print get_the_title( $event->ID ); ?></a>
                        </div>
                        <div class="date">
                            <a href="<?php print get_permalink( $event->ID ); ?>"><?php print date('F j, Y', strtotime( Events::getDate( $event->ID ) ) ); ?></a>
                        </div>
                        <span class="meta"><em><?php print Events::getVenueTitle( $event->ID ); ?></em> in <em><?php Venues::getAttribute( array( 'key'=> 'state', 'echo' => true ) ); ?></em></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>