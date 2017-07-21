<?php
/*
  Template Name: Venue Detail Page
*/
?>

<?php get_header(); ?>

<div class="page">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container centered">
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
        </div>
        <div class="page_content" id="venue">

            <section class="venueTitleGroup">
                <h3><?= the_field('venue_title') ?></h3>
                <a class="bookingLink"
                   href="http://www.campsouthernground.org/booking/form" target="_blank">
                    Book Now
                </a>
            </section>
            <section class="venueDescription">
                <?= the_field('description') ?>
            </section>

            <?php if (get_field('photo_gallery_id')) {
                ?>
                <section class="venueGallery">
                    <?php
                    $galleryID = get_field('photo_gallery_id');
                    echo do_shortcode('[ngg_images gallery_ids="' . $galleryID . '" display_type="photocrati-nextgen_basic_slideshow" gallery_width="920" gallery_height="465" cycle_interval="5"]');
                    ?>
                </section>
                <?php
            } ?>

            <section class="venueDetailsGroup">
                <div class="venueDetailColumn">
                    <div class="venueDetail">

                        <?php if (have_rows('amenities')): ?>

                            <p class="venueDetailTitle">Amenities</p>
                            <ul class="venueDetailItems">

                                <?php while (have_rows('amenities')): the_row(); ?>

                                    <li><?php the_sub_field('feature'); ?></li>

                                    <?php

                                    ?>

                                <?php endwhile; ?>

                            </ul>

                        <?php endif; ?>

                    </div>
                </div>
                <div class="venueDetailColumn">
                    <div class="venueDetail">

                        <?php if (have_rows('capacity')): ?>

                            <p class="venueDetailTitle">Capacity</p>
                            <ul class="venueDetailItems">

                                <?php while (have_rows('capacity')): the_row(); ?>

                                    <li><?php the_sub_field('feature'); ?></li>

                                    <?php

                                    ?>

                                <?php endwhile; ?>

                            </ul>

                        <?php endif; ?>

                    </div>
                    <div class="venueDetail">

                        <?php if (have_rows('exterior')): ?>

                            <p class="venueDetailTitle">Exterior</p>
                            <ul class="venueDetailItems">

                                <?php while (have_rows('exterior')): the_row(); ?>

                                    <li><?php the_sub_field('feature'); ?></li>

                                    <?php

                                    ?>

                                <?php endwhile; ?>

                            </ul>

                        <?php endif; ?>

                    </div>
                    <div class="venueDetail">
                        <a class="venueInfoSheetLink"
                           href="<?= get_field('info_sheet_link') ?>"
                           target="_blank"
                        >Download Info Sheet</a>
                    </div>
                </div>
            </section>

            <?php

            if (have_rows('panoramas')): ?>

                <section class="venueGallery venueGallery panorama">
                    <p class="galleryTitle">360&deg; View</p>
                    <div id="panorama"></div>
                    <ul id="panos"></ul>
                </section>

            <?php endif; ?>

            <section class="venueDetailsGroup <?=get_field('floor_plan') && get_field('floor_plan_pdf') ? ("") : ("singleColumn")?>">

                <?php
                if (get_field('floor_plan') && get_field('floor_plan_pdf')):
                    $image = get_field('floor_plan');
                    $link = "../docs/" . get_field('floor_plan_pdf');
                    ?>
                    <div class="venueDetailColumn">
                        <a href="<?= $link ?>" target="_blank">
                            <img class="floorPlan" src="<?= $image['url'] ?>" alt=""/>
                        </a>
                    </div>


                    <?php
                endif;
                ?>
                <div class="venueDetailColumn">
                    <div class="contact">
                        <p class="contactSlug"><?= get_field('contact_slug') ?></p>
                        <p class="contactEmail"><a
                                    href="mailto:<?= get_field('contact_email') ?>"><?= get_field('contact_email') ?></a>
                        </p>
                        <p class="contactPhone">
                            <?php
                            $phone = preg_replace('/[\s,\.,\-]+/', '', get_field('contact_phone_number'));
                            $phoneWithPause = preg_replace('/ext+/', 'p', $phone);
                            ?>
                            <a href="tel:+<?= $phoneWithPause ?>">
                                <?= get_field('contact_phone_number') ?>
                            </a>
                        </p>
                    </div>
                    <a class="bookNowLink"
                       href="http://www.campsouthernground.org/booking/form"
                       target="_blank">Book Now</a>
                </div>
            </section>

            <?php if (have_rows('other_spaces')): ?>

                <section class="otherSpaces">
                    <p class="title">Our Other Available Spaces:</p>
                    <ul class="otherSpaces">
                        <?php while (have_rows('other_spaces')): the_row(); ?>

                            <li class="otherSpace">

                                <?php

                                $image = get_sub_field('space_image');
                                $link = get_sub_field('venue_link');

                                ?>
                                <img class="spaceImage" src="<?= $image['url'] ?>"/>
                                <p class="spaceName"><?= the_sub_field('space_name') ?></p>
                                <a class="spaceInfoLink" href="<?= $link ?>">More Info</a>
                            </li>

                        <?php endwhile; ?>

                    </ul>

                </section>
            <?php endif; ?>

        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <?php if (get_post_meta($post->ID, "show_newsletter", true)) { ?>
        <div class="page_bottom_wrap">
            <div class="container">
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 align-right xs-center">
                    <h4>Sign Up For Our Newsletter</h4>
                </div>
                <div class="col-xs-12 col-sm-4">

                    <script type="text/javascript"
                            src="https://app.e2ma.net/app2/audience/tts_signup/1374375/4b927384c4ab6ddb83789105822dce6e/1367882/?v=a%22%3E%3C/script%3E%3Cdiv"
                            id="load_check"
                            class="signup_form_message"></script>

                    <div class="e2ma_signup_form" id="e2ma_signup_form">
                        <div class="e2ma_signup_form_container row" id="e2ma_signup_form_container">
                            <form target="_new" method="post" id="e2ma_signup"
                                  onsubmit="return signupFormObj.checkForm(this)"
                                  action="https://app.e2ma.net/app2/audience/signup/1374375/1367882/?v=a">
                                <input type="hidden" name="prev_member_email" id="id_prev_member_email">
                                <input type="hidden" name="source" id="id_source">
                                <input type="hidden" name="group_799562" value="799562" id="id_group_799562">
                                <input type="hidden" name="private_set" value="{num_private}">


                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Email" type="text"
                                                                                 name="email" id="id_email"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="First Name" type="text"
                                                                                 field_id="77642"
                                                                                 name="member_field_name_first"
                                                                                 id="id_member_field_name_first"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Last Name" type="text"
                                                                                 field_id="78666"
                                                                                 name="member_field_name_last"
                                                                                 id="id_member_field_name_last"></div>
                                </div>
                                <div class="e2ma_signup_form_row">
                                    <div class="e2ma_signup_form_element"><input placeholder="Zip Code" type="text"
                                                                                 field_id="79690"
                                                                                 name="member_field_postal_code"
                                                                                 id="id_member_field_postal_code"></div>
                                </div>

                                <div class="e2ma_signup_form_button_row" id="e2ma_signup_form_button_row">
                                    <input id="e2ma_signup_submit_button"
                                           class="btn btn-inverse e2ma_signup_form_button" type="submit" name="Submit"
                                           value="Sign Up" {disabled}="">
                                </div>


                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    <?php } ?>
</div>


<?php

// Check if there are any panoramas set:

if (have_rows('panoramas')):

    $panos = [];
    $panoNames = [];

    while (have_rows('panoramas')) : the_row();
        $panos [] = "\"" . get_sub_field('panorama_image')['url'] . "\"";
        $panoNames [] = "\"" . get_sub_field('panorama_title') . "\"";
    endwhile;

    ?>

    <link rel="stylesheet" href="<?= get_template_directory_uri() . "/css/pannellum.css" ?>" />
    <script src="<?= get_template_directory_uri() . "/js/vendor/pannellum/pannellum.js" ?>"></script>
    <script>
        (function () {

            var images = [<?=implode(',', $panos)?>],
                names = [<?=implode(',', $panoNames)?>],
                ulEl = document.getElementById('panos'),
                li, link,
                showPanorama = function (img) {
                    pannellum.viewer('panorama', {
                        type: "equirectangular",
                        panorama: img,
                        autoLoad: true,
                        autoRotate: 10
                    });
                };


            for (var i = 0; i < images.length; i++) {
                li = document.createElement("li");
                link = document.createElement("a");
                link.appendChild(document.createTextNode(names[i]));
                link.title = "Panorama: " + names[i];
                link.href = images[i];
                link.onclick = function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    showPanorama(e.target.href);
                    void(0);
                };
                li.appendChild(link);
                ulEl.appendChild(li);
            }

            showPanorama( images[0] );

        })();
    </script>

    <?php

else :

    // no rows found

endif;

?>

<?php get_footer(); ?>
