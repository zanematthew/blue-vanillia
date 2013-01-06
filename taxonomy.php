<?php get_header();

global $wp_query;

$taxonomy = $wp_query->query_vars['taxonomy'];
$term = get_term_by( 'slug', $wp_query->query_vars[ $taxonomy ], $taxonomy );

$args = array(
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
            'paged' => get_query_var( 'paged' )
        );

$query = new WP_Query( $args );
$count = $query->found_posts;
$term = $term->name;
?>
    <div class="tabs-container tabs-handle">
        <ul>
            <li><a href="#locals-current-month"><?php print $term; ?><span class="count"><?php print $count; ?></span></a></li>
        </ul>
        <?php if ( $query->post_count == 0 ) : ?>
            <h1 class="padding"><?php _e( sprintf( 'Sorry, currently there are no %s(s) listed for %d', get_query_var('term'), date('Y')), 'blue_vanillia'); ?></h1>
        <?php else : ?>
            <div class="row-container">
                <?php foreach( $query->posts as $post ) : setup_postdata( $post ); ?>
                    <?php get_template_part( 'content', 'events' ); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php blue_vanillia_pagination( $query->max_num_pages ); ?>
<?php get_footer(); ?>