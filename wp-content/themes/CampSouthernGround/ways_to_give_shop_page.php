<?php

/*

  Template Name: Ways To Give - Shop Page

*/

?>

<?php get_header(); ?>

<div class="page ways_to_give shop">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="page_top_wrap">

            <div class="page_top container">

                <div class="row">


                    <div class="col-xs-12 col-sm-4 col-sm-push-8 centered">

                        <img class="xs-margin-bottom-20"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/img/shop_top.png"/>

                    </div>

                    <div class="col-xs-12 col-sm-8 col-sm-pull-4">

                        <?php if (get_post_meta($post->ID, "capitalize_title", true)) { ?>

                        <h1 class="upcase xs-center">

                            <?php } else { ?>

                            <h1>

                                <?php } ?>

                                <?php if (get_post_meta($post->ID, "custom_title", true)) {

                                    echo get_post_meta($post->ID, "custom_title", true);

                                } else {

                                } ?>

                            </h1>

                            <p><?php the_content(); ?></p>

                    </div>


                </div><!-- .row -->

            </div>

        </div>

        <div class="container content">

            <h2>Here are just a few of the ways you can get involved:</h2>

            <ul>

                <li>Shop the <a href="http://www.southerngroundstore.com/camp-southern-ground-store.html"
                                target="_blank">Camp Store</a></li>

                <li>Purchase a song through <a href="http://www.reverbnation.com/musicforgood" target="_blank">Reverbnation’s
                        Music for Good program</a></li>

                <li>Make your next Amazon purchase through <a href="http://smile.amazon.com" target="_blank">Amazon
                        Smile</a> and select Camp Southern Ground as your preferred charity
                </li>

                <li>Sell your items on eBay through the <a href="https://www.paypalgivingfund.org/" target="_blank">PayPal
                        Giving Fund</a> and select Camp Southern Ground as your beneficiary
                </li>

            </ul>

        </div>

    <?php endwhile;
    else: ?>

        <p>Sorry, this page doesn't exist.</p>

    <?php endif; ?>

    <div class="page_bottom_wrap">

        <div class="container">

            <h3>Coming Soon: The Camp Marketplace</h3>

            <p>Soon, a collection of approved businesses will come together to offer their products and services within
                the Camp Marketplace. These organizations are committed to supporting Camp Southern Ground’s mission,
                and will provide a percentage of their sales to benefit the camp. If you’re interested in being a part
                of the Camp Marketplace, <a href="<?php echo get_permalink(get_page_by_title("Contact Us")->ID) ?>">contact
                    us</a>.</p>


        </div>

    </div>

</div>

<?php get_footer(); ?>



