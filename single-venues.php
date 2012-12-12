<?php get_header(); ?>
<div class="main-container">
<div class="row-container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="row">
        <div <?php post_class()?>>
            <h2 class="title"><?php edit_post_link(); ?></h2>
            <h1><?php the_title(); ?></h1>
            <?php
            $venues = New Venues();
            $email = $venues->getAttribute( array( 'key' => 'email' ) );
            $contact = $venues->getAttribute( array( 'key' => 'phone' ) );
            $website = $venues->getAttribute( array( 'key' => 'website' ) );
            if ( ! empty( $email ) ) : ?>
                <strong>Email</strong>
                <a href="mailto:<?php print $email; ?>">
                <?php print $email; ?></a>
                <br />
            <?php endif; ?>

            <?php if ( ! empty( $contact ) ) : ?>
                <strong>Primary Contact</strong>
                <?php print $contact; ?>
                <br />
            <?php endif; ?>

            <?php if ( ! empty( $website ) ) : ?>
                <strong>Website</strong>
                <a href="<?php print $website; ?>" target="_blank">
                <?php print $website; ?></a>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </div>
    <!-- -->

    <!-- Share -->
    <?php if ( get_option( 'zm_social_version' ) ) : ?>
    <div class="row">
        <?php zm_social_twitter_button( $post->post_title, get_permalink() ); ?>
        <?php zm_social_facebook_button( get_permalink() ); ?>
    </div>
    <?php endif; ?>
    <!-- -->

    <!-- Weather -->
    <?php if ( get_option('zm_weather_version') ) : ?>
    <!-- <div class="row"> -->
        <!-- <h2 class="title">Weather Conditions</h2> -->
        <?php // zm_weather_venue_target( Venues::getAttribute( array( 'key' => 'city' ) ) . ',' . Venues::getAttribute( array( 'key' => 'state' ) ) ); ?>
    <!-- </div> -->
    <?php endif; ?>
    <!-- -->

    <!-- Schedule  -->
    <div class="tabs-container">
        <div class="row-container">
        <?php
        global $post;
        $venues = new Venues;
        $events = $venues->getSchedule( $post->ID );
        if ( ! empty( $events ) && $events->have_posts() ) :
        while ( $events->have_posts() ) : $events->the_post(); setup_postdata( $post ); ?>
            <?php get_template_part('content', 'events' ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No Events Message Here</p>
        <?php endif; ?>
        </div>
    </div>
    <!--  -->

    <!-- Comments -->
    <div name="comments">
        <?php if ( function_exists( 'zm_comments' ) ) zm_comments(); ?>
    </div>
    <!-- -->

    <?php endwhile; ?>
</div>
</div>

<?php get_footer(); ?>