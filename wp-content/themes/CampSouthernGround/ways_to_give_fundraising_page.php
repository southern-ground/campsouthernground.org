<?php
/*
  Template Name: Ways To Give - Fundraising Page
*/
?>
<?php get_header(); ?>

<div class="page ways_to_give fundraising">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-sm-push-8 centered">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fundraising_top.png"/>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-sm-pull-4">
                        <h1 class="upcase xs-centered"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </div>

                </div><!-- .row -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h1>The ideas are endless:</h1>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Dream Jar Collections</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">BBQ</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">5K Runs</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Yard Sales</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Birthday Parties</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Bake Sales</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Auctions</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Motorcycle Runs</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Weddings</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Bike Runs</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Golf Tournaments</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Art Shows</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Music Festivals</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Chorus Concerts</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Pancake Breakfasts</div>
                        <div class="col-xs-12 col-sm-6 fundraising-idea">Civic Group Fundraisers</div>
                    </div>
                    <br/>
                    <p>Have questions about developing your own fundraiser for Camp Southern Ground? <a
                            href="<?php echo get_permalink(get_page_by_title("Contact Us")->ID) ?>">Contact Us</a>!
                </div><!-- col left -->
                <div class="col-xs-12 col-sm-6">
                    <div class="fundraise_cta centered">
                        <h3>Ready to go?</h3>
                        <p>Download our fundraising application to get started.</p>
                        <a href="<?php echo get_stylesheet_directory_uri(); ?>/forms/fundraising_form.pdf" download
                           class="btn btn-primary">Download</a>
                    </div>
                </div><!-- col right -->
            </div>
        </div>
                <?php if (get_post_meta($post->ID, "gallery_shortcode", true)) {
?>
        <div class="gallery_wrap">
            <div class="container gallery">
                <h1>Event Gallery</h1>
                    <?php echo do_shortcode(get_post_meta($post->ID, "gallery_shortcode", true)); ?>
            </div>
        </div>
<?php } ?>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

