<?php
/*
  Template Name: Donate Page
*/
?>

<?php get_header(); ?>

<div class="page camp donate container push-down">

    <div class="row">
        <div class="col-xs-12 col-sm-7 page_content">
            <p style="margin-top:0; margin-bottom:20px;">
                <img style="width:100%" src="<?php the_field('logo'); ?>"/>
            </p>

            <div>
                <?php the_field('content'); ?>

                <?php if (get_field('donor_form')) { ?>
                    <a class="donate-button"
                       href="<?php the_field('donor_form'); ?>"
                       target="_blank" download="RemedyCircleMembers">
                        View Remedy Circle Members <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/img/download_icon.png"/>
                    </a>
                <?php } ?>

                <?php if (have_rows('downloadable_items')):

                    // loop through the rows of data
                    while (have_rows('downloadable_items')) : the_row();

                        ?>

                        <a class="donate-button"
                           href="<?php the_sub_field('download_item') ?>"
                           target="_blank" download="RemedyCircleMembers">
                            <?php the_sub_field('link_title') ?> <img
                                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/download_icon.png"/>
                        </a>

                        <?php
                    endwhile;
                else :
                    // no rows found
                    ?>
                    <!-- No additional download content -->
                    <?php
                endif;
                ?>



                <?php if (get_field('donation_link')): ?>
                    <a class="donate-button"
                       href="<?= the_field('donation_link') ?>"
                       target="_blank">
                        <img class="acceptiva"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/img/button-icons/payment_icons.png"/>
                    </a>
                <?php else: ?>
                    <a class="donate-button"
                       href="/donate"
                       target="_blank">
                        <img class="acceptiva"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/img/button-icons/payment_icons.png"/>
                    </a>
                <?php endif; ?>
            </div>


            <div>
                <?php the_field('thanks') ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 page_sidebar" style="padding-left:30px;">
            <?php if (have_rows('images')): while (have_rows('images')) : the_row(); ?>
                <img class="sidebar-image" src="<?php the_sub_field('image'); ?>"/>
            <?php endwhile; endif; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
