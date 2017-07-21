<?php
/*
  Template Name: Progress Page
*/
?>

<?php get_header(); ?>

    <div class="page our_progress">
        <?php if (get_field('buildings_one')): ?>
            <?php $counter = 0; ?>
            <?php while (has_sub_field('buildings_one')): ?>
                <?php $counter = $counter + 1; ?>
                <div id="phase_one_modal_<?php echo $counter; ?>" class="modal container">
                    <div>
                        <a href="#" class="pull-right close-button" rel="modal:close">+</a>
                        <h2 class="modal_header"><?php echo strtoupper(get_sub_field('name')); ?></h2>
                    </div>
                    <div class="row">
                        <?php if (count(get_sub_field('images')) > 1) { ?>
                            <div class="col-xs-9">
                                <img class="modal_img" src="<?php echo get_sub_field('images')[0]['image']; ?>"/>
                            </div>
                            <div class="col-xs-3 img_toggles">
                                <?php while (has_sub_field('images')): ?>
                                    <img class="modal_toggle_img" src="<?php the_sub_field('image') ?>"/>
                                <?php endwhile; ?>
                            </div>
                        <?php } else { ?>
                            <div class="col-xs-12">
                                <img src="<?php echo get_sub_field('images')[0]['image']; ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                    <?php if (count(get_sub_field('images')) > 1) { ?>
                        <div class="line_divider"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="prev_image btn btn-primary btn-small">PREV</a>
                                <a href="#" class="next_image btn btn-primary btn-small">NEXT</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (get_field('buildings_two')): ?>
            <?php $counter = 0; ?>
            <?php while (has_sub_field('buildings_two')): ?>
                <?php $counter = $counter + 1; ?>
                <div id="phase_two_modal_<?php echo $counter; ?>" class="modal container">
                    <div>
                        <a href="#" class="pull-right close-button" rel="modal:close">+</a>
                        <h2 class="modal_header"><?php echo strtoupper(get_sub_field('name')); ?></h2>
                    </div>
                    <div class="row">
                        <?php if (count(get_sub_field('images')) > 1) { ?>
                            <div class="col-xs-9">
                                <img class="modal_img" src="<?php echo get_sub_field('images')[0]['image']; ?>"/>
                            </div>
                            <div class="col-xs-3 img_toggles">
                                <?php while (has_sub_field('images')): ?>
                                    <img class="modal_toggle_img" src="<?php the_sub_field('image') ?>"/>
                                <?php endwhile; ?>
                            </div>
                        <?php } else { ?>
                            <div class="col-xs-12">
                                <img src="<?php echo get_sub_field('images')[0]['image']; ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                    <?php if (count(get_sub_field('images')) > 1) { ?>
                        <div class="line_divider"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="prev_image btn btn-primary btn-small">PREV</a>
                                <a href="#" class="next_image btn btn-primary btn-small">NEXT</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="progress_map phase_two"></div>

        <style type="text/css" media="screen">
            .progress_map.phase_one {
                background-image: url('<?php the_field('map_one') ?>');
            }

            .progress_map.phase_two {
                background-image: url('<?php the_field('map_two') ?>');
            }
        </style>

        <div class="container phase_container">
            <div class="phase_tabs">
                <a class="phase_tab active" data-phase="two" href="#">PHASE 2</a><a class="phase_tab" data-phase="one"
                                                                                    href="#">PHASE 3</a>
            </div>
            <div class="row phase phase_one" style="display:none;">
                <div class="row phase_links">
                    <?php if (get_field('buildings_one')): ?>
                        <?php $counter = 0; ?>
                        <?php while (has_sub_field('buildings_one')): ?>
                            <?php $counter = $counter + 1; ?>
                            <div class="col-xs-4">
                                <a href="#phase_one_modal_<?php echo $counter; ?>"
                                   rel="modal:open"><?php the_sub_field('name'); ?></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="line_divider"></div>
                <div class="row phase_content">
                    <div class="col-xs-8">
                        <?php the_field('content_one'); ?>
                        <br/>
                        <a href="<?php echo get_permalink(get_page_by_title("Ways To Give")->ID) ?>"
                           class="btn btn-primary btn-small">Ways to Give</a>
                    </div>
                    <div class="col-xs-4">
                        <img style="width: 100%;" src="<?php the_field('img_one') ?>"/>
                    </div>
                </div>
            </div>

            <div class="row phase phase_two">
                <div class="row phase_links">
                    <?php if (get_field('buildings_two')): ?>
                        <?php $counter = 0; ?>
                        <?php while (has_sub_field('buildings_two')): ?>
                            <?php $counter = $counter + 1; ?>
                            <div class="col-xs-4">
                                <a href="#phase_two_modal_<?php echo $counter; ?>"
                                   rel="modal:open"><?php the_sub_field('name'); ?></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="line_divider"></div>
                <div class="row phase_content">
                    <div class="col-xs-8">
                        <?php the_field('content_two'); ?>
                        <br/>
                        <a href="<?php echo get_permalink(get_page_by_title("Ways To Give")->ID) ?>"
                           class="btn btn-primary btn-small">Ways to Give</a>
                    </div>
                    <div class="col-xs-4">
                        <img style="width: 100%;" src="<?php the_field('img_two') ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="container phase phase_one" style="display: none;">
            <h1>OUR PARTNERS</h1>
            <div class="row">
                <div class="col-xs-8">
                    <?php the_field('partners_one') ?>
                </div>
                <div class="col-xs-4">
                    <img style="width: 100%;margin-top:-40px;"
                         src="http://www.campsouthernground.org/wp-content/uploads/2015/10/BootsonSouthernGround.png"/>
                </div>
            </div>
        </div>
        <div class="container phase phase_two">
            <h1>OUR PARTNERS</h1>
            <div class="row">
                <div class="col-xs-8">
                    <?php the_field('partners_two') ?>
                </div>
                <div class="col-xs-4">
                    <img style="width: 100%;margin-top:-40px;"
                         src="http://www.campsouthernground.org/wp-content/uploads/2015/10/BootsonSouthernGround.png"/>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>