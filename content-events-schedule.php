<?php if ( get_option('zm_attend_button_version') ) $css_helper = 'zm-attend-helper'; else $css_helper = null; ?>
<div <?php post_class( $css_helper . ' result row ' . strtolower( date('F', strtotime( Events::getDate() ) ) ) ); ?>>
    <div class="padding">

        <span class="date"><?php print date( 'd', strtotime( Events::getDate() ) ); ?></span>

        <?php if ( get_option('zm_attend_button_version') ) : ?>
            <?php zm_attend_button_load_template( $post->ID ); ?>
        <?php endif; ?>

        <div class="title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>

    </div>
</div>