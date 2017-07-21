<?php
/*
  Template Name: Registration Page
*/
?>

<?php get_header(); ?>

<div class="page camp container push-down">

        <div class="row">
            <div class="col-xs-12 col-sm-7 page_content">
                <?php if(the_field('logo')):?>
                <p style="margin-top:0; margin-bottom:20px;">
                    <img style="width:100%" src="<?php the_field('logo'); ?>"/>
                </p>
                <?php endif; ?>
                <div style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
                    <?php the_field('content'); ?>

                    <?php if (have_rows('buttons')): while (have_rows('buttons')) : the_row(); ?>
                        <?php if (get_sub_field('button_type') == "pdf") { ?>
                            <a
                                class="registration_button registration_button-download"
                                href="<?php the_sub_field('button_pdf'); ?>"
                                style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/img/download_icon.png')"
                                target="_blank">

                                <?php the_sub_field('button_text'); ?>
                            </a>
                        <?php } else if (get_sub_field('button_type') == 'url') { ?>
                            <a class="registration_button" href="<?php the_sub_field('button_url'); ?>" target="_blank">
                                <?php the_sub_field('button_text'); ?>
                            </a>
                        <?php } else { ?>
                            <h3 class="registration_heading"><?php the_sub_field('button_text'); ?></h3>
                        <?php } ?>
                    <?php endwhile; endif; ?>
                </div>


                <div style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
                    <?php the_field('thanks') ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 page_sidebar">
                <?php if (have_rows('images')): while (have_rows('images')) : the_row(); ?>
                    <img class="sidebar-image" src="<?php the_sub_field('image'); ?>"/>
                <?php endwhile; endif; ?>
            </div>
        </div>

</div>

<?php get_footer(); ?>
