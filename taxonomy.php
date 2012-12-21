<?php get_header();

global $wp_query;

$taxonomy = $wp_query->query_vars['taxonomy'];
$term = get_term_by( 'slug', $wp_query->query_vars[ $taxonomy ], $taxonomy );

$args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'terms' => get_query_var('term'),
                    'field' => 'slug'
                )
            ),
            'meta_query' => array(
                array(
                    'key' => 'events_start-date',
                    'compare' => '>=',
                    'value' => '2013-01-01'
                    )
                ),
            'meta_key' => 'events_start-date',
            'orderby' => 'events_start-date',
            'order' => 'ASC',
            'posts_per_page' => 8,
            'paged' => get_query_var( 'paged' )
        );

$query = new WP_Query( $args );

$count = $query->found_posts;
$term = $term->name;
?>
<div class="main-container">
    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#locals-current-month"><?php print $term; ?><span class="count"><?php print $count; ?></span></a></li>
        </ul>
        <?php if ( $query->post_count == 0 ) : ?>
            <h1>Sorry, currently there are no <?php print get_query_var('term'); ?> listed for <?php print date('Y', strtotime('+1 year')); ?></h1>
        <?php else : ?>
            <div class="row-container">
                <?php foreach( $query->posts as $post ) : setup_postdata( $post ); ?>
                    <?php get_template_part( 'content', 'events' ); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php blue_vanillia_pagination( $query->max_num_pages ); ?>
</div>
<?php get_footer(); ?>