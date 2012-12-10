<?php get_header(); ?>
<div class="main-container">
    <?php dynamic_sidebar( 'main-column-top' ); ?>
    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#locals-current-month">Upcoming Events</a></li>
        </ul>
        <div id="locals-current-month">
            <div class="row-container">
                <?php
                $args = array(
                    'post_type' => 'events',
                    'orderby' => 'meta_value',
                    'meta_key' => 'events_start-date',
                    'order' => 'ASC',
                    'posts_per_page' => 8,
                    'paged' => get_query_var( 'paged' ),
                    'meta_query' => array(
                                        array(
                                            'key' => 'events_start-date',
                                            'compare' => '>=',
                                            'value' => '2013-01-01'
                                        )
                                    )
                                );
                $my_query = New WP_Query( $args );
                ?>
                <?php if ( $my_query->have_posts() ) while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                    <?php get_template_part( 'content', $post->post_type ); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php blue_vanillia_pagination( $my_query->max_num_pages ); ?>
</div>
<?php get_sidebar( 'wide' ); ?>
<?php get_footer(); ?>