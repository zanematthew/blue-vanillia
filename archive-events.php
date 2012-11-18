<?php get_header(); ?>
<div class="events-container">
    <div class="single-container">
        <div class="W-C">
            <?php get_sidebar(); ?>
            <div class="main-container">
                <div class="padding">
                    <?php dynamic_sidebar( 'main-column-top' ); ?>
                    <div class="tabs-container tabs-handle">
                        <ul>
                            <li><a href="#locals-current-month">Upcoming Events</a></li>
                        </ul>
                        <div id="locals-current-month">
                            <div class="row-container">
                                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                                    <!-- Event -->
                                    <div <?php post_class('result row')?>>
                                        <div class="image-container">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                        </div>
                                        <div class="title">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="date">
                                            <?php Events::getDate(); ?>
                                        </div>
                                        <span class="meta">
                                            <?php Venues::getAttribute( array( 'key' => 'title', 'echo' => true ) ); ?>
                                            in <?php Venues::getAttribute( array( 'key' => 'state', 'echo' => true ) ); ?>
                                        </span>
                                    </div>
                                    <!-- -->
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php blue_vanillia_pagination(); ?>
                </div>
            </div>

            <?php get_sidebar( 'wide' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>