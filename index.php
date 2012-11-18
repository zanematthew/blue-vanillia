<?php get_header(); ?>
    <div class="events-container">
        <div class="W-C">
            <?php get_sidebar(); ?>
            <div class="main-container">
                <div class="row-container">
                    <?php  foreach( get_posts( array( 'post_type' => array( 'events', 'venues' ), 'post_status' => 'publish' ) ) as $post ) : setup_postdata( $post ); ?>
                        <?php get_template_part( 'content', $post->post_type ); ?>
                    <?php endforeach; ?>
                </div>
                <?php blue_vanillia_pagination(); ?>
            </div>
            <?php get_sidebar( 'wide' ); ?>
        </div>
    </div>
<?php get_footer(); ?>