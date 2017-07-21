<?php
/*
  Template Name: Mini Camp Volunteer Form Page
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
    <div class="page_content">

        <div class="container bookingForm">

            <form id="MiniCampVolunteerForm" class="patronForm" method="POST"
                  action="<?= get_theme_root_uri() ?>/CampSouthernGround/mini-camp_volunteer_form_submit.php">

                <?php if (isset($_GET['submit']) && $_GET['submit'] === "success"): ?>

                <div class="thankYou" style="margin-bottom:40px;">
                    <strong>Thank you!</strong>
                    <p>Your request as been submitted.</p>
                </div>

                <?php endif; ?>

                <p>All volunteers must consent to a full background check.</p>
                <p>
                    <small>* Required Fields</small>
                </p>

                <section>
                    <h2>Contact</h2>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="FullName">
                                Full Legal Name *
                            </label>
                            <input type="text"
                                   id="FullName"
                                   name="Full_Name"
                                   placeholder="Name"
                                   data-required="1"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="Nickname">
                                Nickname
                            </label>
                            <input type="text"
                                   id="Nickname"
                                   name="Nickname"
                                   placeholder="Nickname"/>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="inputGroup">
                        <label for="Address">
                            Street Address *
                        </label>
                        <input type="text"
                               id="Address"
                               name="Address_One"
                               placeholder="Address One"
                               data-required="1"/>
                        <input type="text"
                               id="AddressTwo"
                               name="Address_Two"
                               class="continuation"
                               placeholder="Address Two"/>
                    </div>
                    <div class="inputGroup formGroup">

                        <div class="formColumn-2 inputGroup">
                            <label for="AddressCity">City *</label>
                            <input type="text"
                                   id="AddressCity"
                                   name="Address_City"
                                   placeholder="City"
                                   data-required="1"/>
                        </div>

                        <div class="formColumn-2 inputGroup">
                            <label for="AddressState">State *</label>
                            <input type="text"
                                   id="AddressState"
                                   name="Address_State"
                                   placeholder="State"
                                   data-required="1"/>
                        </div>
                    </div>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="Zip">
                                Zip *
                            </label>
                            <input type="text"
                                   id="Zip"
                                   name="Zip"
                                   placeholder="Zip"
                                   data-required="2"/>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="CellPhone">
                                Cell/Mobile Phone *
                            </label>
                            <input type="text"
                                   id="CellPhone"
                                   name="Cell_Phone"
                                   placeholder="(XXX) XXX-XXXX"
                                   data-required="3"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="HomePhone">
                                Home Phone
                            </label>
                            <input type="text"
                                   id="HomePhone"
                                   name="Home_Phone"
                                   placeholder="(XXX) XXX-XXXX"/>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="inputGroup">
                        <label for="Email">
                            Email *
                        </label>
                        <input type="text"
                               id="Email"
                               name="Email"
                               data-required="4"
                               placeholder="john.doe@somedomain.com"
                        />
                    </div>
                </section>
                <section>
                    <h2>Emergency Contact</h2>
                    <div class="inputGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="EmergencyContactName">
                                Name
                            </label>
                            <input type="text"
                                   id="EmergencyContactName"
                                   name="Emergency_Contact_Name"
                                   placeholder="Emergency Contact Name"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="EmergencyContactRelationship">
                                Relationship
                            </label>
                            <input type="text"
                                   id="EmergencyContactRelationship"
                                   name="Emergency_Contact_Relationship"
                                   placeholder="Relationship (i.e. father, mother)"
                            />
                        </div>
                    </div>
                    <div class="inputGroup">
                        <label for="EmergencyContactPhoneNumber">
                            Emergency Contact Phone Number
                        </label>
                        <input type="text"
                               id="EmergencyContactPhoneNumber"
                               name="Emergency_Contact_Phone_Number"
                               placeholder="(XXX) XXX-XXXX"
                        />
                    </div>
                </section>

                <?php

                $fields = get_fields();
                $weekIndex = 0;

                if ($fields['camp_week']): ?>
                    <section>
                        <h2>Camp Dates</h2>
                        <p>
                            Ideally we'd love volunteers who can commit to more than one mini-camp weekend, however,
                            we know this is not always possible. Please don’t feel as if you have to commit to the
                            entire weekend. You may specify which days best suit your schedule.
                        </p>

                        <?php

                        foreach ($fields['camp_week'] as $index => $value) {
                            $weekIndex += 1;
                            $weekDay = 0;
                            ?>

                            <div>
                                <h3>Camp Week <?= $weekIndex ?></h3>
                                <ul class="camp_list">
                                    <?php
                                    foreach ($value['camp_dates'] as $week) {
                                        if ((isset($week['camp_date']) && $week['camp_date'] !== "")) {
                                            $weekDay += 1;
                                            ?>
                                            <li>
                                                <input type="checkbox"
                                                       id="Camp_Week_<?= $weekIndex . "_" . $weekDay ?>"
                                                       name="CampWeek-<?= $weekIndex . "_" . $weekDay ?>"
                                                       value="<?= $week['camp_date'] ?>"
                                                       data-required="5">
                                                <label for="Camp_Week_<?= $weekIndex . "_" . $weekDay ?>"
                                                       class="checkboxLabel"></label>
                                                <label for="Camp_Week_<?= $weekIndex . "_" . $weekDay ?>"
                                                       class="inputLabel"><?= $week['camp_date'] ?></label>
                                            </li>
                                            <?php
                                        }
                                    }

                                    ?>
                                </ul>
                            </div>

                            <?php
                        }
                        ?>
                    </section>
                <?php endif; ?>

                <section>
                    <h2>Previous Volunteer Experience</h2>
                    <div class="inputGroup">
                        <label for="Previous_Volunteer_Experience_Org">
                            Organization
                        </label>
                        <input type="text"
                               id="Previous_Volunteer_Experience_Org"
                               name="Previous_Volunteer_Experience_Organization"
                               placeholder="Organization"
                        />
                    </div>
                    <div class="inputGroup">
                        <label for="Previous_Volunteer_Experience_Address">
                            Address
                        </label>
                        <input type="text"
                               id="Previous_Volunteer_Experience_Address"
                               name="Previous_Volunteer_Experience_Address"
                               placeholder="Street, City, State, Zip"
                        />
                    </div>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="Previous_Volunteer_Experience_Phone">
                                Phone Number
                            </label>
                            <input type="text"
                                   id="Previous_Volunteer_Experience_Phone"
                                   name="Previous_Volunteer_Experience_Phone"
                                   placeholder="(XXX) XXX-XXXX"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="Previous_Volunteer_Experience_Supervisor">
                                Supervisor
                            </label>
                            <input type="text"
                                   id="Previous_Volunteer_Experience_Supervisor"
                                   name="Previous_Volunteer_Experience_Supervisor"
                                   placeholder="Supervisor's Name"/>
                        </div>
                    </div>
                </section>
                <section>
                    <h2>Character Reference</h2>
                    <div class="inputGroup">
                        <label for="Character_Reference_Name">
                            Name
                        </label>
                        <input type="text"
                               id="Character_Reference_Name"
                               name="Character_Reference_Name"
                               placeholder="Name"
                        />
                    </div>
                    <div class="inputGroup">
                        <label for="Character_Reference_Address">
                            Address
                        </label>
                        <input type="text"
                               id="Character_Reference_Address"
                               name="Character_Reference_Address"
                               placeholder="Street, City, State, Zip"
                        />
                    </div>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="Character_Reference_Phone">
                                Phone Number
                            </label>
                            <input type="text"
                                   id="Character_Reference_Phone"
                                   name="Character_Reference_Phone"
                                   placeholder="(XXX) XXX-XXXX"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="Character_Reference_Relationship">
                                Relationship
                            </label>
                            <input type="text"
                                   id="Character_Reference_Relationship"
                                   name="Character_Reference_Relationship"
                                   placeholder="(i.e. employer, co-worker, professor, etc.)"/>
                            <p>
                                <small>
                                    <strong>Note:</strong> Family members are not eligible to provide character
                                    references.
                                </small>
                            </p>
                        </div>
                    </div>
                </section>
                <section>
                    <h2>
                        Volunteer Roles
                    </h2>
                    <p>
                        Volunteer roles may include: Greeting/Check-In, Games, Programs (such as organic farming,
                        archery, mining, and more), kitchen, Serving Food and Cleanup.
                    </p>
                    <p>
                        Do you have a preference as to where you will serve or are you flexible?
                    </p>
                    <div class="radioPair">
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="RolesFlexibleNo"
                                   name="Role_Preference"
                                   value="No"
                                   checked
                            />
                            <label for="RolesFlexibleNo" class="radioLabel">I'm flexible</label>
                            <label for="RolesFlexibleNo" class="check"></label>
                        </div>
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="RolesFlexibleYes"
                                   name="Role_Preference"
                                   value="Yes"
                            />
                            <label for="RolesFlexibleYes" class="radioLabel">I have a preference</label>
                            <label for="RolesFlexibleYes" class="check"></label>
                        </div>
                        <br/>
                    </div>
                    <div class="formGroup disabled" id="RolePreferenceContainer">
                        <div class="formColumn-2 inputGroup">
                            <label for="Preferred_Role">
                                Role Preference (if any):
                            </label>
                            <input type="text"
                                   id="Preferred_Role"
                                   name="Preferred_Role"
                                   placeholder="None"
                                   disabled
                            />
                        </div>
                        <br/>
                    </div>

                    <div class="inputGroup">
                        <label>
                            Do you have kitchen experience and a willingness to help us in that area?
                        </label>
                    </div>
                    <div class="radioPair">
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="Kitchen_Experience_Yes"
                                   name="Kitchen_Experience"
                                   value="Yes"
                            />
                            <label for="Kitchen_Experience_Yes" class="radioLabel">Yes</label>
                            <label for="Kitchen_Experience_Yes" class="check"></label>
                        </div>
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="Kitchen_Experience_No"
                                   name="Kitchen_Experience"
                                   value="No"
                                   checked
                            />
                            <label for="Kitchen_Experience_No" class="radioLabel">No</label>
                            <label for="Kitchen_Experience_No" class="check"></label>
                        </div>
                    </div>

                    <br />

                    <div class="inputGroup">
                        <label>
                            Do you have experience working with special needs children?
                        </label>
                    </div>
                    <div class="radioPair">
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="Special_Needs_Experience_Yes"
                                   name="Special_Needs_Experience"
                                   value="Yes"
                            />
                            <label for="Special_Needs_Experience_Yes" class="radioLabel">Yes</label>
                            <label for="Special_Needs_Experience_Yes" class="check"></label>
                        </div>
                        <div class="radioButtonContainer">
                            <input type="radio"
                                   id="Special_Needs_Experience_No"
                                   name="Special_Needs_Experience"
                                   value="No"
                                   checked
                            />
                            <label for="Special_Needs_Experience_No" class="radioLabel">No</label>
                            <label for="Special_Needs_Experience_No" class="check"></label>
                        </div>
                    </div>
                </section>

                <section>
                    <h2>
                        Additional Questions
                    </h2>
                    <div class="inputGroup">
                        <label for="Additional_Questions_Why">
                            Why do you want to volunteer at Camp Southern Ground?
                        </label>
                        <input type="text"
                               id="Additional_Questions_Why"
                               name="Additional_Questions_Why"
                               placeholder=""
                        />
                    </div>
                    <div class="inputGroup">
                        <label for="Additional_Questions_How">
                            How did you hear about Camp Southern Ground?
                        </label>
                        <input type="text"
                               id="Additional_Questions_How"
                               name="Additional_Questions_How"
                               placeholder=""
                        />
                    </div>
                    <div class="inputGroup">
                        <label for="Additional_Questions_Skills">
                            Do you have any pertinent skills, degrees or valid certificates (Ex: CPR, First Aid, Kitchen/Sous Chef
                            experience, etc) that might be beneficial for us to know?

                        </label>
                        <input type="text"
                               id="Additional_Questions_Skills"
                               name="Additional_Questions_Skills"
                               placeholder=""
                        />
                    </div>
                    <div class="formGroup">
                        <div class="formColumn-2 inputGroup">
                            <label for="Additional_Questions_Occupation">
                                Your Occupation
                            </label>
                            <input type="text"
                                   id="Additional_Questions_Occupation"
                                   name="Additional_Questions_Occupation"/>
                        </div>
                        <div class="formColumn-2 inputGroup">
                            <label for="Additional_Questions_Employer">
                                Your Employer
                            </label>
                            <input type="text"
                                   id="Additional_Questions_Employer"
                                   name="Additional_Questions_Employer"/>
                        </div>
                    </div>
                </section>
                <section>
                    <h2>
                        Release and Signature
                    </h2>
                    <p>
                        <strong>RELEASE LIABILITY WAIVER:</strong> Release, Liability Waiver, and Hold Harmless Statement for
                        Participation
                        as a Volunteer at Camp Southern Ground. By checking the box below, I understand that there are
                        certain risks involved with participating as a volunteer at Camp Southern Ground. I hereby release,
                        discharge, and agree to hold harmless Camp Southern Ground, Inc., Southern Ground, Zac Brown Band,
                        and its officers, agents, volunteers, assistants, and employees from any and every claim, demand,
                        or action of any kind arising due to bodily injury, illness, death, and/or property damage
                        resulting from any incident which may occur to me as a result of participating as volunteer at Camp
                        Southern Ground.
                    </p>

                    <div style="display:block;position: relative;margin: 0 0 20px;">
                        <input type="checkbox"
                               id="Agree_One"
                               name="Agree_One"
                               value="Agree One"
                               data-required="6">
                        <label for="Agree_One"
                               class="checkboxLabel"></label>
                        <label for="Agree_One"
                               class="inputLabel">I understand and agree to these terms.</label>
                    </div>

                    <p>
                        <strong>AUTHORIZATION:</strong> I give my authorization to representatives of Camp Southern Ground, Inc. to
                        verify the information in this application which may include contacting my references and the
                        appropriate government agencies. All prospective volunteers of Camp Southern Ground, Inc. will
                        undergo a Universal Background Screening before commencing volunteer activities with the
                        organization.
                    </p>

                    <div style="display:block;position: relative;margin: 0 0 20px;">
                        <input type="checkbox"
                               id="Agree_Two"
                               name="Agree_Two"
                               value="Agree Two"
                               data-required="6">
                        <label for="Agree_Two"
                               class="checkboxLabel"></label>
                        <label for="Agree_Two"
                               class="inputLabel">I understand and agree to these terms.</label>
                    </div>
                </section>

                <input type="submit" value="Submit Request"/>

                <div id="Errors">

                </div>

            </form>

        </div>

    </div>

    <script src="<?= get_theme_file_uri() ?>/js/miniCampVolunteerForm.js"></script>
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