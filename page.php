<?php get_header(); ?>
<div class="events-container">
    <div class="W-C">
        <div class="main-container">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div <?php post_class('result')?>>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>