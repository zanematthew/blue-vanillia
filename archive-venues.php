<?php get_header(); ?>
<div class="events-container">
    <div class="single-container">
        <div class="W-C">
            <div class="sidebar-container">
                <div class="padding">
                    sidebar
                </div>
            </div>

            <div class="main-container">
                <div class="padding">
                    <?php dynamic_sidebar( 'main-column-top' ); ?>
                    <div class="tabs-container tabs-handle">
                        <ul>
                            <li><a href="#locals-current-month">Venues</a></li>
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
                                        <span class="meta">
                                            <?php print Venues::getCity(); ?>, <?php print Venues::getState(); ?>
                                        </span>
                                    </div>
                                    <!-- -->
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php get_sidebar( 'wide' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>