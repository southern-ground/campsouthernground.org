<?php
/*
  Template Name: Home Page
*/
?>

<?php get_header(); ?>
<div class="page home">

    <div class="page_top_wrap">
        <div class="page_top container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <img class="video_thumb"
                         src="<?php echo get_stylesheet_directory_uri(); ?>/img/video_placeholder.png"/>

                    <!--<a href="Javascript:void(0);" class="video_clicker"><img class="video_thumb"
                                                                             src="<?php /*echo get_stylesheet_directory_uri(); */ ?>/img/video_thumb.png"/></a>
                    <iframe style="display:none;" src="" class="home_video" frameborder="0" webkitallowfullscreen
                            mozallowfullscreen allowfullscreen></iframe>-->
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h2>A Note From Zac Brown</h2>
                    <p>
                        As a former camp counselor and camper, I know how a positive camp experience can transform a
                        child's life. My dream is that children of all abilities will have an opportunity to grow and
                        learn from each other, while experiencing the magic of the outdoors. It is also important to me
                        that we take care of the families that protect our freedoms and keep this country safe. Camp
                        Southern Ground will be a haven for children of family members serving in the military, as well
                        as be a respite for our active and veteran service members. Through our partnerships we'll be
                        able to welcome military families to our camps year-round. Thank you for supporting our efforts
                        and for helping us create an amazing place that is much more than the typical camp experience.
                    </p>
                    <div class="zb_sig"></div>
                </div>
            </div>
        </div>
    </div><!-- .page_top_wrap -->

    <div class="container">

        <div class="page_sidebar clearfix">
            <div class="our_mission">
                <h2>Our Mission</h2>
                <hr class="dark-blue"/>
                <?php the_field('mission_statement'); ?>
            </div>

            <a href="<?php echo get_permalink(get_page_by_title("Our Progress")->ID) ?>" class="progress_link">
                <span class="progress-text">See our Progress</span>
            </a>

            <h4 class="newsletter_header">Keep up with the Camp! Sign up for our Newsletter</h4>
            <script type="text/javascript"
                    src="https://app.e2ma.net/app2/audience/tts_signup/1374375/4b927384c4ab6ddb83789105822dce6e/1367882/?v=a%22%3E%3C/script%3E%3Cdiv"
                    id="load_check" class="signup_form_message"></script>

            <div class="e2ma_signup_form" id="e2ma_signup_form">

                <div class="e2ma_signup_form_container" id="e2ma_signup_form_container">
                    <form target="_new" method="post" id="e2ma_signup" onsubmit="return signupFormObj.checkForm(this)"
                          action="https://app.e2ma.net/app2/audience/signup/1374375/1367882/?v=a">

                        <input type="hidden" name="prev_member_email" id="id_prev_member_email">

                        <input type="hidden" name="source" id="id_source">


                        <input type="hidden" name="group_799562" value="799562" id="id_group_799562">

                        <input type="hidden" name="private_set" value="{num_private}">


                        <div class="e2ma_signup_form_row">
                            <!-- <div class="e2ma_signup_form_label">

                              <span class="e2ma_signup_form_required_asterix">*</span>

                              Email
                            </div> -->
                            <div class="e2ma_signup_form_element"><input placeholder="Email" type="text" name="email"
                                                                         id="id_email"></div>
                        </div>


                        <div class="e2ma_signup_form_row">
                            <!-- <div class="e2ma_signup_form_label">

                              <span class="e2ma_signup_form_required_asterix">*</span>

                              First name
                            </div> -->
                            <div class="e2ma_signup_form_element"><input placeholder="First Name" type="text"
                                                                         field_id="77642" name="member_field_name_first"
                                                                         id="id_member_field_name_first"></div>
                        </div>


                        <div class="e2ma_signup_form_row">
                            <!-- <div class="e2ma_signup_form_label">

                              <span class="e2ma_signup_form_required_asterix">*</span>

                              Last name
                            </div> -->
                            <div class="e2ma_signup_form_element"><input placeholder="Last Name" type="text"
                                                                         field_id="78666" name="member_field_name_last"
                                                                         id="id_member_field_name_last"></div>
                        </div>


                        <div class="e2ma_signup_form_row">
                            <!-- <div class="e2ma_signup_form_label">

                              <span class="e2ma_signup_form_required_asterix">*</span>

                              Postal code
                            </div> -->
                            <div class="e2ma_signup_form_element"><input placeholder="Zip Code" type="text"
                                                                         field_id="79690"
                                                                         name="member_field_postal_code"
                                                                         id="id_member_field_postal_code"></div>
                        </div>


                        <!-- <div class="e2ma_signup_form_required_footnote"><span class="e2ma_signup_form_required_asterix">*</span> required</div> -->
                        <div class="e2ma_signup_form_button_row" id="e2ma_signup_form_button_row">
                            <input id="e2ma_signup_submit_button"
                                   class="btn btn-primary e2ma_signup_form_button pull-right" type="submit"
                                   name="Submit" value="Sign Up" {disabled}="">
                            <!-- &nbsp; -->
                            <!-- <input id="e2ma_signup_reset_button" class="btn btn-primary e2ma_signup_form_button" type="reset" value="Clear" {disabled}=""> -->
                        </div>
                    </form>
                </div>
            </div>

            <br clear="both"/>

        </div><!-- .page_sidebar -->

        <div class="page_content">
            <h1>NEWS</h1>
            <?php
            $args = array('posts_per_page' => 4, 'post_type' => 'csg_news');
            $news_page = get_page_by_title("News");

            $myposts = get_posts($args);
            foreach ($myposts as $post) : setup_postdata($post); ?>
                <div class="row-fluid news-item clearfix">
                    <div class="col-xs-2 col-xs-full-width col-sm-pull-left col-md-1">
                        <div class="news_date">
                            <div
                                    class="news_date-month"><?php echo date("M", strtotime($post->post_date)); ?></div>
                            <div
                                    class="news_date-day"><?php echo date("d", strtotime($post->post_date)); ?></div>
                        </div>
                    </div>
                    <div class="col-xs-10 col-md-11">
                        <a class="news_excerpt_header"
                           href="http://campsouthernground.org/csg_news/<?= $post->post_name ?>">

                            <h3 class="news_exerpt_title"><?php the_title(); ?></h3>
                        </a>

                        <div class="news_excerpt"><?php the_excerpt(); ?></div>
                        <div>
                            <a href="http://campsouthernground.org/csg_news/<?= $post->post_name ?>"
                               class="pull-right btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div><!-- .page_content -->

    </div>

</div><!-- .page -->
<?php get_footer(); ?>
