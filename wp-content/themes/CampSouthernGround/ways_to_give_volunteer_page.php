<?php
/*
  Template Name: Ways To Give - Volunteer Page
*/
?>
<?php get_header(); ?>

<div class="page ways_to_give volunteer">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container">
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-sm-push-8">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/volunteer_top_2.jpg"/>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-sm-pull-4">
                        <?php if (get_post_meta($post->ID, "capitalize_title", true)) { ?>
                        <h1 class="upcase xs-centered">
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
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">

                    <h1>Group Volunteer Opportunities are Available</h1>

                    <p>
                        Does your company offer a give-back day? Is your group looking for a service project? If so,
                        Camp Southern Ground needs you! If you love the outdoors, and you don’t mind getting a little
                        sweaty and dirty - or just enjoy the spirit of volunteerism - consider spending a morning or
                        afternoon at Camp Southern Ground! With over 400 acres of land at camp, there is no shortage of
                        ways to volunteer. Help out in our organic garden, or grab a paintbrush and help beautify our
                        camp signage! As warmer weather approaches, opportunities in landscape clearing and property
                        cleaning are on the top of our priority list!
                    </p>

                    <div style="display: flex;justify-content:center;align-content: center;margin: 20px auto">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/volunteer_top_1.jpg"/>
                    </div>

                    <p>
                        To learn more about the group volunteer options at Camp Southern Ground please send your contact
                        information, a little bit about your company or group, as well as your location and availability
                        to <a href="mailto:info@campsouthernground.org">info@campsouthernground.org</a>. *Please note:
                        Volunteer opportunities are subject to age restrictions.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <script type="text/javascript"
                            src="https://app.e2ma.net/app2/audience/tts_signup/1374375/4b927384c4ab6ddb83789105822dce6e/1367882/?v=a%22%3E%3C/script%3E%3Cdiv"
                            id="load_check" class="signup_form_message"></script>

                    <div class="e2ma_signup_form" id="e2ma_signup_form">

                        <div class="e2ma_signup_form_container" id="e2ma_signup_form_container">
                            <form target="_new" method="post" id="e2ma_signup"
                                  onsubmit="return signupFormObj.checkForm(this)"
                                  action="https://app.e2ma.net/app2/audience/signup/1374375/1367882/?v=a">

                                <input type="hidden" name="prev_member_email" id="id_prev_member_email">

                                <input type="hidden" name="source" id="id_source">

                                <input type="hidden" name="group_799562" value="799562" id="id_group_799562">

                                <input type="hidden" name="private_set" value="{num_private}">

                                <div class="volunteer_form">
                                    <h4>Sign Up For Our Newsletter</h4>

                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element">
                                            <input placeholder="Email" type="text" name="email" id="id_email">
                                        </div>
                                    </div>


                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element">
                                            <input placeholder="First Name"
                                                   type="text" field_id="77642"
                                                   name="member_field_name_first"
                                                   id="id_member_field_name_first">
                                        </div>
                                    </div>


                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element">
                                            <input placeholder="Last Name" type="text"
                                                   field_id="78666"
                                                   name="member_field_name_last"
                                                   id="id_member_field_name_last">
                                        </div>
                                    </div>


                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element">
                                            <input placeholder="Zip Code" type="text"
                                                   field_id="79690"
                                                   name="member_field_postal_code"
                                                   id="id_member_field_postal_code">
                                        </div>
                                    </div>

                                </div>

                                <div class="e2ma_signup_form_button_row" id="e2ma_signup_form_button_row">
                                    <input id="e2ma_signup_submit_button"
                                           class="btn btn-primary e2ma_signup_form_button" type="submit" name="Submit"
                                           value="Sign Up" {disabled}="">
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    <?php endwhile;
    else: ?>
        <p>Sorry, this page doesn't exist.</p>
    <?php endif; ?>
    <br/>
</div>
<?php get_footer(); ?>

