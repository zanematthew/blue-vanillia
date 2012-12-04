<?php

$venues = New Venues;

$tmp = $venues->getSchedule( $post->ID );

$count = 0;
if ( ! empty( $tmp ) && $tmp->post_count != 0 ){
    $count = $tmp->post_count;
}
?><div <?php post_class('result row')?>>
<div class="tmp-events-container">
<span class="count"><?php print $count; ?></span>
<div class="arrow-bottom"></div>
<div class="arrow-shadow"></div>
<div class="title"><?php _e("Events", "blue_vanillia"); ?></div>
</div>
    <div class="image-container">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><?php $venues->staticMap( $post->ID, 'small' ); ?></a>
        <?php endif; ?>
    </div>
    <div class="title">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <span class="meta">
        <?php print $venues->getAttribute( array( 'key' => 'city' ) ); ?>,
        <?php print $venues->getAttribute( array( 'key' => 'state' ) ); ?>
    </span>
</div>