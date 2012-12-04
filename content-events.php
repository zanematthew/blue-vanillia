<div <?php post_class('result row')?>>
    <div class="image-container">

        <a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail( 'medium' ); ?>
<?php else : ?>
    <?php Venues::staticMap( Events::getVenueId( $post->ID ), 'medium' ); ?>
<?php endif; ?>
</a>

    </div>
    <div class="title">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="date"><?php print date( 'M d, Y', strtotime( Events::getDate() ) ); ?></span></h2>
    </div>
    <span class="meta">
        <a href="<?php print get_permalink( Events::getVenueId( $post->ID ) ); ?>"><?php print Venues::getAttribute( array( 'key' => 'title', 'echo' => false ) ); ?></a>
        in <?php Venues::getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
    </span>
    <?php if ( get_option('zm_attend_button_version') ) : ?>
        <?php zm_attend_button_load_template( $post->ID ); ?>
    <?php endif; ?>
</div>