<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>
<meta name="description" content="An Event and Track directory for BMX Racing" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

<!-- Start w head -->
<?php wp_head(); ?>
<!-- End w head -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body <?php body_class();?>>

<div class="top-bar-container">
    <div class="left">
        <div class="primary-navigation">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix' ) ); ?>
            <?php else : ?>
                <ul class="menu clearfix">
                <?php
                    $args = array(
                        'depth'        => 1,
                        'title_li'     => '',
                        'link_before'  => '',
                        'link_after'   => ''
                    );
                    wp_list_pages( $args );
                ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <!-- -->
    <div class="right">
        <?php if ( is_user_logged_in() ) : ?>
            <?php if ( get_option('zm_attend_button_version') ) zm_attend_button_nav(); ?>
        <?php else : ?>
            <div class="zm-action-box">
                <a href="#" class="register-handle">Register</a><span class="bar">|</span>
                <a href="#" class="login-handle" data-template="views/shared/login.html.php">Login</a>
            </div>
        <?php endif; ?>
        <?php //load_template( VIEWS_DIR . 'shared/register.php' ); ?>
    </div>
    <!-- -->
</div>

<?php

// some lame logic to ensure when the user is browsing
// the /events/my-event/ page and they do a search, the search
// uses the events json feed, passes the right post type
$param = $_SERVER['REQUEST_URI'];

$tmp = explode( '/', $param );
$param = $tmp[1];

$post_types = array('events', 'venues');

if ( in_array( $param, $post_types ) ) {
    $current = $param;
} else {
    if ( ! empty( $_GET['post_type'] ) )
        $current = $_GET['post_type'];
    else
        $current = 'events';
}
if ( $current == 'events' )
    $placeholder = 'Search for an event';
else
    $placeholder = 'Search for a track';

//
?>
<div class="header-container">
    <div style="width: 1024px;">
        <div class="middle">
            <div class="col-1">
                <hgroup>
                <h1 class="site-title">
                    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                </hgroup>
            </div>
            <div class="col-2">
                <div class="search-bar-container">
                    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?= $placeholder; ?>" />
                        <input type="hidden" name="type" value="<?= $current; ?>" id="post_type_target" />
                        <input type="submit" id="searchsubmit" value="Search" />
                        <div id="results_count_target"></div>
                        <div id="results_message_target"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="image-background" style="background-image: url('<?php print get_header_image(); ?>');">
        <div class="banner-wrapper">
                            <!-- message coming soone -->
                    </div>
    </div>