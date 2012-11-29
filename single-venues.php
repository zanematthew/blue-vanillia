<?php get_header(); ?>
<span class="zm_ev_venue_zip" style="display: none;"><?php Venues::getAttribute( array( 'key' => 'zip', 'echo' => true ) ); ?></span>
<div class="events-container">
    <div class="single-container">
        <div class="W-C">
            <?php get_sidebar(); ?>
            <div class="main-container">
                <div class="padding">
                    <div class="row-container">
                        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                            <!-- Venue -->
                            <div class="row">
                                <div <?php post_class()?>>
                                    <h2 class="title"><?php edit_post_link(); ?></h2>
                                    <h1><?php the_title(); ?></h1>
                                    <div class="image-container">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail( 'medium' ); ?>
                                        <?php else : ?>
                                            <?php Venues::staticMap( $post->ID, 'medium' ); ?>
                                        <?php endif; ?>
                                    </div>
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

                            <?php
                            global $post;
                            $venues = new Venues;
                            $events = $venues->getSchedule( $post->ID );
                            if ( $events ) : ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="attending">Attend</th>
                                        <th class="date">Date</th>
                                        <th class="title">Event</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ( $events->have_posts() ) : $events->the_post(); setup_postdata( $post ); ?>
                                <?php
                                    $race_date = strtotime( zm_ee_format_date( $post->ID, $both=false, false ) );
                                    $today = time();
                                    if ( $race_date < $today ) {
                                        $class = ' expired-event ';
                                    } else {
                                        $class = null;
                                    }
                                ?>
                                <tr <?php post_class('result' . $class )?>>
                                    <td><?php zm_attend_button_load_template(); ?></td>
                                    <td class="time meta">
                                        <time class="meta"><?php zm_ee_format_date(); ?></time>
                                    </td>
                                    <td>
                                        <strong class="title left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
                                        <span class="<?php zm_ee_comment_class( $post->ID ); ?>"><a href="<?php the_permalink(); ?>#comments_target" title="<?php comments_number(); ?>"><?php comments_number(' '); ?></a></span>
                                    </td>
                                </tr>
                                <?php endwhile; wp_reset_postdata(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>

                        <!-- Comments -->
                        <div name="comments">
                            <?php if ( function_exists( 'zm_comments' ) ) zm_comments(); ?>
                        </div>
                        <!-- -->

                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php get_sidebar( 'venues' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>