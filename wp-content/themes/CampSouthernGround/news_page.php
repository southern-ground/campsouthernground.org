<?php
/*
  Template Name: News Page
*/
?>

<?php get_header(); ?>
<div class="page news">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page_top_wrap">
            <div class="page_top container centered">
                <h1 class="upcase">
                    <?php if (get_post_meta($post->ID, "custom_title", true)) {
                        echo get_post_meta($post->ID, "custom_title", true);
                    } else {
                        the_title();
                    } ?>
                </h1>
            </div>
        </div>
        <?php
        $paged = 1;
        if (get_query_var('paged')) $paged = get_query_var('paged');
        if (get_query_var('page')) $paged = get_query_var('page');
        $args = "showposts=5&post_type=csg_news&paged=" . $paged;
        $myposts = new WP_Query($args);
        ?>

        <div class="container">

            <div class="row">
                <?php /*wp_pagenavi(array('query' => $myposts));*/ ?>
            </div>

            <div class="row">

                <?php while ($myposts->have_posts()) : $myposts->the_post(); ?>

                    <div class="col-xs-12 news_item">

                        <!--
                    <div class="news_date pull-left">
                        <?php echo date("M", strtotime($post->post_date)); ?><br/><?php echo date("d", strtotime($post->post_date)); ?>
                    </div>
                    -->

                        <h3 id="news_item_<?php echo $post->ID ?>" class="news_header"><?php the_title(); ?></h3>

                        <div class="news_content"><?php the_content(); ?></div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

        <div class="page_bottom_wrap">
            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-6">
                        <h4 class="xs-centered alignright">Sign Up For Our Newsletter</h4>
                    </div>

                    <div class="col-xs-12 col-sm-6 ">

                        <script type="text/javascript"
                                src="https://app.e2ma.net/app2/audience/tts_signup/1374375/4b927384c4ab6ddb83789105822dce6e/1367882/?v=a%22%3E%3C/script%3E%3Cdiv"
                                id="load_check" class="signup_form_message"></script>

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
                                        <div class="e2ma_signup_form_element"><input placeholder="First Name"
                                                                                     type="text" field_id="77642"
                                                                                     name="member_field_name_first"
                                                                                     id="id_member_field_name_first">
                                        </div>
                                    </div>
                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element"><input placeholder="Last Name" type="text"
                                                                                     field_id="78666"
                                                                                     name="member_field_name_last"
                                                                                     id="id_member_field_name_last">
                                        </div>
                                    </div>
                                    <div class="e2ma_signup_form_row">
                                        <div class="e2ma_signup_form_element"><input placeholder="Zip Code" type="text"
                                                                                     field_id="79690"
                                                                                     name="member_field_postal_code"
                                                                                     id="id_member_field_postal_code">
                                        </div>
                                    </div>
                                    <div class="e2ma_signup_form_row">
                                        <input id="e2ma_signup_submit_button"
                                               class="btn btn-inverse e2ma_signup_form_button" type="submit"
                                               name="Submit" value="Sign Up" {disabled}="">
                                    </div>


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
</div>
<?php get_footer(); ?>
