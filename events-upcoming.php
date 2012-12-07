<!-- Upcoming Events -->
<?php

$event_obj = new Events;
$current_events = $event_obj->getMonth();

$plus_one_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
$next_month_events = $event_obj->getMonth( $plus_one_month );

$plus_three_month = date( 'M', strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+2 month" ) );
$three_months_out = $event_obj->getMonth( $plus_three_month );

?>
<div class="row">
    <div class="tabs-container tabs-handle">
            <ul>
                <li><a href="#locals-current-month"><?php print date('M'); ?> <span class="count"><?php print $current_events['count']; ?></span></a></li>
                <?php if ( $next_month_events ) : ?><li><a href="#locals-next-month"><?php print $plus_one_month; ?> <span class="count"><?php print $next_month_events['count']; ?></span></a></li><?php endif; ?>
                <?php if ( $three_months_out ) : ?><li><a href="#locals-next-next-month"><?php print $plus_three_month; ?> <span class="count"><?php print $three_months_out['count']; ?></span></a></li><?php endif; ?>
            </ul>

            <?php if ( $current_events ) : ?>
                <div id="locals-current-month">
                    <div class="row-container">
                        <?php foreach( $current_events['items'] as $post ) : setup_postdata($post); ?>
                            <div class="row">
                                <div class="image-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail( 'blue-small' ); ?><?php else : ?><?php Venues::staticMap( Events::getVenueId( $post->ID ), 'small' ); ?><?php endif; ?></a>
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="date">
                                    <a href="<?php the_permalink(); ?>"><?php print date('F j, Y', strtotime( Events::getDate() ) ); ?></a>
                                </div>
                                <span class="meta"><em><?php Events::getTrackTitle( $post->ID ); ?></em> in <em><?php Venues::getAttribute( array( 'key'=> 'state', 'echo' => true ) ); ?></em></span>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $next_month_events ) : ?>
                <div id="locals-next-month">
                    <div class="row-container">
                        <?php foreach( $next_month_events['items'] as $post ) : setup_postdata($post); ?>
                            <div class="row">
                                <div class="image-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('blue-small'); ?>
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="date">
                                    <a href="<?php the_permalink(); ?>"><?php print date('F j, Y', strtotime( Events::getDate() ) ); ?></a>
                                </div>
                                <span class="meta"><em><?php Events::getTrackTitle( $post->ID ); ?></em> in <em><?php print Venues::getState(); ?></em></span>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $three_months_out ) : ?>
                <div id="locals-next-next-month">
                    <div class="row-container">
                        <?php foreach( $three_months_out['items'] as $post ) : setup_postdata($post); ?>
                            <div class="row">
                                <div class="image-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('blue-small'); ?>
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="date">
                                    <a href="<?php the_permalink(); ?>"><?php print date('F j, Y', strtotime( Events::getDate() ) ); ?></a>
                                </div>
                                <span class="meta"><em><?php Events::getTrackTitle( $post->ID ); ?></em> in <em><?php print Venues::getState(); ?></em></span>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>

    </div>
</div>
<!-- End Upcoming Events -->