<?php
/*
  Template Name: Events Page
*/
?>

<?php get_header(); ?>

<div class="page events">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">

            <div class="page_top container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-push-8 centered section-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fundraising_top.png"/>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 section-copy">
                        <h1 class="upcase"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </div>
                </div><!-- .row -->
            </div>

        </div>
        <!-- .page_top_wrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="highlight_box">
                        <p>Learn more about event sponsorship opportunities.</p>
                        <?php $sponsor = get_page_by_title("Event Sponsorships"); ?>
                        <a class="btn btn-primary" href="<?php echo get_permalink($sponsor->ID) ?>">Go Now ►</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="highlight_box">
                        <p>Find out how to hold your own fundraising event.</p>
                        <?php $fund = get_page_by_title("Fundraising"); ?>
                        <a class="btn btn-primary" href="<?php echo get_permalink($fund->ID) ?>">Go Now ►</a>
                    </div>
                </div>
            </div><!-- .row -->
            <div class="events_wrap">
                <?php
                $args = array('post_type' => 'csg_events', 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_date');

                $myposts = get_posts($args);
                foreach ($myposts as $post) : setup_postdata($post); ?>
                    <div class="row event_item">
                        <div class="col-xs-12 col-sm-4 centered">
                            <?php echo wp_get_attachment_image(get_post_meta($post->ID, 'event_thumbnail', true), 'full'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <h4><?php the_title(); ?></h4>
                            <p class="event_description"><?php echo get_post_meta($post->ID, "event_description", true); ?></p>
                            <?php if (get_post_meta($post->ID, "event_end_date", true)) { ?>
                                <?php $start_date = strtotime(get_post_meta($post->ID, "event_date", true)); ?>
                                <?php $end_date = strtotime(get_post_meta($post->ID, "event_end_date", true)); ?>
                                <?php if (date("Y", $start_date) == date("Y", $end_date)) { ?>
                                    <strong class="event_date upcase"><?php echo date("M", $start_date); ?>
                                        /<?php echo date("M", $end_date); ?> <?php echo date("Y", $start_date); ?></strong>
                                <?php } else { ?>
                                    <strong class="event_date upcase"><?php echo date("M Y", $start_date); ?>
                                        /<?php echo date("M Y", $end_date); ?></strong>
                                <?php } ?>
                            <?php } else { ?>
                                <strong
                                    class="event_date upcase"><?php echo date("F Y", strtotime(get_post_meta($post->ID, "event_date", true))); ?></strong>
                            <?php } ?>

                            <div>
                                <span st_url="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"
                                      st_title="<?php the_title(); ?>"
                                      st_summary='<?php echo get_post_meta($post->ID, "event_description", true); ?>'
                                      st_image="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'event_thumbnail', true)); ?>"
                                      class='btn btn-primary btn-md st_sharethis_custom'
                                      displayText='ShareThis'>Share <i class="fa fa-share-alt"></i></span>
                            </div>

                        </div>
                    </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div><!-- .container -->
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <br/>
</div>

<?php get_footer(); ?>
