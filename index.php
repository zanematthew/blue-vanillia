<?php get_header(); ?>
<div class="main-container">
    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#events-tab">Events</a></li>
            <li><a href="#venues-tab">Venues</a></li>
        </ul>
        <div id="events-tab">
            <div class="row-container">
                <?php  foreach( get_posts( array( 'post_type' => array( 'events' ), 'post_status' => 'publish' ) ) as $post ) : setup_postdata( $post ); ?>
                    <?php get_template_part( 'content', $post->post_type ); ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="venues-tab">
            <div class="row-container">
                <?php  foreach( get_posts( array( 'post_type' => array( 'venues' ), 'post_status' => 'publish' ) ) as $post ) : setup_postdata( $post ); ?>
                    <?php get_template_part( 'content', $post->post_type ); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>