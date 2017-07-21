<?php
/*
  Template Name: Remedy Circle Downloads Page
*/

function custom_password_cookie_expiry($expires)
{
    return 0;  // Make it a session cookie
}

add_filter('post_password_expires', 'custom_password_cookie_expiry');

?>

<?php get_header(); ?>

<div class="page remedy-circle-downloads">

    <div class="page_top_wrap">
        <div class="page_top container centered">
            <h1><?= wp_title('') ?></h1>
        </div>
    </div>

    <div class="page_content">
        <div class="container">
            <?PHP
            global $post;
            if (!post_password_required($post)) {
                ?>
                <section>
                    <h2> Mobile Wallpapers </h2>
                    <div class="thumb-container">
                        <?PHP
                        global $nggdb;
                        $gallery = $nggdb->get_gallery(11, 'sortorder', 'DESC', true, 0, 0);
                        foreach ($gallery as $image) {
                            ?>
                            <div class="thumbnail">
                                <a href="<?= $image->imageURL ?>" target="_blank">
                                    <img src="<?= $image->thumbnailURL ?>"/>
                                </a>
                            </div>
                            <?PHP
                        }
                        ?>
                    </div>
                    <p>Click a thumbnail to show & download.</p>
                </section>
                <section>
                    <h2>Desktop Wallpapers</h2>
                    <div class="thumb-container">
                        <?php
                        $gallery = $nggdb->get_gallery(12, 'sortorder', 'DESC', true, 0, 0);
                        foreach ($gallery as $image) {
                            ?>
                            <div class="thumbnail">
                                <a href="<?= $image->imageURL ?>" target="_blank">
                                    <img src="<?= $image->thumbnailURL ?>"/>
                                </a>
                            </div>

                            <?PHP
                        }

                        ?>
                    </div>
                    <p>
                        Click a thumbnail to show & download.
                    </p>
                </section>
                <?PHP
            } else {
                ?>
                <div class="password-form">
                    <?PHP
                    // we will show password form here
                    echo get_the_password_form();
                    ?>
                </div>
                <?PHP
            }
            ?>
        </div>
    </div>
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
</div>


<?php get_footer(); ?>
