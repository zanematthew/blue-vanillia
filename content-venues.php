<div <?php post_class('result row')?>>
    <div class="image-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php Venues::staticMap( $post->ID, 'small' ); ?>
    </div>
    <div class="title">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <span class="meta">
        <?php print Venues::getAttribute( array( 'key' => 'city' ) ); ?>,
        <?php print Venues::getAttribute( array( 'key' => 'state' ) ); ?>
    </span>
</div>