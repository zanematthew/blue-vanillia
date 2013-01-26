<?php get_header(); ?>
<div class="tabs-container tabs-handle">
    <div class="row-container" id="search_target">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', $post->post_type ); ?>
        <?php endwhile; ?>
        <?php blue_vanillia_pagination(); ?>
    <?php else : ?>
        <?php if ( ! get_option( 'zm_json_version' ) ) : ?>
            <div class="row">
                <div class="padding">
                <h1><?php _e( 'Nothing Found', 'blue_vanillia' ); ?></h1>
                <p><?php _e( 'Sorry, but nothing matched your search criteria. <br />Please try again with some different keywords.', 'blue_vanillia' ); ?></p>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>