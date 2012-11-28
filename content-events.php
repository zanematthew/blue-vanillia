<div <?php post_class('result row')?>>
    <div class="image-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="title">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <div class="date">
        <?php Events::getDate(); ?>
    </div>
    <span class="meta">
        <?php Venues::getAttribute( array( 'key' => 'title', 'echo' => true ) ); ?>
        in <?php Venues::getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
        <br /><?php print date( 'M d, Y', strtotime( Events::getDate() ) ); ?>
    </span>
<?php if ( get_option('zm_attend_button_version') ) : ?>
    <?php zm_attending_button_container( $post->ID ); ?>
<?php endif; ?>
</div>