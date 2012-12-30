<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div <?php post_class('result')?>>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>