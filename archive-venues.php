<?php get_header(); ?>
<div class="events-container">
    <div class="W-C">
        <?php get_sidebar(); ?>
        <div class="main-container">
            <?php dynamic_sidebar( 'main-column-top' ); ?>
            <div class="tabs-container tabs-handle">
                <ul>
                    <li><a href="#locals-current-month">Venues</a></li>
                </ul>
                <div id="locals-current-month">
                    <div class="row-container">
                        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', $post->post_type ); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php blue_vanillia_pagination(); ?>
        </div>
        <?php get_sidebar( 'wide' ); ?>
    </div>
</div>
<?php get_footer(); ?>