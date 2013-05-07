<?php get_header(); $my_cpt = array('events','venues'); ?>

<div class="tabs-container tabs-handle">
    <ul>
        <?php foreach( $my_cpt as $cpt ) : ?>
            <li><a href="#<?php print $cpt; ?>-tab"><?php print ucfirst( $cpt ); ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php foreach( $my_cpt as $cpt ) : ?>
        <div id="<?php print $cpt; ?>-tab">
            <div class="row-container" id="search_target">

                <?php $my_posts = zm_ev_venues_by_user_pref_args( $cpt ); ?>
                <?php if ( $my_posts ) : ?>
                    <?php foreach( $my_posts as $post ) : setup_postdata( $post ); ?>
                        <?php get_template_part( 'content', $cpt ); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="padding">No results message here.</p>
                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php get_footer(); ?>