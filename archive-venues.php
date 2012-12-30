<?php get_header(); ?>
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
<?php get_footer(); ?>