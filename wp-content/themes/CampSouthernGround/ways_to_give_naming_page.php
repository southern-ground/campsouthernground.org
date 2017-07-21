<?php
/*
  Template Name: Ways To Give - Naming Opportunities Page
*/
?>

<?php get_header(); ?>

<div class="page ways_to_give naming">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-sm-push-8 centered">
                        <img class="xs-margin-bottom-20"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/img/naming_top.png"/>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 xs-center">
                        <?php if (get_post_meta($post->ID, "capitalize_title", true)) { ?>
                        <h1 class="upcase">
                            <?php } else { ?>
                            <h1>
                                <?php } ?>
                                <?php if (get_post_meta($post->ID, "custom_title", true)) {
                                    echo get_post_meta($post->ID, "custom_title", true);
                                } else {
                                    the_title();
                                } ?>
                            </h1>
                            <p><?php the_content(); ?></p>
                    </div>
                </div><!-- .row -->
            </div>
        </div>

        <div class="container page_content">

            <div class="row">
                <div class="col-xs-12">
                    <h1>Building & Structure Naming Opportunities</h1>
                    <?php if (get_field('naming_opportunities')): ?>
                        <?php while (the_repeater_field('naming_opportunities')): ?>
                            <p class="naming_item"><?php echo get_sub_field('name'); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <p class="contact_blurb"><a href="<?php echo get_permalink(get_page_by_title("Contact Us")->ID) ?>">Contact
                            us</a> to learn more about our naming opportunities.</p>
                </div>
                <!-- <div class="col-xs-4 centered">
        
                  <h3>Legacy Bricks</h3>
        
                  <div class="brick large">
        
                    <p class="brick_size">Large (9x9")</p>
        
                    <p class="brick_price">$500</p>
        
                  </div>
        
                  <a href="#" class="purchase_brick">[ Purchase ]</a>
        
                  <div class="brick medium">
        
                    <p class="brick_size">Medium (4.5x9")</p>
        
                    <p class="brick_price">$250</p>
        
                  </div>
        
                  <a href="#" class="purchase_brick">[ Purchase ]</a>
        
                </div> -->
            </div>
        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <br/>
</div>
<?php get_footer(); ?>
