<?php
/*
  Template Name: Camp Page
*/
?>

<?php get_header(); ?>

<div class="page camp">

    <div class="page_top_wrap">
        <div class="page_top container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <h1>OUR MISSION STATEMENT</h1>

                    <p>Our mission is to provide extraordinary experiences for children to recognize and magnify the unique gifts within themselves and others in order to profoundly impact the world.</p>
                </div>
                <div class="col-xs-12 col-sm-4 centered">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/camp_top.png"/>
                </div>
            </div>
        </div>
    </div><!-- .page_top_wrap -->

    <div class="page_mid_wrap">
        <div class="page_mid container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h1>OUR PROGRESS</h1>
                    <p>Tour the Camp and see the exciting plans that are currently underway.</p>
                    <a href="<?php echo get_permalink(get_page_by_title("Our Progress")->ID) ?>"
                       class="btn btn-primary btn-small camp-cta">Start Exploring</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 page_content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1>ABOUT THE CAMP</h1>
                    <p><?php the_content(); ?></p>

                <?php endwhile;
                else: ?>
                    <p>Sorry, this page doesn't exist.</p>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-4 page_sidebar">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/camp_1.png"/>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/camp_2.png"/>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
