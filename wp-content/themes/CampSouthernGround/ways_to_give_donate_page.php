<?php
/*
  Template Name: Ways To Give - Giving Opportunities Page
*/
?>
<?php get_header(); ?>
<div class="page ways_to_give donate">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-push-6">

                        <img class="video_thumb"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/img/video_placeholder.jpg"/>

                        <!--<a href="Javascript:void(0);" class="video_clicker"><img class="video_thumb" src="<?php /*echo get_stylesheet_directory_uri(); */ ?>/img/video_thumb.png" /></a>
            <iframe style="display:none;" src="" class="ways_to_give_video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->

                    </div>
                    <div class="col-xs-12 col-sm-6 col-sm-pull-6 centered details">
                        <h2>Make a Donation</h2>
                        <p>Learn how to give a monetary donation using the options below.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container donation_links">
            <div class="row">
                <div class="col-xs-12 col-md-6 centered donation-type">
                    <p>Make a monetary donation online through Acceptiva.</p>
                    <br/>
                    <a href="https://secure.acceptiva.com/?cst=d95a40" target="_blank"
                       class="btn btn-primary">Donate</a>
                </div>
                <div class="col-xs-12 col-md-6 centered donation-type">
                    <p>Make a monetary donation by mail. Start by downloading this form:</p>
                    <br/>
                    <a href="<?php echo get_stylesheet_directory_uri(); ?>/forms/donation_form.pdf" download
                       class="btn btn-primary">Download our Donation Form</a>
                </div>
            </div>
        </div>
        <div class="bottom_wrap">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
