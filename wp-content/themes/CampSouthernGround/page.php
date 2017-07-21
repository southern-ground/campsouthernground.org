<?php
/*
  Template Name: Generic Page
*/
?>

<?php get_header(); ?>

<div class="page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
            </div>
        </div>
        <div class="page_content">
            <div class="container">
                <p><?php the_content(); ?></p>

                <?php if (get_field('acceptiva_link')) { ?>
                    <a  class="donate-button"
                        href="<?php the_field('acceptiva_link'); ?>"
                        target="_blank"
                    >
                        Donate with Acceptiva <img class="acceptiva" src="<?php echo get_stylesheet_directory_uri(); ?>/img/button-icons/payment_icons.png" />
                    </a>
                <?php } ?>

            </div>

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

<?php get_footer(); ?>
