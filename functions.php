<?php


function blue_vanillia_custom_header_setup() {

    $args = array(
        'default-image'          => '%s/images/header.jpg', // %s is the theme folder
        'height'                 => 350,
        'flex-height'            => true,
        'default-text-color'     => '000',
        'wp-head-callback'       => 'blue_vanillia_header_style',
        'admin-head-callback'    => 'blue_vanillia_admin_header_style',
        'admin-preview-callback' => 'blue_vanillia_admin_header_image',
    );

    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'small', 129, 86 );
    add_image_size( 'wide', 800, 800 );
}
add_action( 'after_setup_theme', 'blue_vanillia_custom_header_setup' );


function blue_vanillia_header_style() {

    // If no custom options for text are set, let's bail
    // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
    if ( HEADER_TEXTCOLOR == get_header_textcolor() )
        return;
    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
    <?php
        // Has the text been hidden?
        if ( 'blank' == get_header_textcolor() ) :
    ?>
        #site-title,
        #site-description {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
        // If the user has set a custom color for the text use that
        else :
    ?>
        h1#site-title a,
        h2#site-description,
        ul.primary li a {
            color: #<?php echo get_header_textcolor(); ?> !important;
            text-shadow: none !important;
        }
    <?php endif; ?>
    </style>
    <?php
}

function blue_vanillia_admin_header_style() {?>
    <style type="text/css">
    .appearance_page_custom-header #headimg { float: left; }
    #headimg img {
        float: left;
        max-width: 100%;
    }
    </style>
<?php }


function blue_vanillia_admin_header_image() { ?>
    <div id="headimg">
        <?php
        if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
            $style = ' style="display:none;"';
        else
            $style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
        ?>
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <img src="<?php echo esc_url( $header_image ); ?>" alt="" />
        <?php endif; ?>
    </div>
<?php }


function blue_vanillia_init(){
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'menus' );

    /** This theme uses wp_nav_menu() in one location */
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'blue-vanillia' ),
            'top-menu' => __( 'Top Menu', 'blue-vanillia' ),
            'footer-menu' => __( 'Footer Menu', 'blue-vanillia' ),
        )
    );
}
add_action('init', 'blue_vanillia_init');


function fancy_date( $post_id=null ) {

    if ( is_null( $post_id ) ) {
        global $post;
        $post_id = $post->ID;
    }

    $start = get_post_meta( $post_id, 'events_start-date', true );

    $start_month = '<div class="month-container"><span>' . date( 'M', strtotime( $start ) ) . '</span></div>';
    $start_day_name = '<span class="day-name">' . date( 'D', strtotime( $start ) ) . '</span>';
    $start_date = '<div class="date-container">' . $start_day_name . '<span class="day-number">' . date( 'j', strtotime( $start ) ) . '</span></div>';
    $start_year = '<div class="year-container"><span>' . date( 'Y', strtotime( $start ) ) . '</span></div>';

    $start_final = '<div class="calendar-container">' . $start_month . $start_date . $start_year . '</div>';

    $end = get_post_meta( $post_id, 'events_end-date', true );

    if ( $end ) {
        $end_day_name = '<span class="day-name">' . date( 'D', strtotime( $end ) ) . '</span>';
        $end_date = '<div class="date-container">'.$end_day_name.'<span class="day-number">' . date( 'j', strtotime( $end ) ) . '</span></div>';

        // If start date is the same as end date we dont want them showing twice
        if ( $end_date == $start_date ) {
            $end_final = null;
        } else {

            $end_month = '<div class="month-container"><span>' . date( 'M', strtotime( $end ) ) . '</span></div>';
            $end_year = '<div class="year-container"><span>' . date( 'Y', strtotime( $end ) ) . '</span></div>';

            $end_final = '<div class="calendar-container">' . $end_month . $end_date . $end_year . '</div>';
        }
    }


    else {
        $end_final = null;
    }

    print '<div class="calendar-wrapper">'.$start_final.$end_final.'</div>';
}
add_action('fancy_date', 'fancy_date', 8, 1 );


function blue_vanillia_widgets_init() {

    register_sidebar(array(
        'name' => __( 'Footer Left Area', 'blue_vanillia' ),
        'id' => 'footer-large-area',
        'before_widget' => '<aside class="widget-1">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ) );

    register_sidebar(array(
        'name' => __( 'Footer Row 1', 'blue_vanillia' ),
        'id' => 'footer-row-1',
        'before_widget' => '<div class="copy"><div class="large"><aside class="widget-3">',
        'after_widget' => '</aside></div></div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ) );

    register_sidebar(array(
        'name' => __( 'Footer Row 2', 'blue_vanillia' ),
        'id' => 'footer-row-2',
        'before_widget' => '<div class="box-container"><aside class="widget-3">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ) );

    register_sidebar(array(
        'name' => __( 'Footer Row 3', 'blue_vanillia' ),
        'id' => 'footer-row-3',
        'before_widget' => '<div class="info"><aside class="widget-3">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ) );

    register_sidebar(array(
        'name' => __( 'Main Column Top', 'blue_vanillia' ),
        'id' => 'main-column-top',
        'before_widget' => '<aside class="callout-container"><span class="content">',
        'after_widget' => '</span></aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ) );
}
add_action( 'widgets_init', 'blue_vanillia_widgets_init' );


function blue_vanillia_assets_init() {

    $dependencies[] = 'jquery';

    wp_enqueue_script( 'zm-ui-core-script', get_template_directory_uri() . '/vendor/jquery-ui/js/jquery-ui-1.9.2.custom.min.js', $dependencies );
    wp_enqueue_script( 'zm-ui-tabs-script', get_template_directory_uri() . '/vendor/jquery-ui/development-bundle/ui/minified/jquery.ui.tabs.min.js', $dependencies );
    wp_enqueue_style( 'zm-ui-tabs-style', get_template_directory_uri() . '/vendor/jquery-ui/development-bundle/themes/ui-lightness/jquery.ui.tabs.css' );

    wp_enqueue_script( 'blue-vanillia-script', get_template_directory_uri() . '/scripts.js', $dependencies );
}
add_action( 'wp_enqueue_scripts', 'blue_vanillia_assets_init' );

function blue_vanillia_pagination( $total=null ){

    global $wp_query;

    if ( empty( $total ) )
        $total = $wp_query->max_num_pages;

    $big = 999999999; // need an unlikely integer

    $links = paginate_links(
        array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $total
        )
    );

    print '<div class="pagination-container">' . $links . '</div>';
}

function blue_vanillia_comment_class( $post_id=null ){

    $comments_count = wp_count_comments( $post_id );

    if ( $comments_count->total_comments == 1 )
        $comment_class = 'comment-count';

    elseif ( $comments_count->total_comments > 1 )
        $comment_class = 'comments-count';
    else
        $comment_class = '';

    print $comment_class;
}

function blue_vanillia_content_image( $post_id=null, $size=null ){
    $image = get_the_post_thumbnail( $post_id, $size ); ?>
    <div class="image-container">
        <a href="<?php the_permalink(); ?>">
            <?php if ( $image == "" ) : ?>
                <?php if ( get_option('zm_get_static_google_map_version') ) zm_google_static_map_image( $post_id, $size ); ?>
            <?php else : ?>
                <?php print $image; ?>
            <?php endif; ?>
        </a>
    </div>
<?php }