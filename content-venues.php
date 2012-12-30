<?php $venues = New Venues; ?>
<div <?php post_class('result row')?>>
    <div class="padding">
        <div class="event-count-horizontal">
            <?php Venues::scheduleCount( $post->ID ); ?>
            <div class="arrow-bottom"></div>
            <div class="arrow-shadow"></div>
            <div class="title"><?php _e("Events", "blue_vanillia"); ?></div>
        </div>
        <?php blue_vanillia_content_image( $post->ID, 'small' ); ?>
        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
        <span class="meta">
            <?php $venues->getAttribute( array( 'key' => 'street', 'echo' => true ) ); ?><br />
            <?php $venues->getAttribute( array( 'key' => 'city', 'echo' => true ) ); ?>,
            <?php $venues->getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
            <?php $venues->getAttribute( array( 'key' => 'zip', 'echo' => true ) ); ?>
        </span>
    </div>
</div>