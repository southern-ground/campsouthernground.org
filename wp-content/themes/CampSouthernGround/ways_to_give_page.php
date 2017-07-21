<?php
/*
  Template Name: Ways To Give Page
*/
?>
<?php get_header(); ?>
<div class="page ways_to_give">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-sm-push-6 centered">

                        <img class="video_thumb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/video_placeholder.jpg" />

                        <!--<a href="Javascript:void(0);" class="video_clicker">
                            <img class="video_thumb"
                                 src="<?php /*echo get_stylesheet_directory_uri(); */?>/img/video_thumb.png"/>
                        </a>
                        <iframe style="display:none;" src="" class="ways_to_give_video" frameborder="0"
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->

                    </div>

                    <div class="col-xs-12 col-sm-6 col-sm-pull-6 centered details">
                        <h2>Make a Donation</h2>
                        <p>Give a monetary donation online immediately, or browse a number of different giving
                            opportunities.</p>
                        <a href="<?php echo get_permalink(get_page_by_title("Giving Opportunities")->ID) ?>"
                           class="btn btn-primary btn-large btn-primary_on-light-green">Start Giving</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container page_content">

                <div class="donation_item col-xs-12 col-sm-6">
                    <div class="donation_item_title">
                        <h2>Wish List</h2>
                    </div>
                    <div class="donation_item_description">
                        Help us check off our most needed items.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Wish List")->ID) ?>"
                           class="btn btn-primary btn-small">See the List</a>
                    </div>
                </div>

                <div class="donation_item col-xs-12 col-sm-6">
                    <div class="donation_item_title">
                        <h2>Event Sponsorships</h2>
                    </div>
                    <div class="donation_item_description">
                        Sponsor an event or donate items for a silent auction.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Event Sponsorships")->ID) ?>"
                           class="btn btn-primary btn-small">Learn More</a>
                    </div>
                </div>


                <div class="donation_item  col-xs-12 col-sm-6"">
                    <div class="donation_item_title">
                        <h2>Leave a Legacy</h2>
                    </div>
                    <div class="donation_item_description">
                        Make your mark on Camp Southern Ground.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Naming Opportunities")->ID) ?>"
                           class="btn btn-primary btn-small">Find Out How</a>
                    </div>
                </div>

                <div class="donation_item col-xs-12 col-sm-6"">
                    <div class="donation_item_title">
                        <h2>Fundraising</h2>
                    </div>
                    <div class="donation_item_description">
                        Find ideas and fill out our fundraising application.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Fundraising")->ID) ?>"
                           class="btn btn-primary btn-small">Get Started</a>
                    </div>
                </div>

                <div class="donation_item col-xs-12 col-sm-6"">
                    <div class="donation_item_title">
                        <h2>Shop</h2>
                    </div>
                    <div class="donation_item_description">
                        Make a purchase or a sale to help support the camp.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Shop")->ID) ?>"
                           class="btn btn-primary btn-small">See How</a>
                    </div>
                </div>

                <div class="donation_item col-xs-12 col-sm-6"">
                    <div class="donation_item_title">
                        <h2>Volunteer</h2>
                    </div>
                    <div class="donation_item_description">
                        Join our team of helping hands.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Volunteer")->ID) ?>"
                           class="btn btn-primary btn-small">Learn More</a>
                    </div>
                </div>

                <div class="donation_item col-xs-12 col-sm-6">
                    <div class="donation_item_title">
                        <h2>Events</h2>
                    </div>
                    <div class="donation_item_description">
                        Attend an upcoming event that benefits Camp Southern Ground.
                    </div>
                    <div class="donation_item_cta">
                        <a href="<?php echo get_permalink(get_page_by_title("Events")->ID) ?>"
                           class="col-xs-6 btn btn-primary btn-small">Browse the Calendar</a>
                    </div>
                </div>
            
        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
