<?php
/*
  Template Name: Ways To Give - Wishlist Page
*/
?>
<?php get_header(); ?>
<div class="page ways_to_give wishlist">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-push-8 centered">
                        <img class="xs-margin-bottom-20" src="<?php echo get_stylesheet_directory_uri(); ?>/img/wishlist_top.png"/>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-sm-pull-4">
                        <?php if (get_post_meta($post->ID, "capitalize_title", true)) { ?>
                        <h1 class="upcase xs-centered">
                            <?php } else { ?>
                            <h1 class="centered">
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
            <p class="top_descript">Have a look at the list below and <a
                    href="<?php echo get_permalink(get_page_by_title("Contact Us")->ID) ?>">contact us</a> if you can
                help us check off some of these organic farming necessities:</p>
            <?php if (get_post_meta($post->ID, "wish_list", true)) { ?>
                <?php $arr = explode(",", get_post_meta($post->ID, "wish_list", true)); ?>
                <?php for ($i = 0; $i < count($arr); $i++) { ?>
                    <?php if ($i % 2 == 0) { ?>
                        <div class="row">
                    <?php } ?>

                    <div class="col-xs-12 col-sm-6 list_item">
                        <?php $str = trim($arr[$i]); ?>
                        <?php if ($str{0} == '!') { ?>

                            <span class="list_item_name checked">&bull; <?php echo str_replace("!", "", $str); ?></span>

                        <?php } else { ?>

                            <span class="list_item_name">&bull; <?php echo $str; ?></span>

                        <?php } ?>
                    </div>

                    <?php if (($i % 2 != 0) || ($i % 2 == 0 && $i == count($arr) - 1)) { ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <br/>
</div>
<?php get_footer(); ?>

