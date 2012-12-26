<div <?php post_class('result row ' . strtolower( date('F', strtotime( Events::getDate() ) ) ) ); ?>>
    <div class="padding">
        <?php if ( ! is_single() ) : ?>
            <div class="image-container">
                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'small' ); ?>
                    <?php else : ?>
                        <?php zm_google_static_map_image( Events::getVenueId( $post->ID ) ); ?>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="date"><?php print date( 'M d, Y', strtotime( Events::getDate() ) ); ?></span></h2>
        </div>
        <?php if ( ! is_single() ) : ?>
        <span class="meta">
            <a href="<?php print get_permalink( Events::getVenueId( $post->ID ) ); ?>"><?php print Venues::getAttribute( array( 'key' => 'title', 'echo' => false ) ); ?></a> in <?php Venues::getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
        </span>
        <?php endif; ?>
        <?php if ( get_option('zm_attend_button_version') ) : ?>
            <?php zm_attend_button_load_template( $post->ID ); ?>
        <?php endif; ?>
    </div>
</div>